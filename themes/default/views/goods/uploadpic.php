<?php
$this->pageTitle = '抓取图片';
$this->layout = isset($_GET['from']) && $_GET['from'] == 'pickup' ? 'dialog':'basic';
?>
<div id="dialog-create-pic">
<?php $form = $this -> beginWidget('CActiveForm', array(
	'id' => 'create-goods-form', 
	'action'=>array('/goods/create'),
	'enableAjaxValidation' => true, 
	'clientOptions'=>array('validateOnChange'=>false))
);?>

<input name="image" value="<?php echo $img; ?>" type="hidden" />
<input name="url" value="<?php echo $url; ?>" type="hidden" />
<input name="group_id" id="share_to_group_id" value="<?php foreach($this->getGroups() as $data){echo $data->id;break;}?>" type="hidden" />

<div class="addGoodsShare none left" style="display: block;">

<div class="maga_img left overflow"><img width="180" height="180"
	src="<?php echo Yii::app()->baseUrl.$img; ?>"
	id="magaImages"></div>
<div class="maga_cr left">
<div id="createNewMagazine">
<div class="selectPanel">
	<div class="select">
	<?php foreach($this->getGroups() as $data):?>
		<div val="<?php echo $data->id ?>" class="selectText"><?php echo htmlspecialchars($data->name) ?></div>
	<?php break; endforeach;?>
		<div class="selectBtn"></div>
	</div>
	<div class="options">
		<ul>
		<?php foreach($this->getGroups() as $data):?>
			<li id="<?php echo $data->id ?>" class="border"><?php echo htmlspecialchars($data->name) ?></li>
		<?php endforeach;?>
		</ul>
		<div id="createPanel" style="" class="maga_crb createPanel"><a
			id="createMaga" class="sj_btn c cursor f16 r white createMaga">创建</a> 
			<input type="text" name="create" value="创建一个杂志" maxlength="20" id="createMagaValue" 
			class="mc_ipt gray maxConent createMagaValue" onfocus="if(this.value=='创建一个杂志') this.value='';" onblur="if(this.value=='') this.value='创建一个杂志';" />
		<div class="clear"></div>
		<p id="ForwardMsg" class="red mt5 none">哎呀，这个名称已经有人使用了，请换个名称吧！</p>
		</div>
	</div>
</div>

</div>
<textarea maxlength="500" name="quote" class="maxConent maga_area mt8 gray" id="magaContent" onfocus="if(this.value=='写点什么，评论一下') this.value='';" onblur="if(this.value=='') this.value='写点什么，评论一下';">写点什么，评论一下</textarea>
<div class="maga_zf mt8" style="width: 100%">
	<div class="left"><a class="red_round cursor f14 white p5_10" href="javascript:void(0)" id="forwardToMagazine">分享</a>&nbsp;&nbsp;<span class="none" id="sharMaga">正在转发,请稍等...</span><a class="share_smileys red cursor">表情</a></div></div>
</div>
</div>
 <?php $this -> endWidget();?>
 </div>
 
 <script type="text/javascript">
<!--
$(document).ready(function(){
	try
	{ 
    	parent.$('#share-pic-form').html($('#dialog-create-pic').html());
    	parent.$("#share-pic").dialog("close");
    	parent.$("#share-pic").dialog("open");
    	if(parent.$('#submitPicture').size()>0) parent.$('#submitPicture').get(0).reset();
    	parent.$("#uploadFileSubmit").val('');
	}catch (e)
	{ 
	}
});
//-->
</script>