<?php
class Form extends CForm
{
	public function renderBody( )
	{
		$output = "";
		if ( $this->title !== NULL )
		{
			$output = "<div class=\"form_title\">".$this->title."</div>\n";
		}
		if ( $this->description !== NULL )
		{
			$output .= "<div class=\"form_Alarm\">\n".$this->description."</div>\n";
		}
		if ( $this->showErrorSummary && ( $model = $this->getModel( FALSE ) ) !== NULL )
		{
			$output .= $this->getActiveFormWidget( )->errorSummary( $model )."\n";
		}
		$output .= "<table width=\"100%\" cellspacing=\"1\" cellpadding=\"2\" class=\"table_form\">\n";
		$output .= $this->renderElements( )."\n".$this->renderButtons( )."\n";
		$output .= "</table>\n";
		return $output;
	}

	public function renderButtons( )
	{
		$output = "";
		foreach ( $this->getButtons( ) as $button )
		{
			$output .= $this->renderElement( $button );
		}
		if ( $output !== "" )
		{
			return "<tr><th></th><td>".$output."</td></tr>\n";
		}
		return "";
	}

	public function renderElement( $element )
	{
		if ( is_string( $element ) )
		{
			if ( ( $e = $this[$element] ) === NULL && ( $e = $this->getButtons( )->itemAt( $element ) ) === NULL )
			{
				return $element;
			}
			$element = $e;
		}
		if ( $element->getVisible( ) )
		{
			if ( $element instanceof CFormInputElement )
			{
				if ( $element->layout == "{label}\n{input}\n{hint}\n{error}" )
				{
					$element->layout = "<th>{label}</th><td><div class=\"input\">{input}</div>\n{hint}\n{error}</td>";
				}
				if ( $element->type === "hidden" )
				{
					return "<tr style=\"visibility:hidden\">\n".$element->render( )."</tr>\n";
				}
				return "<tr class=\"row field_".$element->name."\">\n".$element->render( )."</tr>\n";
			}
			if ( $element instanceof CFormButtonElement )
			{
				return $element->render( )."\n";
			}
			return $element->render( );
		}
		return "";
	}

}

?>
