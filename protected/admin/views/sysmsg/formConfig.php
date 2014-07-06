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
        'user_id'=>array(
            'type'=>'text',
            'attributes'=>array('size'=>10),
            'hint'=>'若是全局消息，请填写0',
            ),
        'content'=>array(
            'type'=>'textarea',
            'attributes'=>array('rows'=>20, 'style'=>'width:800px'),
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