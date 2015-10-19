<?php
?>
<div class="oneVideoIn">
    <div>
        <a href="<?= Yii::app()->createUrl('/site/photos', array('id'=>$data->id)); ?>">
            <img src="<?= Yii::app()->baseUrl.'/uploads/galery/category/'.$data->image; ?>" alt="">
            <span class="iconsforNews"><i class="fa fa-image hoverIco"></i></span>
        </a>
    </div>
    <h4>
        <?= Yii::app()->language == 'ru' ? $data->category->title_ru : $data->category->title_uk; ?>
    </h4>
    <span><?= $this->getStringDate($data->date); ?> &nbsp;
        <i class="fa fa-eye"></i> <?= (int)$data->views; ?></span>
    <h3>
        <a href="<?= Yii::app()->createUrl('/site/photos', array('id'=>$data->id)); ?>"><?= Yii::app()->language == 'ru' ? $data->title_ru : $data->title_uk; ?></a>
    </h3>
    <p><?= Yii::app()->language == 'ru' ? $data->short_ru : $data->short_uk; ?></p>
    <hr>
</div>