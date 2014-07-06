<?php 
$this->pageTitle = '我的积分';
?>

<div id="wrapper">
<div class="clear"></div>
<div id="main" class="container_12" >
  <div class="grid_12">
    <div class="box_shadow mt14 p13">
      <div class="hp_tab">
        <ul class="hp_lt">
          <li class="active red"><a href="<?php echo $this->createUrl('/settings/credit'); ?>">我的积分</a></li>
        </ul>
      </div>

      <div class="settings-page-wraper">
        <div class="current_credit">当前拥有积分：<?php echo $user->credit ?></div>
        <div class="current_credit">积分变动记录：
        <?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'credit-log-grid',
	'dataProvider'=>$dataProvider,
	'selectableRows' => false,
	'cssFile'=>false,
    'pager' => array('class'=>'CLinkPager', 'cssFile'=>false, 'header'=>''),
    'template'=>'{items}<div class="clear_f"></div><div class="paging_panel c_f"><div id="pageNav">{pager}</div></div>',
	'columns'=>array(
		'action',
		array('name'=>'score', headerHtmlOptions=>array('style'=>'width:80px')),
		array('name'=>'credit', headerHtmlOptions=>array('style'=>'width:80px')),
		array('name'=>'created', headerHtmlOptions=>array('style'=>'width:150px')),
	),
)); ?></div>
        <div style="clear:both"></div>
      </div>
      
    </div>
  </div>
  <div class="clear"></div>
</div>
<!-- main -->
<div class="clear"></div>
<div id="show_err"></div>
