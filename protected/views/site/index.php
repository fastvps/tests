<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h1>FastVPS тесты</h1>
<?php if (Yii::app()->user->isGuest): ?>
    <p>Вы не авторизованы. Пожалуйста, авторизуйтесь!</p>
<div class="form">
    <?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'login-form',
    'action' => Yii::app()->createUrl('site/login'),
    'enableClientValidation'=>true,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
    ),
)); ?>

    <div class="row">
        <?php echo $form->label($model,'email'); ?>
        <?php echo $form->textField($model,'email'); ?>
        <?php echo $form->error($model,'email'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model,'pass'); ?>
        <?php echo $form->passwordField($model,'pass'); ?>
        <?php echo $form->error($model,'pass'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Войти'); ?>
    </div>

    <?php $this->endWidget(); ?>
</div><!-- form -->
<?php else: ?>
    <p>Привет, <?=Yii::app()->user->username; ?>!</p>
        <? if(Yii::app()->user->isAdmin): ?>
        <p>Твой уровень <b>администратор</b>.</p>
            <?php if (!Yii::app()->user->done):  ?>
            <p>Ты еще не прошел тест. <?=CHtml::link('Пройти',Yii::app()->createUrl('site/test'))?>.</p>
                <?php else: ?>
            <p>Тест пройден. Поздравляю! Ты можешь посмотреть <?=CHtml::link('результаты',array('site/result'));?>.</p>
            <?php endif; ?>

            <p>Ты можешь:<br/>
                <?=CHtml::link('управлять пользователями',Yii::app()->createUrl('user/admin'))?><br/>
                <?=CHtml::link('управлять вопросами',Yii::app()->createUrl('question/admin'))?><br/>
                <?=CHtml::link('смотреть статистику',Yii::app()->createUrl('site/stats'))?>

            </p>

        <? endif; ?>
<?php endif; ?>


