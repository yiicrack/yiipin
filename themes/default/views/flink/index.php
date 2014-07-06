<?php
$this->pageTitle = '友情链接';
$this->breadcrumbs=array(
	'友情链接',
);
?>

<div class="container_12" id="main">
	<div style="_overflow: hidden;" class="grid_9">
		<div style="width: 922px;" class="box_shadow p13 mt14">
			<div class="links_body mt14">
				<div class="links_left left">
					<h2 class="links_t left">友情链接</h2>
					<div class="word_links mt10 left">文字链接</div>
					<ul class="links_content left">
					<?php foreach($this->getFlinks(Flink::CATEGORY_INNER, 0, 'text') as $data): ?>
    				<li class="textlink"><?php echo CHtml::link($data->name, $data->url, array('target'=>'_blank')); ?></li>
    				<?php endforeach; ?>
					</ul>
					<div class="word_links mt10 left">图片链接</div>
					<ul class="links_content left">
					<?php foreach($this->getFlinks(Flink::CATEGORY_INNER, 0, 'image') as $data): ?>
    				<li class="li2"><?php echo CHtml::link(CHtml::image($data->src), $data->url, array('title'=>$data->name, 'target'=>'_blank', 'class'=>'logo logo_blank')); ?></li>
    				<?php endforeach; ?>
						
					</ul>
					<div class="word_links mt10 left">友链申请</div>
					<div class="apply_c">
						<div class="apply_t">友情链接申请条件：</div>
						<div class="apply_w mt10">1.您的网站交换链接的页面PR值&gt;=5</div>
						<div class="apply_w mt10">2.您的网站不包含盗版、黄色等不良内容</div>
						<div class="apply_w mt14">如果您希望交换友情链接,并符合以上条件,欢迎联系我们</div>
						<div class="apply_w mt10">E-mail：<?php echo Yii::app()->config->get('webmaster_email'); ?></div>

						<div class="apply_t mt14">本站链接信息：</div>
						<div class="apply_w mt10">网站地址:http://<?php echo Yii::app()->request->serverName ?></div>
						<div class="apply_w mt10">网站名称:<?php echo Yii::app()->name ?></div>
						<div class="apply_w mt10">文字说明:<?php echo Yii::app()->name ?>,与最会网购的MM一起逛街,轻松淘衣服</div>
					</div>
				</div>
			</div>
		</div>
		<script type="text/javascript">
        	$(function(){
        		$('.textlink').hover(function(){
        			$(this).addClass('li1');
        		},
        		function(){
        			$(this).removeClass('li1');
        		});
        	});
        </script>


	</div>

	<div class="clear"></div>
</div>