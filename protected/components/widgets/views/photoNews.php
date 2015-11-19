<?php
/* @var $model PhotoCategory */
?>

<div class="photoblock">
    <hr noshade>
    <h1><a href="<?= Yii::app()->createUrl('/site/photos'); ?>"><?= Yii::t('main', 'Фоторепортажі'); ?></a></h1>
    <div class="outerGaleryPhoto">
        <div class="sideGenPhoto">
            <?php foreach ($model as $news): ?>
                <div class="descrGalPhoto" >
                    <span class="icoForSliderDescr"><i class="fa fa-image"></i></span>
                    <div class="allDescrIn">
                        <a href="#">
                            <?= Yii::app()->language == 'ru' ? $news->category->title_ru : $news->category->title_uk ?>
                            &nbsp; &mdash; &nbsp;
                            <span>
                                <?= $this->controller->getStringDate($news->date); ?> &nbsp;
                                <i class="fa fa-eye"></i> <?= (int)$news->views; ?>
                            </span>
                            <?php if($news->reclame): ?>
                                &nbsp; &mdash; &nbsp;
                                <a class="tooltips fa fa-pinterest-p" href="#">
                                    <span><?=Yii::t('main', 'Рекламні матеріали'); ?></span>
                                </a>
                            <?php endif; ?>
                        <h3><a href="<?= Yii::app()->createUrl('/site/photos', array('id'=>$news->id)); ?>"><?= Yii::app()->language == 'ru' ? $news->title_ru : $news->title_uk; ?></a></h3>
                    </div>
                </div>
            <?php endforeach; ?>
            <img src=""  alt="side">
        </div>
        <ul>
            <?php foreach ($model as $news): ?>
                <li>
                    <?= CHtml::image(Yii::app()->baseUrl.'/uploads/galery/category/'.$news->image, 'side'); ?>
                </li>
            <?php endforeach; ?>
        </ul>

    </div>
</div>