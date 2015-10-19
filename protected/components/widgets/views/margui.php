<div class="outMarqueGrey">
    <div class="outMarqueGreen">
        <div class="blockMargue">
            <div class="arrowList">
                <p><?= Yii::t('main', 'Останні новини'); ?>&nbsp; <span class="glyphicon glyphicon-play"></span></p>
            </div>
            <div class="str1 str_wrap">
                <?php foreach($lastNews as $news): ?>
                    <?php if($news->marker == News::BOLD): ?>
                        <b><?= CHtml::link(Yii::app()->language == 'ru' ? $news->title_ru : $news->title_uk, array('/site/news', 'id'=>$news->id)).$news->marker; ?></b>
                    <?php elseif($news->marker == News::RED_BOLD): ?>
                        <b><?= CHtml::link(Yii::app()->language == 'ru' ? $news->title_ru : $news->title_uk, array('/site/news', 'id'=>$news->id), array('style'=>'color: #FF4C53')); ?></b>
                    <?php elseif($news->marker == News::RED): ?>
                        <?= CHtml::link(Yii::app()->language == 'ru' ? $news->title_ru : $news->title_uk, array('/site/news', 'id'=>$news->id), array('style'=>'color: #FF4C53')); ?>
                    <?php else: ?>
                        <?= CHtml::link(Yii::app()->language == 'ru' ? $news->title_ru : $news->title_uk, array('/site/news', 'id'=>$news->id)); ?>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/jquery.liMarquee.js',
    CClientScript::POS_HEAD);
Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/css/liMarquee.css');
?>