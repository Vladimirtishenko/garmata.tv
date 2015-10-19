<?php
/* @var $this UserController */
/* @var $model User */
$this->actionHeader = Yii::t('main', 'Редактирование').' '.'User'.' '.$model->id;
$this->breadcrumbs=array(
	'Users'=>array('index'),
	Yii::t('main', 'Редактирование'),
);
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>