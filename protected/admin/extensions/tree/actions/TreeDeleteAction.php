<?php
include(dirname(__FILE__).DIRECTORY_SEPARATOR.'TreeBaseAction.php');
class TreeDeleteAction extends TreeBaseAction
{
    public function run()
    {
        $this->loadModel()->delete();
    }
}