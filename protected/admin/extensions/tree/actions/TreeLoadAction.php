<?php
include(dirname(__FILE__).DIRECTORY_SEPARATOR.'TreeBaseAction.php');
class TreeLoadAction extends TreeBaseAction
{
    public function run()
    {
        $model=$this->loadModel();
		echo CJavaScript::jsonEncode($model->getAttributes());
    }
}