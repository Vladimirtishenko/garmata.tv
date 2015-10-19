<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php echo "<?php\n"; ?>
/* @var $this <?php echo $this->getControllerClass(); ?> */
/* @var $model <?php echo $this->getModelClass(); ?> */

<?php echo "\$this->actionHeader = Yii::t('main', 'Управление').' '.'$this->modelClass';\n"; ?>
<?php
$label=$this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	'$label'=>array('index'),
	Yii::t('main', 'Управление'),
);\n";
?>
?>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h5 class="box-title">
                    <?php echo "$this->modelClass\n"; ?>
                </h5>
                <div class="button_save">
                    <?php echo "<?= CHtml::link('<i class=\"fa fa-plus\"></i>'.Yii::t('main', 'Добавить'), array('/admin/".$this->class2id($this->ModelClass)."/create'), array('class'=>'pull-right btn btn-info btn-flat')); ?>\n"; ?>
                </div>
            </div>
            <div class="box-body">
                <?php echo "<?php"; ?> $this->widget('application.modules.admin.components.widgets.overWrite.AdminGridView', array(
                'id'=>'<?php echo $this->class2id($this->modelClass); ?>-grid',
                'dataProvider'=>$model->search(),
                'filter'=>$model,
                'columns'=>array(
                <?php
                $count=0;
                foreach($this->tableSchema->columns as $column)
                {
                    if(++$count==7)
                        echo "\t/*\n";
                    echo "\t\t\t\t'".$column->name."',\n";
                }
                if($count>=7)
                    echo "\t\t\t*/\n";
                ?>

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