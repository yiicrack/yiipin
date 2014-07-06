<?php
$this->breadcrumbs=array(
    '数据库恢复',
);

?>

<div class="col-tab">
  <div class="contentList pad-10" id="div_setting_1">
<h2>现有数据备份记录</h2>
<form name="myform" method="post" action="<?php echo $this->createUrl('restore', array('act'=>'database_delete')); ?>">
<div class="table-list">
<table cellpadding="2" cellspacing="1" class="items">
<thead>
    <tr> 
      <th width="50" class="tablerow"> 
        <input type="checkbox" name="chkall" onclick="$('input[name=\'delete[]\']').attr('checked', this.checked);" class="txtnobd">
        删?</th>
      <th class="tablerow">文件名</th>
      <th class="tablerow">时间</th>
      <th class="tablerow">类型</th>
      <th class="tablerow">尺寸</th>
      <th class="tablerow">方式</th>
      <th class="tablerow">卷号</th>
      <th class="tablerow">操作</th>
    </tr>
    </thead>
    <tbody>
    <?php echo $exportinfo ?>
    </tbody>
    <tr> 
      <td colspan="9" style="text-align: left;"> 
        <input name="deletesubmit" type="submit" value=" 删除所选 " class="btn">
      </td>
    </tr>
</table>
</div>
</form>

