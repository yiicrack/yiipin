<?php
class DatabaseController extends Controller
{

	public function actionBackup( )
	{
		$method = "";
		$db = Yii::app( )->db;
		$tbl_prefix = $db->tablePrefix;
		if ( isset($_GET['act']) && $_GET['act'] == "database_export" )
		{
			$filename = rawurldecode( $_REQUEST['filename'] );
			if ( !$filename && preg_match( "/(\\.)(exe|jsp|asp|aspx|cgi|fcgi|pl)(\\.|\$)/i", $filename ) )
			{
				Yii::app( )->user->setFlash( "error", "数据库备份文件扩展名不允许！" );
				$this->redirect( array( "backup" ) );
			}
			$method = "multivol";
			$timestamp = time( );
			$time = gmdate( "Y-n-j H:i", $timestamp + 28800 );
			$type = $_REQUEST['type'];
			if ( $type == "system" )
			{
				$tables = $db->createCommand( "SHOW FULL TABLES WHERE Table_Type = 'BASE TABLE'" )->queryAll( FALSE );
				$filter_tables = array( );
				foreach ( $tables as $table )
				{
					if ( strpos( $table[0], $tbl_prefix ) === 0 )
					{
						$filter_tables[] = $table[0];
					}
				}
			}
			else if ( $type == "custom" )
			{
				$filter_tables = array( );
				if ( empty( $_REQUEST['setup'] ) )
				{
					$filter_tables = Yii::app( )->config->get( "custombackup" );
				}
				else
				{
					$customtables = isset( $_REQUEST['customtables'] ) ? $_REQUEST['customtables'] : array( );
					Yii::app( )->config->set( "custombackup", $customtables );
					$filter_tables = $customtables;
				}
				if ( !is_array( $filter_tables ) && empty( $filter_tables ) )
				{
					Yii::app( )->user->setFlash( "error", "请选择要备份的数据表！" );
					$this->redirect( array( "backup" ) );
				}
			}
			
			$volume = isset($_GET['volume']) ? intval( $_GET['volume'] ) + 1 : 1;
			$identify = "# Identify: ".base64_encode( "{$timestamp},{$type},{$method},{$volume}" )."\n";
			$collate = "SET NAMES 'utf8';\n\n";
			$db->createCommand( "SET NAMES 'utf8';\n\n" )->execute( );
			$dump = "";
			$tableid = isset($_GET['tableid']) ? $_GET['tableid'] : 0;
			$startfrom = isset($_REQUEST['startfrom']) ? intval( $_REQUEST['startfrom'] ) : 0;
			$sizelimit = isset($_REQUEST['sizelimit']) ? intval( $_REQUEST['sizelimit'] ) : 0;
			$i = $tableid;
			for ( ;	$i < count( $filter_tables ) && strlen( $dump ) < $sizelimit * 1000;	++$i	)
			{
				$dump .= $this->sqldumptable( $db, $filter_tables[$i], $sizelimit, $startfrom, strlen( $dump ) );
				$startfrom = 0;
			}
			$tableid = $i;
			$dump_file = Yii::app( )->basePath."/data/backup/".substr( $filename, 0, strrpos( $filename, "." ) )."-%s".strrchr( $filename, "." );
			if ( trim( $dump ) )
			{
				$dump = "{$identify}".( "# Yiipin Multi-Volume Data Dump Vol.".$volume."\n" )."# Version: Yiipin 1.0\n".( "# Time: ".$time."\n" ).( "# Type: ".$type."\n" ).( "# Table Prefix: ".$tbl_prefix."\n" )."#\n# Yiipin Home: http://www.yiipin.com\n# Please visit our website for newest infomation about Yiipin\n# --------------------------------------------------------\n\n\n"."{$collate}".$dump;
				@$fp = @fopen( @sprintf( $dump_file, $volume ), "wb" );
				@flock( $fp, 2 );
				if ( !@fwrite( $fp, $dump ) )
				{
					@fclose( $fp );
					Yii::app( )->user->setFlash( "error", "备份文件路径无效！" );
					$this->redirect( array( "backup" ) );
				}
				else
				{
					$this->render( "/site/redirect_msg", array(
						"title" => "提示信息",
						"message" => "分卷 #".$volume." 备份成功，程序将自动继续",
						"jumpUrl" => array(
							"backup",
							"act" => "database_export",
							"type" => rawurlencode( $type ),
							"filename" => rawurlencode( $filename ),
							"method" => "multivol",
							"sizelimit" => rawurlencode( $sizelimit ),
							"volume" => rawurlencode( $volume ),
							"tableid" => rawurlencode( $tableid ),
							"startfrom" => rawurlencode( $startfrom )
						),
						"waitSecond" => 1
					) );
					Yii::app( )->end( );
				}
			}
			else
			{
				--$volume;
				$dump_file = sprintf( $dump_file, $volume );
				$views = $db->createCommand( "SHOW FULL TABLES WHERE Table_Type = 'VIEW'" )->queryAll( FALSE );
				$filter_views = array( );
				foreach ( $views as $v )
				{
					if ( strpos( $v[0], $tbl_prefix ) === 0 )
					{
						$filter_views[] = $v[0];
					}
				}
				$contents = "";
				foreach ( $filter_views as $view )
				{
					$row = $db->createCommand( "SHOW CREATE VIEW `".$view."`" )->queryRow( );
					$sql = preg_replace( "#CREATE(.*)\\s+VIEW#", "CREATE VIEW", $row['Create View'] );
					$sql = "DROP VIEW IF EXISTS `".$row['View']."`;\r\n{$sql};\r\n";
					$contents .= $sql;
				}
				if ( !empty( $contents ) )
				{
					file_put_contents( $dump_file, $contents, FILE_APPEND );
				}
				$success = "<ul>";
				$i = 1;
				for ( ;	$i <= $volume;	++$i	)
				{
					$filename = str_replace( Yii::app( )->basePath."/", "", sprintf( $dump_file, $i ) );
					$success .= "<li>".$filename."</li>\n";
				}
				$success .= "</ul>";
				$this->render( "/site/redirect_msg", array(
					"title" => "提示信息",
					"message" => "数据库备份成功：".$success
				) );
				Yii::app( )->end( );
			}
		}
		$filter_tables = $db->createCommand( "SHOW FULL TABLES WHERE Table_Type = 'BASE TABLE'" )->queryAll( FALSE );
		$tabs = array( );
		foreach ( $filter_tables as $table )
		{
			if ( strpos( $table[0], $tbl_prefix ) === 0 )
			{
				$tabs[] = $table[0];
			}
		}
		$this->render( "backup", array(
			"tabs" => $tabs
		) );
	}

	public function actionRestore( )
	{
		$db = Yii::app( )->db;
		$tbl_prefix = $db->tablePrefix;
		$backup_path = Yii::app( )->basePath."/data/backup/";
		if ( isset($_GET['act']) && $_GET['act'] == "database_delete" )
		{
			if ( is_array( $_POST['delete'] ) )
			{
				foreach ( $_POST['delete'] as $filename )
				{
					@unlink( $backup_path.$filename );
				}
				$this->render( "/site/redirect_msg", array(
					"title" => "提示信息",
					"message" => "数据库备份文件删除成功！",
					"jumpUrl" => array( "restore" ),
					"waitSecond" => 3
				) );
				Yii::app( )->end( );
			}
			else
			{
				$this->render( "/site/redirect_msg", array(
					"title" => "提示信息",
					"message" => "请选择要删除的数据库备份文件！",
					"jumpUrl" => array( "restore" ),
					"waitSecond" => 3
				) );
				Yii::app( )->end( );
			}
		}
		if ( isset($_GET['act']) && $_GET['act'] == "database_import" )
		{
			if ( $_REQUEST['from'] == "server" )
			{
				$bak_file = $backup_path.$_REQUEST['datafile_server'];
			}
			if ( $fp = @fopen( $bak_file, "rb" ) )
			{
				$dump = fgets( $fp, 256 );
				$identifys = explode( ",", base64_decode( preg_replace( "/^# Identify:\\s*(\\w+).*/s", "\\1", $dump ) ) );
				$info = array(
					"method" => $identifys[2],
					"volume" => intval( $identifys[3] )
				);
				if ( $info['method'] == "multivol" )
				{
					$dump .= fread( $fp, 8388607 );
				}
				fclose( $fp );
			}
			else
			{
				if ( $_REQUEST['autoimport'] )
				{
					$this->render( "/site/redirect_msg", array( "title" => "提示信息", "message" => "数据库分卷备份导入成功！" ) );
				}
				else
				{
					$this->render( "/site/redirect_msg", array( "title" => "提示信息", "message" => "数据库备份文件校验失败！" ) );
				}
				Yii::app( )->end( );
			}
			if ( $info['method'] == "multivol" )
			{
				$sqls = $this->splitsql( $dump );
				unset( $dump );
				foreach ( $sqls as $sql )
				{
					if ( trim( $sql ) != "" )
					{
						try
						{
							$db->createCommand( $sql )->execute( );
							continue;
						}
						catch ( Exception $e )
						{
							$this->render( "/site/redirect_msg", array(
								"title" => "提示信息",
								"message" => "数据库恢复失败，错误信息：<br />".$e->getMessage( )
							) );
							Yii::app( )->end( );
						}
					}
				}
				$datafile_server = preg_replace( "/-(".$info['volume'].")(\\..+)\$/", "-".( $info['volume'] + 1 )."\\2", $_REQUEST['datafile_server'] );
				if ( $info['volume'] == 1 )
				{
					$this->render( "/site/redirect_msg", array(
						"title" => "提示信息",
						"message" => "分卷 #".$info['volume']." 成功导入，程序将自动导入其他分卷！",
						"jumpUrl" => array(
							"restore",
							"act" => "database_import",
							"from" => "server",
							"datafile_server" => $datafile_server,
							"autoimport" => "yes",
							"importsubmit" => "yes"
						),
						"waitSecond" => 1
					) );
					Yii::app( )->end( );
				}
				else if ( $_REQUEST['autoimport'] )
				{
					$this->render( "/site/redirect_msg", array(
						"title" => "提示信息",
						"message" => "分卷 #".$info['volume']." 成功导入，程序将自动继续！",
						"jumpUrl" => array(
							"restore",
							"act" => "database_import",
							"from" => "server",
							"datafile_server" => $datafile_server,
							"autoimport" => "yes",
							"importsubmit" => "yes"
						),
						"waitSecond" => 1
					) );
					Yii::app( )->end( );
				}
				else
				{
					$this->render( "/site/redirect_msg", array( "title" => "提示信息", "message" => "数据库备份文件成功导入数据库" ) );
					Yii::app( )->end( );
				}
			}
		}
		$files = array( );
		if ( is_dir( $backup_path ) )
		{
			$dir = dir( $backup_path );
			while ( $file = $dir->read( ) )
			{
				$file = $backup_path.$file;
				if ( is_file( $file ) && ( pathinfo( $file, PATHINFO_EXTENSION ) == "sql" ) )
				{
					$filesize = filesize( $file );
					$fp = fopen( $file, "rb" );
					$identifys = explode( ",", base64_decode( preg_replace( "/^# Identify:\\s*(\\w+).*/s", "\\1", fgets( $fp, 256 ) ) ) );
					fclose( $fp );
					$files[$identifys[0]] = array(
						"type" => $identifys[1],
						"method" => $identifys[2],
						"volume" => $identifys[3],
						"filename" => str_replace( $backup_path, "", $file ),
						"size" => $filesize
					);
				}
			}
			$dir->close( );
		}
		else
		{
			exit( "数据库备份目录无效" );
		}
		krsort( $files );
		reset( $files );
		$exportinfo = "";
		foreach ( $files as $identify => $file )
		{
			$file['dateline'] = is_int( $identify ) ? gmdate( "Y-n-j H:i", $identify + 28800 ) : "未知";
			switch ( $file['type'] )
			{
			case "system" :
				$file['type'] = "全部";
				break;
			case "custom" :
				$file['type'] = "自定义";
			}
			$file['size'] = UtilHelper::sizecount( $file['size'] );
			$file['volume'] = $file['method'] == "multivol" ? $file['volume'] : "未知";
			$file['method'] = $file['method'] == "multivol" ? "多卷" : "未知";
			$exportinfo .= "<tr><td class=\"tablerow\"><input class=\"txtnobd\" type=\"checkbox\" name=\"delete[]\" value=\"".$file['filename']."\"></td>\n".( "<td class=\"tablerow\">".$file['filename']."</td>\n" ).( "<td class=\"tablerow\">".$file['dateline']."</td>\n" ).( "<td class=\"tablerow\">".$file['type']."</td>\n" ).( "<td class=\"tablerow\">".$file['size']."</td>\n" ).( "<td class=\"tablerow\">".$file['method']."</td>\n" ).( "<td class=\"tablerow\">".$file['volume']."</td>\n" )."<td class=\"tablerow\">".( $file['volume'] == 1 ? "<a href=\"admin.php?r=database/restore&act=database_import&from=server&datafile_server=".$file['filename']."&importsubmit=1\">[恢复]</a>" : "" )."</td>\n</tr>";
		}
		$this->render( "restore", array(
			"exportinfo" => $exportinfo
		) );
	}

	public function actionOptimize( )
	{
		$db = Yii::app( )->db;
		$tbl_prefix = $db->tablePrefix;
		$totalsize = 0;
		if ( !Yii::app( )->request->isPostRequest )
		{
			$sql = $db->createCommand( "SHOW TABLE STATUS LIKE '".$tbl_prefix."%'" );
			foreach ( $sql->queryAll( ) as $table )
			{
				$table['checked'] = $table['Engine'] == "MyISAM" ? "checked" : "disabled";
				$totalsize += $table['Data_length'] + $table['Index_length'];
				$tabs[] = $table;
			}
			$view['tabs'] = $tabs;
			$view['totalsize'] = $totalsize;
		}
		else
		{
			$sql = $db->createCommand( "SHOW TABLE STATUS LIKE '".$tbl_prefix."%'" );
			foreach ( $sql->queryAll( ) as $table )
			{
				if ( is_array( $_REQUEST['optimizetables'] ) && in_array( $table['Name'], $_REQUEST['optimizetables'] ) )
				{
					$table['optimized'] = "YES";
					$db->createCommand( "OPTIMIZE TABLE ".$table['Name'] )->execute( );
				}
				else
				{
					$table['optimized'] = "<b>YES</b>";
				}
				$totalsize += $table['Data_length'] + $table['Index_length'];
				$optabs[] = $table;
			}
			$view['optabs'] = $optabs;
			$view['totalsize'] = $totalsize;
		}
		$this->render( "optimize", $view );
	}

	public function actionRunQuery( )
	{
		if ( Yii::app( )->request->isPostRequest )
		{
			$db = Yii::app( )->db;
			$tbl_prefix = $db->tablePrefix;
			$db->createCommand( "SET NAMES 'utf8'" )->query( );
			$sqls = $this->splitsql( str_replace( "`pin_", "`".$tbl_prefix, str_replace( " pin_", " ".$tbl_prefix, $_POST['queries'] ) ) );
			foreach ( $sqls as $sql )
			{
				if ( trim( $sql ) != "" )
				{
					try
					{
						$db->createCommand( $sql )->execute( );
						continue;
					}
					catch ( Exception $e )
					{
						$this->render( "/site/redirect_msg", array(
							"title" => "提示信息",
							"message" => "数据库升级失败，错误信息：<br />".$e->getMessage( )
						) );
						Yii::app( )->end( );
					}
				}
			}
			$this->render( "/site/redirect_msg", array( "title" => "提示信息", "message" => "数据库升级成功！" ) );
			Yii::app( )->end( );
		}
		$this->render( "runquery" );
	}

	public function sqldumptable( $db, $table, $sizelimit, $startfrom = 0, $length = 0 )
	{
		$offset = 300;
		$dumpsql = "";
		if ( !$startfrom )
		{
			$tables = $db->createCommand( "SHOW CREATE TABLE ".$table )->queryRow( );
			if ( isset( $tables['Create Table'] ) )
			{
				$dumpsql = "DROP TABLE IF EXISTS ".$table.";\n";
				$dumpsql .= $tables['Create Table'];
			}
			if ( isset( $tables['Create View'] ) )
			{
				return $dumpsql;
			}
			$dumpsql = preg_replace( "/(DEFAULT)*\\s*CHARSET=.+/", "DEFAULT CHARSET= utf8", $dumpsql );
			$sql = $db->createCommand( "SHOW TABLE STATUS LIKE '".$table."'" );
			$table_status = $sql->queryRow( );
			$dumpsql .= ( $table_status['Auto_increment'] ? " AUTO_INCREMENT=".$table_status['Auto_increment'] : "" ).";\n\n";
		}
		//$_obfuscate_s6yK2Ei8RDEFIxI = 0;
		$row_count = $offset;
		while ( $length + strlen( $dumpsql ) < $sizelimit * 1000 && $row_count == $offset )
		{
			//$_obfuscate_s6yK2Ei8RDEFIxI = 1;
			$rows = $db->createCommand( "SELECT * FROM ".$table." LIMIT {$startfrom}, {$offset}" )->setFetchMode( PDO::FETCH_NUM )->queryAll( );
			$column_count = count( Yii::app( )->db->getSchema( )->tables[$table]->columns );
			$row_count = count( $rows );
			foreach ( $rows as $row )
			{
				$gap = "";
				$dumpsql .= "INSERT INTO ".$table." VALUES (";
				$i = 0;
				for ( ;	$i < $column_count;	++$i	)
				{
					$dumpsql .= $gap.( "'".mysql_escape_string( $row[$i] )."'" );
					$gap = ",";
				}
				$dumpsql .= ");\n";
			}
			$startfrom += $offset;
		}
		$dumpsql .= "\n";
		return $dumpsql;
	}

	public function splitsql( $sql )
	{
		$sql = str_replace( "\r", "\n", $sql );
		$ret = array( );
		$num = 0;
		$tmp = explode( ";\n", trim( $sql ) );
		unset( $sql );
		error_reporting( 0 );
		foreach ( $tmp as $value )
		{
			$tmp2 = explode( "\n", trim( $value ) );
			foreach ( $tmp2 as $value )
			{
				$ret[$num] .= isset( $value[0] ) && $value[0] == "#" ? NULL : $value;
			}
			++$num;
		}
		return $ret;
	}

}

?>
