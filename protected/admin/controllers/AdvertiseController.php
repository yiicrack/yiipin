<?php
class AdvertiseController extends Controller
{

	private $_model = NULL;

	public function actionIndex( )
	{
		$model = new Advertise( "search" );
		if ( isset( $_GET['Advertise'] ) )
		{
			$model->attributes = $_GET['Advertise'];
		}
		$this->render( "index", array(
			"model" => $model
		) );
	}

	public function actionCreate( )
	{
		$model = new Advertise( );
		$this->performAjaxValidation( $model );
		if ( isset( $_POST['Advertise'] ) )
		{
			$model->attributes = $_POST['Advertise'];
			$model->data = serialize( $_POST['data'] );
			if ( $model->save( ) )
			{
				Yii::app( )->user->setFlash( "success", "广告已成功添加！" );
				$this->redirect( array(
					"view",
					"id" => $model->id
				) );
			}
			else
			{
				print_r( $model->errors );
			}
		}
		$this->render( "create", array(
			"model" => $model
		) );
	}

	public function actionUpdate( )
	{
		$model = $this->loadModel( );
		$this->performAjaxValidation( $model );
		if ( isset( $_POST['Advertise'] ) )
		{
			$model->attributes = $_POST['Advertise'];
			$model->data = serialize( $_POST['data'] );
			if ( $model->save( ) )
			{
				Yii::app( )->user->setFlash( "success", "广告已成功修改！" );
				$this->redirect( array(
					"view",
					"id" => $model->id
				) );
			}
			else
			{
				print_r( $model->errors );
			}
		}
		$this->render( "update", array(
			"model" => $model
		) );
	}

	public function actionView( )
	{
		$this->render( "view", array(
			"model" => $this->loadModel( )
		) );
	}

	public function actionTemplate_description( )
	{
		$this->layout = "none";
		$template = AdvertiseTemplate::model( )->findByPk( $_POST['template_id'] );
		if ( $template !== NULL )
		{
			echo $template->description;
		}
	}

	public function actionTemplate_data( )
	{
		$this->layout = "none";
		$template = AdvertiseTemplate::model( )->findByPk( $_POST['template_id'] );
		if ( isset( $_POST['id'] ) && $_POST['id'] )
		{
			$advertise = Advertise::model( )->findByPk( $_POST['id'] );
			$data = $advertise->data;
		}
		if ( $template !== NULL )
		{
			$matches = array( );
			$res = preg_match_all( "/<\\{(.+?)\\}>/", $template->template, $matches );
			if ( !$res )
			{
				echo "此模板不需要任何数据";
				Yii::app( )->end( );
			}
			echo "<table width=\"100%\">";
			foreach ( array_unique( $matches[1] ) as $index => $token )
			{
				echo "<tr><td>";
				echo $token."：".CHtml::textfield( "data[".$token."]", isset( $data ) ? $data[$token] : "", array(
					"size" => 40,
					"id" => "data_filed_".$index
				) );
				if ( strpos( $token, "文件" ) !== FALSE )
				{
					echo "&nbsp;".CHtml::link( "上传新文件", array(
						"advertise/uploadfile",
						"target" => "data_filed_".$index
					), array( "rel" => "fancybox", "class" => "iframe" ) );
				}
				echo "</td></tr>";
			}
			echo "</table>";
		}
	}

	public function actionUploadfile( )
	{
		$this->layout = "none";
		$fileinfo = array( );
		if ( Yii::app( )->request->isPostRequest )
		{
			do
			{
				try
				{
					$file = CUploadedFile::getinstancebyname( "attach" );
					if ( !$file )
					{
						break;
					}
					else
					{
						$exts = array( "gif", "jpg", "jpg", "swf" );
						$maxsize = 204800;
						if ( $maxsize < $file->size )
						{
							throw new CException( "文件超过了允许的大小" );
						}
						if ( !in_array( strtolower( $file->extensionName ), $exts ) )
						{
							throw new CException( "文件格式不允许" );
						}
						$dir = "/static/adfiles/".date( "Y-m" )."/";
						if ( !is_dir( $realpath = Yii::app( )->basePath."/..".$dir ) )
						{
							FileHelper::mkdirs( $realpath );
						}
						$full_filename = $dir.time( ).rand( 1000, 9999 ).".".$file->extensionName;
						$filename = Yii::app( )->basePath."/..".$full_filename;
						$file->saveAs( $filename );
						$fileinfo['filepath'] = $full_filename;
						$fileinfo['target'] = $_POST['target'];
						$fileinfo['success'] = TRUE;
						break;
					}
				}
				catch ( CException $e )
				{
					$fileinfo['message'] = $e->getMessage( );
				}
			} while ( 0 );
		}
		$this->render( "uploadfile", $fileinfo );
	}

	public function actionDelete( )
	{
		if ( Yii::app( )->request->isPostRequest )
		{
			$this->loadModel( )->delete( );
			if ( !isset( $_GET['ajax'] ) )
			{
				$this->redirect( array( "index" ) );
			}
		}
		else
		{
			throw new CHttpException( 400, "Invalid request. Please do not repeat this request again." );
		}
	}

	public function loadModel( )
	{
		if ( $this->_model === NULL )
		{
			if ( isset( $_GET['id'] ) )
			{
				$this->_model = Advertise::model( )->findbyPk( $_GET['id'] );
			}
			if ( $this->_model === NULL )
			{
				throw new CHttpException( 404, "您要浏览的页面不存在，可能是已被删除或者URL地址错误。" );
			}
		}
		return $this->_model;
	}

	protected function performAjaxValidation( $model )
	{
		if ( isset( $_POST['ajax'] ) && $_POST['ajax'] === "advertise-form" )
		{
			echo CActiveForm::validate( $model );
			Yii::app( )->end( );
		}
	}

}

?>
