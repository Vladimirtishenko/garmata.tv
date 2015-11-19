<?php
/* @var $allNews News */
$oldDate = '';
?>
<div class="LineNews">
    <hr noshade>
    <h2><a href="<?= Yii::app()->createUrl('/site/allNews'); ?>"><?= Yii::t('main', 'Новини'); ?></a></h2>
    <div class="newsOuter">
        <?php foreach($allNews as $key => $news): ?>
            <?php
            if($key == 0) {
                echo '<span class="news-date-line">'.date('d', strtotime($news['date'])).' '.Yii::app()->controller->getMonth($news['date']).' '.date('Y', strtotime($news['date'])).'</span>';
                $oldDate = date('d-m-Y', strtotime($news['date']));
            }
            else {
                if($oldDate != date('d-m-Y', strtotime($news['date']))) {
                    echo '<span class="news-date-line">'.date('d', strtotime($news['date'])).' '.Yii::app()->controller->getMonth($news['date']).' '.date('Y', strtotime($news['date'])).'</span>';
                    $oldDate = date('d-m-Y', strtotime($news['date']));
                }
            } ?>
            <div class="oneNews" data-date = "<?= $oldDate; ?>">
                <div class="descrNews">
                    <span class="iconsforNews">
                        <?php if($news['type'] == 'news'): ?>
                            <span class="iconsforNews"><i class="fa fa-file hoverIco"></i></span>
                        <?php elseif($news['type'] == 'photo'): ?>
                            <span class="iconsforNews"><i class="fa fa-image hoverIco"></i></span>
                        <?php elseif($news['type'] == 'video'): ?>
                            <span class="iconsforNews"><i class="fa fa-play-circle hoverIco"></i></span>
                        <?php endif; ?>
                    </span>
                    <a href="<?= Yii::app()->createUrl('/site/category', array('alias'=>$news['category_alias'])); ?>">
                        <span><?= Yii::app()->language == 'ru' ? $news['category_title_ru'] : $news['category_title_uk']; ?></span>
                        <span><?= date('H:i', strtotime($news['date'])); ?></span>
                    </a>
                    <h6>
                        <?php if($news['reclame']): ?>
                            <a class="tooltips fa fa-pinterest-p" href="#">
                                <span><?=Yii::t('main', 'Рекламні матеріали'); ?></span>
                            </a>
                            —
                        <?php endif; ?>
                        <!-- Ссылки для новостей -->

                        <?php if($news['type'] == 'news'): ?>
                            <?= CHtml::link(Yii::app()->language == 'ru' ? $news['title_ru'] : $news['title_uk'], array('/site/news', 'id'=>$news['id'])); ?>
                        <?php elseif($news['type'] == 'photo'): ?>
                            <?= CHtml::link(Yii::app()->language == 'ru' ? $news['title_ru'] : $news['title_uk'], array('/site/photos', 'id'=>$news['id'])); ?>
                        <?php elseif($news['type'] == 'video'): ?>
                            <?= CHtml::link(Yii::app()->language == 'ru' ? $news['title_ru'] : $news['title_uk'], array('/site/video', 'id'=>$news['id'])); ?>
                        <?php endif; ?>
                        <span><i class="fa fa-eye"></i> <?= (int) $news['views']; ?></span>
                        <!-- Ссылки для новостей -->
                    </h6>
                    
                </div>
            </div>

        <?php endforeach; ?>
    </div>
    <div class="buttonforLoad"><i class="fa fa-sort-desc"></i></div>
</div>
