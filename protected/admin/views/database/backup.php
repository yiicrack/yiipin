<?php
$this->breadcrumbs=array(
	'数据库备份',
);

?>
<div class="col-tab">
  <div class="contentList pad-10" id="div_setting_1">
  <form name="myform" method="post" action="<?php echo $this->createUrl('backup', array('act'=>'database_export')); ?>">
  <input type="hidden" name="setup" value="1">
<table width="100%" cellpadding="2" cellspacing="1" class="table_form">
  
    <tr> 
      <th colspan="2" style="text-align:left">数据库备份类型</th>
    </tr>
    <tr> 
      <td height="25" colspan="2" class="tablerow" > 
        <input class="radio" type="radio" value="system" name="type" onclick="$('#showtables').hide();" checked="checked">
        全部数据备份 </td>
    </tr>
    <tr> 
      <td height="25" colspan="2" class="tablerow" > 
        <input class="radio" type="radio" value="custom" name="type" onclick="$('#showtables').show();">
        自定义备份（根据需要自行选择需要备份的数据表）</td>
    </tr>
<tbody id="showtables" style="display:none">
    <tr> 
        <td height="25" colspan="2" class="tablerow" >系统数据表</strong> 
          <input class="checkbox" type="checkbox" name="chkall" onclick="$('input[name=\'customtables[]\']').attr('checked', this.checked);" checked="checked">
          <strong>全选</strong> </td>
    </tr>
    <tr> 
      <td height="25" colspan="2" class="tablerow" >
<table width="100%">
<? if(is_array($tabs)) foreach($tabs as $key=>$tab){ ?>
<? if($key%4==0){ ?> <tr> <? } ?>
<td width="25%"><input class="checkbox" type="checkbox" name="customtables[]" value="<?=$tab?>" checked><?=$tab?></td>
<? if($key%4==3){ ?></tr> <? }} ?>
</table>
      </td>
    </tr>
</tbody>
    <tr> 
      <td height="25" colspan="2" class="tablerow" ><input class="checkbox" type="checkbox" value="1" onclick="$('#advanceoption').toggle();">
      更多选项 </td>
    </tr>
<tbody id="advanceoption" style="display: none;">
      <tr> 
        <th colspan="2" style="text-align:left">数据库备份选项</th>
      </tr>
      <tr> 
        <td width="200" height="25" class="tablerow" >分卷备份 - 文件长度限制(kb)</td>
        <td class="tablerow" ><input type="text" size="40" name="sizelimit" value="2048"></td>
      </tr>
      <tr> 
        <td height="25" class="tablerow" >备份文件名:</td>
        <td class="tablerow" ><input type="text" size="40" name="filename" value="<?=date('ymd').'_'.rand(10000,99999)?>.sql" onclick="alert('注意: \n\n数据文件保存在服务器的可见目录下，其他人有    \n可能下载得到这些文件，这是不安全的。因此请    \n在使用随机文件名的同时，适时删除备份文件。');"></td>
      </tr>
</tbody>
    <tr> 
      <td colspan="2"><input name="exportsubmit" type="submit" value=" 开始备份 " class="btn"></td>
    </tr>
  
</table>
</form>
</div>
</div>


