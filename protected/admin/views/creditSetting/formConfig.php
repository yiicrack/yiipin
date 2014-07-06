<?php 
return array(
	'activeForm'=> array(
		'id'=>'edit-form',
		'enableAjaxValidation'=>true,
		'htmlOptions'=> array('enctype'=>'multipart/form-data'),
		'clientOptions'=>array('validateOnSubmit'=>true, 'validateOnChange'=>true),
	),
	'elements'=>array(
        'name'=>array(
            'type'=>'text',
            'hint'=>'请勿随意修改',
            ),
        'alias'=>array(
            'type'=>'text',
            ),
        'score'=>array(
            'type'=>'text',
            'hint'=>'负数为扣分，正数为加分',
            ),
        'limit'=>array(
            'type'=>'text',
            'hint'=>'0为不限制，正数为限制',
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