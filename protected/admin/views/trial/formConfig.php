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
        'name'=>array(
            'type'=>'text',
            'attributes'=>array('size'=>80),
            ),
        'product_intro'=>array(
            'type'=>'textarea',
            'attributes'=>array('cols'=>80, 'rows'=>5),
            ),
        'product_url'=>array(
            'type'=>'text',
            'attributes'=>array('size'=>80),   
            ),
        'content'=>array(
            'type'=>'textarea',
            'attributes'=>array('rows'=>20, 'style'=>'width:800px'),
            ),
        'stock'=>array(
            'type'=>'text',
            'hint'=>'件，填写数字',
            ),
        'price'=>array(
            'type'=>'text',
            'hint'=>'元，填写数字',
            ),
        'apply_count'=>array(
            'type'=>'text',
            'hint'=>'人，填写数字',
            ),
        'image'=>array(
            'type'=>'ext.FilefieldWidget',
        	'htmlOptions'=>array('size'=>'40'),
        	'thumbOptions'=>array('width'=>400),
        	'enableAjaxValidation'=>false,
        	'hint'=>'重新上传将会覆盖已上传的图片',
            ),
        
        'user_id'=>array(
            'type'=>'text',
            ),
        'start_time'=>array(
            'type'=>'text',
            'attributes'=>array('readonly'=>true, 'size'=>20),
            ),
        'end_time'=>array(
            'type'=>'text',
            'attributes'=>array('readonly'=>true, 'size'=>20),
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