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
			'attributes'=>array('size'=>40),
            ),
        'description'=>array(
            'type'=>'textarea',
            'attributes'=>array('rows'=>5, 'cols'=>60),
            'hint'=>'<br />简要介绍该模板效果及其使用方法、注意事项等',
            ),
        'template'=>array(
            'type'=>'textarea',
            'attributes'=>array('rows'=>20, 'cols'=>80),
            'hint'=>'<br />模板中需要替换的变量用占位符表示，如{图片文件}、{宽度}、{跳转地址}，凡是有“文件”的将提供上传功能，凡是有“地址”的将统计点击次数',
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