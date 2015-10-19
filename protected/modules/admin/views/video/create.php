<?php
/* @var $this VideoController */
/* @var $model Video */
$this->actionHeader = Yii::t('main', 'Добавление').' '.'Video';
$this->breadcrumbs=array(
	'Videos'=>array('index'),
	Yii::t('main', 'Добавление'),
);
?>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>