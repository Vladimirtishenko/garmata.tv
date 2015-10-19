<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
?>

<div class="form-box" id="login-box">
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'login-form',
        'enableClientValidation'=>true,
        'clientOptions'=>array(
            'validateOnSubmit'=>true,
        ),
    )); ?>
    <div class="body bg-gray">
        <div class="form-group">
            <?php echo $form->textField($model,'username',array('placeholder'=>'Имя пользователя', 'class'=>'form-control')); ?>
            <?php echo $form->error($model,'username'); ?>
        </div>
        <div class="form-group">
            <?php echo $form->passwordField($model,'password',array('placeholder'=>'Пароль', 'class'=>'form-control')); ?>
            <?php echo $form->error($model,'password'); ?>
        </div>
        <div class="form-group">
            <?php echo $form->checkBox($model,'rememberMe'); ?> &nbsp;
            <?php echo $form->label($model,'rememberMe'); ?>
            <?php echo $form->error($model,'rememberMe'); ?>
        </div>
    </div>
    <div class="footer">
        <?php echo CHtml::submitButton('Войти',array('class'=>'btn bg-olive btn-block')); ?>
    </div>
    <?php $this->endWidget(); ?>
</div><!-- form -->
