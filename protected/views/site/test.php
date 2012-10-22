<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Тестирование';
$this->breadcrumbs=array(
	'Тестирование',
);
?>

<h1>Пройти тест</h1>
<? if(!Yii::app()->user->done): ?>
    <div>
        <?php
            $rand = shuffle($question);
            for ($i=0; $i < 10; $i++)
            {
                $right = array('A' => $question[$i]->variant_a, 'B' => $question[$i]->variant_b, 'C' => $question[$i]->variant_c);

                echo '<div class="row">';
                $form=$this->beginWidget('CActiveForm', array(
                    'id'=>'question-form',
                    'enableAjaxValidation'=>false,
                ));
                echo '<p><h5><b>Вопрос №'.($i+1) . '.</b> '.$question[$i]->text . '</h5></p>';
                echo 'Варианты ответов: <br/>';
                echo '<div class="compactRadioGroup">';
                echo $form->radioButtonList($model,'answer_name',$right);
                echo '</div><br/>';
                echo $form->hiddenField($model,'question_id', array('value'=>$question[$i]->id));
                echo CHtml::ajaxSubmitButton('Ответить', '', array(
                                                                'type' => 'POST',
                                                                'replace' => '#button' . $i,
                                                             ),
                                                             array('id'  => 'button' . $i,));
                $this->endWidget();
                echo '</div><br/><br/>';
            }
        ?>
    </div>
        <div class="row"><?=CHtml::link('Результаты', array('site/result'));?></div>
<? endif; ?>