<div class="gen_politics">
    <div class="gen_one_block">
        <?= CHtml::image(Yii::app()->baseUrl.'/uploads/news/full/'.$data->image); ?>
    </div>
    <div class="gen_two_block">
        <h3><a href=""><?= CHtml::link(Yii::app()->language == 'ru' ? $data->title_ru : $data->title_uk, array('/site/news', 'id'=>$data->id)); ?></a></h3>
        <p>
            <span>
                <span class="glyphicon glyphicon-calendar"></span>
                <?= Yii::t('main', 'Опубліковано'); ?>: <?= date('d m Y', strtotime($data->date)); ?></p>
            </span>
        </p>
        <p><?= Yii::app()->language == 'ru' ? $data->short_ru : $data->short_uk; ?></p>
        <?= CHtml::link(Yii::t('main', 'Читать далее'), array('/site/news', 'id'=>$data->id), array('class'=>'btn btn-default')); ?>
    </div>
</div>