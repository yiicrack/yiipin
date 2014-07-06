<?php
$this->breadcrumbs=array(
    '数据库升级',
);
Yii::app()->clientScript->registerScriptFile('/editarea/edit_area_full.js');
?>

<div class="col-tab">
  <div class="contentList pad-10" id="div_setting_1">
  <form name="myform" method="post" action="<?php echo $this->createUrl('runquery', array('act'=>'database_runquery')); ?>">
<table cellpadding="2" cellspacing="1" class="table_form">
  <tr> 
      <th style="text-align:left;">请将数据库升级语句粘贴在下面（可用{{table}}来忽略表前缀，<span style="color:red">该操作具有危险性，请谨慎使用</span>）：</th>
  </tr>
    <tr> 
      <td height="25" class="tablerow" > 
        <textarea cols="120" rows="15" name="queries" id="queries"></textarea>
      </td>
    </tr>
    <tr> 
      <td> 
        <input name="sqlsubmit" type="submit" value=" 执行 " class="btn"></td>
    </tr>
</table>
</form>
</div>
</div>

<script language="javascript" type="text/javascript">
$(document).ready(function(){
	editAreaLoader.init({
		id : "queries"		// textarea id
		,language: 'zh'
		,syntax: "sql"			// syntax to be uses for highgliting
		,start_highlight: true		// to display with highlight mode on start-up
	});
})

</script>