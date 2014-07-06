<?php
include(dirname(__FILE__).DIRECTORY_SEPARATOR.'TreeBaseAction.php');
class TreeSelectAction extends TreeBaseAction
{
    public function run()
    {
		$parent_id = Yii::app()->request->getParam('parent_id');
		if($parent_id)
		{
			if ($parent_id==-1) {
				$data=$this->getModel()->roots();
			} else {
				$criteria=new CDbCriteria;
	    		$criteria->condition='parent_id='.$parent_id;
	    		$criteria->order="lft ASC";
				$data = $this->getModel()->findAll($criteria);
			}
			
			$select_id = Yii::app()->request->getParam('select_id');
			foreach ($data as $row) {
				if ($select_id == $row->id) {
					$selected = " selected";
				} else {
					$selected = null;
				}
				echo "<option value=\"$row->id\"{$selected}>" . CHtml::encode($row->name) . "</option>";
			}
		}
    }
}