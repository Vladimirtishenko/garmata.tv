<?php
/* @var $this DefaultController */
/* @var $lastPosts Articles */
/* @var $allPosts Articles */
Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl. '/css/jquery.bxslider.css');
?>


<div class="outerSectionMain">
    <section class="main">
        <hr noshade>
        <h1 class="titleRubrika"><?= Yii::t('main', 'Топ блогери'); ?></h1>
        <div class="topForGarmata blogers">
            <?php foreach($popularBlogers as $bloger): ?>
                <div>
                    <span class="iconsforNews">
                        <i class="fa fa-bookmark-o hoverIco"></i>
                    </span>
                    <?= CHtml::image(Yii::app()->baseUrl.'/uploads/users/avatars/'.$bloger->avatar, $bloger->name); ?>
                    <div class="hiddensTitle">
                        <span>
                            <?php $article = Articles::model()->find(array('condition'=>'author_id = :id', 'params'=>array(':id'=>$bloger->id), 'limit'=>1, 'order'=>'date DESC')); ?>
                            <b><?= Yii::t('main', 'Останній пост'); ?>:</b> &nbsp; <?= date('d-m-Y', strtotime($article->date)); ?> &nbsp;
                            <i class="fa fa-eye"></i><?= !empty($article) ? (int)$article->views : Yii::t('main', 'У автора немає постів'); ?>
                        </span>
                        <h3>
                            <?= CHtml::link($bloger->name, array('/blog/default/bloger', 'id'=>$bloger->id)); ?>
                        </h3>
                        <span class="whois"><?= CHtml::encode($bloger->description); ?></span>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="outerLevel1 blogerBlockForMargin">
            <div class="videoBlock">
                <hr>
                <h1><?= Yii::t('main', 'Всі блогери'); ?></h1>
                <div class="containerBloger">
                    <?php foreach($allBlogers as $bloger): ?>
                        <?php $article = Articles::model()->find(array('condition'=>'author_id = :id', 'params'=>array(':id'=>$bloger->id), 'limit'=>1, 'order'=>'date DESC')); ?>
                        <?php if(!empty($article)):?>
                        <div class="items">
                            <?= CHtml::image(Yii::app()->baseUrl.'/uploads/users/avatars/'.$bloger->avatar, $bloger->name); ?>
                            <div class="rating">
                                <p><i class="fa fa-bookmark hoverIco"></i> &nbsp;&nbsp;
                                    <?= CHtml::link($bloger->name, array('/blog/default/bloger', 'id'=>$bloger->id)); ?>
                                    <br>
                                    <span>
                                        <b><?= Yii::t('main', 'Останній пост'); ?>:</b> &nbsp; <?= !empty($article) ? date('d-m-Y', strtotime($article->date)) : Yii::t('main', 'У автора немає постів'); ?> &nbsp; <br>
                                        <i class="fa fa-eye"></i> <?= !empty($article) ? (int)$article->views : Yii::t('main', 'У автора немає постів'); ?>
                                    </span>
                                </p>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </div>
                <div class="posts">
                    <hr>
                    <h1><?= Yii::t('main', 'Всі пости'); ?></h1>
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
                </div>


            </div>
            <div class="allmini pageWithoutTop blogersI">
                <?php $this->widget('application.components.widgets.AllNewsWidget', array('limit'=>50, 'showPictures'=>false)); ?>
            </div>
        </div>
    </section>
</div>