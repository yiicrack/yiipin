<?php 
$this->pageTitle = '免费试用';
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/jquery.jcountdown1.3.3.js');
?>
<script type="text/javascript">
$(document).ready(function(){
	$(".countdown").each(function(){
		var time = $(this).attr('end-date');
		$(this).countdown({
			date: time, //Counting FROM a date
			onComplete: function( event ) {
				$(this).html('<span>剩余时间：</span><strong class="f14_f">已结束</strong>');
			},
			htmlTemplate: '<span>剩余时间：</span><strong id="day" class="f20_f">%{d}</strong><span>天</span><strong id="hour" class="f20_f">%{h}</strong><span>时</span><strong id="minute" class="f20_f">%{m}</strong><span>分</span><strong id="seconds" class="f20_f">%{s}</strong><span>秒</span>',
			leadingZero: true,
			direction: "down"
		})
	});
	;
});
</script>
<div class="welfare">
  <div class="wf_l">
    <div class="cata_title">
      <h2>免费试用</h2>
      <span class="gray_f">常来常新，免费试用</span> </div>
    <div class="notice">
      <div class="ico"></div>
      <ul>
      <?php foreach($this->getNextTrials(2) as $data): ?>
        <li> <a class="avatar128_f">
            <?php $this->widget('ext.CacheThumbImageWidget', array('width'=>128, 'height'=>128, 'fullimage'=>false, 'path'=>$data->image)); ?>
            </a>
          <h3><?php echo ModifierHelper::left($data->name, 45); ?></h3>
          <p class="price">共<strong><?php echo $data->stock ?></strong>份   &nbsp;&nbsp;价值：<strong>￥<?php echo $data->price ?></strong> </p>
          <p> 上线时间：<strong><?php echo date('n月j日', strtotime($data->start_time)); ?></strong> &nbsp; </p>
          <p class="begin">即将开始</p>
        </li>
       <?php endforeach; ?>
      </ul>
      <div class="clear_f"></div>
    </div>
    <?php $this->widget('zii.widgets.CListView', array(
                        'dataProvider'=>$dataProvider,
                        'ajaxUpdate'=>false,
              			'cssFile' =>false,
                        'itemView'=>'_listitem',
        				'pager'=>array('class'=>'CLinkPager','maxButtonCount'=>6, 'header'=>'', 'cssFile'=>false),
                        'emptyText'=>'<div class="no_result break-word">暂无免费试用活动，请改日再来关注！</div>',
                        'template'=>'{items}<div class="clear_f"></div>'.($dataProvider->pagination->pageCount > 1 ? '
                                	<div class="c_f">
                                		<div id="pageNav" class="bgcnt">{pager}</div>
                                	</div>':''),
            ));
    ?>

  </div>
  <div class="wf_r">
    <div class="pending">
      <h3 class="f14_f">谁正在申请试用</h3>
      <ul class="tryon">
      <?php foreach($this->getNewOrders(5) as $data): ?>
        <li class=""> 
        <a target="_blank" href="<?php echo $this->createUrl('/person/index', array('user_id'=>$data->user_id)); ?>" class="avatar32_f">
            <img src="<?php echo WebUser::getUcAvatarSrc($data->user_id, 'small'); ?>">
        </a>
          <p><span> <?php echo UtilHelper::sgmdate('Y年n月j日', strtotime($data->created)); ?> </span><a href="<?php echo $this->createUrl('/person/index', array('user_id'=>$data->user_id)); ?>" target="_blank" class="red_f"><?php echo $data->user->username ?></a></p>
          <p class="try_tle">
          <?php echo CHtml::link($data->trial->name, array('/trial/view', 'id'=>$data->trial_id), array('target'=>'_blank')); ?>
          </p>
        </li>
       <?php endforeach;?>
      </ul>
    </div>
    <div class="pending">
      <h3 class="f16_f">关注<?php echo Yii::app()->name; ?></h3>
      <h4 class="p_tle">第一时间获取试用情报</h4>
      <div class="mt10_f"> 
          <?php $follow = Yii::app()->config->get('follow'); ?>
          <?php if($follow['weibo_url']): ?><a target="_blank" href="<?php echo $follow['weibo_url']; ?>" class="wfr_ico1"></a><?php endif;?>
          <?php if($follow['qqweibo_url']): ?><a target="_blank" href="<?php echo $follow['qqweibo_url']; ?>" class="wfr_ico2"></a> <?php endif;?>
          <?php if($follow['renren_url']): ?><a target="_blank" href="<?php echo $follow['renren_url']; ?>" class="wfr_ico3"></a> <?php endif;?>
          <?php if($follow['qqzone_url']): ?><a target="_blank" href="<?php echo $follow['qqzone_url']; ?>" style="margin-right: 0;" class="wfr_ico4"></a> <?php endif;?>
      </div>
      <div class="clear_f"></div>
    </div>
    <div class="pending">
      <h3 class="f16_f">试穿试用合作</h3>
      <ul class="teamwork">
        <li>想为爱美丽们提供优质试用试穿？</li>
        <li>赶快联系我们吧！</li>
        <li><span>QQ：</span><?php echo Yii::app()->config->get('custom_service_qq'); ?></li>
        <li><span>电话：</span><?php echo Yii::app()->config->get('custom_service_phone'); ?></li>
        <li><span>工作时间：</span><?php echo Yii::app()->config->get('custom_service_time'); ?></li>
      </ul>
    </div>
  </div>
</div>
<div class="clear_f"></div>
