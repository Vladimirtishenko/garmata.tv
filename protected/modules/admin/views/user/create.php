<?php
/* @var $this UserController */
/* @var $model User */
$this->actionHeader = Yii::t('main', 'Добавление').' '.'User';
$this->breadcrumbs=array(
	'Users'=>array('index'),
	Yii::t('main', 'Добавление'),
);
?>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>