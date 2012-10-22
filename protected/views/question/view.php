<?php
/* @var $this QuestionController */
/* @var $model Question */

$this->breadcrumbs=array(
	'Вопросы'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Список вопросов', 'url'=>array('index')),
	array('label'=>'Добавить вопрос', 'url'=>array('create')),
	array('label'=>'Редактировать вопрос', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить вопрос', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Вы действительно хотите удалить этот вопрос?')),
	array('label'=>'Управление вопросами', 'url'=>array('admin')),
);
?>

<h1>Просмотр вопроса #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'text',
		'variant_a',
		'variant_b',
		'variant_c',
		'right_answer',
	),
)); ?>
