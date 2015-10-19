<?php
$this->pageTitle = Yii::app()->language == 'ru' ? $category->meta_title_ru : $category->meta_title_uk;
$this->pageDescription = Yii::app()->language == 'ru' ? $category->meta_description_ru : $category->meta_description_uk;
?>
<div class="forBlogH3">
    <h3>
        <?= Yii::t('main', 'ТОП матеріали'); ?>
    </h3>
    <span class="glyphicon glyphicon-play"></span>
    <?php if(is_object($category)): ?>
        <?= CHtml::link(Yii::t('main', 'Категорія').' '.(Yii::app()->language == 'ru' ? $category->name_ru : $category->name_uk), array('/site/category', 'alias'=>$category->alias)); ?>
    <?php else: ?>
        <?= Yii::t('main', $category); ?>
    <?php endif; ?>
</div>
<!--\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ TOP SLIDER \\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->
<div class="topSlider">
    <ul class="bxslider">
        <?php foreach($mostViewed as $news): ?>
            <li>
                <?= CHtml::image(Yii::app()->baseUrl.'/uploads/news/thumb/'.$news->image, Yii::app()->language == 'ru' ? $news->title_ru : $news->title_uk); ?>
                <h5><?= CHtml::link(CHtml::encode(Yii::app()->language == 'ru' ? $news->title_ru : $news->title_uk), array('/site/news', 'id'=>$news->id)); ?></h5>
                <p>
					<?= CHtml::link(Yii::app()->language == 'ru' ? $news->short_ru : $news->short_uk, array('/site/news', 'id'=>$news->id)); ?>
                </p>
            </li>
        <?php endforeach; ?>
    </ul>

</div>
<!--\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ END TOP SLIDER \\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->
<div class="marketInOneCategoryPagebottom">
    <?php $this->widget('application.components.widgets.ReclameWidget', array('id'=>'marketInOneCategory'.ucfirst($category->alias))); ?>
</div>
<div>
    <div class="forBlogH3">
        <h3><?= Yii::t('main', 'Всі новини'); ?></h3>
        <span class="glyphicon glyphicon-play"></span>
        <?php if(is_object($category)): ?>
            <?= CHtml::link(Yii::t('main', 'Категорія').' '.(Yii::app()->language == 'ru' ? $category->name_ru : $category->name_uk), array('/site/category', 'alias'=>$category->alias)); ?>
        <?php else: ?>
            <?= Yii::t('main', $category); ?>
        <?php endif; ?>
    </div>
    <?php
    $this->widget('zii.widgets.CListView', array(
        'dataProvider'=>$dataProvider,
        'ajaxUpdate'=>false,
        'itemView'=>'_category',
        'template'=>'{items}{pager}',
        'cssFile'=>false,
        'pager'=>array(
            'maxButtonCount' => 5,
            'lastPageLabel'=>'>>',
            'nextPageLabel'=>'>',
            'prevPageLabel'=>'<',
            'firstPageLabel'=>'<<',
            'class'=>'CLinkPager',
            'header'=>false,
            'cssFile'=>'/css/pager.css', // устанавливаем свой .css файл
            'htmlOptions'=>array('class'=>'sad'),
        ),
        'pagerCssClass'=>'pager',
        'sortableAttributes'=>array(
            'rating',
            'create_time',
        ),
        'itemsCssClass'=>'category',
    ));
    ?>
</div>