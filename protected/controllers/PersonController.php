<?php
class PersonController extends Controller
{

	private $_user = NULL;
	public $pageSize = 100;
	public $frameSize = 10;

	public function getUser( )
	{
		if ( $this->_user instanceof User )
		{
			return $this->_user;
		}
		$this->_user = User::model( )->findByPk( $_GET['user_id'] );
		if ( $this->_user === NULL )
		{
			throw new CHttpException( 404 );
		}
		return $this->_user;
	}

	public function filters( )
	{
		return array( "accessControl" );
	}

	public function accessRules( )
	{
		return array(
			array(
				"deny",
				"actions" => array( "editgroup", "deletegroup" ),
				"users" => array( "?" )
			)
		);
	}

	public function actionIndex( )
	{
		$sql = "
			SELECT count(*) FROM (select concat('group_',`pin_group`.`id`) AS `id`,'group' AS `type`,`pin_group`.`id` AS `item_id`,`pin_group`.`user_id` AS `user_id` 
			from `pin_group` where pin_group.user_id = {$this->user->id} union select concat('share_',`pin_share`.`id`) AS `id`,'share' AS `type`,`pin_share`.`id` AS `item_id`,
			`pin_share`.`user_id` AS `user_id` from `pin_share` where pin_share.user_id = {$this->user->id}) `t`
		";
		
		$itemCount = Item::model( )->countBySql( $sql );
		$this->render( "index", array(
			"itemCount" => $itemCount
		) );

	}

	public function actionGetItems( $user_id, $frame = 0, $page = 1 )
	{
		$frameSize = $this->frameSize;
		$offset = ( $page - 1 ) * $this->pageSize + $frame * $frameSize;
		if ( $offset == $page * $this->pageSize )
		{
			if ( Yii::app( )->request->isAjaxRequest )
			{
				echo "false";
				Yii::app( )->end( );
			}
		}
		else
		{
			$sql = "
				SELECT * FROM (select concat('group_',`pin_group`.`id`) AS `id`,'group' AS `type`,`pin_group`.`id` AS `item_id`,`pin_group`.`user_id` AS `user_id` 
				from `pin_group` where pin_group.user_id = ".$user_id ." union select concat('share_',`pin_share`.`id`) AS `id`,'share' AS `type`, `pin_share`.`id` AS `item_id`,
				`pin_share`.`user_id` AS `user_id` from `pin_share` where pin_share.user_id = {$user_id}) `t` order by `type` ASC, id DESC limit {$offset}, {$frameSize}";
			$items = Item::model( )->findAllBySql( $sql );
			
			
			$items = Item::model( )->findAllByAttributes( array(
				"user_id" => $user_id
			), array(
				"order" => "type ASC, id DESC",
				"limit" => $frameSize,
				"offset" => $offset
			) );

			if ( Yii::app( )->request->isAjaxRequest )
			{
				echo "false";
				Yii::app( )->end( );
			}
			else
			{
				$this->renderPartial( "getItems", array(
					"items" => $items
				) );
			}
		}
	}

	public function actionMagazine( )
	{
		$itemCount = Group::model( )->countByAttributes( array(
			"user_id" => $this->user->id
		) );
		$this->render( "magazine", array(
			"itemCount" => $itemCount
		) );
	}

	public function actionGetMagazines( $user_id, $frame = 0, $page = 1 )
	{
		$frameSize = $this->frameSize;
		$offset = ( $page - 1 ) * $this->pageSize + $frame * $frameSize;
		if ( $offset == $page * $this->pageSize )
		{
			if ( Yii::app( )->request->isAjaxRequest )
			{
				echo "false";
				Yii::app( )->end( );
			}
		}
		else
		{
			$groups = Group::model( )->findAllByAttributes( array(
				"user_id" => $user_id
			), array(
				"order" => "id DESC",
				"limit" => $frameSize,
				"offset" => $offset
			) );
			if ( empty( $groups ) )
			{
				if ( Yii::app( )->request->isAjaxRequest )
				{
					echo "false";
					Yii::app( )->end( );
				}
			}
			else
			{
				$this->renderPartial( "getMagazines", array(
					"groups" => $groups
				) );
			}
		}
	}

	public function actionShare( )
	{
		$itemCount = Share::model( )->countByAttributes( array(
			"user_id" => $this->user->id
		) );
		$this->render( "share", array(
			"itemCount" => $itemCount
		) );
	}

	public function actionGetShares( $user_id, $frame = 0, $page = 1 )
	{
		$frameSize = $this->frameSize;
		$offset = ( $page - 1 ) * $this->pageSize + $frame * $frameSize;
		if ( $offset == $page * $this->pageSize )
		{
			if ( Yii::app( )->request->isAjaxRequest )
			{
				echo "false";
				Yii::app( )->end( );
			}
		}
		else
		{
			$shares= Share::model( )->with( "goods", "from_group", "user", "comments" )->findAllByAttributes( array(
				"user_id" => $user_id
			), array(
				"order" => "t.id DESC",
				"limit" => $frameSize,
				"offset" => $offset
			) );
			if ( empty( $shares) )
			{
				if ( Yii::app( )->request->isAjaxRequest )
				{
					echo "false";
					Yii::app( )->end( );
				}
			}
			else
			{
				$this->renderPartial( "getShares", array(
					"shares" => $shares
				) );
			}
		}
	}

	public function actionLike( )
	{
		$itemCount = UserLikeShare::model( )->countByAttributes( array(
			"user_id" => $this->user->id
		) );
		$this->render( "like", array(
			"itemCount" => $itemCount
		) );
	}

	public function actionGetLikes( $user_id, $frame = 0, $page = 1 )
	{
		$frameSize = $this->frameSize;
		$offset = ( $page - 1 ) * $this->pageSize + $frame * $frameSize;
		if ( $offset == $page * $this->pageSize )
		{
			if ( Yii::app( )->request->isAjaxRequest )
			{
				echo "false";
				Yii::app( )->end( );
			}
		}
		else
		{
			$criteria = new CDbCriteria( );
			$criteria->join = "INNER JOIN {{user_like_share}} AS uls ON t.id=uls.share_id";
			$criteria->order = "t.id DESC";
			$criteria->limit = $frameSize;
			$criteria->offset = $offset;
			$criteria->compare( "uls.user_id", $user_id );
			$shares= Share::model( )->with( "goods", "from_group", "user", "comments" )->findAll( $criteria );
			if ( empty( $shares) )
			{
				if ( Yii::app( )->request->isAjaxRequest )
				{
					echo "false";
					Yii::app( )->end( );
				}
			}
			else
			{
				$this->renderPartial( "getShares", array(
					"shares" => $shares
				) );
			}
		}
	}

	public function actionFollow( )
	{
		$itemCount = GroupFollow::model( )->countByAttributes( array(
			"user_id" => $this->user->id
		) );
		$this->render( "follow", array(
			"itemCount" => $itemCount
		) );
	}

	public function actionGetFollows( $user_id, $frame = 0, $page = 1 )
	{
		$frameSize = $this->frameSize;
		$offset = ( $page - 1 ) * $this->pageSize + $frame * $frameSize;
		if ( $offset == $page * $this->pageSize )
		{
			if ( Yii::app( )->request->isAjaxRequest )
			{
				echo "false";
				Yii::app( )->end( );
			}
		}
		else
		{
			$criteria = new CDbCriteria( );
			$criteria->join = "INNER JOIN {{group_follow}} AS f ON t.id=f.group_id";
			$criteria->order = "id DESC";
			$criteria->limit = $frameSize;
			$criteria->offset = $offset;
			$criteria->compare( "f.user_id", $user_id );
			$groups = Group::model( )->findAll( $criteria );
			if ( empty( $groups ) )
			{
				if ( Yii::app( )->request->isAjaxRequest )
				{
					echo "false";
					Yii::app( )->end( );
				}
			}
			else
			{
				$this->renderPartial( "getMagazines", array(
					"groups" => $groups
				) );
			}
		}
	}

	public function getStats( )
	{
		return array(
			"groupCount" => Group::model( )->countByAttributes( array(
				"user_id" => $this->user->id
			) ),
			"shareCount" => Share::model( )->countByAttributes( array(
				"user_id" => $this->user->id
			) ),
			"likeCount" => UserLikeShare::model( )->countByAttributes( array(
				"user_id" => $this->user->id
			) ),
			"followCount" => GroupFollow::model( )->countByAttributes( array(
				"user_id" => $this->user->id
			) )
		);
	}

	public function actionComment( )
	{
		if ( Yii::app( )->request->isPostRequest )
		{
			$comment = new ShareComment( );
			$comment->user_id = Yii::app( )->user->id;
			$comment->content = htmlspecialchars( $_POST['content'] );
			$comment->share_id = $_POST['share_id'];
			if ( $comment->save( ) )
			{
				$this->layout = "none";
				$this->render( "share_comment", array(
					"comment" => $comment
				) );
			}
			else
			{
				echo "false";
			}
		}
	}

	public function actionDeleteShare( )
	{
		if ( Yii::app( )->request->isPostRequest )
		{
			$share = Share::model( )->findByAttributes( array(
				"user_id" => Yii::app( )->user->id,
				"id" => $_POST['share_id']
			) );
			if ( $share !== NULL )
			{
				$share->delete( );
				echo "true";
			}
			else
			{
				echo "false";
			}
		}
	}

	public function actionEditGroup( )
	{
		$model = Group::model( )->findByPk( $_GET['id'] );
		if ( $model === NULL )
		{
			throw new CHttpException( 404 );
		}
		if ( $model->user_id != Yii::app( )->user->id )
		{
			throw new CHttpException( 403 );
		}
		if ( isset( $_POST['ajax'] ) && $_POST['ajax'] === "group-form" )
		{
			echo CActiveForm::validate( $model );
			Yii::app( )->end( );
		}
		if ( isset( $_POST['Group'] ) )
		{
			$image = CUploadedFile::getinstance( $model, "banner" );
			if ( $image )
			{
				$filename = time( ).rand( 1000, 9999 ).".".$image->getExtensionName( );
				$dir = "/upload/image/".date( "Ym" )."/";
				if ( !file_exists( Yii::app( )->basePath."/..".$dir ) )
				{
					FileHelper::mkdirs( Yii::app( )->basePath."/..".$dir );
				}
				$full_filename = Yii::app( )->basePath."/..".$dir.$filename;
				if ( $image->saveAs( $full_filename ) )
				{
					$model->banner = $dir.$filename;
				}
			}
			//unset( $image->saveAs( $full_filename )['banner'] );
			$model->attributes = $_POST['Group'];
			if ( $model->save( ) )
			{
				$this->redirect( array(
					"/person/magazine",
					"user_id" => Yii::app( )->user->id
				) );
			}
		}
		$this->render( "editgroup", array(
			"model" => $model
		) );
	}

	public function actionDeleteGroup( )
	{
		$model = Group::model( )->findByPk( $_POST['id'] );
		if ( $model === NULL )
		{
			throw new CHttpException( 404 );
		}
		if ( $model->user_id != Yii::app( )->user->id )
		{
			throw new CHttpException( 403 );
		}
		$model->delete( );
		echo "true";
	}

	public function actionSetTags( )
	{
		if ( Yii::app( )->request->isPostRequest )
		{
			$ids = array( );
			$tag_ids = explode( ",", $_POST['tag_ids'] );
			foreach ( $tag_ids as $id )
			{
				if ( is_numeric( $id ) )
				{
					$ids[] = $id;
				}
				else
				{
					$tag = new UserTag( );
					$tag->name = $id;
					$tag->user_id = Yii::app( )->user->id;
					if ( $tag->save( ) )
					{
						$ids[] = $tag->id;
					}
				}
			}
			$user = User::model( )->findByPk( Yii::app( )->user->id );
			if ( $user !== NULL )
			{
				$user->tag_ids = implode( ",", $ids );
				$user->save( FALSE );
			}
			$criteria = new CDbCriteria( );
			$criteria->compare( "user_id", Yii::app( )->user->id );
			$criteria->addNotInCondition( "id", $ids );
			$tags = UserTag::model( )->findAll( $criteria );
			foreach ( $tags as $tag )
			{
				$tag->delete( );
			}
			User::addcredit( Yii::app( )->user->id, "edit_user_tag" );
			echo "true";
		}
	}

	public function actionCommendFollow( )
	{
		$user_id = Yii::app( )->user->id;
		$cookie_id = "commend_follow_".$user_id;
		if ( !isset( Yii::app( )->request->cookies[$cookie_id] ) )
		{
			$follows = Yii::app( )->db->createCommand( "SELECT to_user_id FROM {{follow}} WHERE user_id = ".$user_id )->queryColumn( );
			if ( empty( $follows ) )
			{
				$follows = array( 0 );
			}
			$users = User::model( )->findAllBySql( "SELECT t1.* FROM {{user}}   AS t1\n    \t            JOIN  ( SELECT ROUND(RAND() * ((SELECT MAX(id) FROM {{user}})\n    \t            -(SELECT MIN(id) FROM {{user}}))+(SELECT MIN(id) FROM {{user}})) AS id) AS t2\n    \t            WHERE t1.id >= t2.id AND t1.id <> ".$user_id." AND t1.id NOT IN (".implode( ",", $follows ).") ORDER BY t1.id LIMIT 8" );
			$cookie = new CHttpCookie( $cookie_id, "1" );
			$cookie->expire = time( ) + 86400;
			Yii::app( )->request->cookies[$cookie_id] = $cookie;
			$this->layout = FALSE;
			$this->render( "commendfollow", array(
				"users" => $users
			) );
			Yii::app( )->end( );
		}
		echo "false";
	}

}

?>
