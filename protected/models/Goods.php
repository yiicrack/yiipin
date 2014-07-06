<?php

/**
 * @version $Id: Goods.php 4714 2013-01-29 15:11:37Z lonestone $
 * 
 * This is the model class for table "{{goods}}".
 *
 * The followings are the available columns in table '{{goods}}':
 * @property integer $id
 * @property integer $collect_count
 * @property integer $category_id
 * @property integer $shop_id
 * @property integer $user_id
 * @property string $name
 * @property string $image
 * @property string $price
 * @property string $url
 * @property string $website
 * @property string $item_key
 * @property string $taobao_seller_nick
 * @property boolean $delisted
 * @property boolean $edited
 */
class Goods extends ActiveRecord
{
	public $modelName = '商品';
	public $images_collected = false;//附图是否已采集
	
	private $old_name;

	public function __toString()
	{
		return $this->name;
	}
	
	protected function afterFind()
	{
	    $this->old_name = $this->name;
	    return parent::afterFind();
	}
	
	protected function beforeSave()
	{	
		//本地化非淘宝图片
		if($this->website != 'taobao' && $this->isNewRecord)
		{
		    if($this->image[0] != '/') //远程图片本地化
		    {
    			$pathinfo = pathinfo($this->image);
    			$filename = md5($this->image.time().rand(1,1000)) . '.' . ($pathinfo['extension'] ? $pathinfo['extension'] : 'jpg');
    					
    			$dir = '/upload/goods/' . date ( 'Ymd' ) . '/';
    			if (! file_exists ( Yii::app ()->basePath . '/..' . $dir ))
    				FileHelper::mkdirs ( Yii::app ()->basePath . '/..' . $dir );
    				
    			$filepath = realpath(Yii::app ()->basePath . '/../') . $dir . $filename;
    			
    			if(!file_exists($filepath))
    			{
    				if(UtilHelper::getfile ( $this->image, $filepath, $this->url))
    				{
    				    if(CFileHelper::getMimeType($filepath) == 'text/html')
    				    {
    				        @unlink($filepath);
    				    }
    				    else 
    				    {
    				        $this->image = $dir . $filename;
    				    }
    				}
    			}
    			else 
    			    $this->image = $dir . $filename;
		    }
		    
		    $filepath = realpath(Yii::app()->basePath . '/..'). $this->image;
		    //检测图片大小
		    $pathinfo = pathinfo($filepath);
		    $image = ImageHelper::createFromFile($filepath, $pathinfo['extension']);
		    if($image->_handle!==null)
		    {
		        $this->image_w = imagesx($image->_handle);//原宽
		        $this->image_h = imagesy($image->_handle);//原高
		        $image->destroy();
		    }
			
			//上传到云
			if(Yii::app()->config->get('use_cloud') === 'true')
			{
			    $cloudstorage = new CloudStorage();
			    $cloudstorage->cache = false;
			    $cloudstorage->cloud_type = CloudStorage::CLOUT_TYPE_UPYUN;
			    $cloudstorage->init();
			    $cloudstorage->saveFile($filepath);
			
			    $cloud_config = Yii::app()->config->get('cloud_config');
			    if($cloud_config['local_backup'] === 'false')
			    {
			        @unlink($filepath);//本地不保留备份
			    }
			}
		}
		
		$this->name = strip_tags($this->name);
		
		$this->guessCategory();
		
		if(!isset($this->shop_id)) $this->shop_id = 0;
		
		if(isset($this->taobao_seller_nick) && $this->taobao_seller_nick)
		{
		    $shop = Shop::model()->findByAttributes(array('nick'=>$this->taobao_seller_nick));
		    if($shop !== null)
		    {
		        $this->shop_id = $shop->id;
		    }
		}
		
		if($this->name != $this->old_name && !$this->isNewRecord)
		{
		    $this->edited = 1;
		}

		return parent::beforeSave();
	}
	
	/**
	 * 根据分类标签猜测商品分类
	 * @return number
	 */
	private function guessCategory()
	{
	    if($this->name && $this->category_id == 0)
	    {
    	    $categories = GoodsCategory::model()->findAll(array('order'=>'id ASC'));
    	    foreach($categories as $category)
    	    {
    	        if(count($category->subcategories) > 0) continue;
    	        $groups = explode("\r\n", $category->tag_groups);
    	        foreach($groups as $group)
    	        {
    	            if($group != '热门风格' && $group != '当季流行' && $group != '元素')
    	            {
    	                $gcht = GoodsCategoryHasTag::model ()->findAllByAttributes ( array ('category_id' => $category->id, 'group' => $group ) );
    	                foreach ( $gcht as $tag )
    	                {
    	                    if($tag->tag!==null && trim($tag->tag->name) && strpos($this->name, $tag->tag->name)!==false)
    	                    {
    	                        $this->category_id = $category->id;
    	                        return;
    	                    }
    	                }
    	            }
    	        }
    	        if(strpos($this->name, $category->name) !==false)
    	        {
    	            $this->category_id = $category->id;
    	            return;
    	        }
    	    }
	    }
	}
	
	protected function afterDelete()
    {
        parent::afterDelete();
        
        //删除所有分享
        $shares = Share::model()->findAllByAttributes(array('goods_id'=>$this->id));
        foreach($shares as $share) $share->delete();
        
        if($this->image)
        {
            @unlink(Yii::app()->basePath . '/../' . $this->image);
            //云删除
            if(Yii::app()->config->get('use_cloud') === 'true')
            {
                $cloudstorage = new CloudStorage();
                $cloudstorage->cache = false;
                $cloudstorage->cloud_type = CloudStorage::CLOUT_TYPE_UPYUN;
                $cloudstorage->init();
                try{
                    $cloudstorage->deleteFile(realpath(Yii::app()->basePath . '/..') . $this->image);
                }
                catch(Exception $e)
                {
                    
                }
            }
        }
        return true;
    }
    
    protected function afterSave()
    {
        //处理tags
        $words = $this->getTagsByName();
        foreach($words as $word)
        {
            $tag = GoodsTag::model()->findByAttributes(array('name'=>$word));
            if($tag === null)
            {
                $tag = new GoodsTag();
                $tag->name = $word;
                $tag->save(false);
            }
            
            $ght = GoodsHasTag::model()->findByAttributes(array('goods_id'=>$this->id, 'tag_id'=>$tag->id));
            if($ght === null)
            {
                $ght = new GoodsHasTag();
                $ght->goods_id = $this->id;
                $ght->tag_id = $tag->id;
                $ght->save();
            }
        }
        
        //更新好店推荐数量
        if($this->shop_id > 0  && $this->shop !== null)
        {
            $this->shop->share_count = intval(self::model()->countByAttributes(array('shop_id'=>$this->shop_id)));
            $this->shop->save(false);
        }
        
        if($this->isNewRecord && !$this->images_collected)
        {
            $this->getMorePics();
        }
    }
    
    /**
     * 抓取更多淘宝商品图片
     */
    private function getMorePics()
    {
        $keys = explode('_', $this->item_key);
        if($keys[0] != 'taobao') return;
        
        Yii::import ( 'application.vendors.top.*' );
        Yii::import ( 'application.vendors.top.request.*');
        
        $tb_top = new TopClient;
        $tb_top->appkey = Yii::app()->config->get('taobao_appkey');
        $tb_top->secretKey = Yii::app()->config->get('taobao_appsecret');
        
        $req = new ItemGetRequest();
        $req->setFields("item_img");
        $req->setNumIid($keys[1]);
        $resp = $tb_top->execute($req);
        
        /**
         * [1] => SimpleXMLElement Object
         *        (
         *            [id] => 4169636408
         *            [position] => 1
         *            [url] => http://img04.taobaocdn.com/bao/uploaded/i4/69675826/T2KMxfXopNXXXXXXXX_!!69675826.jpg
         *        )
         */
        if (isset($resp->item)) {
            $imgs = (array)$resp->item->item_imgs;
            if(count($imgs['item_img']))
            {
                foreach($imgs['item_img'] as $index=>$img)
                {
                    if($index == 0) continue;
                    
                    $goodsImage = new GoodsImage();
                    $goodsImage->goods_id = $this->id;
                    $goodsImage->url = (string)$img->url;
                    $goodsImage->position = $img->position;
                    $goodsImage->taobao_id = $img->id;
                    $goodsImage->save();
                }
            }
        }
    }
    
    /**
     * 返回淘宝客不同尺寸的图片
     * @param integer $size
     * @return string
     */
    public function getThumb($size = 220)
    {
        $suffix = '';
        switch ($size) {
            case 40:
                $suffix = '_40x40.jpg';
                break;
            case 70:
                $suffix = '_70x70.jpg';
                break;
            case 80:
                $suffix = '_sum.jpg';//宽高不超过80px等比缩放
                break;
            case 100:
                $suffix = '_100x100.jpg';
                break;
            case 120:
                $suffix = '_120x120.jpg';
                break;
            case 160:
                $suffix = '_160x160.jpg';
                break;
            case 220:
                $suffix = '_b.jpg'; //宽高不超过220px等比缩放
                break;
            case 310:
                $suffix = '_310x310.jpg';
                break;
            case 'default':
                $suffix = '';
                break;
        }
        
        if($this->image[0] == '/')//本地图
        {
            if(Yii::app()->config->get('use_cloud') === 'true')
            {
                $cloud_config = Yii::app()->config->get('cloud_config');
                return 'http://'.$cloud_config['upyun_domain'].$this->image.$suffix;
            }
            else
            {
                //本地图片，如果不存在缩略图则生成
                if(!file_exists(Yii::app()->basePath . '/..'.$this->image.$suffix)) 
                {
                    $filename = Yii::app()->basePath . '/..'.$this->image;
                    if(file_exists($filename))
                    {
                        $pathinfo = pathinfo($filename);
                        $image = ImageHelper::createFromFile($filename, $pathinfo['extension']);
                        if($image->_handle!==null)
                        {
                            $w = imagesx($image->_handle);//原宽
                            $h = imagesy($image->_handle);//原高
                            
                            switch ($size) {
                                case 40:
                                    $width = 40;
                                    $height = 40;
                                    break;
                                case 70:
                                    $width = 70;
                                    $height = 70;
                                    break;
                                case 80:
                                    if($w > $h)
                                    {
                                        $width = 80;
                                        $height = intval($h*($width/$w));
                                    }
                                    else
                                    {
                                        $height = 80;
                                        $width = intval($w*($height/$h));
                                    }
                                    break;
                                case 100:
                                    $width = 100;
                                    $height = 100;
                                    break;
                                case 120:
                                    $width = 120;
                                    $height = 120;
                                    break;
                                case 160:
                                    $width = 160;
                                    $height = 160;
                                    break;
                                case 220:
                                    if($w > $h)
                                    {
                                        $width = 220;
                                        $height = intval($h*($width/$w));
                                    }
                                    else
                                    {
                                        $height = 220;
                                        $width = intval($w*($height/$h));
                                    }
                                    break;
                                case 310:
                                    $width = 310;
                                    $height = 310;
                                    break;
                            }
                            
                            $image->crop($width, $height, array(
                                    'fullimage' => false,
                                    'pos' => 'center',
                                    'bgcolor' => '#ffffff',
                                    'transparent'=>true,
                            ));
                            $image->save(Yii::app()->basePath . '/..'.$this->image.$suffix);
                            $image->destroy();
                        }
                    }
                    
                }
            }
        }

        return $this->image.$suffix;
    }
    
    //返回计算后图片高度
    public function getImageHeight($width = 200)
    {
        if($this->image_w == 0) return '';
        return intval($this->image_h * ($width / $this->image_w));
    }
	
	/**
	 * Returns the static model of the specified AR class.
	 * @return Goods the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{goods}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, image', 'required'),
			array('collect_count, user_id, category_id, shop_id, delisted, edited, image_w, image_h', 'numerical', 'integerOnly'=>true),
			array('name, image', 'length', 'max'=>100),
			array('price', 'length', 'max'=>10),
			array('url', 'length', 'max'=>500),
			array('taobao_seller_nick', 'length', 'max'=>250),
			array('item_key', 'length', 'max'=>50),
			array('website', 'length', 'max'=>30),
	        array('image', 'file', 'allowEmpty'=>true, 'types'=>'jpg, gif, png', 'maxSize'=>2000*1024, 'safe'=>true),
		    array('nick', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, collect_count, user_id, name, image, price, url, website, category_id, delisted', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'category'=>array(self::BELONGS_TO, 'GoodsCategory', 'category_id'),
			'tags'=>array(self::MANY_MANY, 'GoodsTag', '{{goods_has_tag}}(goods_id, tag_id)'),
		    'shares'=>array(self::HAS_MANY, 'Share', 'goods_id'),
		    'share_count'=>array(self::STAT, 'Share', 'goods_id'),
		    'images'=>array(self::HAS_MANY, 'GoodsImage', 'goods_id'),
		    'user'=>array(self::BELONGS_TO, 'User', 'user_id'),
		    'shop'=>array(self::BELONGS_TO, 'Shop', 'shop_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => '商品ID',
			'collect_count' => '分享次数',
		    'category_id'=>'分类',
			'user_id' => '分享者',
			'name' => '商品名称',
			'image' => '商品图片',
			'price' => '价格',
			'url' => 'URL',
			'website' => '网站',
	        'delisted' => '已下架',
	        'taobao_seller_nick' => '淘宝卖家昵称',
	        'edited'=>'是否已编辑过',
	        'taobao_commission_rate'=>'佣金比例',
	        'taobao_commission_num'=>'30天推广量',
	        'taobao_volume'=>'30天成交量',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);

		$criteria->compare('category_id',$this->category_id);
		
		$criteria->compare('user_id',$this->user_id);

		$criteria->compare('name',$this->name,true);

		$criteria->compare('website',$this->website,true);

		return new CActiveDataProvider('Goods', array(
			'criteria'=>$criteria,
			'pagination'=>array('pageSize'=>10, ),
            'sort' => array('defaultOrder' => 't.id DESC'),
		));
	}
	
	public function getTagsByName()
	{
	    Yii::import('application.vendors.pscws4.*');
	    $pscws = new pscws4();
	    $pscws->set_dict(Yii::app()->basePath.'/vendors/pscws4/data/dict.utf8.xdb');
	    $pscws->set_rule(Yii::app()->basePath.'/vendors/pscws4/data/rules.utf8.ini');
	    $pscws->set_ignore(true);
	    //$pscws->set_multi(15);
	    $pscws->send_text($this->name);
	    $words = $pscws->get_tops(10);
	    $tags = array();
	    if($words){
    	    foreach ($words as $val) {
    	        $tags[] = $val['word'];
    	    }
	    }
	    $pscws->close();
	    return $tags;
	}
}
