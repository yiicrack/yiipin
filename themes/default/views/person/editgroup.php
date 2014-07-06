<?php 
$this->pageTitle = '编辑杂志';

?>

<div class="container_12" id="main">
			
<style>
.container_12 {	margin-left: auto; margin-right: auto; width: 960px; }
</style>
<div class="settingGroup box_shadow mt14">
	<h3 class="f16">编辑杂志：<span><?php echo $model->name ?></span></h3>
	<?php $form = $this -> beginWidget('CActiveForm', array('id' => 'group-form', 'htmlOptions'=> array('enctype'=>'multipart/form-data'), 'enableAjaxValidation' => true, 'clientOptions'=>array('validateOnChange'=>true)));?>
	<ul>
		<li><span>杂志名称</span>
		    <?php echo $form->textField($model, 'name', array('class'=>'opt1 left')); ?>
			<samp id="ag_info_name" class="l22 f12 red left ml7 mt5">
			<?php echo $form->error($model, 'name');?>
			</samp>
			<div class="clear"></div>
		</li>
		<li><span>卷首语</span>
		    <?php echo $form->textArea($model, 'preface', array('rows'=>5, 'cols'=>60)); ?>
		    <?php echo $form->error($model, 'preface');?>
		</li>
		<li><span>横幅图片</span>
		    <?php $this->widget('ext.FilefieldWidget', array(
		            'model'=>$model, 
		            'attribute'=>'banner', 
		            'htmlOptions'=>array('size'=>'40'),
        	        'thumbOptions'=>array('height'=>158, 'width'=>600, 'fullimage'=>false),
		       )); ?>
			<samp id="ag_info_name" class="l22 f12 red left ml7 mt5">
			<?php echo $form->error($model, 'banner', array(), false);?>
			</samp>
			<div class="clear"></div>
		</li>
		<li><span></span>
			选一张您喜欢的照片做杂志横幅吧(建议图片尺寸948*250)。支持Jpeg和Gif格式，大小不超过2M。
			<div class="clear"></div>
		</li>
		<li><span>删除</span>
			<span id="deletBtn" class="opt2">删除杂志</span>
			<div class="clear"></div>
		</li>
		<li><span></span>
			<input type="submit" value="保存设置" name="" id="sureBtn" class="sure_setting">
			<div class="clear"></div>
		</li>
	</ul>
	<?php $this->endWidget();?>
</div>

<div id="deletGroupWin" class="c deletGroupWin none">
    <p>真的要删除这个杂志吗？</p>
    <p class="f12 mt5">删除后，你在杂志里分享的宝贝仍然保留在你的个人页</p>
    <div class="c mt30">
    	<span id="deletGroupTrue" class="delet_setting red_round white">确定</span>
    	<span id="deletGroupFalse" class="delet_setting pink_round red">取消</span>
    	<div class="clear"></div>
    </div>
</div>

					
<div class="clear"></div>
</div>
<script type="text/javascript">
$('#deletBtn').click(function(){
    $('#deletGroupWin').dialog({
		'title':'删除杂志',
        'autoOpen':true,
		'modal':true,
		'width':'400px'
	});
	
});

$('#deletGroupFalse').click(function(){
	$('#deletGroupWin').dialog('close');
});

$('#deletGroupTrue').click(function(){
	$.post('<?php echo $this->createUrl('/person/deletegroup'); ?>', {id:<?php echo $model->id?>}, function(data){
		window.location.href = '<?php echo $this->createUrl('/person/index', array('user_id'=>$this->user->id)); ?>';
	});
});
</script>