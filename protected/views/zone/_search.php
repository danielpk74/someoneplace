<?php
/* @var $this ZoneController */
/* @var $model ZoneRecord */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'zone_id'); ?>
		<?php echo $form->textField($model,'zone_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'zone_name'); ?>
		<?php echo $form->textField($model,'zone_name',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'coment'); ?>
		<?php echo $form->textField($model,'coment',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->