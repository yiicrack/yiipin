<?php
$this->breadcrumbs=array(
    '数据库优化',
);

?>
<div class="col-tab">
  <div class="contentList pad-10" id="div_setting_1">
  <form name="myform" method="post" action="<?php echo $this->createUrl('optimize', array('act'=>'database_optimize')); ?>">
  <div class="table-list">
<table width="100%" cellpadding="2" cellspacing="1" class="items">
<thead>
<tr>
<th style="text-align:left"><input class="checkbox" type="checkbox" name="chkall" onclick="$('input[name^=optimizetables]').attr('checked', $(this).attr('checked')=='checked')" checked="checked">优化?</th><th style="text-align:left">数据表</th><th>类型</th><th>记录数</th>
<th>数据</th><th>索引</th><th>碎片</th>
</tr>
</thead>
<tbody>
<? if(isset($tabs)&&is_array($tabs)) foreach($tabs as $tab){ ?>
<tr>
<td class="tablerow" style="text-align:left"><input class="checkbox" type="checkbox" name="optimizetables[]" value="<?=$tab['Name']?>" <?=$tab['checked']?>></td>
<td class="tablerow" style="text-align:left"><?=$tab['Name']?></td>
<td class="tablerow"><?=$tab['Engine']?></td>
<td class="tablerow"><?=$tab['Rows']?></td>
<td class="tablerow"><?=$tab['Data_length']?></td>
<td class="tablerow"><?=$tab['Index_length']?></td>
<td class="tablerow"><?=$tab['Data_free']?></td>
</tr>
<? } ?>

<? if(isset($optabs) && is_array($optabs)) foreach($optabs as $optab){ ?>
<tr>
<td class="tablerow" style="text-align:left"><?=$optab['optimized']?></td>
<td class="tablerow" style="text-align:left"><?=$optab['Name']?></td>
<td class="tablerow"><?=$optab['Engine']?></td>
<td class="tablerow"><?=$optab['Rows']?></td>
<td class="tablerow"><?=$optab['Data_length']?></td>
<td class="tablerow"><?=$optab['Index_length']?></td>
<td class="tablerow">0</td>
</tr>
<? } ?>
</tbody>
<tr><td colspan="7" class="tablerow">尺寸:<?= UtilHelper::sizecount($totalsize) ?></td></tr>
<tr><td colspan="7" bgcolor="#E1E1E1"><input class="button" type="submit" <? if(isset($optabs)){ echo 'disabled'; } ?> name="optimizesubmit" value=" 提 交 "></td></tr>
</table>
</div>
</form>
</div>
</div>

