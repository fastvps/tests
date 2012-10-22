<?php
/* @var $this QuestionController */
/* @var $model Question */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'question-form',
	'enableAjaxValidation'=>false,
));
    $right = array('A' => 'A', 'B' => 'B', 'C' => 'C');
    ?>

	<p class="note">Поля, помеченные как <span class="required">*</span> обязательны для заполнения.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'text'); ?>
		<?php echo $form->textArea($model,'text',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'text'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'variant_a'); ?>
		<?php echo $form->textArea($model,'variant_a',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'variant_a'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'variant_b'); ?>
		<?php echo $form->textArea($model,'variant_b',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'variant_b'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'variant_c'); ?>
		<?php echo $form->textArea($model,'variant_c',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'variant_c'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'right_answer'); ?>
        <div class="compactRadioGroup">
		<?php echo $form->radioButtonList($model,'right_answer',$right); ?>
        </div>
		<?php echo $form->error($model,'right_answer'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->