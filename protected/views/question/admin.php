<?php
/* @var $this QuestionController */
/* @var $model Question */

$this->breadcrumbs=array(
	'Вопросы'=>array('index'),
	'Управление вопросами',
);

$this->menu=array(
	array('label'=>'Список вопросов', 'url'=>array('index')),
	array('label'=>'Добавить вопрос', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('question-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Управление вопросами</h1>

<p>
Здесь ты можешь видеть список вопросов и управлять ими (редактирование, просмотр, удаление, поиск).
</p>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'question-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'text',
		'variant_a',
		'variant_b',
		'variant_c',
		'right_answer',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
