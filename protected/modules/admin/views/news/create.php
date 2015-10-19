<?php
/* @var $this NewsController */
/* @var $model News */
$this->actionHeader = Yii::t('main', 'Добавление').' '.'News';
$this->breadcrumbs=array(
	'News'=>array('index'),
	Yii::t('main', 'Добавление'),
);
?>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>