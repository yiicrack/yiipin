<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="/images/admin/admincp.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php if(isset($success)&&$success): ?>
<script type="text/javascript">
parent.$('#<?php echo $target ?>').val('<?php echo $filepath ?>');
parent.$.fancybox.close();
</script>
<?php endif; ?>
<form method="post" enctype="multipart/form-data">
<table class="tb tb2 ">
  <tr >
    <td class="td27" >请选择要上传的文件：</td>
  </tr>
 <tr >
    <td>
    <?php echo CHtml::fileField('attach', '', array('size'=>40)); ?>
    <?php if(isset($message)) echo '<br /><span style="color:red">'.$message.'</span>'; ?>
    </td>
  </tr>
   <tr >
    <td>允许最大200KB，格式为 gif、jpg、png、swf</td>
  </tr>
 <tr>
    <td><button class="btn" type="submit" name="button" id="button">上传</button></td>
  </tr>
</table>
<?php echo CHtml::hiddenField('target', $_GET['target']);?>
</form>
</body>
</html>