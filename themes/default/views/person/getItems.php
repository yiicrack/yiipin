<?php foreach($items as $item):
$data = $item->data;
if($data instanceof Group):
?>
<?php $this->renderPartial('_group_listitem', array('data'=>$data));?>
<?php elseif($data instanceof Share): ?>
<?php $this->renderPartial('_share_listitem', array('data'=>$data));?>
<?php endif;?>
<?php endforeach;?>