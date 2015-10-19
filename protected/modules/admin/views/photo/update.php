<?php
/* @var $this PhotoController */
/* @var $model Photo */
$this->actionHeader = Yii::t('main', 'Редактирование').' '.'Photo'.' '.$model->id;
$this->breadcrumbs=array(
	'Photos'=>array('index'),
	Yii::t('main', 'Редактирование'),
);
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>