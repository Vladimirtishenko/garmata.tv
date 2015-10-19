<?php
/* @var $this PhotoCategoryController */
/* @var $model PhotoCategory */
$this->actionHeader = Yii::t('main', 'Редактирование').' '.'PhotoCategory'.' '.$model->id;
$this->breadcrumbs=array(
	'Photo Categories'=>array('index'),
	Yii::t('main', 'Редактирование'),
);
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>