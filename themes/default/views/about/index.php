<?php
$this->pageTitle = $about->title ;
$this->breadcrumbs=array(
	'关于我们',
);
?>

<div class="aboutus">
	<div class="content">
		<h2><?php echo $about->title ?></h2>
		<?php echo $about->content ?>
	</div>
	<div class="rightNav">
	    <?php foreach($this->getAbouts() as $data):?>
		<h3>
		<?php echo CHtml::link($data->title, array('about/index', 'name'=>$data->name), array('class'=>($_GET['name'] == $data->name ? 'selected':''))); ?>
		</h3>
		<?php endforeach;?>
	</div>
</div>