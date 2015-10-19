<?php
/**
 * @var $this StreemsWidget
 * @var $streems[] Streem
 */
?>
<div class="tabsStream">
    <hr noshade>
    <h2><a href="#"><?= Yii::t('main', 'Вибір редакції'); ?></a></h2>
    <div class="tabs" data-tab="">
        <nav class="tab-nav" data-tab-nav="" role="tablist">
            <ul>
                <li>
                    <a href="javascript:;" class="button is-active" role="tab" id="toolkit-tab-2-tab-0" aria-controls="toolkit-tab-2-section-0" aria-selected="true" aria-expanded="true"><?= Yii::t('main', 'Новина'); ?> 1</a>
                    <span>
                        <i class="fa fa-star hoverIco"></i>
                    </span>
                </li>
                <li>
                    <a href="javascript:;" class="button" role="tab" id="toolkit-tab-2-tab-1" aria-controls="toolkit-tab-2-section-1" aria-selected="false" aria-expanded="false"><?= Yii::t('main', 'Новина'); ?> 2</a>
                </li>
            </ul>
        </nav>

        <?php foreach($translations as $key => $value): ?>
            <section class="tab-section show" data-tab-section="" role="tabpanel" id="toolkit-tab-2-section-<?= $key; ?>" aria-labelledby="toolkit-tab-2-tab-<?= $key; ?>" aria-hidden="false" style="display: block;">
                <a href="
                    <?php if($value['type'] == 'news'): ?>
                        <?= Yii::app()->createUrl('/site/news', array('id'=>$value['id'])); ?>
                    <?php elseif($value['type'] == 'photo'): ?>
                        <?= Yii::app()->createUrl('/site/photos', array('id'=>$value['id'])); ?>
                    <?php elseif($value['type'] == 'video'): ?>
                        <?= Yii::app()->createUrl('/site/video', array('id'=>$value['id'])); ?>
                    <?php endif; ?>
                ">
                    <div class="outerImgChoise"> <?php if($value['type'] == 'news'): ?>
                        <?= CHtml::image(Yii::app()->baseUrl.'/uploads/news/thumb/'.$value['image']); ?>
                    <?php elseif($value['type'] == 'photo'): ?>
                        <?= CHtml::image(Yii::app()->baseUrl.'/uploads/galery/category/'.$value['image']); ?>
                    <?php elseif($value['type'] == 'video'): ?>
                        <?= CHtml::image(Yii::app()->baseUrl.'/uploads/video/'.$value['image']); ?>
                    <?php endif; ?>
                    </div>
                    <p>
                        <!-- Ссылки для новостей -->

                        <?php if($value['type'] == 'news'): ?>
                            <?= CHtml::encode(Yii::app()->controller->getShortDescription((Yii::app()->language == 'ru') ? $value['title_ru'] : $value['title_uk'], 100)); ?>
                        <?php elseif($value['type'] == 'photo'): ?>
                            <?= CHtml::encode(Yii::app()->controller->getShortDescription((Yii::app()->language == 'ru') ? $value['title_ru'] : $value['title_uk'], 100)); ?>
                        <?php elseif($value['type'] == 'video'): ?>
                            <?= CHtml::encode(Yii::app()->controller->getShortDescription((Yii::app()->language == 'ru') ? $value['title_ru'] : $value['title_uk'], 100)); ?>
                        <?php endif; ?>

                        <!-- Ссылки для новостей -->
                    </p>
                </a>
            </section>
        <?php endforeach; ?>
    </div>
</div>

