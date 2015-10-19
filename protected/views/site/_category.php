<?php
/*@var $data dataProvider*/
?>
<div class="listCategoryUnit">
    <div class="seenAndComments">
        <div class="seen">
            <span class="glyphicon glyphicon-eye-open"></span>
            <?= $data->views; ?>
        </div>
        <div class="date">
            <span class="glyphicon glyphicon-calendar"></span>
            <?= date('d.m.Y', strtotime($data->date)); ?>
        </div>
    </div>
    <?= CHtml::image(Yii::app()->baseUrl.'/uploads/news/thumb/'.$data->image); ?>

    <h3>
        <?= CHtml::link(Yii::app()->language == 'ru' ? $data->title_ru : $data->title_uk, array('/site/news', 'id'=>$data->id)); ?>
    </h3>
    <div class="forTextAllCategory">
        <?= CHtml::link(strip_tags(Yii::app()->language == 'ru' ? $data->short_ru : $data->short_uk), array('/site/news', 'id'=>$data->id)); ?>
    </div>
</div>