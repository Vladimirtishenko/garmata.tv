<?php
/* @var $allNews News */
$oldDate = $lastDate;
?>
<?php foreach($allNews as $news): ?>
    <?php
        if($oldDate != date('d-m-Y', strtotime($news['date']))) {
            echo '<span class="news-date-line">'.date('d', strtotime($news['date'])).' '.Yii::app()->controller->getMonth($news['date']).' '.date('Y', strtotime($news['date'])).'</span>';
            $oldDate = date('d-m-Y', strtotime($news['date']));
        }
    ?>

    <div class="oneNews" data-date = "<?= $oldDate; ?>">

        <?php if($news['type'] == 'news'): ?>
            <span class="iconsforNews"><i class="fa fa-file hoverIco"></i></span>
        <?php elseif($news['type'] == 'photo'): ?>
            <span class="iconsforNews"><i class="fa fa-image hoverIco"></i></span>
        <?php elseif($news['type'] == 'video'): ?>
            <span class="iconsforNews"><i class="fa fa-play-circle hoverIco"></i></span>
        <?php endif; ?>


        <?php if($news['type'] == 'news'): ?>
            <?= CHtml::image(Yii::app()->baseUrl.'/uploads/news/thumb/'.$news['image']); ?>
        <?php elseif($news['type'] == 'photo'): ?>
            <?= CHtml::image(Yii::app()->baseUrl.'/uploads/galery/category/'.$news['image']); ?>
        <?php elseif($news['type'] == 'video'): ?>
            <?= CHtml::image(Yii::app()->baseUrl.'/uploads/video/'.$news['image']); ?>
        <?php endif; ?>

        <div class="descrNews">
            <a href="<?= Yii::app()->createUrl('/site/category', array('alias'=>$news['category_alias'])); ?>">
                <span><?= Yii::app()->language == 'ru' ? $news['category_title_ru'] : $news['category_title_uk']; ?></span>
                <span><?= date('H:i', strtotime($news['date'])); ?></span>
            </a>
            <h6>
                <?php if($news['reclame']): ?>
                    <a class="tooltips fa fa-pinterest-p" href="#">
                        <span>Рекламные материалы</span>
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

                <!-- Ссылки для новостей -->
                 <span>
                <i class="fa fa-eye"></i> <?= (int) $news['views']; ?>
                    </span>

            </h6>
           
        </div>
    </div>
<?php endforeach; ?>