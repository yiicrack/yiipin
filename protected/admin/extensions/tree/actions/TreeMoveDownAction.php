<?php
include(dirname(__FILE__).DIRECTORY_SEPARATOR.'TreeBaseAction.php');
class TreeMoveDownAction extends TreeBaseAction
{
    public function run()
    {
        if (!$this->loadModel()->moveDown()) {
			throw new CHttpException(400,strip_tags(CHtml::errorSummary($this->loadModel())));
		}
    }
}