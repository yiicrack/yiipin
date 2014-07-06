<?php
$this->breadcrumbs=array(
	'商品维护',
);?>
<div class="pad-10">
	<table width="100%" cellpadding="2" cellspacing="1" class="table_form">
		<tbody>
		    <tr>
				<th colspan="2" style="text-align: left; font-weight:bold; background:#f6f6f6">商品维护</th>
			</tr>
			<tr>
				<th width="100">维护说明 :</th>
				<td>将会更新商品的价格、名称等信息，并标记已下架的商品，当用户从搜索引擎搜到过期商品页面，将会被重定向到淘宝的搜索页面，自动带上推广PID，这样不会浪费任何流量。</td>
			</tr>
			<tr>
				<th width="100">维护选项 :</th>
				<td>开始页码：<input id="page" value="1" type="text" class="input-text" size="5" />，每页处理10个商品 <input type="submit" value="开始执行" class="button" id="do_delete"></td>
			</tr>
			<tr>
				<th width="100">执行情况 :</th>
				<td><select id="tip_delete" size="5" style="width:400px"></select></td>
			</tr>
			
		</tbody>
	</table>
</div>
<script type="text/javascript">
$('#do_delete').click(function(){
	var re = /^[1-9]+[0-9]*]*$/; 
	var page = $('#page').val();
	if(!re.test(page)){
	    alert('开始页码必须是数字！');
	    return;
	}
	page = parseInt(page);
	
	$(this).attr('disabled', 'disabled');

	var log = function(msg){
	    $('#tip_delete').append('<option>'+msg+'</option>');
	    if($('#tip_delete option').size()>5){
	    	$('#tip_delete option:eq(0)').remove();
	    }
	}
	
	var delete_goods = function(){
		log('正在执行，请等待（处理第'+ page +'页）……');
		$.ajax({
			type:'GET', 
			url: '<?php echo $this->createUrl('manage'); ?>', 
			data: {act: 'delete', page: page},
		    success: function(response){
				var data = eval('('+response+')');
			    if(data.act == 'next'){
			    	page += 1;
				    log('返回结果'+data.result_count+'条，标记已下架商品' + data.delisted_count + '个，更新商品名称' + data.updated_name_count + '个，更新商品价格' + data.updated_price_count + '个');
			    	delete_goods();
			    }
			    else if(data.act == 'done'){
			    	$('#do_delete').removeAttr('disabled');
			    	log('全部完成！');
			    }
			    
			},
			error: function(xhr){
				alert('发生了错误（可能是API调用次数超过每日限额）：\n'+xhr.responseText);
			}
			});
	}

	delete_goods();
});
</script>