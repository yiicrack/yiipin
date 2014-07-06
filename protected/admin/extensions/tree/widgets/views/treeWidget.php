<table>
	<tr>
		<td width="250">
<?php echo CHtml::listBox('editor_parentId','',array(),array('size'=>25,'style'=>'width:250px;','ondblclick'=>'editor_children(this.value)'))?>
		</td>
		<td valign="middle" width="50">
<p><input type="button" value="<?php echo Yii::t('tree','update')?>" onClick="return editor_load()"></p>
<p><input type="button" value="<?php echo Yii::t('tree','moveup')?>" onClick="return editor_moveup()"></p>
<p><input type="button" value="<?php echo Yii::t('tree','movedown')?>" onClick="return editor_movedown()"></p>
		</td>
		<td>
<div class="form">
    <div class="row">
        <?php echo Yii::t('tree','name')?>：
        <?php echo CHtml::textField('editor_name'); ?>
        <?php echo CHtml::hiddenField('editor_id'); ?>
        <?php echo CHtml::hiddenField('editor_originalParentId'); ?>
    </div>
    <div class="row">
        <?php echo CHtml::button(Yii::t('tree','create'),array('id'=>'editor_create','onclick'=>'editor_create();')); ?>
        <?php echo CHtml::button(Yii::t('tree','cancel'),array('id'=>'editor_cancel','onclick'=>'editor_cancel();','style'=>'display:none;')); ?>
        <?php echo CHtml::button(Yii::t('tree','update'),array('id'=>'editor_update','onclick'=>'editor_update();','style'=>'display:none;')); ?>
        <?php echo CHtml::button(Yii::t('tree','delete'),array('id'=>'editor_delete','onclick'=>'editor_delete();','style'=>'display:none;')); ?>
    </div>
</div>
		</td>
	</tr>
</table>

<?php
$cs=Yii::app()->getClientScript();
$cs->registerCoreScript('jquery');
?>


<script type="text/javascript">
function editor_cancel() {
	$('#editor_id').val('');
	$('#editor_name').val('');
	$('#editor_originalParentId').val('');
	$('#editor_create').show(); $('#editor_create').attr('disblaed',false);
	$('#editor_update').hide();
	$('#editor_cancel').hide();
	$('#editor_delete').hide();
}

function editor_load() {
	if ($('#editor_parentId')[0].selectedIndex <= 0) {
		alert('<?php echo Yii::t('tree','Please choose the node')?>');
		return;
	}
	
	editor_cancel();//reset buttons

	$.ajax({
		type: "POST",
		url: "<?php echo $this->createUrl('treeLoad')?>",
		data: {'id':$('#editor_parentId').val()},
		dataType: 'json',
		success: function(data){
			$('#editor_id').val(data.id);
			$('#editor_originalParentId').val(data.parent_id);
			$('#editor_name').val(data.name);
			$('#editor_create').hide();
			$('#editor_update').show();
			$('#editor_cancel').show();
			$('#editor_delete').show();
		},
		error: function(XMLHttpRequest, textStatus, errorThrown) {
			alert(XMLHttpRequest.responseText);
		}
	});
}

function editor_children(parentId,selectId) {
	$.ajax({
		type: "POST",
		url: "<?php echo $this->createUrl('treeChildren')?>",
		data: {'parent_id':parentId,'select_id':selectId ? selectId : 0},
		success: function(returned){
			$('#editor_parentId').html(returned);
		}
	});
}

function editor_children_parent(parentId) {
	$.ajax({
		type: "POST",
		url: "<?php echo $this->createUrl('treeChildrenParent')?>",
		data: {'parent_id':parentId},
		success: function(returned){
			$('#editor_parentId').html(returned);
		}
	});
}

function editor_create() {
	if($('#editor_parentId')[0].selectedIndex < 0){
		alert('<?php echo Yii::t('tree','Please choose the parent node')?>');
		return;
	}
	parent_id = $('#editor_parentId').val();
	name     = $('#editor_name').val();
	if($.trim(name) == ''){
		alert("<?php echo Yii::t('tree',"Node name can't for empty")?>");
		return;
	}
	$('#editor_create').attr('disblaed',true);
	$.ajax({
		type: "POST",
		url: "<?php echo $this->createUrl('treeCreate')?>",
		data: {'parent_id':parent_id,'name':name},
		success: function(){
			editor_children(parent_id);
			editor_cancel();
		},
		error: function(XMLHttpRequest, textStatus, errorThrown) {
			alert(XMLHttpRequest.responseText);
		}
	});
}

function editor_update() {
	id     = $('#editor_id').val();
	parent_id = $('#editor_parentId').val();
	name     = $('#editor_name').val();
	if($.trim(name) == ''){
		alert("<?php echo Yii::t('tree',"Node name can't for empty")?>");
		return false;
	}
	if (!parent_id) {
		parent_id = $('#editor_defaultParentId').val();
	}
	if (parent_id == id || !parent_id) {
		parent_id=$('#editor_originalParentId').val();
	}
	_data={};
	_data.id=id;
	_data.name=name;
	_data.parent_id=parent_id;
	$.ajax({
		type: "POST",
		url: "<?php echo $this->createUrl('treeUpdate')?>",
		data: _data,
		success: function(){
			editor_children(parent_id,id);
			editor_cancel();
		},
		error: function(XMLHttpRequest, textStatus, errorThrown) {
			alert(XMLHttpRequest.responseText);
		}
	});
}

function editor_delete() {
    if(!confirm('<?php echo Yii::t('tree',"Are you sure you want to delete")?>')){
        return false;
    }
    $.ajax({
        url: "<?php echo $this->createUrl('treeDelete')?>",
        type: "POST",
        data: {'id':$('#editor_id').val()},
        success: function(){
            editor_cancel();
            editor_children($('#editor_defaultParentId').val());
        },
		error: function(XMLHttpRequest, textStatus, errorThrown) {
			alert(XMLHttpRequest.responseText);
		}
    });
}

function editor_moveup() {
	if ($('#editor_parentId')[0].selectedIndex <= 0) {
		alert('<?php echo Yii::t('tree','Please choose the node')?>');
		return;
	}
	
	$.ajax({
		type: "POST",
		url: "<?php echo $this->createUrl('treeMoveUp')?>",
		data: {'id':$('#editor_parentId').val()},
		success: function(){
            editor_children_parent($('#editor_parentId').val());
        },
		error: function(XMLHttpRequest, textStatus, errorThrown) {
			alert(XMLHttpRequest.responseText);
		}
	});
}


function editor_movedown() {
	if ($('#editor_parentId')[0].selectedIndex <= 0) {
		alert('<?php echo Yii::t('tree','Please choose the node')?>');
		return;
	}
	
	$.ajax({
		type: "POST",
		url: "<?php echo $this->createUrl('treeMoveDown')?>",
		data: {'id':$('#editor_parentId').val()},
		success: function(){
            editor_children_parent($('#editor_parentId').val());
        },
		error: function(XMLHttpRequest, textStatus, errorThrown) {
			alert(XMLHttpRequest.responseText);
		}
	});
}

$(document).ready(function(){
	editor_children(0);
});
</script>