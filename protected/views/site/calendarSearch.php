<div class="forBlogH3">
    <h3><?= Yii::t('main', 'Результати пошуку'); ?></h3> <span class="glyphicon glyphicon-play"></span> <a><?= Yii::t('main', 'Новини'); ?></a>
</div>

<?php
$this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$searchNews,
    'ajaxUpdate'=>true,
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
        'htmlOptions'=>array('class'=>'sfd'),
    ),
    'pagerCssClass'=>'pager',
    'sortableAttributes'=>array(
        'rating',
        'create_time',
    ),
    'itemsCssClass'=>'category',
));
?>