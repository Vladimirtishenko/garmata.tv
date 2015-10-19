<?php
/* @var $this VideoController */
/* @var $model Video */
$this->actionHeader = Yii::t('main', 'Редактирование').' '.'Video'.' '.$model->id;
$this->breadcrumbs=array(
	'Videos'=>array('index'),
	Yii::t('main', 'Редактирование'),
);
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>