<?php
// @var $user User

Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/jquery.Jcrop.js',
    CClientScript::POS_END);
Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/css/jquery.Jcrop.css');
?>

<div class="outerSectionMain">
    <section class="main">
        <div class="outerLevel1">
            <div class="videoBlock pageWithoutTop oneVideoPage">
                <hr>
                <h1><?= $user->name; ?></h1>

                <div class="blogerInfo">
                    <div>
                        <p><?= Yii::t('main', 'Кількість постів'); ?>: <span><?= Articles::model()->count(array('condition'=>'author_id = '.$user->id)); ?></span></p>
                        <?php if(!empty($lastPost)): ?>
                            <p><?= Yii::t('main', 'Останній пост'); ?>: <br><span><?= date('d-m-Y', strtotime($lastPost->date)); ?></span></p>
                        <?php else: ?>
                            <p><?= Yii::t('main', 'Останній пост'); ?>: <br><span>-</span></p>
                        <?php endif; ?>
                        <button class="button showAdd"><?= Yii::t('main', 'Додати пост'); ?></button>
                    </div>
                    <div class="formImgChange">
                        <?= CHtml::image(Yii::app()->baseUrl.'/uploads/users/avatars/'.$user->avatar, $user->username); ?>
                        <a href="#" class="opencrop"><span><?= Yii::t('main', 'Змінити зображення'); ?></span> <i class="fa fa-refresh  hoverIco"></i></a>
                    </div>
                    <div>
                        <div><?= Yii::t('main', 'Професія'); ?>: 
                        <div class="dropRep">
                            <p><i class="fa fa-bookmark hoverIco"></i> Редагувати</p>
                            <div class="inputMrnu">
                            <span class="closX">X</span>
                                <?php $form=$this->beginWidget('CActiveForm', array(
                                    'id'=>'article-form',
                                    'action'=>array('/blog/cabinet/index'),
                                    'enableAjaxValidation'=>true,
                                )); ?>

                                <?= $form->labelEx($user,'profession'); ?>
                                <?= $form->textArea($user,'profession', array('id'=>'forTitle', 'placeholder'=>'Введите название поста')); ?>
                                <?= $form->error($user,'profession'); ?>

                                <?= CHtml::submitButton(Yii::t('main', 'Змiнити'), array('class'=>'button')); ?>
                                <?php $this->endWidget(); ?>
                            </div>
                        </div>
                        <br><span><?= $user->profession; ?></span></div>
                        
                        <div><?= Yii::t('main', 'Про автора'); ?>: 
                        <div class="dropRep">
                            <p><i class="fa fa-bookmark hoverIco"></i> <?= Yii::t('main', 'Редагувати'); ?></p>
                            <div class="inputMrnu">
                            <span class="closX">X</span>
                                <?php $form=$this->beginWidget('CActiveForm', array(
                                    'id'=>'article-form',
                                    'action'=>array('/blog/cabinet/index'),
                                    'enableAjaxValidation'=>true,
                                )); ?>

                                <?= $form->labelEx($user,'description'); ?>
                                <?= $form->textArea($user,'description', array('id'=>'forTitle', 'placeholder'=>'Введите название поста')); ?>
                                <?= $form->error($user,'description'); ?>

                                <?= CHtml::submitButton(Yii::t('main', 'Змiнити'), array('class'=>'button')); ?>
                                <?php $this->endWidget(); ?>
                            </div>
                        </div>
                        <br><span><?= $user->description; ?></span></div>
                    </div>
                </div>

                <?php $form=$this->beginWidget('CActiveForm', array(
                    'id'=>'article-form',
                    'action'=>array('/blog/cabinet/create'),
                    'enableAjaxValidation'=>true,
                    'htmlOptions' => array('enctype' => 'multipart/form-data', 'class'=>'addPost'),
                )); ?>

                <?= $form->labelEx($model,'title'); ?>
                <?= $form->textField($model,'title', array('id'=>'forTitle', 'placeholder'=>'Введите название поста')); ?>
                <?= $form->error($model,'title'); ?>

                <?= $form->labelEx($model,'description'); ?>
                <?php $this->widget('application.extensions.eckeditor.ECKEditor', array(
                    'model'=>$model,
                    'attribute'=>'description',
                    'config'=>array(
                        'filebrowserUploadUrl' => $this->createUrl('/blog/upload/index'),//Конфиг вставлять сюда
                    ),
                ));
                ?>
                <?= $form->error($model,'description'); ?>
                <?= CHtml::submitButton(Yii::t('main', 'Додати пост'), array('class'=>'button')); ?>
                <?php $this->endWidget(); ?>


                <div class="seenPostAll">
                    <hr>
                    <h1><?= Yii::t('main', 'Пости автора'); ?></h1>
                    <div class="book">
                        <?php
                        $this->widget('zii.widgets.CListView', array(
                            'dataProvider'=>$allPosts,
                            'ajaxUpdate'=>true,
                            'itemView'=>'_posts',
                            'template'=>'{items}{pager}',
                            'cssFile'=>false,
                            'pager'=>array(
                                'maxButtonCount' => 5,
                                'lastPageLabel'=>null,
                                'nextPageLabel'=>Yii::t('main', 'Вперед'),
                                'prevPageLabel'=>Yii::t('main', 'Назад'),
                                'firstPageLabel'=>null,
                                'class'=>'CLinkPager',
                                'header'=>false,
                                'cssFile'=>false, // устанавливаем свой .css файл
                                'htmlOptions'=>array('class'=>'pagination'),
                                'selectedPageCssClass'=>'is-active',
                            ),
                            'pagerCssClass'=>'navigation',
                            'sortableAttributes'=>array(
                                'rating',
                                'create_time',
                            ),
                            'itemsCssClass'=>'clear',
                            'htmlOptions'=>array(
                                'id'=>'userList',
                            )
                        ));
                        ?>
                    </div>
                    <div class="blogersPageAll">
                        <hr>
                        <h1>Все блогеры</h1>
                        <div class="containerBloger">
                            <?php foreach($allBlogers as $bloger): ?>
                                <div class="items wow">
                                    <?= CHtml::image(Yii::app()->baseUrl.'/uploads/users/avatars/'.$bloger->avatar, $bloger->name); ?>
                                    <div class="rating">
                                        <p><i class="fa fa-bookmark hoverIco"></i> &nbsp;&nbsp;
                                            <?= CHtml::link($bloger->name, array('/blog/default/bloger', 'id'=>$bloger->id)); ?>
                                            <br>
                                    <span>
                                        <?php $article = Articles::model()->find(array('condition'=>'author_id = :id', 'params'=>array(':id'=>$bloger->id), 'limit'=>1, 'order'=>'date DESC')); ?>
                                        <b><?= Yii::t('main', 'Останній пост'); ?>:</b> &nbsp; <?= !empty($article) ? date('d-m-Y', strtotime($article->date)) : Yii::t('main', 'У автора немає постів'); ?> &nbsp; <br>
                                        <i class="fa fa-eye"></i> <?= !empty($article) ? (int)$article->views : Yii::t('main', 'У автора немає постів'); ?></span>
                                        </p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>

                    </div>

                </div>
            </div>
            <div class="allmini pageWithoutTop">
                <?php $this->widget('application.components.widgets.AllNewsWidget', array('limit'=>50, 'showPictures'=>false)); ?>
            </div>
        </div>
    </section>
</div>

<div class="popupForCropImg">
    <div class="cropArea">
        <div class="closerCrop">
            <span>X</span>
        </div>
        <?php $form = $this->beginWidget('CActiveForm', array(
            'id'=>'image-form',
            'method'=>'POST',
            'action'=>'/blog/cabinet/upload',
            'htmlOptions'=>array('enctype'=>'multipart/form-data'),
        )); ?>

        <?= CHtml::fileField('avatar', '', array('class'=>'form-control')); ?>

        <?= CHtml::submitButton(Yii::t('main', 'Завантажити'), array('class'=>'btn btn-default')); ?>
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

<script>
    $("#image-form").submit(function(event){
        event.preventDefault();
        $(this).find(".btn").css("opacity", ".4").attr("disibled", "disibled");
        var data = new FormData($("#image-form")[0]);
        $.ajax({
            type: "POST",
            url: "<?= Yii::app()->createUrl("/blog/cabinet/upload"); ?>",
            data: data,
            contentType: false,
            processData: false,
            success: function(html) {
                $("#image-form").hide();
                $("#image-crop").css("display", "table-cell");
                $("#done").append(html);
                $("#crop").load(function(){
                    var self = $(this);
                    setTimeout(function () {
                        self.Jcrop({
                            aspectRatio: 4/2.8,
                            boxWidth: 380,
                            boxHeight: 220,
                            onSelect: updateCoords
                        });
                    }, 500)
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
    };

    function checkCoords()
    {
        if (parseInt($('#w').val())) return true;
        alert('Please select a crop region then press submit.');
        return false;
    };
</script>
<script>
    $("#image-crop").submit(function(event){
        event.preventDefault();
        var data = new FormData($("#image-crop")[0]);
        $.ajax({
            type: "POST",
            url: "<?= Yii::app()->createUrl("/blog/cabinet/crop"); ?>",
            data: data,
            contentType: false,
            processData: false,
            success: function(html) {
                $(".formImgChange > img").attr("src", html);
                $(".closerCrop").trigger("click");
                //location.reload();
            }
        }).done(function(){

        });
    });
</script>