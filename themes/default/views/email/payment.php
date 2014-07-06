<p>尊敬的 <?php echo $username; ?>：

<p>这封信是由 <?php echo Yii::app()->name ?> 发送的。</p>

<p>
----------------------------------------------------------------------<br />
充值!<br />
----------------------------------------------------------------------<br />
</p>

<p>
<?php echo nl2br($content->Body) ?>
</p>



<p><?php echo Yii::app()->name ?> 管理团队<br>
<?php echo CFormatter::formatUrl(Yii::app()->request->getHostInfo()) ?></p>