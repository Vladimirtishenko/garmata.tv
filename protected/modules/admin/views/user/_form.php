<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>
<div class="row">
    <?php $form=$this->beginWidget('CActiveForm', array(
                'id'=>'user-form',
                'enableAjaxValidation'=>false,
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
                    <?= $form->labelEx($model,'role'); ?>
                    <?= $form->textField($model,'role',array('size'=>50,'maxlength'=>50)); ?>
                    <?= $form->error($model,'role'); ?>
                </div>

            
                <div class="form-group">
                    <?= $form->labelEx($model,'username'); ?>
                    <?= $form->textField($model,'username',array('size'=>60,'maxlength'=>150)); ?>
                    <?= $form->error($model,'username'); ?>
                </div>

            
                <div class="form-group">
                    <?= $form->labelEx($model,'name'); ?>
                    <?= $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
                    <?= $form->error($model,'name'); ?>
                </div>

            
                <div class="form-group">
                    <?= $form->labelEx($model,'password'); ?>
                    <?= $form->passwordField($model,'password',array('size'=>60,'maxlength'=>255)); ?>
                    <?= $form->error($model,'password'); ?>
                </div>

            
                <div class="form-group">
                    <?= $form->labelEx($model,'reg_date'); ?>
                    <?= $form->textField($model,'reg_date'); ?>
                    <?= $form->error($model,'reg_date'); ?>
                </div>

            
                <div class="form-group">
                    <?= $form->labelEx($model,'birth_date'); ?>
                    <?= $form->textField($model,'birth_date'); ?>
                    <?= $form->error($model,'birth_date'); ?>
                </div>

            
                <div class="form-group">
                    <?= $form->labelEx($model,'sex'); ?>
                    <?= $form->textField($model,'sex'); ?>
                    <?= $form->error($model,'sex'); ?>
                </div>

            
                <div class="form-group">
                    <?= $form->labelEx($model,'region'); ?>
                    <?= $form->textField($model,'region'); ?>
                    <?= $form->error($model,'region'); ?>
                </div>

            
                <div class="form-group">
                    <?= $form->labelEx($model,'city'); ?>
                    <?= $form->textField($model,'city'); ?>
                    <?= $form->error($model,'city'); ?>
                </div>

            
                <div class="form-group">
                    <?= $form->labelEx($model,'email2'); ?>
                    <?= $form->textField($model,'email2',array('size'=>60,'maxlength'=>150)); ?>
                    <?= $form->error($model,'email2'); ?>
                </div>

            
                <div class="form-group">
                    <?= $form->labelEx($model,'avatar'); ?>
                    <?= $form->textField($model,'avatar',array('size'=>60,'maxlength'=>255)); ?>
                    <?= $form->error($model,'avatar'); ?>
                </div>

            
                <div class="form-group">
                    <?= $form->labelEx($model,'verification'); ?>
                    <?= $form->textField($model,'verification',array('size'=>60,'maxlength'=>255)); ?>
                    <?= $form->error($model,'verification'); ?>
                </div>

            
                <div class="form-group">
                    <?= $form->labelEx($model,'active'); ?>
                    <?= $form->textField($model,'active'); ?>
                    <?= $form->error($model,'active'); ?>
                </div>

            
                <div class="form-group">
                    <?= $form->labelEx($model,'description'); ?>
                    <?= $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
                    <?= $form->error($model,'description'); ?>
                </div>

            
                <div class="form-group">
                    <?= $form->labelEx($model,'telephone'); ?>
                    <?= $form->textField($model,'telephone',array('size'=>50,'maxlength'=>50)); ?>
                    <?= $form->error($model,'telephone'); ?>
                </div>

            
                <div class="form-group">
                    <?= $form->labelEx($model,'profession'); ?>
                    <?= $form->textField($model,'profession',array('size'=>60,'maxlength'=>255)); ?>
                    <?= $form->error($model,'profession'); ?>
                </div>

            
                <div class="form-group">
                    <?= $form->labelEx($model,'location'); ?>
                    <?= $form->textField($model,'location',array('size'=>60,'maxlength'=>150)); ?>
                    <?= $form->error($model,'location'); ?>
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
        </div>
    </div>
    <?php $this->endWidget(); ?>
</div>