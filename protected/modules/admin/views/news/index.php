<?php
/* @var $this NewsController */
/* @var $model News */

$this->actionHeader = Yii::t('main', 'Управление').' '.'News';
$this->breadcrumbs=array(
	'News'=>array('index'),
	Yii::t('main', 'Управление'),
);
?>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h5 class="box-title">
                    News
                </h5>
                <div class="button_save">
                    <?= CHtml::link('<i class="fa fa-plus"></i>'.Yii::t('main', 'Добавить'), array('/admin/news/create'), array('class'=>'pull-right btn btn-info btn-flat')); ?>
                </div>
            </div>
            <div class="box-body">
                <?php $this->widget('application.modules.admin.components.widgets.overWrite.AdminGridView', array(
                'id'=>'news-grid',
                'dataProvider'=>$model->search(),
                'filter'=>$model,
                'columns'=>array(
                'id',
                'date',
				'title_ru',
				'title_uk',
				//'description_ru',
				//'description_uk',
				'image',
	/*

				'modify_date',
				'views',
				'category_id',
				'tags',
				'galery_id',
				'author',
				'modify_by_id',
				'marker',
				'author_id',
				'in_slider',
				'reclame',
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