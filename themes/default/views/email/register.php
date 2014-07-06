<p>亲爱的 <?php echo $recipient ?>：

<p>你好，感谢你注册<?php echo Yii::app()->name ?>（<?php echo CFormatter::formatUrl(Yii::app()->request->getHostInfo()) ?>）。</p>

<p>这是一封确认邮件。你的<?php echo Yii::app()->name ?>账户信息如下：</p>

<p>
----------------------------------------------------------------------<br />
登录邮箱: <?php echo $email ?><br />
用户名: <?php echo $recipient ?><br />
----------------------------------------------------------------------<br />
</p>

<p>如果您不是我们的注册会员，请立即忽略并删除这封邮件。</p>
<p>
<?php echo nl2br($content->Body) ?>
</p>
<p>详情请点击：<?php echo CFormatter::formatUrl($url) ?></p>
<p>(如果链接不能点击，请复制并粘贴到浏览器的地址栏，然后按回车键)</p>
<p><?php echo Yii::app()->name ?> 管理团队<br>
<?php echo CFormatter::formatUrl(Yii::app()->request->getHostInfo()) ?></p>