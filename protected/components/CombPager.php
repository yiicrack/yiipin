<?php
class CombPager extends CLinkPager
{

	public $cssFile = FALSE;

	public function run( )
	{
		$this->registerClientScript( );
		$buttons = $this->createPageButtons( );
		if ( empty( $buttons ) )
		{
			return;
		}
		$html = CHtml::tag( "div", array( "class" => "links" ), CHtml::tag( "ul", $this->htmlOptions, implode( "\n", $buttons ) ) );
		$html .= CHtml::tag( "div", array( "class" => "jumpbox" ), $this->createJumpBox( ) );
		echo CHtml::tag( "div", array( "class" => "combPager" ), $html );
	}

	protected function createJumpBox( )
	{
		$currentPage = $this->getCurrentPage( FALSE );
		$jump = CHtml::textfield( $this->pages->pageVar, $currentPage + 1, array( "class" => "pagebox", "onkeydown" => "if(event.keyCode==13) {\$('#pager-form').submit();}" ) );
		$params = $this->pages->params === NULL ? $_GET : $this->pages->params;
		unset( $params[$this->pages->pageVar] );
		unset( $params['jumpbtn'] );
		$html = "";
		foreach ( $params as $name => $value )
		{
			if ( !is_array( $value ) )
			{
				$html .= CHtml::hiddenfield( $name, $value );
			}
			else
			{
				foreach ( $value as $key => $val )
				{
					$html .= CHtml::hiddenfield( "{$name}[{$key}]", $val );
				}
			}
		}
		return CHtml::tag( "form", array( "id" => "pager-form", "method" => "get" ), "到第".$jump."页{$html}" );
	}

	public function registerClientScript( )
	{
		if ( $this->cssFile !== FALSE )
		{
			self::registercssfile( $this->cssFile );
		}
	}

	public static function registerCssFile( $url = NULL )
	{
		if ( $url === NULL )
		{
			$url = Yii::app( )->baseUrl."/css/combpager.css";
		}
		Yii::app( )->getClientScript( )->registerCssFile( $url );
	}

	protected function createPageButtons( )
	{
		if ( ( $pageCount = $this->getPageCount( ) ) <= 1 )
		{
			return array( );
		}
		list( $beginPage, $endPage ) = $this->getPageRange( );
		$currentPage = $this->getCurrentPage( FALSE );
		$buttons = array( );
		$buttons[] = $this->createPageButton( $this->firstPageLabel, 0, self::CSS_FIRST_PAGE, $currentPage <= 0, FALSE );
		if ( ( $page = $currentPage - 1 ) < 0 )
		{
			$page = 0;
		}
		$buttons[] = $this->createPageButton( $this->prevPageLabel, $page, self::CSS_PREVIOUS_PAGE, $currentPage <= 0, FALSE );
		if ( 0 < $beginPage )
		{
			$buttons[] = $this->createPageButton( "...", $beginPage - 1, self::CSS_INTERNAL_PAGE, FALSE, FALSE );
		}
		$i = $beginPage;
		for ( ;	$i <= $endPage;	++$i	)
		{
			$buttons[] = $this->createPageButton( $i + 1, $i, self::CSS_INTERNAL_PAGE, FALSE, $i == $currentPage );
		}
		if ( $endPage + 2 <= $pageCount )
		{
			$buttons[] = $this->createPageButton( "...", $endPage + 1, self::CSS_INTERNAL_PAGE, FALSE, FALSE );
		}
		if ( $pageCount - 1 <= ( $page = $currentPage + 1 ) )
		{
			$page = $pageCount - 1;
		}
		$buttons[] = $this->createPageButton( $this->nextPageLabel, $page, self::CSS_NEXT_PAGE, $pageCount - 1 <= $currentPage, FALSE );
		$buttons[] = $this->createPageButton( $this->lastPageLabel, $pageCount - 1, self::CSS_LAST_PAGE, $pageCount - 1 <= $currentPage, FALSE );
		return $buttons;
	}

}

?>
