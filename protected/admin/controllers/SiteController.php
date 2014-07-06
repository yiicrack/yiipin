<?php
class SiteController extends Controller
{

	public $layout = "application.admin.views.layouts.main";

	public function filters( )
	{
		return array( "accessControl" );
	}

	public function accessRules( )
	{
		return array(
			array(
				"allow",
				"actions" => array( "index", "captcha", "error", "noprivilege", "thumb", "test", "menu" ),
				"users" => array( "*" )
			),
			array(
				"allow",
				"actions" => array( "dashboard", "logout", "phpinfo", "editorupload", "welcome", "getsubbrands", "getseries", "getmodels", "getcities", "getdistrict", "editstat", "operate", "deleteeditstat", "sendsms" ),
				"users" => array( "@" )
			),
			array(
				"deny",
				"users" => array( "*" )
			)
		);
	}

	public function actions( )
	{
		return array(
			"captcha" => array( "class" => "CCaptchaAction", "backColor" => 16777215, "maxLength" => 4, "minLength" => 4, "width" => 60, "height" => 30, "testLimit" => 1 ),
			"page" => array( "class" => "CViewAction" )
		);
	}

	public function actionError( )
	{
		if ( $error = Yii::app( )->errorHandler->error )
		{
			if ( Yii::app( )->request->isAjaxRequest )
			{
				echo $error['message'];
			}
			else
			{
				$this->render( "error", $error );
			}
		}
	}

	public function actionIndex( )
	{
		$user = Yii::app( )->user;
		if ( !$user->isGuest )
		{
			$this->redirect( array( "site/dashboard" ) );
		}
		$model = new LoginForm( );
		if ( isset( $_POST['ajax'] ) && $_POST['ajax'] === "login-form" )
		{
			echo CActiveForm::validate( $model );
			Yii::app( )->end( );
		}
		if ( isset( $_POST['LoginForm'] ) )
		{
			$model->attributes = $_POST['LoginForm'];
			if ( $model->validate( ) && $model->login( ) )
			{
				$this->redirect( array( "site/dashboard" ) );
			}
		}
		$this->render( "index", array(
			"model" => $model
		) );
	}

	public function actionDashboard( )
	{
		$this->render( "dashboard" );
	}

	public function actionWelcome( )
	{
		$user = Yii::app( )->user;
		$this->pageTitle = "您好，".$user->name."，欢迎登录到 ".Yii::app( )->name;
		$infos['serverinfo'] = PHP_OS." / PHP v".PHP_VERSION;
		$infos['serverinfo'] .= @ini_get( "safe_mode" ) ? " Safe Mode" : NULL;
		$infos['dbversion'] = Yii::app( )->db->createCommand( "SELECT VERSION()" )->queryScalar( );
		$infos['fileupload'] = @ini_get( "file_uploads" ) ? ini_get( "upload_max_filesize" ) : "<font color=\"red\">不允许</font>";
		$dbsize = 0;
		$tbl_prefix = Yii::app( )->db->tablePrefix;
		$tables = $filter_tables = Yii::app( )->db->createCommand( "SHOW TABLE STATUS LIKE '".$tbl_prefix."%'" )->queryAll( );
		foreach ( $filter_tables as $table )
		{
			$dbsize += $table['Data_length'] + $table['Index_length'];
		}
		$infos['dbsize'] = $dbsize ? UtilHelper::sizecount( $dbsize ) : "未知大小";
		$license_key = file_get_contents( Yii::app( )->basePath."/config/license.php" );
		$license_key = str_replace( "<?php die; ?>", "", $license_key );
		$license_key = strtoupper( trim( $license_key ) );
		$infos['license_key'] = $license_key;
		$this->render( "welcome", $infos );
	}

	public function actionMenu( )
	{
		$this->render( "menu" );
	}

	public function actionLogout( )
	{
		Yii::app( )->user->logout( FALSE );
		$this->redirect( Yii::app( )->homeUrl );
	}

	public function actionPhpinfo( )
	{
		phpinfo( );
	}

	public function actionOperate( )
	{
		if ( Yii::app( )->request->isAjaxRequest && !empty( $_POST['id'] ) || $_POST['op'] == "delete" )
		{
			//edit_stat::model( )->deleteByPk( $_POST['id'] );
		}
	}

	public function actionThumb( )
	{
		$path = $_GET['path'];
		$width = $_GET['width'];
		$height = $_GET['height'];
		$filename = Yii::app( )->basePath."/..".$path;
		if ( file_exists( $filename ) )
		{
			$pathinfo = pathinfo( $filename );
			$md5 = md5( $filename.$width.$height );
			$h1 = substr( $md5, 0, 1 );
			$h2 = substr( $md5, 1, 1 );
			$dir = Yii::app( )->basePath."/../upload/thumb/".$h1."/".$h2."/";
			if ( !file_exists( $dir ) )
			{
				FileHelper::mkdirs( $dir );
			}
			$dest_filename = "/upload/thumb/".$h1."/".$h2."/".$md5.".".$pathinfo['extension'];
			if ( !file_exists( Yii::app( )->basePath."/..".$dest_filename ) )
			{
				$image = ImageHelper::createfromfile( $filename, $pathinfo['extension'] );
				$image->crop( $width, $height, array( "fullimage" => FALSE, "pos" => "center", "bgcolor" => "#333333" ) );
				$image->saveAsJpeg( Yii::app( )->basePath."/..".$dest_filename );
			}
			header( "location: ".Yii::app( )->baseUrl.$dest_filename );
			exit( );
		}
	}

	public function actionSendSMS( $msgto, $template = "blank" )
	{
		$this->layout = "none";
		Yii::import( "application.vendors.*" );
		include_once( "ucenter.php" );
		$templates = array(
			"blank" => array( "subject" => "", "message" => "" )
		);
		//uc_client/client.php uc_pm_send
		uc_pm_send( Yii::app( )->params['system_uid'], $msgto, $templates[$template]['subject'], $templates[$template]['message'], 0 );
	}

	protected function getTodayUsers( $unix_timestamp = "UNIX_TIMESTAMP(CURDATE())" )
	{
		$users = Yii::app( )->db->createCommand( "select count(id) AS num,role from {{user}} WHERE created>=".$unix_timestamp." GROUP BY role" )->queryAll( );
		$arr = array( );
		foreach ( $users as $val )
		{
			$arr[$val['role']] = $val['num'];
		}
		$arr['Ngo'] = isset( $arr['Ngo'] ) && 0 < $arr['Ngo'] ? $arr['Ngo'] : 0;
		$arr['Donor'] = isset( $arr['Donor'] ) && 0 < $arr['Donor'] ? $arr['Donor'] : 0;
		$arr['Transmitter'] = isset( $arr['Transmitter'] ) && 0 < $arr['Transmitter'] ? $arr['Transmitter'] : 0;
		return $arr;
	}

	protected function getPayments( $unix_timestamp = "CURDATE()" )
	{
		
		$payments = Yii::app( )->db->createCommand( "select count(id) AS num,status from {{payment}} WHERE created>=".$unix_timestamp." GROUP BY status" )->queryAll( );
		foreach ( $payments as $val )
		{
			if ( 0 < $val['num'] )
			{
				$payments['ok'] = $val['num'];
			}
			else if ( !isset( $val['status'] ) && !isset( $val['num'] ) && !( $val['status'] == Payment::STATUS_PENDING ) && !( 0 < $val['num'] ) )
			{
				$payments['no'] = $val['num'];
			}
		}
		$payments['ok'] = isset( $payments['ok'] ) ? $payments['ok'] : 0;
		$payments['no'] = isset( $payments['no'] ) ? $payments['no'] : 0;
		return $payments;
	}

	protected function getWithdrawals( $unix_timestamp = "CURDATE()" )
	{
		$recipient_withdrawals = Yii::app( )->db->createCommand( "SELECT sum(amount) FROM {{recipient_withdrawals}} WHERE created>=".$unix_timestamp )->queryScalar( );
		$commonweal_withdrawals = Yii::app( )->db->createCommand( "SELECT sum(amount) FROM {{commonweal_withdrawals}} WHERE created>=".$unix_timestamp )->queryScalar( );
		return number_format( $recipient_withdrawals + $commonweal_withdrawals, 2, ".", "" );
	}

	public function getStatus( )
	{
		$status['total_user'] = User::model( )->count( );
		$status['total_today_user'] = $this->getTodayUsers( );
		$status['today_payment'] = $this->getPayments( );
		$status['today_withdrawals'] = $this->getWithdrawals( );
		$status['today_message'] = Yii::app( )->db->createCommand( "select count(id) AS num from {{message}} WHERE created>=CURDATE()" )->queryScalar( );
		$status['today_recipient'] = Yii::app( )->db->createCommand( "select count(id) AS num from {{recipient}} WHERE created>=CURDATE()" )->queryScalar( );
		$status['today_commonweal'] = Yii::app( )->db->createCommand( "select count(id) AS num from {{commonweal}} WHERE created>=CURDATE()" )->queryScalar( );
		$status['total_week_user'] = $this->getTodayUsers( "UNIX_TIMESTAMP(DATE_SUB(CURDATE(),INTERVAL 7 DAY))" );
		$status['week_payment'] = $this->getPayments( "DATE_SUB(CURDATE(),INTERVAL 7 DAY)" );
		$status['week_withdrawals'] = $this->getWithdrawals( "DATE_SUB(CURDATE(),INTERVAL 7 DAY)" );
		$status['week_message'] = Yii::app( )->db->createCommand( "select count(id) AS num from {{message}} WHERE created>=DATE_SUB(CURDATE(),INTERVAL 7 DAY)" )->queryScalar( );
		$status['week_recipient'] = Yii::app( )->db->createCommand( "select count(id) AS num from {{recipient}} WHERE created>=DATE_SUB(CURDATE(),INTERVAL 7 DAY)" )->queryScalar( );
		$status['week_commonweal'] = Yii::app( )->db->createCommand( "select count(id) AS num from {{commonweal}} WHERE created>=DATE_SUB(CURDATE(),INTERVAL 7 DAY)" )->queryScalar( );
		$status['total_month_user'] = $this->getTodayUsers( "UNIX_TIMESTAMP(DATE_SUB(CURDATE(),INTERVAL 1 MONTH))" );
		$status['month_payment'] = $this->getPayments( "DATE_SUB(CURDATE(),INTERVAL 1 MONTH)" );
		$status['month_withdrawals'] = $this->getWithdrawals( "DATE_SUB(CURDATE(),INTERVAL 1 MONTH)" );
		$status['month_message'] = Yii::app( )->db->createCommand( "select count(id) AS num from {{message}} WHERE created>=DATE_SUB(CURDATE(),INTERVAL 1 MONTH)" )->queryScalar( );
		$status['month_recipient'] = Yii::app( )->db->createCommand( "select count(id) AS num from {{recipient}} WHERE created>=DATE_SUB(CURDATE(),INTERVAL 1 MONTH)" )->queryScalar( );
		$status['month_commonweal'] = Yii::app( )->db->createCommand( "select count(id) AS num from {{commonweal}} WHERE created>=DATE_SUB(CURDATE(),INTERVAL 1 MONTH)" )->queryScalar( );
		$status['total_quarter_user'] = $this->getTodayUsers( "UNIX_TIMESTAMP(DATE_SUB(CURDATE(),INTERVAL 3 MONTH))" );
		$status['quarter_payment'] = $this->getPayments( "DATE_SUB(CURDATE(),INTERVAL 3 MONTH)" );
		$status['quarter_withdrawals'] = $this->getWithdrawals( "DATE_SUB(CURDATE(),INTERVAL 3 MONTH)" );
		$status['quarter_message'] = Yii::app( )->db->createCommand( "select count(id) AS num from {{message}} WHERE created>=DATE_SUB(CURDATE(),INTERVAL 3 MONTH)" )->queryScalar( );
		$status['quarter_recipient'] = Yii::app( )->db->createCommand( "select count(id) AS num from {{recipient}} WHERE created>=DATE_SUB(CURDATE(),INTERVAL 3 MONTH)" )->queryScalar( );
		$status['quarter_commonweal'] = Yii::app( )->db->createCommand( "select count(id) AS num from {{commonweal}} WHERE created>=DATE_SUB(CURDATE(),INTERVAL 3 MONTH)" )->queryScalar( );
		$status['total_ngo'] = Ngo::model( )->count( );
		$status['total_donor'] = Donor::model( )->count( );
		$status['total_transmitter'] = Transmitter::model( )->count( );
		$status['total_goods'] = Goods::model( )->count( );
		$status['total_slideshow'] = Slideshow::model( )->count( );
		$status['total_flink'] = Flink::model( )->count( );
		$status['total_feedback'] = Feedback::model( )->count( );
		$status['total_administrator'] = Administrator::model( )->count( );
		$status['total_article'] = Article::model( )->count( );
		$status['total_article_comment'] = ArticleComment::model( )->count( );
		$status['total_message'] = Message::model( )->count( );
		$status['total_notice'] = Notice::model( )->count( );
		$status['total_recipient_prove'] = RecipientProve::model( )->count( );
		$status['total_commonweal_prove'] = CommonwealProve::model( )->count( );
		$status['total_recipient_recent'] = RecipientRecent::model( )->count( );
		$status['total_commonweal_recent'] = CommonwealRecent::model( )->count( );
		$status['total_recipient_publicity'] = RecipientPublicity::model( )->count( );
		$status['total_commonweal_publicity'] = CommonwealPublicity::model( )->count( );
		$status['total_recipient_encourage'] = RecipientEncourage::model( )->count( );
		$status['total_commonweal_encourage'] = CommonwealEncourage::model( )->count( );
		$status['total_recipient_photo'] = RecipientPhoto::model( )->count( );
		$status['total_commonweal_photo'] = CommonwealPhoto::model( )->count( );
		$status['total_recipient'] = Recipient::model( )->countByAttributes( array(
			"status" => Recipient::STATUS_PENDING
		) );
		$status['total_recipient_ok'] = Recipient::model( )->countByAttributes( array(
			"status" => Recipient::STATUS_OK
		) );
		$status['total_recipientWithdrawals'] = RecipientWithdrawals::model( )->countByAttributes( array(
			"status" => RecipientWithdrawals::STATUS_PENDING
		) );
		$status['total_recipientWithdrawals_ok'] = RecipientWithdrawals::model( )->countByAttributes( array(
			"status" => RecipientWithdrawals::STATUS_OK
		) );
		$status['total_recipientWithdrawals_count'] = Yii::app( )->db->createCommand( )->select( "sum(amount) AS num" )->from( "ilj_recipient_withdrawals" )->where( "status=:status", array(
			":status" => RecipientWithdrawals::STATUS_OK
		) )->queryScalar( );
		$status['total_recipientWithdrawals_pending'] = Yii::app( )->db->createCommand( )->select( "sum(amount) AS num" )->from( "ilj_recipient_withdrawals" )->where( "status=:status", array(
			":status" => RecipientWithdrawals::STATUS_PENDING
		) )->queryScalar( );
		$status['total_commonweal'] = Commonweal::model( )->countByAttributes( array(
			"status" => Commonweal::STATUS_PENDING
		) );
		$status['total_commonweal_ok'] = Commonweal::model( )->countByAttributes( array(
			"status" => Commonweal::STATUS_OK
		) );
		$status['total_commonwealWithdrawals'] = CommonwealWithdrawals::model( )->countByAttributes( array(
			"status" => CommonwealWithdrawals::STATUS_PENDING
		) );
		$status['total_commonwealWithdrawals_ok'] = CommonwealWithdrawals::model( )->countByAttributes( array(
			"status" => CommonwealWithdrawals::STATUS_OK
		) );
		$status['total_commonwealWithdrawals_count'] = Yii::app( )->db->createCommand( )->select( "sum(amount) AS num" )->from( "ilj_commonweal_withdrawals" )->where( "status=:status", array(
			":status" => CommonwealWithdrawals::STATUS_OK
		) )->queryScalar( );
		$status['total_commonwealWithdrawals_pending'] = Yii::app( )->db->createCommand( )->select( "sum(amount) AS num" )->from( "ilj_commonweal_withdrawals" )->where( "status=:status", array(
			":status" => CommonwealWithdrawals::STATUS_PENDING
		) )->queryScalar( );
		$status['total_goodsOrder'] = GoodsOrder::model( )->countByAttributes( array(
			"status" => GoodsOrder::STATUS_PENDDING
		) );
		return $status;
	}

}

?>
