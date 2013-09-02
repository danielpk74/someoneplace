<?php
/* @var $this ZoneController */
/* @var $model ZoneRecord */

$this->breadcrumbs=array(
	'Zone Records'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ZoneRecord', 'url'=>array('index')),
	array('label'=>'Manage ZoneRecord', 'url'=>array('admin')),
);
?>

<h1>Create ZoneRecord</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>