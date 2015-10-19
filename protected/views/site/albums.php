<?php
?>

<div class="outerSectionMain">
    <section class="main">
        <div class="outerLevel1">
            <div class="videoBlock pageWithoutTop">
                <hr>
                <h1><?=Yii::t('main', 'Останні фоторепортажі'); ?></h1>
                <div class="carousel carousel--wide" data-carousel>
                    <!-- Items to cycle -->
                    <div class="carousel-items">
                        <ul data-carousel-items>
                            <?php foreach($lastPhotos as $photo): ?>
                                <li>
                                    <a href="<?= Yii::app()->createUrl('/site/photos', array('id'=>$photo->id)); ?>">
                                        <img src="<?= Yii::app()->baseUrl.'/uploads/galery/category/'.$photo->image; ?>" alt="" class="fluid">
                                    </a>
                                    <span class="iconsforNews"><i class="fa fa-image hoverIco"></i></i></span>
                                    <div class="forTextPageVideo">
                                        <h3>
                                            <a href="<?= Yii::app()->createUrl('/site/photos', array('id'=>$photo->id)); ?>"><?= Yii::app()->language == 'ru' ? $photo->title_ru : $photo->title_uk; ?></a>
                                        </h3>
                                        <p><?= Yii::app()->language == 'ru' ? $photo->short_ru : $photo->short_uk; ?></p>
                                        <h4>
                                            <?= Yii::app()->language == 'ru' ? $photo->category->title_ru : $photo->category->title_uk; ?>
                                        </h4>
                                        <span><?= $this->getStringDate($photo->date); ?> &nbsp;
                                            <i class="fa fa-eye"></i> <?= (int)$photo->views; ?></span>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <a href="javascript:;" class="carousel-prev" data-carousel-prev><span class="caret-left"></span></a>
                    <a href="javascript:;" class="carousel-next" data-carousel-next><span class="caret-right"></span></a>
                    <div class="carousel-tabs">
                        <ol class="bullets" data-carousel-tabs>
                            <?php foreach($lastPhotos as $photo): ?>
                                <li><a href="javascript:;"></a></li>
                            <?php endforeach; ?>
                        </ol>
                    </div>

                </div>
                <div class="allVideoPage">
                    <hr>
                    <h1><?=Yii::t('main', 'Всі фоторепортажі'); ?></h1>

                    <?php
                    $this->widget('zii.widgets.CListView', array(
                        'dataProvider'=>$data,
                        'ajaxUpdate'=>false,
                        'itemView'=>'_albums',
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
            <div class="allmini pageWithoutTop">
                <?php $this->widget('application.components.widgets.StreemsWidget'); ?>
                <?php $this->widget('application.components.widgets.AllNewsWidget', array('limit'=>50, 'showPictures'=>false)); ?>
            </div>
        </div>
    </section>
</div>
