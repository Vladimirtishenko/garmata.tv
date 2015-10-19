<?php
/* @var $this PagesController */
/* @var $model Pages */
$this->actionHeader = Yii::t('main', 'Редактирование').' '.'Pages'.' '.$model->id;
$this->breadcrumbs=array(
	'Pages'=>array('index'),
	Yii::t('main', 'Редактирование'),
);
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>