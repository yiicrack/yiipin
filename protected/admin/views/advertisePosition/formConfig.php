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
			'hint'=>'建议格式为：某某频道_某栏目_某类型',
            ),
        'type'=>array(
            'type'=>'dropdownlist',
            'items'=>AdvertisePosition::model()->getConstOptions('TYPE'),
            'attributes'=>array('empty'=>''),
            'hint'=>'独占广告位是指占有固定大小固定位置的广告位，只能同时出现一个广告；共存广告位是指可并列（通常是纵向）显示多个广告，或者是通过代码实现的，如对联广告、浮标广告等',
            ),
        'width'=>array(
            'type'=>'text',
            'hint'=>'单位：像素'
            ),
        'height'=>array(
            'type'=>'text',
            'hint'=>'单位：像素'
            ),
//         'price'=>array(
//             'type'=>'text',
//             'hint'=>'单位：点，按日计算，设为0则不公开出租'
//             ),
        'intro'=>array(
            'type'=>'textarea',
            'attributes'=>array('rows'=>5, 'cols'=>60),
            'hint'=>'<br />可选填写，描述该广告位的位置特点等',
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