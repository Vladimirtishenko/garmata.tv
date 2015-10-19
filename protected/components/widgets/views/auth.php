<?php ?>



<?php $form=$this->beginWidget('CActiveForm', array(
    'htmlOptions' =>array('class'=>'sing'),
    'id'=>'login-form',
    'action'=>'/site/login',
    'enableClientValidation'=>true,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
    ),
)); ?>

<?php echo $form->emailField($model,'username', array('placeholder'=>'Введите Email...', 'class'=>'input', 'required'=>'required')); ?>

<div class="input-addon">
    <?= CHtml::tag('button',
        array(),
        '<i class="fa fa-group"></i>'); ?>
</div>

<?php echo $form->passwordField($model,'password', array('placeholder'=>Yii::t('main', 'Введіть пароль...'), 'class'=>'input', 'required'=>'required')); ?>
<label class="input-checkbox" for="checkbox-1">
    <div class="custom-input">
        <input id="checkbox-1" type="checkbox" name="checkboxes[]">
        <label class="checkbox" for="checkbox-1"></label>
    </div> &nbsp; <?= Yii::t('main', 'Натисныть сюди, якщо Ви не зареєстровані!'); ?>
</label>
<?php $this->endWidget(); ?>
