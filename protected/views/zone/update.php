<?php
/* @var $this ZoneController */
/* @var $model ZoneRecord */

$this->breadcrumbs=array(
	'Zone Records'=>array('index'),
	$model->zone_id=>array('view','id'=>$model->zone_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ZoneRecord', 'url'=>array('index')),
	array('label'=>'Create ZoneRecord', 'url'=>array('create')),
	array('label'=>'View ZoneRecord', 'url'=>array('view', 'id'=>$model->zone_id)),
	array('label'=>'Manage ZoneRecord', 'url'=>array('admin')),
);
?>

<h1>Update ZoneRecord <?php echo $model->zone_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>