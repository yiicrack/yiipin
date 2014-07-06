<?php 
return array(
	'activeForm'=> array(
		'id'=>'edit-form',
		'enableAjaxValidation'=>true,
		'htmlOptions'=> array('enctype'=>'multipart/form-data'),
		'clientOptions'=>array('validateOnSubmit'=>true, 'validateOnChange'=>true),
	),
	'elements'=>array(
//         'user_id'=>array(
//             'type'=>'text',
//             ),
        'name'=>array(
            'type'=>'text',
            'attributes'=>array('size'=>60),
            ),
	    'category_id'=>array(
            'type'=>'backend.extensions.GoodsCategoryDropDownList',
            'attributes'=>array('group'=>false, 'level'=>2),
	        ),
        'image'=>array(
            'type'=>'ext.FilefieldWidget',
        	'htmlOptions'=>array('size'=>'40'),
        	'thumbOptions'=>array('height'=>200, 'width'=>200),
        	'enableAjaxValidation'=>false,
        	'hint'=>'重新上传将会覆盖已上传的图片/文件',
            ),
        'price'=>array(
            'type'=>'text',
            ),
//         'url'=>array(
//             'type'=>'text',
//             'attributes'=>array('size'=>60),
//             ),
//         'website'=>array(
//             'type'=>'text',
//             ),
        
   	),      
	'buttons'=>array(
        'btnsubmit'=>array(
            'type'=>'submit',
            'label'=>'确定',
    		'class'=>'btn',
        ),
    ),
);  