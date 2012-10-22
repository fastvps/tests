<?php
/* @var $this QuestionController */
/* @var $model Question */

$this->breadcrumbs=array(
	'Вопросы'=>array('index'),
	'Добавить вопрос',
);

$this->menu=array(
	array('label'=>'Список вопросов', 'url'=>array('index')),
	array('label'=>'Управление вопросами', 'url'=>array('admin')),
);
?>

<h1>Добавить вопрос</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>