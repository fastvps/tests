<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Результаты тестирования';
$this->breadcrumbs=array(
    'Тестирование',
);
?>

<h1>Результаты тестирования</h1>


<? if(Yii::app()->user->done && $id == null): ?>
<p>Вы прошли тестирование!</p>
<? endif; ?>

<?php if (count($model) != 10): ?>
    <h5>Нет ответов на все вопросы. Пройди тест заново!</h5>
<?php Yii::app()->end(); endif; ?>

<?php
$ok = 1;
foreach ($model as $m)
{
    $var = "variant_".$m->answer_name;
    $result = 'Правильно';
    if ($m->answer_name != $m->question->right_answer)
    {
        $ok = 0;
        $result = 'Не правильно';
    }

    echo '<div class="row">';
    echo "<p>Вопрос №" . $m->question_id . '. ' . $m->question->text . '<br/>';
    echo 'Вы ответили: ' . $m->question->$var . '<br/>';
    echo 'Результат: ' . $result . '</p>';
    echo '</div>';
}

if ($ok)
{
    echo '<h3>Вы прошли тест!</h3>';
    $m = User::model()->findByPk(Yii::app()->user->id);
    $m->done = 1;
    $m->save();
}
else
{
    echo '<h3>К сожалению, тест не пройден. Пройдите его '.CHtml::link("заново",array("site/test")).'</h3>';
}
    ?>
