<?php 
return array(
	'activeForm'=> array(
		'id'=>'edit-form',
		'enableAjaxValidation'=>true,
		'htmlOptions'=> array('enctype'=>'multipart/form-data'),
		'clientOptions'=>array('validateOnSubmit'=>true, 'validateOnChange'=>true),
	),
	'elements'=>array(
        'category_id'=>array(
            'type'=>'backend.extensions.ShopCategoryDropDownList',
            'attributes'=>array('group'=>true, 'level'=>2), 
            'htmlOptions'=>array('empty'=>'请选择'),
	        ),
        'nick'=>array(
            'type'=>'text',
            'hint'=>'若是淘宝店铺，则将根据此昵称获取店铺标识，请确保广告联盟中淘宝客的设置正确（若淘宝开放平台权限不足，可不填写）',
        ),
        'name'=>array(
            'type'=>'text',
            'attributes'=>array('size'=>40),
            'hint'=>'若填写了淘宝卖家昵称，且这家店参与了淘宝客推广，此处可以随意填写，将自动修改为准确的店铺名称',
            ),
        'url'=>array(
            'type'=>'text',
            'attributes'=>array('size'=>40),
        ),
        'logo'=>array(
            'type'=>'ext.FilefieldWidget',
        	'htmlOptions'=>array('size'=>'40'),
        	'thumbOptions'=>array('height'=>200, 'width'=>200),
        	'enableAjaxValidation'=>false,
        	'hint'=>'若是淘宝店铺将自动抓取；重新上传将会覆盖已上传的图片/文件',
            ),
        'tags'=>array(
            'type'=>'text',
            'attributes'=>array('size'=>40),
            'hint'=>'半角英文空格隔开多个标签',
            ),
        'brand'=>array(
            'type'=>'text',
            'attributes'=>array('size'=>40),
            ),
        'brand_intro'=>array(
            'type'=>'textarea',
            'attributes'=>array('cols'=>60, 'rows'=>5),
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