<?php
/* @var $this QuestionController */
/* @var $data Question */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('text')); ?>:</b>
	<?php echo CHtml::encode($data->text); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('variant_a')); ?>:</b>
	<?php echo CHtml::encode($data->variant_a); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('variant_b')); ?>:</b>
	<?php echo CHtml::encode($data->variant_b); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('variant_c')); ?>:</b>
	<?php echo CHtml::encode($data->variant_c); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('right_answer')); ?>:</b>
	<?php echo CHtml::encode($data->right_answer); ?>
	<br />


</div>