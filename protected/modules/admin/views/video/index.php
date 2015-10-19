<?php
/* @var $this VideoController */
/* @var $model Video */

$this->actionHeader = Yii::t('main', 'Управление').' '.'Video';
$this->breadcrumbs=array(
	'Videos'=>array('index'),
	Yii::t('main', 'Управление'),
);
?>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h5 class="box-title">
                    Video
                </h5>
                <div class="button_save">
                    <?= CHtml::link('<i class="fa fa-plus"></i>'.Yii::t('main', 'Добавить'), array('/admin/video/create'), array('class'=>'pull-right btn btn-info btn-flat')); ?>
                </div>
            </div>
            <div class="box-body">
                <?php $this->widget('application.modules.admin.components.widgets.overWrite.AdminGridView', array(
                'id'=>'video-grid',
                'dataProvider'=>$model->search(),
                'filter'=>$model,
                'columns'=>array(
                				'id',
				'title_ru',
				'title_uk',
				'video',
				'date',
				'description_ru',
	/*
				'description_uk',
				'in_slider',
				'category_id',
			*/

                array(
                    'class'=>'CButtonColumn',
                    'htmlOptions' => array('style'=>'text-align: center; width: 80px;'),
                    'template'=>'{update}&nbsp;{delete}',
                    'buttons' => array(
                        'update' => array(
                            'imageUrl'=>$this->assetsPath.'/images/edit.png',
                        ),
                        'delete' => array(
                            'imageUrl'=>$this->assetsPath.'/images/delete.png',
                        ),
                    ),
                ),
                ),
                )); ?>
            </div>
        </div>
    </div>
</div>