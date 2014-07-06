<?php
$this->breadcrumbs=array(
	'确认操作',
);?>

	<div class="pad-10">
		<table width="100%" cellpadding="2" cellspacing="1" class="table_form">
			<tbody>
			    <tr>
					<th colspan="2" style="text-align: left; font-weight:bold; background:#f6f6f6">检测到未处理完的采集数据，是继续处理还是放弃重新进行采集？</th>
				</tr>
				<tr>
					<th width="100">未处理信息 :</th>
					<td>
					<ul>
					<?php foreach($taobao_items as $index=>$data):?>
					<li><?php echo ($index+1).'. '.$data[0]['title']; ?></li>
					<?php if($index >= 9) break;endforeach;?>
					<?php if(count($taobao_items)>10):?>
					<li>还有<?php echo count($taobao_items)-10; ?>条信息……</li>
					<?php endif;?>
					</ul>
					</td>
				</tr>
				
			</tbody>
		</table>
		<div class="bk15"></div>
		<div class="btn">
		<table><tr><td>
			<input type="button" value="保留，继续处理" class="button" onclick="window.location.href='<?php echo $this->createUrl('collect/taobao', array('restart'=>0)); ?>'"/>
		</td><td>
			<input type="button" value="放弃，重新开始" class="button" onclick="window.location.href='<?php echo $this->createUrl('collect/taobao', array('restart'=>1)); ?>'"/>
		</td></tr></table>
		</div>
	</div>
