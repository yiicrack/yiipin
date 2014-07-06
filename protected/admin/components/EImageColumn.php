<?php
Yii::import( "zii.widgets.grid.CGridColumn" );
class EImageColumn extends CGridColumn
{

	public $name = NULL;
	public $sortable = NULL;
	public $pathPrefix = NULL;
	public $pathSuffix = NULL;
	public $htmlOptions = array( );
	public $linkHtmlOptions = array( );
	public $alt = "";
	public $link = FALSE;
	public $filter = FALSE;

	public function init( )
	{
		parent::init( );
		if ( $this->pathPrefix === NULL )
		{
			$this->pathPrefix = Yii::app( )->baseUrl;
		}
		if ( $this->name === NULL )
		{
			throw new Yii( Yii::t( "zii", "Please specify a name for EImageColumn." ) );
		}
	}

	protected function renderHeaderCellContent( )
	{
		if ( $this->grid->enableSorting && $this->sortable && $this->name !== NULL )
		{
			echo $this->grid->dataProvider->getSort( )->link( $this->name, $this->header );
		}
		else if ( $this->name !== NULL && $this->header === NULL )
		{
			if ( $this->grid->dataProvider instanceof CActiveDataProvider )
			{
				echo CHtml::encode( $this->grid->dataProvider->model->getAttributeLabel( $this->name ) );
			}
			else
			{
				echo CHtml::encode( $this->name );
			}
		}
		else
		{
			parent::renderheadercellcontent( );
		}
	}

	protected function renderDataCellContent( $row, $data )
	{
		if ($data->hasAttribute('logo')) 
			$image = CHtml::image( $this->pathPrefix.$data->logo.$this->pathSuffix, $this->alt, $this->htmlOptions );
		else
			$image = CHtml::image( $this->pathPrefix.$data->image.$this->pathSuffix, $this->alt, $this->htmlOptions );
		if ( $this->link )
		{
			$link = $this->evaluateExpression( $this->link, array(
				"data" => $data,
				"row" => $row
			) );
			echo CHtml::link( $image, $link, $this->linkHtmlOptions );
		}
		else
		{
			echo $image;
		}
	}

}

?>
