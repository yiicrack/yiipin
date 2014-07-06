<?php 
$this->pageTitle = "我的私信";
$this->keywords = '';
?>

<div class="container_12" id="main">
	<div style="_overflow: hidden;" class="grid_9">
		<div class="mt14 box_shadow p13">
			<div class="hp_tab">
				<ul class="hp_lt">
					<li><a href="<?php echo $this->createUrl('msg', array('user_id'=>Yii::app()->user->id)); ?>">私信</a></li>
					<li class="active red" class=""><a href="###">系统消息</a></li>
				</ul>
			</div>
			<?php $this->widget('zii.widgets.CListView', array(
			            'id'=>'sysmsg-list',
                        'dataProvider'=>$dataProvider,
                        'ajaxUpdate'=>true,
              			'cssFile' =>false,
                        'itemView'=>'_sysmsg_listitem',
        				'pager'=>array('class'=>'CLinkPager','maxButtonCount'=>6, 'header'=>'', 'cssFile'=>false),
			            'emptyText'=>'暂无新系统消息',
                        'template'=>'<div class="pmsg_list_wrap">
                <div style="clear:both;"></div>
                <div class="pmsg_list_listbox">
    				{items}
                </div>
			</div>
			<div class="c"><div id="pageNav">{pager}</div></div>',
                    ));
?>
			
		</div>
		<!-- .box_shadow -->
	</div>


	<div class="pinnable grid_3 omega">
		<?php $this->renderPartial('/person/_sidebar');?>
		<div class="mt10"></div>
	</div>
	<div class="clear"></div>
</div>
<script type="text/javascript">

</script>
