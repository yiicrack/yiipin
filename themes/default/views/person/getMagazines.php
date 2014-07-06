<?php foreach($groups as $data):?>
<?php $this->renderPartial('_group_listitem', array('data'=>$data));?>
<?php endforeach;?>