<?php
/* @var $this UserController */
/* @var $model User */

$this->actionHeader = Yii::t('main', 'Управление').' '.'User';
$this->breadcrumbs=array(
	'Users'=>array('index'),
	Yii::t('main', 'Управление'),
);
?>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h5 class="box-title">
                    User
                </h5>
                <div class="button_save">
                    <?= CHtml::link('<i class="fa fa-plus"></i>'.Yii::t('main', 'Добавить'), array('/admin/user/create'), array('class'=>'pull-right btn btn-info btn-flat')); ?>
                </div>
            </div>
            <div class="box-body">
                <?php $this->widget('application.modules.admin.components.widgets.overWrite.AdminGridView', array(
                'id'=>'user-grid',
                'dataProvider'=>$model->search(),
                'filter'=>$model,
                'columns'=>array(
                				'id',
				'role',
				'username',
				'name',
				'password',
				'reg_date',
	/*
				'birth_date',
				'sex',
				'region',
				'city',
				'email2',
				'avatar',
				'verification',
				'active',
				'description',
				'telephone',
				'profession',
				'location',
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