<?php
$this->breadcrumbs=array(
	'焦点图管理',
);

?>

<table class="search-form" width="100%">
	<tr>
		<td>
			<div class="explain-col">
      
    <?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
    
        </div>
		</td>
	</tr>
</table>


<div class="table-list">
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'slideshow-grid',
	'dataProvider'=>$model->search(),
	'selectableRows' => 2,
    'template'=>'{items}<div class="btn"><div id="pages"> {summary}{pager}</div></div>',
	'cssFile'=>false,
    'pager' => array('class'=>'CombPager'),
	'columns'=>array(
		'id',
		'title',
		'url',
		array( 
            'class'=>'EImageColumn',
            'name' => 'image',
            'htmlOptions' => array('style'=>'width:100px'),
        ),
		'token',
		'sortnum',
		'created:datetime',
		array(
			'class'=>'ButtonColumn',
            'viewButtonOptions' => array('target'=>'_self'),
		),
	),
)); ?>
</div>
