<?php
class ShopCategoryDropDownList extends CInputWidget
{

	public $group = TRUE;
	public $level = 2;

	public function run( )
	{
		if ( isset( $this->htmlOptions['empty'] ) )
		{
			$data[''] = $this->htmlOptions['empty'];
			unset( $this->htmlOptions['empty']);
		}
		else
		{
			$data['0'] = "顶级分类";
		}
		list( $id, $id ) = $this->resolveNameID( );
		$categorys = ShopCategory::model( )->findAllByAttributes( array( "parent_id" => 0 ), array( "order" => "sortnum ASC" ) );
		foreach ( $categorys as $category )
		{
			$models = ShopCategory::model( )->findAllByAttributes( array(
				"parent_id" => $category->id
			), array( "order" => "sortnum ASC" ) );
			if ( $models !== NULL )
			{
				if ( $this->group )
				{
					$data[$category->name] = CHtml::listdata( $models, "id", "name" );
				}
				else
				{
					$data[$category->id] = $category->name;
					if ( $this->level == 2 )
					{
						foreach ( $models as $model )
						{
							$data[$model->id] = "---".$model->name;
						}
					}
				}
			}
		}
		if ( $this->hasModel( ) )
		{
			echo CHtml::activedropdownlist( $this->model, $this->attribute, $data, $this->htmlOptions );
		}
		else
		{
			echo CHtml::dropdownlist( $id, $this->value, $data, $this->htmlOptions );
		}
	}

}

?>
