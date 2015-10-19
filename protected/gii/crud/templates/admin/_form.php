<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php echo "<?php\n"; ?>
/* @var $this <?php echo $this->getControllerClass(); ?> */
/* @var $model <?php echo $this->getModelClass(); ?> */
/* @var $form CActiveForm */
?>
<div class="row">
    <?php echo "<?php \$form=\$this->beginWidget('CActiveForm', array(
                'id'=>'".$this->class2id($this->modelClass)."-form',
                'enableAjaxValidation'=>false,
            )); ?>\n"; ?>
    <div class="col-xs-12">
        <?php echo "<!---- Flash message ---->
         <?php \$this->beginWidget('application.modules.admin.components.widgets.FlashWidget',array(
            'params'=>array(
                'model' => \$model,
                'form' => null,
            )));
        \$this->endWidget(); ?>".'
        <!---- End Flash message ---->'."\n";
        ?>
    </div>

    <div class="col-md-6">
        <div class="box box-primary">

            <div class="box-header">
                <h3 class="box-title">
                    <?php echo "<?= Yii::t('main', 'Основные настройки'); ?>\n"; ?>
                </h3>
            </div>
            <div class="box-body">
                <?= "\t"; ?>
            <?php
            foreach($this->tableSchema->columns as $column)
            {
                if($column->autoIncrement)
                    continue;
                ?>

                <div class="form-group">
                    <?php echo "<?= ".$this->generateActiveLabel($this->modelClass,$column)."; ?>\n"; ?>
                    <?php echo "<?= ".$this->generateActiveField($this->modelClass,$column)."; ?>\n"; ?>
                    <?php echo "<?= \$form->error(\$model,'{$column->name}'); ?>\n"; ?>
                </div>

            <?php
            }
            ?>
                <?= "\r\n"; ?>
            </div>

            <div class="box-footer">
                <?php echo "<?php echo CHtml::submitButton(\$model->isNewRecord ? Yii::t('main', 'Добавить') : Yii::t('main', 'Сохранить'), array('class'=>'btn btn-primary')); ?>\n"; ?>
            </div>

        </div>
    </div>
    <div class="col-md-6">
        <div class="box box-success">
            <div class="box-header">
                <h3 class="box-title">
                    <?php echo "<?= Yii::t('main', 'Дополнительные настройки'); ?>\n"; ?>
                </h3>
            </div>
        </div>
    </div>
    <?php echo "<?php \$this->endWidget(); ?>\n"; ?>
</div>