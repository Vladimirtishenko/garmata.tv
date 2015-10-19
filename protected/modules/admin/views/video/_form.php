<?php
/* @var $this VideoController */
/* @var $model Video */
/* @var $form CActiveForm */
$newImageName = uniqid();
Yii::app()->clientScript->registerScriptFile($this->module->assetsUrl.'/js/jquery.Jcrop.js',
    CClientScript::POS_END);
Yii::app()->clientScript->registerCssFile($this->module->assetsUrl.'/css/jquery.Jcrop.css');
?>
<div class="row">
    <?php $form=$this->beginWidget('CActiveForm', array(
                'id'=>'video-form',
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
                    <div id="images">
                        <?php if(!$model->isNewRecord): ?>
                            <?= CHtml::image(Yii::app()->baseUrl.'/uploads/video/'.$model->image); ?>
                            <?= $form->hiddenField($model, 'image'); ?>
                        <?php endif; ?>
                        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                            <?php echo $model->isNewRecord ? Yii::t('main', 'Добавить фото') : Yii::t('main', 'Загррузить новое фото'); ?>
                        </button>
                    </div>
                </div>
                	            
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
                    <?= $form->labelEx($model,'short_ru'); ?>
                    <div class="input-group">
                        <?= $form->textField($model,'short_ru',array('size'=>60,'maxlength'=>150, 'class'=>'form-control')); ?>
                        <span class="input-group-addon" id="short_ru"></span>
                    </div>
                    <?= $form->error($model,'short_ru'); ?>
                </div>


                <div class="form-group">
                    <?= $form->labelEx($model,'short_uk'); ?>
                    <div class="input-group">
                        <?= $form->textField($model,'short_uk',array('size'=>60,'maxlength'=>150, 'class'=>'form-control')); ?>
                        <span class="input-group-addon" id="short_uk"></span>
                    </div>
                    <?= $form->error($model,'short_uk'); ?>
                </div>

            
                <div class="form-group">
                    <?= $form->labelEx($model,'video'); ?>
                    <?= $form->textField($model,'video',array('size'=>60,'maxlength'=>255, 'class'=>'form-control')); ?>
                    <?= $form->error($model,'video'); ?>
                </div>

            
                <div class="form-group">
                    <?php echo $form->labelEx($model,'date'); ?>
                    <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                        'name' => 'date',
                        'model' => $model,
                        'attribute' => 'date',
                        'language' => 'ru',
                        'options'=>array(
                            'showAnim'=>'fold',
                            'dateFormat'=>'yy-mm-dd',
                            'onSelect'=>'js:function(i,j){

                       function JSClock() {
                          var time = new Date();
                          var hour = time.getHours();
                          var minute = time.getMinutes();
                          var second = time.getSeconds();
                          var temp="";
                          temp +=(hour<10)? "0"+hour : hour;
                          temp += (minute < 10) ? ":0"+minute : ":"+minute ;
                          temp += (second < 10) ? ":0"+second : ":"+second ;
                          return temp;
                        }

                        $v=$(this).val();
                        $(this).val($v+" "+JSClock());

                 }'
                        ),
                        'htmlOptions' => array(
                            'style' => 'height:40px;',
                            'class' => 'form-control'
                        ),
                    ));?>
                    <?php echo $form->error($model,'date'); ?>
                </div>


                <div class="form-group">
                    <?= $form->labelEx($model,'category_id'); ?>
                    <?= $form->dropDownList($model,'category_id', CHtml::listData(Category::model()->findAll(array('order' => 'title_ru ASC')), 'id', 'title_ru'), array('empty'=>'Выберите категорию', 'class'=>'form-control')); ?>
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
                    <?= $form->labelEx($model,'description_ru'); ?>
                    <?php $this->widget('application.extensions.eckeditor.ECKEditor', array(
                        'model'=>$model,
                        'attribute'=>'description_ru',
                        'config'=>array(
                            'filebrowserUploadUrl' => $this->createUrl('/admin/upload/index/'),//Конфиг вставлять сюда
                        ),
                    ));
                    ?>
                    <?= $form->error($model,'description_ru'); ?>
                </div>


                <div class="form-group">
                    <?= $form->labelEx($model,'description_uk'); ?>
                    <?php $this->widget('application.extensions.eckeditor.ECKEditor', array(
                        'model'=>$model,
                        'attribute'=>'description_uk',
                        'config'=>array(
                            'filebrowserUploadUrl' => $this->createUrl('/admin/upload/index/'),//Конфиг вставлять сюда
                        ),
                    ));
                    ?>
                    <?= $form->error($model,'description_uk'); ?>
                </div>


                <div class="form-group">
                    <?= $form->labelEx($model,'reclame'); ?>
                    <?= $form->dropDownList($model,'reclame',array(0 => Yii::t('main', 'Ні'), 1 => Yii::t('main', 'Так')), array('class'=>'form-control')); ?>
                    <?= $form->error($model,'reclame'); ?>
                </div>

                <div class="form-group">
                    <?= $form->labelEx($model,'redaction_chose'); ?>
                    <?= $form->dropDownList($model,'redaction_chose',array(0 => Yii::t('main', 'Ні'), 1 => Yii::t('main', 'Так')), array('class'=>'form-control')); ?>
                    <?= $form->error($model,'redaction_chose'); ?>
                </div>

                <div class="form-group">
                    <?= $form->labelEx($model,'in_slider'); ?>
                    <?= $form->dropDownList($model,'in_slider',array(0 => Yii::t('main', 'Ні'), 1 => Yii::t('main', 'Так')), array('class'=>'form-control')); ?>
                    <?= $form->error($model,'in_slider'); ?>
                </div>

                <div class="form-group">
                    <?= $form->labelEx($model,'rss'); ?>
                    <?= $form->dropDownList($model,'rss',array(0 => Yii::t('main', 'Ні'), 1 => Yii::t('main', 'Так')), array('class'=>'form-control')); ?>
                    <?= $form->error($model,'rss'); ?>
                </div>
            </div>
        </div>
    </div>
    <?php $this->endWidget(); ?>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Загрузка и обрезка фото</h4>
            </div>
            <div class="modal-body">
                <?php $form = $this->beginWidget('CActiveForm', array(
                    'id'=>'image-form',
                    'method'=>'POST',
                    'htmlOptions'=>array('enctype'=>'multipart/form-data'),
                )); ?>

                <?php echo $form->labelEx($model,'image'); ?>
                <?php echo $form->fileField($model,'image'); ?>
                <?php echo $form->error($model,'image'); ?>

                <?= CHtml::hiddenField('name', $newImageName); ?>
                <?= CHtml::submitButton('Загрузить', array('class'=>'btn btn-default')); ?>
                <?php $this->endWidget(); ?>

                <?php $form = $this->beginWidget('CActiveForm', array(
                    'id'=>'image-crop',
                    'method'=>'POST',
                    'htmlOptions'=>array('enctype'=>'multipart/form-data'),
                )); ?>

                <div id="done"></div>
                <input type="hidden" id="x" name="x" />
                <input type="hidden" id="y" name="y" />
                <input type="hidden" id="w" name="w" />
                <input type="hidden" id="h" name="h" />

                <?= CHtml::submitButton('Обрезать', array('class'=>'btn btn-default')); ?>
                <?php $this->endWidget(); ?>

            </div>
        </div>
    </div>
</div>
<script>
    $("#image-form").submit(function(event){
        event.preventDefault();
        var data = new FormData($("#image-form")[0]);
        $.ajax({
            type: "POST",
            url: "<?= Yii::app()->createUrl("/admin/video/upload"); ?>",
            data: data,
            contentType: false,
            processData: false,
            success: function(html) {
                $("#image-form").hide();
                $("#image-crop").show();
                $("#done").append(html);
                $("#crop").load(function(){
                    $(this).Jcrop({
                        aspectRatio: 1.46/1,
                        boxWidth: 530,
                        boxHeight: 600,
                        onSelect: updateCoords
                    });
                });
            }
        }).done(function(){

        });
    });
</script>
<script>
    $( document ).ready(function() {
        $("#image-crop").hide();
    });
</script>
<script>
    function updateCoords(c)
    {
        $('#x').val(c.x);
        $('#y').val(c.y);
        $('#w').val(c.w);
        $('#h').val(c.h);
    }

    function checkCoords()
    {
        if (parseInt($('#w').val())) return true;
        alert('Please select a crop region then press submit.');
        return false;
    }
</script>
<script>
    $("#image-crop").submit(function(event){
        event.preventDefault();
        var data = new FormData($("#image-crop")[0]);
        $.ajax({
            type: "POST",
            url: "<?= Yii::app()->createUrl("/admin/video/crop"); ?>",
            data: data,
            contentType: false,
            processData: false,
            success: function(html) {
                $("#images").html(html);
            }
        }).done(function(){

        });
    });
</script>
<script>
    var count_ru = 150, count_uk = 150;
    document.getElementById("Video_short_ru").onkeyup = function () {
        var result = count_ru - this.value.length;
        var newResult = document.getElementById("short_ru");
        newResult.innerHTML = result;
    }
    document.getElementById("Video_short_uk").onkeyup = function () {
        var result = count_ru - this.value.length;
        var newResult = document.getElementById("short_uk");
        newResult.innerHTML = result;
    }
</script>