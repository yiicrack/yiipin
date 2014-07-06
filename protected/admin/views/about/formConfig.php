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
			}',
		),
	),
	'elements'=>array(
        'name'=>array(
            'type'=>'text',
            'hint'=>'用于构成有好URL地址，建议用英文单词或者拼音',
            ),
        'title'=>array(
            'type'=>'text',
            'attributes'=>array('size'=>60),
            ),
        'content'=>array(
            'type'=>'textarea',
                'attributes'=>array('cols'=>110, 'rows'=>20),
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