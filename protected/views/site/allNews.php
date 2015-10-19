<?php
// @var $this SiteController
// @var $photoCategories PhotoCategory
// @var $news News
?>

<div class="outerSectionMain">
    <p class="openFoot"><?= Yii::t('main', 'Відкрити'); ?><span class="caret-down"></span></p>
    <p class="toTop"><?= Yii::t('main', 'Вгору'); ?><span class="caret-up"></span></p>
    <section class="main">
        <div class="sectionTwoForAll ">
            <div class="photo">
                <h3><?= Yii::t('main', 'Фото'); ?></h3>
                <hr />
                <?php if(empty($photoCategories)): ?>
                    <div class="blockPhoto">
                        <p class="not-result">
                            <?= Yii::t('main', 'Немає результатів'); ?>
                        </p>
                    </div>
                <?php else: ?>
                    <?php foreach($photoCategories as $photo): ?>
                        <div class="blockPhoto">
                            <?php if(empty($photoCategories)): ?>
                                <p class="not-result">
                                    <?= Yii::t('main', 'Немає результатів'); ?>
                                </p>
                            <?php endif; ?>
                            <div>
                                <a href="<?= Yii::app()->createUrl('/site/photos', array('id'=>$photo->id)); ?>">
                                    <?= CHtml::image(Yii::app()->baseUrl.'/uploads/galery/category/'.$photo->image, Yii::app()->language == 'ru' ? $photo->title_ru : $photo->title_uk); ?>
                                    <span class="iconsforNews"><i class="fa fa-image hoverIco"></i></span>
                                </a>
                            </div>
                            <h4>
                                <?= CHtml::link(Yii::app()->language == 'ru' ? $photo->category->title_ru : $photo->category->title_uk, array('/site/category', 'alias'=>$photo->category->alias)); ?>
                                <span><?= $this->getStringDate($photo->date); ?> &nbsp; 
                                    <i class="fa fa-eye"></i> <?= (int) $photo->views; ?></span></h4>
                            <h5>
                                <?php if($photo->reclame): ?>
                                    <a class="tooltips fa fa-pinterest-p" href="#"><span>Рекламные материалы</span></a>
                                <?php endif; ?>
                                <?= CHtml::link(Yii::app()->language == 'ru' ? $photo->title_ru : $photo->title_uk, array('/site/photos', 'id'=>$photo->id)); ?>
                            </h5>
                            <p><?= Yii::app()->language == 'ru' ? $photo->short_ru : $photo->short_uk; ?></p>
                            <hr>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <div class="news">
                <h3><?= Yii::t('main', 'Новини'); ?></h3>
                <hr />
                <?php if(empty($news)): ?>
                    <div class="blockNews">
                        <p class="not-result">
                            <?= Yii::t('main', 'Немає результатів'); ?>
                        </p>
                    </div>
                <?php else: ?>
                    <?php foreach($news as $new): ?>
                        <div class="blockNews" data-item="<?=$new->category->alias?>">
                            <div>
                                <a href="<?= Yii::app()->createUrl('/site/news', array('id'=>$new->id)); ?>">
                                    <?= CHtml::image(Yii::app()->baseUrl.'/uploads/news/thumb/'.$new->image, Yii::app()->language == 'ru' ? $new->title_ru : $new->title_uk); ?>
                                    <span class="iconsforNews"><i class="fa fa-file hoverIco"></i></span>
                                </a>
                            </div>
                            <h4>
                                <?= CHtml::link(Yii::app()->language == 'ru' ? $new->category->title_ru : $new->category->title_uk, array('/site/category', 'alias'=>$new->category->alias)); ?>
                                <span><?= $this->getStringDate($new->date); ?> &nbsp; 
                                    <i class="fa fa-eye"></i> <?= (int) $new->views; ?></span>
                            </h4>
                            <h5>
                                <?php if($new->reclame): ?>
                                    <a class="tooltips fa fa-pinterest-p" href="#"><span>Рекламные материалы</span></a>
                                <?php endif; ?>
                                <?= CHtml::link(Yii::app()->language == 'ru' ? $new->title_ru : $new->title_uk, array('/site/news', 'id'=>$new->id)); ?>
                            </h5>
                            <p><?= Yii::app()->language == 'ru' ? $new->short_ru : $new->short_uk; ?></p>
                            <hr>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <div class="video">
                <h3><?= Yii::t('main', 'Відео'); ?></h3>
                <hr />
                <?php if(empty($videos)): ?>
                    <div class="blockVideo">
                        <p class="not-result">
                            <?= Yii::t('main', 'Немає результатів'); ?>
                        </p>
                    </div>
                <?php else: ?>
                    <?php foreach($videos as $video): ?>
                        <div class="blockVideo">
                            <div>
                                <a href="<?= Yii::app()->createUrl('/site/video', array('id'=>$video->id)); ?>">
                                    <img src="<?= Yii::app()->baseUrl.'/uploads/video/'.$video->image; ?>" alt="side" />
                                    <span class="iconsforNews"><i class="fa fa-play-circle hoverIco"></i></span>
                                </a>
                            </div>
                            <h4>
                                <?= CHtml::link(Yii::app()->language == 'ru' ? $video->category->title_ru : $video->category->title_uk, array('/site/category', 'alias'=>$video->category->alias)); ?>
                                <span><?= $this->getStringDate($video->date); ?> &nbsp; 
                                    <i class="fa fa-eye"></i> <?= (int) $video->views; ?></span></h4>
                            <h5>
                                <?php if($video->reclame): ?>
                                    <a class="tooltips fa fa-pinterest-p" href="#"><span>Рекламные материалы</span></a>
                                <?php endif; ?>
                                <?= CHtml::link(Yii::app()->language == 'ru' ? $video->title_ru : $video->title_uk, array('/site/video', 'id'=>$video->id)); ?>
                            </h5>
                            <p>
                                <?= Yii::app()->language == 'ru' ? $video->short_ru : $video->short_uk; ?>
                            </p>
                            <hr>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
</div>