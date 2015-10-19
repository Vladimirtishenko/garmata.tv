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