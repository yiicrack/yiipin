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
            'type'=>'backend.extensions.GoodsCategoryDropDownList',
            'attributes'=>array('group'=>false, 'level'=>1),
            ),
        'name'=>array(
            'type'=>'text',
            ),
        'keywords'=>array(
            'type'=>'textarea',
            'attributes'=>array('cols'=>50, 'rows'=>5),
            ),
        'description'=>array(
            'type'=>'textarea',
            'attributes'=>array('cols'=>50, 'rows'=>5),
            ),
        'tag_groups'=>array(
            'type'=>'textarea',
            'attributes'=>array('cols'=>50, 'rows'=>5),
            'hint'=>'每行一个，用换行隔开',
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