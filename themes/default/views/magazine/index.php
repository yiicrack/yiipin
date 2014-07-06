<?php
$this->pageTitle = '翻杂志';
$this->keywords = Yii::app()->name.',杂志,图片,购物分享,淘宝网购物';
$this->description = Yii::app()->name.'杂志是风格的小世界，欧美、甜美、森女、朋克，应有尽有！兴趣相投的MM聚焦在这里分享时尚生活，创办属于自己的个性杂志';

?>

<div>
<div class="group_tab"><a href="<?php echo CHtml::normalizeUrl(array('/magazine/index')); ?>" class="tab_cate current">推荐</a> 
<?php foreach($this->getGroupCategories() as $index=>$data):?>
<a href="<?php echo CHtml::normalizeUrl(array('/magazine/list', 'cat'=>$data->id)); ?>" class="tab_cate"><?php echo $data->name ?></a> 
<?php if($index>5) break; endforeach;?>
</div>

<?php foreach($this->getGroupCategories() as $category):?>
<div class="goodsTJ">
<div class="title">
<h2><?php echo $category->name ?></h2>
<p class="gray_f"><a href="<?php echo CHtml::normalizeUrl(array('/magazine/list', 'cat'=>$category->id)); ?>">查看更多&gt;&gt;</a></p>
</div>
<?php foreach($this->getGroupByCategory($category->id) as $data):?>
<?php $this->renderPartial('_listitem', array('data'=>$data)); ?>
<?php endforeach;?>

<div class="clear_f"></div>
</div>
<?php endforeach;?>

<div class="goodsTJ">
<div class="newgroup">
<div class="title">
<h2>新晋杂志</h2>
</div>
<?php foreach($this->getNewGroups() as $data):?>
<?php $this->renderPartial('_listitem', array('data'=>$data)); ?>
<?php endforeach; ?>

</div>
<div class="top">
<h2>TOP10</h2>
<ul>
<?php foreach($this->getHotGroups() as $index=>$data):?>
	<li>
	<div class="order "><?php echo $index+1 ?></div>
	<div class="avatar48_f">
	<a target="_blank" user_id="<?php echo $data->user_id ?>" href="<?php echo $this->createUrl('/person/index', array('user_id'=>$data->user_id)); ?>" class="avatar32_f trans07"><img src="<?php echo WebUser::getUcAvatarSrc($data->user_id, 'small') ?>"></a>
	</div>
	<div class="top_r">
	<p class="red_f"><?php echo CHtml::link($data->name, array('/group/view', 'id'=>$data->id), array('target'=>'_blank')); ?></p>
	<p>主编: <?php echo CHtml::link($data->user->username, array('/person/index', 'user_id'=>$data->user_id), array('target'=>'_blank')); ?></p>
	<p>粉丝: <?php echo $data->follow_count ?></p>
	</div>
	</li>
<?php endforeach;?>
	
</ul>
</div>
</div>

