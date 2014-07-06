<p>尊敬的 <?php echo $recipient ?>：

<p>这封信是由 <?php echo Yii::app()->name ?> 发送的。</p>

<p>您收到这封邮件，是因为在我们的网站上这个邮箱地址被登记为会员邮箱，<br />
且该会员请求使用 Email 通知功能所致。</p>

<p>
----------------------------------------------------------------------<br />
重要！<br />
----------------------------------------------------------------------<br />
</p>

<p>如果您没有设置邮件通知功能或不是我们的注册会员，请立即忽略<br />
并删除这封邮件。只在您确认的情况下，才继续阅读下面的内容。</p>
<p>
<?php echo nl2br($content->Body) ?>
</p>
<p>详情请点击：<?php echo CFormatter::formatUrl($url) ?></p>

<p><?php echo Yii::app()->name ?> 管理团队<br>
<?php echo CFormatter::formatUrl(Yii::app()->request->getHostInfo()) ?></p>