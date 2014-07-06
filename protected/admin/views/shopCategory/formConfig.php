<?php 
return array(
	'activeForm'=> array(
		'id'=>'edit-form',
		'enableAjaxValidation'=>true,
		'htmlOptions'=> array('enctype'=>'multipart/form-data'),
		'clientOptions'=>array('validateOnSubmit'=>true, 'validateOnChange'=>true),
	),
	'elements'=>array(
        'parent_id'=>array(
            'type'=>'backend.extensions.ShopCategoryDropDownList',
            'attributes'=>array('group'=>false, 'level'=>1),
            ),
        'name'=>array(
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