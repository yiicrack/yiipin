<?php
include(dirname(__FILE__).DIRECTORY_SEPARATOR.'TreeBaseAction.php');
class TreeUpdateAction extends TreeBaseAction
{
    public function run()
    {
        $model=$this->loadModel();
		$model->parent_id=(int)Yii::app()->getRequest()->getParam('parent_id');
		$model->name=Yii::app()->getRequest()->getParam('name');
		if (!$model->save()) {
			throw new CHttpException(400,strip_tags(CHtml::errorSummary($model)));
		}
    }
}