<?php
/* @var $this CategoryController */
/* @var $model Category */
$this->actionHeader = Yii::t('main', 'Добавление').' '.'Category';
$this->breadcrumbs=array(
	'Categories'=>array('index'),
	Yii::t('main', 'Добавление'),
);
?>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>