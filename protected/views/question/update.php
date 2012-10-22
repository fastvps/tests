<?php
/* @var $this QuestionController */
/* @var $model Question */

$this->breadcrumbs=array(
	'Вопросы'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Список вопросов', 'url'=>array('index')),
	array('label'=>'Добавить вопрос', 'url'=>array('create')),
	array('label'=>'Просмотр вопроса', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Управление вопросами', 'url'=>array('admin')),
);
?>

<h1>Обновить вопрос #<?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>