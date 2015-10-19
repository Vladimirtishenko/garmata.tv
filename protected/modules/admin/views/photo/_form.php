<?php
/* @var $this PhotoController */
/* @var $model Photo */
/* @var $form CActiveForm */
?>
<div class="row">
    <?php $form=$this->beginWidget('CActiveForm', array(
                'id'=>'photo-form',
                'enableAjaxValidation'=>false,
                'htmlOptions' => array('enctype' => 'multipart/form-data'),
            )); ?>
    <div class="col-xs-12">
        <!---- Flash message ---->
         <?php $this->beginWidget('application.modules.admin.components.widgets.FlashWidget',array(
            'params'=>array(
                'model' => $model,
                'form' => null,
            )));
        $this->endWidget(); ?>
        <!---- End Flash message ---->
    </div>

    <div class="col-md-6">
        <div class="box box-primary">

            <div class="box-header">
                <h3 class="box-title">
                    <?= Yii::t('main', 'Основные настройки'); ?>
                </h3>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <?= $form->labelEx($model,'image'); ?>
                    <?php if($model->isNewRecord) {
                        $this->widget('CMultiFileUpload', array(
                            'name'=>'image',
                            'accept' => 'jpeg|jpg|gif|png|JPG',
                            /*'options'=>array(
                                'onFileSelect'=>'function(e, v, m){ alert("onFileSelect - "+v) }',
                                'afterFileSelect'=>'function(e, v, m){ alert("afterFileSelect - "+v) }',
                                'onFileAppend'=>'function(e, v, m){ alert("onFileAppend - "+v) }',
                                'afterFileAppend'=>'function(e, v, m){ alert("afterFileAppend - "+v) }',
                                'onFileRemove'=>'function(e, v, m){ alert("onFileRemove - "+v) }',
                                'afterFileRemove'=>'function(e, v, m){ alert("afterFileRemove - "+v) }',
                            ),*/
                        ));
                    } else {
                        echo CHtml::image('/uploads/images/thumbs/'.$model->name, '');
                    } ?>
                    <?= $form->error($model,'image'); ?>
                </div>

                <div class="form-group">
                    <?= $form->labelEx($model,'category_id'); ?>
                    <?= $form->dropDownList($model,'category_id', CHtml::listData(PhotoCategory::model()->findAll(array('order' => 'title_ru ASC')), 'id', 'title_ru'), array('empty'=>'Выберите категорию', 'class'=>'form-control')); ?>
                    <?= $form->error($model,'category_id'); ?>
                </div>
            </div>

            <div class="box-footer">
                <?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('main', 'Добавить') : Yii::t('main', 'Сохранить'), array('class'=>'btn btn-primary')); ?>
            </div>

        </div>
    </div>
    <div class="col-md-6">
        <div class="box box-success">
            <div class="box-header">
                <h3 class="box-title">
                    <?= Yii::t('main', 'Дополнительные настройки'); ?>
                </h3>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <?= $form->labelEx($model,'title_ru'); ?>
                    <?= $form->textField($model,'title_ru',array('size'=>60,'maxlength'=>255, 'class'=>'form-control')); ?>
                    <?= $form->error($model,'title_ru'); ?>
                </div>

                <div class="form-group">
                    <?= $form->labelEx($model,'title_uk'); ?>
                    <?= $form->textField($model,'title_uk',array('size'=>60,'maxlength'=>255, 'class'=>'form-control')); ?>
                    <?= $form->error($model,'title_uk'); ?>
                </div>

                <div class="form-group">
                    <?= $form->labelEx($model,'description_ru'); ?>
                    <?= $form->textField($model,'description_ru',array('size'=>60,'maxlength'=>255, 'class'=>'form-control')); ?>
                    <?= $form->error($model,'description_ru'); ?>
                </div>


                <div class="form-group">
                    <?= $form->labelEx($model,'description_uk'); ?>
                    <?= $form->textField($model,'description_uk',array('size'=>60,'maxlength'=>255, 'class'=>'form-control')); ?>
                    <?= $form->error($model,'description_uk'); ?>
                </div>
            </div>
        </div>
    </div>
    <?php $this->endWidget(); ?>
</div>