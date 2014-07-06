<?php 
return array(
	'activeForm'=> array(
		'id'=>'edit-form',
		'enableAjaxValidation'=>true,
		'htmlOptions'=> array('enctype'=>'multipart/form-data'),
		'clientOptions'=>array('validateOnSubmit'=>true, 'validateOnChange'=>true),
	),
	'elements'=>array(
//         'goods_id'=>array(
//             'type'=>'text',
//             ),
//         'user_id'=>array(
//             'type'=>'text',
//             ),
//         'count'=>array(
//             'type'=>'text',
//             ),
        'status'=>array(
            'type'=>'dropdownlist',
            'items'=>ExchangeOrder::model()->getConstOptions('STATUS'),
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