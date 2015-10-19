<div class="oneVideoIn">
    <div>
        <a href="<?= Yii::app()->createUrl('/site/video', array('id'=>$data->id)); ?>">
            <img src="<?= Yii::app()->baseUrl.'/uploads/video/'.$data->image; ?>" alt=""/>
            <span class="iconsforNews"><i class="fa fa-play-circle hoverIco"></i></span>
        </a>
    </div>
    <h4>
        <?= Yii::app()->language == 'ru' ? $data->category->title_ru : $data->category->title_uk; ?>
    </h4>
    <span><?= $this->getStringDate($data->date); ?> &nbsp;
        <i class="fa fa-eye"></i> <?= (int)$data->views; ?></span>
    <h3>
        <?php if($data->reclame): ?>
            <a class="tooltips fa fa-pinterest-p" href="#"><span>Рекламные материалы</span></a>
        <?php endif; ?>
        <a href="<?= Yii::app()->createUrl('/site/video', array('id'=>$data->id)); ?>"><?= Yii::app()->language == 'ru' ? $data->title_ru : $data->title_uk; ?></a>
    </h3>
    <p><?= Yii::app()->language == 'ru' ? $data->short_ru : $data->short_uk; ?></p>
    <hr>
</div>