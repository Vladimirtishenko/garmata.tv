<?php foreach($news as $new): ?>
    <div class="blockNews">
        <div>
            <a href="<?= Yii::app()->createUrl('/site/news', array('id'=>$new->id)); ?>">
                <?= CHtml::image(Yii::app()->baseUrl.'/uploads/news/thumb/'.$new->image, Yii::app()->language == 'ru' ? $new->title_ru : $new->title_uk); ?>
                <span class="iconsforNews"><i class="fa fa-file hoverIco"></i></span>
            </a>
        </div>
        <h4>
            <?= CHtml::link(Yii::app()->language == 'ru' ? $new->category->title_ru : $new->category->title_uk, array('/site/category', 'alias'=>$new->category->alias)); ?>
            <span><?= $this->getStringDate($new->date); ?> &nbsp;
                                    <i class="fa fa-eye"></i> <?= (int) $new->views; ?></span>
        </h4>
        <h5>
            <?= CHtml::link(Yii::app()->language == 'ru' ? $new->title_ru : $new->title_uk, array('/site/news', 'id'=>$new->id)); ?>
        </h5>
        <p><?= Yii::app()->language == 'ru' ? $new->short_ru : $new->short_uk; ?></p>
        <hr>
    </div>
<?php endforeach; ?>