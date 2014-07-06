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
            ),
        'title'=>array(
            'type'=>'text',
            ),
        'url'=>array(
            'type'=>'text',
            'attributes'=>array('size'=>40),
            ),
        'sortnum'=>array(
            'type'=>'text',
            'attributes'=>array('size'=>10),
            'hint'=>'数字越大越靠前显示',
            ),
//         'level'=>array(
//             'type'=>'dropdownlist',
//             'items'=>Navlink::model()->getConstOptions('LEVEL'),
//             ),
        'target'=>array(
            'type'=>'dropdownlist',
            'items'=>Navlink::model()->getConstOptions('TARGET'),
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