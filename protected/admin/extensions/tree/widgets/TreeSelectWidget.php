<?php
include(dirname(__FILE__).DIRECTORY_SEPARATOR.'TreeWidget.php');
class TreeSelectWidget extends TreeWidget
{
	public $modelName;
	
	public $model;
	
	public $attributes=array();
	
	public $isShowEmpty=true;

    //默认根值
	public $defaultParentId=-1;
	
	public $route='/site/treeSelect';
	
	private $_formatOptions;
	
	protected function getFormatOptions() {
		if ($this->_formatOptions===null) {
			$hasModel=$this->hasModel();	
			$this->_formatOptions=array();	    
		    foreach ($this->attributes as $attribute) {
		    	if ($hasModel) {
		    		$name = CHtml::activeName($this->model,$attribute);
		    	} else {
		    		$name = $attribute;
		    	}
	            $this->_formatOptions[$attribute]['htmlOptions']['id'] = CHtml::getIdByName($name).'_'.$this->id;
	            $this->_formatOptions[$attribute]['htmlOptions']['name'] = $name;
	            if ($this->isShowEmpty) {
	    			$this->_formatOptions[$attribute]['htmlOptions']['empty'] = '==请选择==';
	    		}
	    	    if($hasModel) {
	    			$this->_formatOptions[$attribute]['defaultValue'] = $this->model->{$attribute};
	    		} else {
	    			$this->_formatOptions[$attribute]['defaultValue'] = Yii::app()->getRequest()->getParam($attribute);
	    		}
		    }
		}
		return $this->_formatOptions;
	}


	public function run()
	{	    
	    $hasModel=$this->hasModel();
	    	    
	    foreach ($this->getFormatOptions() as $attribute => $option) {
    	    if($hasModel) {
    			echo CHtml::activeDropDownList($this->model,$attribute,array(),$option['htmlOptions']).' ';
    		} else {
    			echo CHtml::dropDownList($attribute,$option['defaultValue'],array(),$option['htmlOptions']).' ';
    		}
	    }
        $this->registerClientScript();
	}
	

	public function registerClientScript()
	{		
		$cs=Yii::app()->clientScript;
		
		$url=$this->createUrl($this->route);
		
	    $ids = array();
	    $defaultValues = array();
		foreach ($this->getFormatOptions() as $option) {
		    $ids[] = '#' . $option['htmlOptions']['id'];
		    $defaultValues[] = "'".$option['defaultValue']."'";
		}
        $id = implode(',', $ids);
        $defaultValue = '[' . implode(',', $defaultValues) . ']';
        $js = "var treeSelectObjs_{$this->id} = jQuery('$id');";
        $js .= "var treeSelectDefaultValues_{$this->id} = {$defaultValue};";
        $js .= "var treeSelectFrequence_{$this->id} = 0;";
		$js .="treeSelectObjs_{$this->id}.change(function(){";
		$js .="if (treeSelectFrequence_{$this->id} == 0) {";
			$js .="var val = ". ($this->defaultParentId ? $this->defaultParentId : 'null') .";";
			$js .="var index = -1;";
			$js .="treeSelectFrequence_{$this->id} ++;";
		$js .="} else {";
			$js .="var val = parseInt($(this).val());";
			$js .="var index = treeSelectObjs_{$this->id}.index(this);";
			$js .="if (index + 1 >= treeSelectObjs_{$this->id}.size()) {return}";
		$js .="}";
		
		$js .="var nextTreeObj = treeSelectObjs_{$this->id}.eq(index + 1);";
		$js .="var defaultValue = treeSelectDefaultValues_{$this->id}[index + 1];";
		$js .="var nextSelectFirstOption = nextTreeObj.find('option:first');";
		$js .="if (!val) { nextTreeObj.html(nextSelectFirstOption).change(); return; }";
		
		$js .=CHtml::ajax(array(
			'url'=>$url,
			'type'=>'POST',
		    'data' => "js:'parent_id=' + val + '&select_id=' + defaultValue",
			'beforeSend' => "js:function() {treeSelectObjs_{$this->id}.attr('disabled', true); nextTreeObj.html('<option>数据读取中……</option>');}",
			'success'=>"js:function(html){nextTreeObj.html(nextSelectFirstOption).append(html);}",
			'complete' => "js:function(){treeSelectObjs_{$this->id}.attr('disabled', false); nextTreeObj.change();}"
		));
		$js .='}).eq(0).change();';
		$cs->registerScript('TreeSelect'.$this->id,$js);
	}
	
	
	/**
	 * @return boolean whether this widget is associated with a data model.
	 */
	protected function hasModel()
	{
		return $this->model instanceof CModel;
	}
}
