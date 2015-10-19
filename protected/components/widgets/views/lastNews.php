<?php
/**
 * Created by PhpStorm.
 * User: Lee
 * Date: 31.08.14
 * Time: 15:08
 */ ?>
<div class="LineNews">
    <hr noshade>
    <h2><a href="#">Новости</a></h2>
    <div class="newsOuter">
        <?php foreach($model as $news): ?>
            <div class="oneNews">
                <span class="iconsforNews"><i class="fa fa-file hoverIco"></i></span>
                <?= CHtml::image(Yii::app()->baseUrl.'/uploads/news/full/'.$news->image); ?>
                <div class="descrNews">
                    <a href="#"><span>Экономика</span><span>11:30</span></a>
                    <h6>
                        <?= CHtml::link(Yii::app()->controller->getShortDescription((Yii::app()->language == 'ru') ? $news->title_ru : $news->title_uk, 40).'...', array('/site/news', 'id'=>$news->id)); ?>
                    </h6>
                    <span><i class="fa fa-comments"></i> 100 <i class="fa fa-eye"></i> 168</span>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="buttonforLoad"><i class="fa fa-sort-desc"></i></div>
</div>