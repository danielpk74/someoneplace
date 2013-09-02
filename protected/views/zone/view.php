<?php
/* @var $this ZoneController */
/* @var $model ZoneRecord */

$this->breadcrumbs=array(
	'Zone Records'=>array('index'),
	$model->zone_id,
);

$this->menu=array(
	array('label'=>'List ZoneRecord', 'url'=>array('index')),
	array('label'=>'Create ZoneRecord', 'url'=>array('create')),
	array('label'=>'Update ZoneRecord', 'url'=>array('update', 'id'=>$model->zone_id)),
	array('label'=>'Delete ZoneRecord', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->zone_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ZoneRecord', 'url'=>array('admin')),
);
?>

<h1>View ZoneRecord #<?php echo $model->zone_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'zone_id',
		'zone_name',
		'coment',
	),
)); ?>
