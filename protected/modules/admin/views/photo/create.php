<?php
/* @var $this PhotoController */
/* @var $model Photo */
$this->actionHeader = Yii::t('main', 'Добавление').' '.'Photo';
$this->breadcrumbs=array(
	'Photos'=>array('index'),
	Yii::t('main', 'Добавление'),
);
?>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>