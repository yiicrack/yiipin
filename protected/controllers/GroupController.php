<?php
class GroupController extends Controller
{

	public $pageSize = 100;
	public $frameSize = 10;

	public function filters( )
	{
		return array( "accessControl" );
	}

	public function accessRules( )
	{
		return array(
			array(
				"deny",
				"actions" => array( "like", "follow" ),
				"users" => array( "?" )
			)
		);
	}

	public function actionIndex( )
	{
		$this->render( "index" );
	}

	public function actionView( $id )
	{
		$group = Group::model( )->findByPk( $id );
		$this->render( "view", array(
			"group" => $group,
			"itemCount" => Share::model( )->countByAttributes( array(
				"group_id" => $id
			) )
		) );
	}

	public function actionGetShares( $group_id, $frame = 0, $page = 1 )
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
			$shares = Share::model( )->with( "goods", "from_group", "user", "comments" )->findAllByAttributes( array(
				"group_id" => $group_id
			), array(
				"order" => "t.id DESC",
				"limit" => $frameSize,
				"offset" => $offset
			) );
			if ( empty( $shares ) )
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
				));
			}
		}
	}

	public function actionLike( $share_id, $flag )
	{
		if ( Yii::app( )->request->isAjaxRequest )
		{
			$share = Share::model( )->findByPk( $share_id );
			if ( $share->user_id == Yii::app( )->user->id )
			{
				echo $share->like_count;
				Yii::app( )->end( );
			}
			if ( $flag )
			{
				$model = UserLikeShare::model( )->findByPk( array(
					"user_id" => Yii::app( )->user->id,
					"share_id" => $share_id
				) );
				if ( $model === NULL )
				{
					$model = new UserLikeShare( );
					$model->user_id = Yii::app( )->user->id;
					$model->share_id = $share_id;
					$model->share_user_id = $share->user_id;
					$model->save( FALSE );
				}
			}
			else
			{
				$model = UserLikeShare::model( )->findByPk( array(
					"user_id" => Yii::app( )->user->id,
					"share_id" => $share_id
				) );
				if ( $model !== NULL )
				{
					$model->delete( );
				}
			}
			$share->refresh();
			echo $share->like_count;
		}
	}

	public function actionFollow( $group_id, $flag )
	{
		if ( Yii::app( )->request->isAjaxRequest )
		{
			$follow = GroupFollow::model( )->findByAttributes( array(
				"group_id" => $group_id,
				"user_id" => Yii::app( )->user->id
			) );
			if ( $flag == "on" )
			{
				if ( $follow === NULL )
				{
					$follow = new GroupFollow( );
					$follow->group_id = $group_id;
					$follow->user_id = Yii::app( )->user->id;
					if ( $follow->save( FALSE ) )
					{
						$event = new Event( );
						$event->user_id = $follow->group->user_id;
						$event->from_user_id = $follow->user_id;
						$event->action = CHtml::link( $follow->user->username, array(
							"person/index",
							"user_id" => $follow->user_id
						), array(
							"target" => "_blank"
						) )." 关注了你的杂志".CHtml::link( "#".$follow->group->name."#", array(
							"group/view",
							"id" => $follow->group_id
						), array( "target" => "_blank" ) );
						$event->image = "avatar";
						$event->link = array(
							"person/index",
							"user_id" => $follow->user_id
						);
						$event->save( );
					}
				}
			}
			else
			{
				$follow->delete( );
			}
		}
	}

}

?>
