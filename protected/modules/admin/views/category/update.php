<?php
/* @var $this CategoryController */
/* @var $model Category */
$this->actionHeader = Yii::t('main', 'Редактирование').' '.'Category'.' '.$model->id;
$this->breadcrumbs=array(
	'Categories'=>array('index'),
	Yii::t('main', 'Редактирование'),
);
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>