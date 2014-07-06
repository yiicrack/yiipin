<?php
$this->breadcrumbs=array(
	'关注我们',
);?>
<form id="myform" name="myform" action="" method="post">
  <div class="pad-10">

 		<table width="100%" cellpadding="2" cellspacing="1" class="table_form">
            <tbody><tr>
              <th width="100">新浪微博 :</th>
              <td><input type="text" name="follow[weibo_url]" size="50" value="<?php if(isset($follow['weibo_url'])) echo $follow['weibo_url']; ?>" class="input-text"></td>
            </tr>
            <tr>
              <th>腾讯微博 :</th>
              <td><input type="text" name="follow[qqweibo_url]" size="50" value="<?php if(isset($follow['qqweibo_url'])) echo $follow['qqweibo_url']; ?>" class="input-text"></td>
            </tr>
            <tr>
              <th>人人主页 :</th>
              <td><input type="text" name="follow[renren_url]" size="50" value="<?php if(isset($follow['renren_url'])) echo $follow['renren_url']; ?>" class="input-text"></td>
            </tr>
            <tr>
              <th>网易微博 :</th>
              <td><input type="text" name="follow[163_url]" size="50" value="<?php if(isset($follow['163_url'])) echo $follow['163_url']; ?>" class="input-text"></td>
            </tr>
            <tr>
              <th>QQ空间 :</th>
              <td><input type="text" name="follow[qqzone_url]" size="50" value="<?php if(isset($follow['qqzone_url'])) echo $follow['qqzone_url']; ?>" class="input-text"></td>
            </tr>
            <tr>
              <th>豆瓣 :</th>
              <td><input type="text" name="follow[douban_url]" size="50" value="<?php if(isset($follow['douban_url'])) echo $follow['douban_url']; ?>" class="input-text"></td>
            </tr>
        </tbody></table>
      <div class="bk15"></div>

      <div class="btn"><input type="submit" value="保存设置" name="dosubmit" class="button" id="dosubmit"></div>

    </div>


</form>