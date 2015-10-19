<?php
/**
 * Created by PhpStorm.
 * User: Lee
 * Date: 21.04.2015
 * Time: 23:50
 */?>
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