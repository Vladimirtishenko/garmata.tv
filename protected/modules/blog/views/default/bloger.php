<?php
// @var $user User
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
                        <p><?= Yii::t('main', 'Останній пост'); ?>: <br><span><?= !empty($lastPost) ? date('d-m-Y', strtotime($lastPost->date)) : Yii::t('main', 'У автора немає постів'); ?></span></p>
                    </div>
                    <div>
                        <?= CHtml::image(Yii::app()->baseUrl.'/uploads/users/avatars/'.$user->avatar, $user->username); ?>
                    </div>
                    <div>
                        <p><?= Yii::t('main', 'Професія'); ?>: <br><span><?= $user->profession; ?></span></p>
                        <p><?= Yii::t('main', 'Про автора'); ?>: <br><span><?= $user->description; ?></span></p>
                    </div>
                </div>


                <div class="seenPostAll">
                    <hr>
                    <h1><?= Yii::t('main', 'Пости автора'); ?></h1>
                    <div class="book">
                        <?php
                        $this->widget('zii.widgets.CListView', array(
                            'dataProvider'=>$allPosts,
                            'ajaxUpdate'=>false,
                            'itemView'=>'_bloger_mini_post',
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
                        ));
                        ?>
                    </div>
                    <div class="blogersPageAll">
                        <hr>
                        <h1><?= Yii::t('main', 'Всі блогери'); ?></h1>
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