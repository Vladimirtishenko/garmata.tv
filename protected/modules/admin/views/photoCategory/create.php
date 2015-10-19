<?php
/* @var $this PhotoCategoryController */
/* @var $model PhotoCategory */
$this->actionHeader = Yii::t('main', 'Добавление').' '.'PhotoCategory';
$this->breadcrumbs=array(
	'Photo Categories'=>array('index'),
	Yii::t('main', 'Добавление'),
);
?>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>