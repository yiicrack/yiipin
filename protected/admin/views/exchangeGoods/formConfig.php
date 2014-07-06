<?php 
return array(
	'activeForm'=> array(
		'id'=>'edit-form',
		'enableAjaxValidation'=>true,
		'htmlOptions'=> array('enctype'=>'multipart/form-data'),
		'clientOptions'=>array(
                'validateOnSubmit'=>true,
                'validateOnChange'=>true,
                'beforeValidate'=>'js:function(form){
            editor.sync();
            return true;
         }'
        ),
	),
	'elements'=>array(
        'category_id'=>array(
            'type'=>'dropdownlist',
			'items'=>CHtml::listData(ExchangeCategory::model()->findAll(array('order'=>'sortnum ASC')), 'id', 'name'),
			'attributes'=>array('empty'=>'请选择'),
            ),
        'name'=>array(
            'type'=>'text',
            'attributes'=>array('size'=>'40'),
            ),
        'is_virtual'=>array(
            'type'=>'dropdownlist',
            'items'=>array('1'=>'是', '0'=>'否'),
            'attributes'=>array('separator'=>''),
            'hint'=>'不需要邮寄/快递发货的为虚拟商品',
            ),
        'image'=>array(
            'type'=>'ext.FilefieldWidget',
        	'htmlOptions'=>array('size'=>'40'),
        	'thumbOptions'=>array('width'=>400),
        	'enableAjaxValidation'=>false,
        	'hint'=>'重新上传将会覆盖已上传的图片',
            ),
        'content'=>array(
            'type'=>'textarea',
            'attributes'=>array('rows'=>20, 'style'=>'width:800px'),
            ),
        'stock'=>array(
            'type'=>'text',
            ),
        'exchanged_count'=>array(
            'type'=>'text',
            ),
        'limit'=>array(
            'type'=>'text',
            'hint'=>'0表示没有限制',
            ),
        'credit'=>array(
            'type'=>'text',
            ),
        'sortnum'=>array(
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