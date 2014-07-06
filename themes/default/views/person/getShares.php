<?php foreach($shares as $data):?>
<?php $this->renderPartial('_share_listitem', array('data'=>$data));?>
<?php endforeach;?>