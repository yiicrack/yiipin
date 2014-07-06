<?php

class YiipinWebApplication extends CWebApplication
{

	protected function init( )
	{
		$this->setViewPath( $this->getBasePath( )."/../themes/default/views" );
		$this->name = Yii::app( )->config->get( "sitename" );
		$this->theme = Yii::app( )->config->get( "theme" );
		$memcache = Yii::app( )->config->get( "memcache" );
		$this->setComponents( array(
			"urlManager" => array(
				"urlFormat" => "path",
				"showScriptName" => Yii::app( )->config->get( "url_format" ) != "rewrite",
				"rules" => include( dirname( __FILE__ )."/../config/urlrules.php" ),
				"urlSuffix" => Yii::app( )->config->get( "url_suffix" )
			),
			"mailer" => array(
				"class" => "application.extensions.mailer.EMailer",
				"Mailer" => "smtp",
				"SMTPAuth" => TRUE,
				"CharSet" => "utf-8",
				"ContentType" => "text/html",
				"From" => Yii::app( )->config->get( "mail_from" ),
				"FromName" => Yii::app( )->config->get( "mail_fromname" ),
				"Host" => Yii::app( )->config->get( "mail_smtp_host" ),
				"Username" => Yii::app( )->config->get( "mail_smtp_user" ),
				"Password" => Yii::app( )->config->get( "mail_smtp_pwd" )
			),
			"cache" => Yii::app( )->config->get( "cache_backend" ) == "file" ? array(
				"class" => "CFileCache",
				"keyPrefix" => "yiipin",
				"directoryLevel" => 2
			) : array(
				"class" => "CMemCache",
				"keyPrefix" => "yiipin",
				"servers" => array(
					array(
						"host" => $memcache['server'],
						"port" => $memcache['port']
					)
				)
			)
		) );
	}

}

?>
