<?php
include(dirname(__FILE__).DIRECTORY_SEPARATOR.'TreeBaseAction.php');
class TreeMoveUpAction extends TreeBaseAction
{
    public function run()
    {
        if (!$this->loadModel()->moveUp()) {
			throw new CHttpException(400,strip_tags(CHtml::errorSummary($this->loadModel())));
		}
    }
}