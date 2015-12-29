<?php
?>

    <div class="outerSectionMain">
    <section class="main">
    <div class="outerLevel1">
    <div class="videoBlock pageWithoutTop">
        <hr>
        <h1><?=Yii::t('main', 'Новини за дві хвилини'); ?></h1>
        <div class="allVideoPage -for-day">
            <?php
            $this->widget('zii.widgets.CListView', array(
                'dataProvider'=>$data,
                'ajaxUpdate'=>false,
                'itemView'=>'_video',
                'template'=>'{items}{pager}',
                'cssFile'=>false,
                'pager'=>array(
                    'maxButtonCount' => 5,
                    'lastPageLabel'=>null,
                    'nextPageLabel'=>Yii::t('main', 'Вперед'),
                    'prevPageLabel'=>Yii::t('main', 'Назад'),
                    'firstPageLabel'=>null,
                    'class'=>'CLinkPager',
                    'header'=>false,
                    'cssFile'=>false, // устанавливаем свой .css файл
                    'htmlOptions'=>array('class'=>'pagination'),
                    'selectedPageCssClass'=>'is-active',
                ),
                'pagerCssClass'=>'navigation',
                'sortableAttributes'=>array(
                    'rating',
                    'create_time',
                ),
                'itemsCssClass'=>'clear',
            ));
            ?>
        </div>
    </div>
        <div class="allmini pageWithoutTop">
            <?php $this->widget('application.components.widgets.StreemsWidget'); ?>
            <?php $this->widget('application.components.widgets.AllNewsWidget', array('limit'=>50, 'showPictures'=>false)); ?>
        </div>
    </div>
    </section>
</div>
