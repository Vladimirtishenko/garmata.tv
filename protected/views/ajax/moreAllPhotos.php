<?php foreach($photoCategories as $photo): ?>
    <div class="blockPhoto">
        <div>
            <a href="<?= Yii::app()->createUrl('/site/photos', array('id'=>$photo->id)); ?>">
                <?= CHtml::image(Yii::app()->baseUrl.'/uploads/galery/category/'.$photo->image, Yii::app()->language == 'ru' ? $photo->title_ru : $photo->title_uk); ?>
                <span class="iconsforNews"><i class="fa fa-image hoverIco"></i></span>
            </a>
        </div>
        <h4>
            <?= CHtml::link(Yii::app()->language == 'ru' ? $photo->category->title_ru : $photo->category->title_uk, array('/site/category', 'alias'=>$photo->category->alias)); ?>
            <span><?= $this->getStringDate($photo->date); ?> &nbsp; 
                                    <i class="fa fa-eye"></i> <?= (int) $photo->views; ?></span></h4>
        <h5>
            <?= CHtml::link(Yii::app()->language == 'ru' ? $photo->title_ru : $photo->title_uk, array('/site/photos', 'id'=>$photo->id)); ?>
        </h5>
        <p><?= CHtml::encode(Yii::app()->language == 'ru' ? $photo->short_ru : $photo->short_uk); ?></p>
        <hr>
    </div>
<?php endforeach; ?>