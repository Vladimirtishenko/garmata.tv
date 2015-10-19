<?php
/* @var $this PhotoController */
/* @var $model Photo */

$this->actionHeader = Yii::t('main', 'Управление').' '.'Photo';
$this->breadcrumbs=array(
	'Photos'=>array('index'),
	Yii::t('main', 'Управление'),
);
?>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h5 class="box-title">
                    Photo
                </h5>
                <div class="button_save">
                    <?= CHtml::link('<i class="fa fa-plus"></i>'.Yii::t('main', 'Добавить'), array('/admin/photo/create'), array('class'=>'pull-right btn btn-info btn-flat')); ?>
                </div>
            </div>
            <div class="box-body">
                <?php $this->widget('application.modules.admin.components.widgets.overWrite.AdminGridView', array(
                'id'=>'photo-grid',
                'dataProvider'=>$model->search(),
                'filter'=>$model,
                'columns'=>array(
    				'id',
                    array(
                        'name' => 'images',
                        'value' => '"/uploads/images/thumbs/". $data->image',
                        'type' => 'image',
                        'filter'=>false,
                        'htmlOptions'=>array('class'=>'for-image'),
                    ),
    				'title_ru',
    				'title_uk',
    				array(
                        'name' => 'category_id',
                        'value'=> '$data->album->title_uk',
                    ),
    				'description_ru',
    				'description_uk',
    	/*
    				'image',
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