<?php
/* @var $this NewsController */
/* @var $model News */
$this->actionHeader = Yii::t('main', 'Редактирование').' '.'News'.' '.$model->id;
$this->breadcrumbs=array(
	'News'=>array('index'),
	Yii::t('main', 'Редактирование'),
);
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>