<?php
$this->pageTitle=Yii::app()->name . ' - Error';
$this->breadcrumbs=array(
	'Error',
);
?>
<div id="wrapper">
     <div style="background:#fff;text-align:center;padding:50px;">
    <?php if($code == '404'): ?>
        <img src="<?php echo THEME_DIR ?>/images/error_404.gif" />
    <?php else: ?>
       <img src="<?php echo THEME_DIR ?>/images/error_500.gif" />
    <?php endif;?>
    <div style="width:100%;text-align: center;"><?php echo htmlspecialchars($message); ?></div>
    </div>
</div>
