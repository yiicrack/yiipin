<?php
include(dirname(__FILE__).DIRECTORY_SEPARATOR.'TreeBaseAction.php');
class TreeCreateAction extends TreeBaseAction
{
    public function run()
    {
        $modelName=$this->getModelName();
		$model=new $modelName;
		$model->parent_id=(int)Yii::app()->getRequest()->getParam('parent_id');
		$model->name=Yii::app()->getRequest()->getParam('name');
		if (!$model->save()) {
			throw new CHttpException(400,strip_tags(CHtml::errorSummary($model)));
		}
    }
}