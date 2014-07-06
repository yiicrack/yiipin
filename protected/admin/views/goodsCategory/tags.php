<?php 
$this->breadcrumbs=array(
	'商品分类管理',
    '标签',
);
?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
)); ?>
<div class="col-tab">
  <div class="contentList pad-10" id="div_setting_1">
<table width="100%" cellspacing="1" cellpadding="2" class="table_form">
  <?php foreach($groups as $index=>$group): ?>
  <tr>
  <th><?php echo $group; ?></th>
    <td valign="top">
   <?php 
   $tags = $this->getTags($_GET['id'], $group);
   
   echo CHtml::textArea("tags[{$group}]", $tags, array('cols'=>'50', 'rows'=>5))?><br /><span style="color:red">必须使用单个词语作为标签，不要使用词组、符号分隔等，若发现无法匹配到任何商品，请改短词语或者更换词语</span>，用半角空格隔开标签即可
    </td>
  </tr>
  <?php endforeach; ?>
</table>

</div>
<div class="bk15"></div>
  <div class="btn">
    <input type="submit" id="dosubmit" class="button" name="dosubmit" value="提交">
  </div>
</div>
<?php $this->endWidget(); ?>