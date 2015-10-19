<?php
/* @var $this SiteController */
/* @var $mostViewed News */
/* @var $provider News */
?>
<?
$this->metaAttributes[] = '<meta property="og:image" content="http://garmata.tv'.Yii::app()->baseUrl.'/images/garmata.jpg" />';
$this->metaAttributes[]  = '<link rel="image_src" href="http://garmata.tv'.Yii::app()->baseUrl.'/images/garmata.jpg" />';
$this->metaAttributes[]  = '<meta property="image" content="http://garmata.tv'.Yii::app()->baseUrl.'/images/garmata.jpg"/>';
$this->metaAttributes[]  = '<meta property="vk:image" content="http://garmata.tv'.Yii::app()->baseUrl.'/images/garmata.jpg"/>';
?>
<div class="outerSectionMain">
    <section class="main indexPage">
        <div class="outerLevel1">
            <div class="videoBlock">
                <hr>
                <h1><a href="<?= Yii::app()->createUrl('/site/videos'); ?>"><?= Yii::t('main', 'Відеорепортажі'); ?></a></h1>
                <div id="gallery">
                    <div id="slides">
                        <?php foreach($lastVideos as $video): ?>
                            <div class="slides">
                                <img src="<?= Yii::app()->baseUrl.'/uploads/video/'.$video->image; ?>" alt="side" />
                                <div class="transDescription">
                                    <div class="forIcoGenSlide">
                                        <span class="helperSlide"></span>
                                        <a href="<?= Yii::app()->createUrl('/site/video', array('id'=>$video->id)); ?>">
                                            <span><i class="fa fa-play-circle hoverIco"></i></span>
                                        </a>
                                        
                                    </div>
                                    <div class="thisDescr">
                                        <a href="<?= Yii::app()->createUrl('/site/category', array('alias'=>$video->category->alias)); ?>"><?= Yii::app()->language == 'ru' ? $video->category->title_ru : $video->category->title_uk; ?></a>
                                        <span>&nbsp; &mdash; &nbsp; <?= $this->getStringDate($video->date); ?> &nbsp; <i class="fa fa-eye"></i> <?= (int)$video->views; ?></span>
                                        <h3>
                                            <?php if($video->reclame): ?>
                                                <a class="tooltips fa fa-pinterest-p" href="#"><span>Рекламные материалы</span></a>&nbsp; &mdash; &nbsp;
                                            <?php endif; ?>
                                            <a href="<?= Yii::app()->createUrl('/site/video', array('id'=>$video->id)); ?>"><?= Yii::app()->language == 'ru' ? $video->title_ru : $video->title_uk; ?></a>
                                        </h3>
                                        <p><?= Yii::app()->language == 'ru' ? $video->short_ru : $video->short_uk; ?></p>
                                        
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>

                    </div>
                    <div id="menu">
                        <ul>
                            <?php foreach($lastVideos as $video): ?>
                            <li class="menuItem"><a href=""><img src="<?= Yii::app()->baseUrl.'/uploads/video/'.$video->image; ?>" alt="thumbnail" /><span><i class="fa fa-play-circle hoverIco"></i></span></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="allmini">
                <?php $this->widget('application.components.widgets.StreemsWidget'); ?>
                <?php $this->widget('application.components.widgets.MainNewsWidget'); ?>

            </div>
        </div>
        <div class="outerLevel2">
            <?php $this->widget('application.components.widgets.AllNewsWidget', array('limit'=>30, 'justNews'=>true)); ?>
            <?php $this->widget('application.components.widgets.PhotoNewsWidget'); ?>
        </div>
        <div class="materials">
            <hr>
            <h1><?= Yii::t('main', 'Публікації'); ?></h1>
            <div class="outerAllPostIndex">
                <?php foreach($lastNews as $key => $newsShuffle): ?>
                    <div class="blockPhoto itemsIndex wow">
                        <div>
                            <a href="
                                <?php if($newsShuffle['type'] == 'news'): ?>
                                    <?= Yii::app()->createUrl('/site/news', array('id'=>$newsShuffle['id'])); ?>
                                <?php elseif($newsShuffle['type'] == 'photo'): ?>
                                    <?= Yii::app()->createUrl('/site/photos', array('id'=>$newsShuffle['id'])); ?>
                                <?php elseif($newsShuffle['type'] == 'video'): ?>
                                    <?= Yii::app()->createUrl('/site/video', array('id'=>$newsShuffle['id'])); ?>
                                <?php endif; ?>
                            ">
                                <?php if($newsShuffle['type'] == 'news'): ?>
                                    <?= CHtml::image(Yii::app()->baseUrl.'/uploads/news/thumb/'.$newsShuffle['image']); ?>
                                <?php elseif($newsShuffle['type'] == 'photo'): ?>
                                    <?= CHtml::image(Yii::app()->baseUrl.'/uploads/galery/category/'.$newsShuffle['image']); ?>
                                <?php elseif($newsShuffle['type'] == 'video'): ?>
                                    <?= CHtml::image(Yii::app()->baseUrl.'/uploads/video/'.$newsShuffle['image']); ?>
                                <?php endif; ?>
                            </a>


                            <span class="iconsforNews">
                                <?php if($newsShuffle['type'] == 'news'): ?>
                                    <span class="iconsforNews"><i class="fa fa-file hoverIco"></i></span>
                                <?php elseif($newsShuffle['type'] == 'photo'): ?>
                                    <span class="iconsforNews"><i class="fa fa-image hoverIco"></i></span>
                                <?php elseif($newsShuffle['type'] == 'video'): ?>
                                    <span class="iconsforNews"><i class="fa fa-play-circle hoverIco"></i></span>
                                <?php endif; ?>
                            </span>
                        </div>
                        <h4>
                            <?= CHtml::link(Yii::app()->language == 'ru' ? $newsShuffle['category_title_ru'] : $newsShuffle['category_title_uk'], array('/site/category', 'alias'=>$newsShuffle['category_alias'])); ?>
                            <span><?= $this->getStringDate($newsShuffle['date']); ?> &nbsp; 
                                <i class="fa fa-eye"></i> <?= (int)$newsShuffle['views']; ?>
                            </span>
                        </h4>
                        <h5>
                            <?php if($newsShuffle['reclame']): ?>
                                <a class="tooltips fa fa-pinterest-p" href="#"><span>Рекламные материалы</span></a>&nbsp; &mdash; &nbsp;
                            <?php endif; ?>
                            <?php if($newsShuffle['type'] == 'news'): ?>
                                <?= CHtml::link(Yii::app()->language == 'ru' ? $newsShuffle['title_ru'] : $newsShuffle['title_uk'], array('/site/news', 'id'=>$newsShuffle['id'])); ?>
                            <?php elseif($newsShuffle['type'] == 'photo'): ?>
                                <?= CHtml::link(Yii::app()->language == 'ru' ? $newsShuffle['title_ru'] : $newsShuffle['title_uk'], array('/site/photos', 'id'=>$newsShuffle['id'])); ?>
                            <?php elseif($newsShuffle['type'] == 'video'): ?>
                                <?= CHtml::link(Yii::app()->language == 'ru' ? $newsShuffle['title_ru'] : $newsShuffle['title_uk'], array('/site/video', 'id'=>$newsShuffle['id'])); ?>
                            <?php endif; ?>

                        </h5>
                        <p><?= Yii::app()->language == 'ru' ? $newsShuffle['short_ru'] : $newsShuffle['short_uk']; ?></p>
                        <hr>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</div>



