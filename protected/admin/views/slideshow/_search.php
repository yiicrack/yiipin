<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
<table class="noborder">
		<tr>
		<td><?php echo $form->label($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>10,'maxlength'=>90)); ?>
		
		<?php echo $form->label($model,'url'); ?>
		<?php echo $form->textField($model,'url',array('size'=>10,'maxlength'=>100)); ?>
		
		<?php echo $form->label($model,'token'); ?>
		<?php $this->widget('system.web.widgets.CAutoComplete',
              array(
               //'name'=>CHtml::activeName($model, 'name'), 
                 'model'=> $model,
                 'attribute'=>'token',
                         //replace controller/action with real ids
                 'url'=>array('autocomplete'), 
                 'max'=>50, //specifies the max number of items to display
     
                             //specifies the number of chars that must be entered 
                             //before autocomplete initiates a lookup
                 'minChars'=>0, 
                 'delay'=>500, //number of milliseconds before lookup occurs
                 'matchCase'=>false, //match case when performing a lookup?
     
                             //any additional html attributes that go inside of 
                             //the input field can be defined here
                 'htmlOptions'=>array('size'=>'20'), 
     
                 //'methodChain'=>".result(function(event,item){\$(\"#user_id\").val(item[1]);})",
              )
       ); ?></td>
<td>
		<?php echo CHtml::submitButton('搜索', array('class'=>'btn')); ?>
		</td>
</tr>
</table>

<?php $this->endWidget(); ?>
