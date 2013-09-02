<?php
/* @var $this ZoneController */
/* @var $data ZoneRecord */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('zone_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->zone_id), array('view', 'id'=>$data->zone_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('zone_name')); ?>:</b>
	<?php echo CHtml::encode($data->zone_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('coment')); ?>:</b>
	<?php echo CHtml::encode($data->coment); ?>
	<br />


</div>