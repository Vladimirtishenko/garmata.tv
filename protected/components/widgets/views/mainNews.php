<?php
?>
<div class="popular">
    <hr>
    <h2><?= Yii::t('main', 'Популярне'); ?></h2>
    <div class="carousel carousel--wide" data-carousel>
        <!-- Items to cycle -->
        <div class="carousel-items">
            <ul data-carousel-items>
                <?php foreach($model as $news): ?>
                    <li>
                        <a href="
                                <?php if($news['type'] == 'news'): ?>
                                    <?= Yii::app()->createUrl('/site/news', array('id'=>$news['id'])); ?>
                                <?php elseif($news['type'] == 'photo'): ?>
                                    <?= Yii::app()->createUrl('/site/photos', array('id'=>$news['id'])); ?>
                                <?php elseif($news['type'] == 'video'): ?>
                                    <?= Yii::app()->createUrl('/site/video', array('id'=>$news['id'])); ?>
                                <?php endif; ?>
                            ">
                        <?php if($news['type'] == 'news'): ?>
                            <?= CHtml::image(Yii::app()->baseUrl.'/uploads/news/thumb/'.$news['image'], '', array('class'=>'fluid')); ?>
                        <?php elseif($news['type'] == 'photo'): ?>
                            <?= CHtml::image(Yii::app()->baseUrl.'/uploads/galery/category/'.$news['image'], '', array('class'=>'fluid')); ?>
                        <?php elseif($news['type'] == 'video'): ?>
                            <?= CHtml::image(Yii::app()->baseUrl.'/uploads/video/'.$news['image'], '', array('class'=>'fluid')); ?>
                        <?php endif; ?>
                    </a>

                        <div class="descrTitle">
                            <span><?= $this->controller->getStringDate($news['date']); ?> &nbsp;


                                <i class="fa fa-eye"></i> <?= $news['views']; ?>
                            </span>
                            <p>
                                <?php if($news['type'] == 'news'): ?>
                            <?= CHtml::link(Yii::app()->language == 'ru' ? $news['title_ru'] : $news['title_uk'], array('/site/news', 'id'=>$news['id'])); ?>
                        <?php elseif($news['type'] == 'photo'): ?>
                            <?= CHtml::link(Yii::app()->language == 'ru' ? $news['title_ru'] : $news['title_uk'], array('/site/photos', 'id'=>$news['id'])); ?>
                        <?php elseif($news['type'] == 'video'): ?>
                            <?= CHtml::link(Yii::app()->language == 'ru' ? $news['title_ru'] : $news['title_uk'], array('/site/video', 'id'=>$news['id'])); ?>
                        <?php endif; ?>
                            </p>
                            <span class="openClose"><?= Yii::t('main', 'Сховати опис'); ?></span>
                        </div>
                    </li>
                <?php endforeach; ?>

            </ul>
        </div>
        <div class="carousel-tabs">
            <ol class="bullets" data-carousel-tabs>
                <?php foreach($model as $video): ?>
                    <li><a href="javascript:;"></a></li>
                <?php endforeach; ?>
            </ol>
        </div>
        <a href="javascript:;" class="carousel-prev" data-carousel-prev><i class="fa fa-caret-left"></i></a>
        <a href="javascript:;" class="carousel-next" data-carousel-next><i class="fa fa-caret-right"></i></a>
    </div>
</div>