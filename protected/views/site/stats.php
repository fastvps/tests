<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Статистика';
$this->breadcrumbs=array(
    'Статистика',
);
?>

<h1>Статистика</h1>

<?php
    foreach ($model as $user)
    {
        $result = ($user->done) ? "прошел " : "не прошел ";
        echo '<div class="row">';
        echo '<p>'.CHtml::link($user->name, Yii::app()->createUrl("user/view", array("id"=>$user->id))) . ' ' .
            $result . CHtml::link('тест',Yii::app()->createUrl("site/result", array("id"=>$user->id))) . '</p>';
        echo '</div>';
    }
?>