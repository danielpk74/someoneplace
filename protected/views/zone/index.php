<?php
/* @var $this ZoneController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Zone Records',
);

$this->menu=array(
	array('label'=>'Create ZoneRecord', 'url'=>array('create')),
	array('label'=>'Manage ZoneRecord', 'url'=>array('admin')),
);
?>

<h1>Zone Records</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
