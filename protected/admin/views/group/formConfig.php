<?php 
return array(
	'activeForm'=> array(
		'id'=>'edit-form',
		'enableAjaxValidation'=>true,
		'htmlOptions'=> array('enctype'=>'multipart/form-data'),
		'clientOptions'=>array('validateOnSubmit'=>true, 'validateOnChange'=>true),
	),
	'elements'=>array(
        'category_id'=>array(
            'type'=>'dropdownlist',
			'items'=>CHtml::listData(GroupCategory::model()->findAll(array('order'=>'sortnum ASC')), 'id', 'name'),
			'attributes'=>array('empty'=>'请选择'),
            ),
        'name'=>array(
            'type'=>'text',
            ),
//        'image'=>array(
//            'type'=>'file',
//            'enableAjaxValidation'=>false,),
        'banner'=>array(
            'type'=>'ext.FilefieldWidget',
        	'htmlOptions'=>array('size'=>'40'),
        	'thumbOptions'=>array('height'=>200, 'width'=>600),
        	'enableAjaxValidation'=>false,
        	'hint'=>'重新上传将会覆盖已上传的图片/文件',
            ),
        'fans_count'=>array(
            'type'=>'text',
            ),
        'share_count'=>array(
            'type'=>'text',
            ),
        'preface'=>array(
            'type'=>'text',
            ),
        
   	),      
	'buttons'=>array(
        'btnsubmit'=>array(
            'type'=>'submit',
            'label'=>'确定',
    		'class'=>'btn',
        ),
    ),
);  