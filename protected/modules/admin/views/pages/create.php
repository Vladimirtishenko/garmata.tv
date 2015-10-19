<?php
/* @var $this PagesController */
/* @var $model Pages */
$this->actionHeader = Yii::t('main', 'Добавление').' '.'Pages';
$this->breadcrumbs=array(
	'Pages'=>array('index'),
	Yii::t('main', 'Добавление'),
);
?>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>