<p>尊敬的 <?php echo $recipient ?>：

<p>这封信是由 <?php echo Yii::app()->name ?> 发送的。</p>

<p>您收到这封邮件，是因为您的朋友 <b><?php echo $username;?></b>在我们的网站使用邀请功能，<br />
邀请您成功我们网站一员，看看他(她)在说什么吧。</p>

<p>
----------------------------------------------------------------------<br />
邀请!<br />
----------------------------------------------------------------------<br />
</p>

<p>
<?php echo nl2br($content->Body) ?>
</p>



<p><?php echo Yii::app()->name ?> 管理团队<br>
<?php echo CFormatter::formatUrl(Yii::app()->request->getHostInfo()) ?></p>