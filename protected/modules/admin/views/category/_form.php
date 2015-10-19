<?php
/* @var $this CategoryController */
/* @var $model Category */
/* @var $form CActiveForm */
?>
<div class="row">
    <?php $form=$this->beginWidget('CActiveForm', array(
                'id'=>'category-form',
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
                    <?= $form->labelEx($model,'alias'); ?>
                    <?= $form->textField($model,'alias',array('size'=>60,'maxlength'=>150, 'class'=>'form-control')); ?>
                    <?= $form->error($model,'alias'); ?>
                </div>

            
                <div class="form-group">
                    <?= $form->labelEx($model,'title_ru'); ?>
                    <?= $form->textField($model,'title_ru',array('size'=>60,'maxlength'=>250, 'class'=>'form-control')); ?>
                    <?= $form->error($model,'title_ru'); ?>
                </div>

            
                <div class="form-group">
                    <?= $form->labelEx($model,'title_uk'); ?>
                    <?= $form->textField($model,'title_uk',array('size'=>60,'maxlength'=>250, 'class'=>'form-control')); ?>
                    <?= $form->error($model,'title_uk'); ?>
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
                    <?= $form->labelEx($model,'parent_id'); ?>
                    <?= $form->dropDownList($model,'parent_id', CHtml::listData(Category::model()->findAll(array('order' => 'title_ru ASC')), 'id', 'title_ru'), array('empty'=>'Выберите категорию', 'class'=>'form-control')); ?>
                    <?= $form->error($model,'parent_id'); ?>
                </div>

                <div class="form-group">
                    <?= $form->labelEx($model,'description_ru'); ?>
                    <?= $form->textArea($model,'description_ru',array('rows'=>6, 'cols'=>50, 'class'=>'form-control')); ?>
                    <?= $form->error($model,'description_ru'); ?>
                </div>


                <div class="form-group">
                    <?= $form->labelEx($model,'description_uk'); ?>
                    <?= $form->textArea($model,'description_uk',array('rows'=>6, 'cols'=>50, 'class'=>'form-control')); ?>
                    <?= $form->error($model,'description_uk'); ?>
                </div>


                <div class="form-group">
                    <?= $form->labelEx($model,'meta_title_ru'); ?>
                    <?= $form->textField($model,'meta_title_ru',array('size'=>60,'maxlength'=>250, 'class'=>'form-control')); ?>
                    <?= $form->error($model,'meta_title_ru'); ?>
                </div>


                <div class="form-group">
                    <?= $form->labelEx($model,'meta_title_uk'); ?>
                    <?= $form->textField($model,'meta_title_uk',array('size'=>60,'maxlength'=>250, 'class'=>'form-control')); ?>
                    <?= $form->error($model,'meta_title_uk'); ?>
                </div>


                <div class="form-group">
                    <?= $form->labelEx($model,'meta_description_ru'); ?>
                    <?= $form->textField($model,'meta_description_ru',array('size'=>60,'maxlength'=>250, 'class'=>'form-control')); ?>
                    <?= $form->error($model,'meta_description_ru'); ?>
                </div>


                <div class="form-group">
                    <?= $form->labelEx($model,'meta_description_uk'); ?>
                    <?= $form->textField($model,'meta_description_uk',array('size'=>60,'maxlength'=>250, 'class'=>'form-control')); ?>
                    <?= $form->error($model,'meta_description_uk'); ?>
                </div>


                <div class="form-group">
                    <?= $form->labelEx($model,'meta_keywords_ru'); ?>
                    <?= $form->textField($model,'meta_keywords_ru',array('size'=>60,'maxlength'=>250, 'class'=>'form-control')); ?>
                    <?= $form->error($model,'meta_keywords_ru'); ?>
                </div>


                <div class="form-group">
                    <?= $form->labelEx($model,'meta_keywords_uk'); ?>
                    <?= $form->textField($model,'meta_keywords_uk',array('size'=>60,'maxlength'=>250, 'class'=>'form-control')); ?>
                    <?= $form->error($model,'meta_keywords_uk'); ?>
                </div>
            </div>
        </div>
    </div>
    <?php $this->endWidget(); ?>
</div>