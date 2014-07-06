<?php
class ActiveRecord extends CActiveRecord
{

	public $isLocalContent = FALSE;

	public function __construct( $scenario = "insert" )
	{
		parent::__construct($scenario);
	}

	public function hasCache( )
	{
		return $this->cache( CACHE_DURATION );
	}
	
	protected function afterSave( )
	{
		parent::aftersave( );
		$this->writeManyManyTables( );
	}

	protected function beforeDelete( )
	{
		parent::beforedelete( );
		foreach($this->getRelations() as $relation)
		{
			$this->cleanRelation($relation);
		}
		return TRUE;
	}

	private function writeManyManyTables( )
	{
		Yii::trace( "writing MANY_MANY data for ".get_class( $this ), "system.db.ar.CActiveRecord" );
		foreach($this->getRelations() as $relation)
		{
			$this->cleanRelation($relation);
			$this->writeRelation($relation);
		}
	}
	
	protected function getRelations()
	{
		$relations = array();
	
		foreach ($this->relations() as $key => $relation)
		{
			if ($relation[0] == CActiveRecord::MANY_MANY &&
					//!in_array($key, $this->ignoreRelations) &&
					$this->hasRelated($key) &&
					$this->$key != -1)
			{
				$info = array();
				$info['key'] = $key;
				$info['foreignTable'] = $relation[1];
	
				if (preg_match('/^(.+)\((.+)\s*,\s*(.+)\)$/s', $relation[2], $pocks))
				{
					$info['m2mTable'] = $pocks[1];
					$info['m2mThisField'] = $pocks[2];
					$info['m2mForeignField'] = $pocks[3];
				}
				else
				{
					$info['m2mTable'] = $relation[2];
					$info['m2mThisField'] = $this->tableSchema->PrimaryKey;
					$info['m2mForeignField'] = CActiveRecord::model($relation[1])->tableSchema->primaryKey;
				}
				$relations[$key] = $info;
			}
		}
		return $relations;
	}
	
	protected function writeRelation($relation)
	{
		$key = $relation['key'];
	
		// Only an object or primary key id is given
		if(!is_array($this->$key) && $this->$key != array())
			$this->owner->$key = array($this->$key);
	
		// An array of objects is given
		foreach((array)$this->$key as $foreignobject)
		{
			if(!is_numeric($foreignobject) && is_object($foreignobject))
				$foreignobject = $foreignobject->{$foreignobject->$relation['m2mForeignField']};
			$this->execute(
					$this->makeManyManyInsertCommand($relation, $foreignobject));
		}
	}

	protected function cleanRelation($relation)
	{
		$this->execute($this->makeManyManyDeleteCommand($relation));
	}
	
	public function execute($query) {
		return Yii::app()->db->createCommand($query)->execute();
	}
	
	public function makeManyManyInsertCommand($relation, $value) {
		return sprintf("insert into %s (%s, %s) values ('%s', '%s')",
				$relation['m2mTable'],
				$relation['m2mThisField'],
				$relation['m2mForeignField'],
				$this->owner->{$this->owner->tableSchema->primaryKey},
				$value);
	}
	
	public function makeManyManyDeleteCommand($relation) {
		return sprintf("delete ignore from %s where %s = '%s'",
				$relation['m2mTable'],
				$relation['m2mThisField'],
				$this->owner->{$this->owner->tableSchema->primaryKey}
		);
	}

	public function getConstOptions( $option )
	{
		$const_options = array( );
		$ref = new ReflectionClass( get_class( $this ) );
		$constants = $ref->getConstants( );
		if ( is_array( $constants ) )
		{
			foreach ( $constants as $name => $value )
			{
				if ( strpos( $name, $option ) === 0 )
				{
					$const_options[$value] = $value;
				}
			}
		}
		return $const_options;
	}

	public function localContent( $content )
	{
		$patterns = array( "%<img[^>]*?src=\"(http://.*?)\"[^>]*?>%ie" => "'<a  target=\"_blank\" href=\"'.(\$src=\$this->downremote_image('\$1', true,true)).'\"><img src=\"'.\$src.'\" /></a>'" );
		foreach ( $patterns as $pattern => $value )
		{
			$content = preg_replace( $pattern, $value, $content );
		}
		return $content;
	}

	public function downremote_image( $url, $cutedge, $mosaic )
	{
		$pathinfo = pathinfo( $url );
		if ( $pathinfo['dirname'] == "." )
		{
			return "false1";
		}
		$basepath = Yii::app( )->basePath.DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."upload".DIRECTORY_SEPARATOR."article".DIRECTORY_SEPARATOR;
		if ( !file_exists( $basepath ) )
		{
			FileHelper::mkdirs( $basepath );
		}
		$dir = date( "Y_m" );
		$dest_dir = $basepath."/".$dir;
		if ( !is_dir( $dest_dir ) )
		{
			mkdir( $dest_dir, 511, TRUE );
			@fclose( @fopen( $dest_dir."/index.htm", "w" ) );
		}
		$basename = $pathinfo['basename'];
		if ( strpos( $basename, "?" ) !== FALSE )
		{
			$basename = str_replace( array( "?", "=", "." ), "_", $basename ).".jpg";
		}
		if ( !preg_match( "/(.jpg)|(.gif)|(.png)|(.jpeg)|(.bmp)/si", $basename ) )
		{
			return "false2";
		}
		$time = time( ).rand( 1000, 9999 );
		$save_file = $dest_dir."/".$time.$basename;
		$pic = "/upload/article/".$dir."/".$time.$basename;
		if ( file_exists( $save_file ) )
		{
			return $pic;
		}
		if ( UtilHelper::getfile( $url, $save_file, $url ) )
		{
			$image = ImageHelper::createfromfile( $save_file );
			if ( $image )
			{
				$imagesize = @getimagesize( $save_file );
				if ( !empty( $imagesize ) || 300 < $imagesize[0] & 275 < $imagesize[1] )
				{
					if ( $cutedge )
					{
						$image->cutedge( 0 );
					}
					if ( $mosaic )
					{
						$image->mosaic( 0, 0, 170, 20, 4 );
						$image->mosaic( $imagesize[0] - 170, 2, $imagesize[0] - 2, 20, 4 );
						$image->mosaic( 2, $imagesize[1] - 20, 170, $imagesize[1] - 2, 4 );
						$image->mosaic( $imagesize[0] - 110, $imagesize[1] - 50, $imagesize[0] - 2, $imagesize[1] - 2, 6 );
						$image->mosaic( $imagesize[0] - 160, $imagesize[1] - 20, $imagesize[0] - 110, $imagesize[1] - 2, 6 );
					}
				}
				$image->waterMark( array(
					"type" => "text",
					"position" => 1,
					"minwidth" => 300,
					"minheight" => 275,
					"text" => array( "shadowx" => 1, "shadowy" => 1 )
				) );
				$image->save( $save_file );
				$image->destroy( );
			}
			return $pic;
		}
	}

}

?>
