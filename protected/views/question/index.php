<?php
/* @var $this QuestionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Вопросы',
);

$this->menu=array(
	array('label'=>'Добавить вопрос', 'url'=>array('create')),
	array('label'=>'Управление вопросами', 'url'=>array('admin')),
);
?>

<h1>Список вопросов</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
