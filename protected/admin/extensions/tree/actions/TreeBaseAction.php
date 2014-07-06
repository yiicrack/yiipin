<?php
abstract class TreeBaseAction extends CAction
{
	private $_model;
	private $_modelName;
	
	public function __construct($controller,$id)
	{
		parent::__construct($controller,$id);
		if (!Yii::app()->getRequest()->getIsPostRequest() || !Yii::app()->getRequest()->getIsAjaxRequest()) {
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		}
		$this->getModelName();
	}
	
	/**
	 * @return CActiveRecord
	 */
    public function loadModel()
	{
		if($this->_model===null)
		{
			if($id=Yii::app()->getRequest()->getParam('id'))
				$this->_model=$this->getModel()->node($id);
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}
	
	/**
	 * @return CActiveRecord
	 */
	public function getModel() {
		return CActiveRecord::model($this->getModelName());
	}
	
	public function getModelName() {
		if ($this->_modelName===null) {
			$this->_modelName=Yii::app()->getRequest()->getParam('modelName');
			if ($this->_modelName===null) {
				throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
			}
		}
		return $this->_modelName;
	}
}