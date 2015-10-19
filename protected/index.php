<?php
/* @var $this SiteController */
/* @var $mostViewed News */
/* @var $provider News */
$this->pageTitle=Yii::app()->name;
?>

<!--\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ TOP SLIDER \\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->
<div class="topSlider">
    <ul class="bxslider">
        <?php foreach($mostViewed as $news): ?>
            <li>
                <?= CHtml::image(Yii::app()->baseUrl.'/uploads/news/thumb/'.$news->image, Yii::app()->language == 'ru' ? $news->title_ru : $news->title_uk); ?>
                <h5><?= CHtml::link(CHtml::encode(Yii::app()->language == 'ru' ? $news->title_ru : $news->title_uk), array('/site/news', 'id'=>$news->id)); ?></h5>
                <p>
                <?= CHtml::link($this->getShortDescription(Yii::app()->language == 'ru' ? $news->description_ru : $news->description_uk, 200), array('/site/news', 'id'=>$news->id)); ?>
                </p>
            </li>
        <?php endforeach; ?>
    </ul>

</div>
<div class="marketLeftGenMax">
    
</div>
<!--\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ END TOP SLIDER \\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->

<!--\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ VIDEO BLOCK \\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->
<div class="streamBlock">
    <h3 class="top_h3">високий вал <span class="btn btn-default">онлайн</span></h3>
    <ul class="nav nav-tabs">
      <li class="active"><a href="#stream1" data-toggle="tab">Трансляция №1</a></li>
      <li><a href="#stream2" data-toggle="tab">Трансляция №2</a></li>
    </ul>
    <div class="tab-content">
      <div class="tab-pane fade in active" id="stream1">
         <p><?= Yii::app()->language == 'ru' ? Streem::model()->findByPk(1)->name_ru : Streem::model()->findByPk(1)->name_uk; ?></p>
    <iframe width="100%" height="270px" src="<?= Streem::model()->findByPk(1)->url; ?>" frameborder="0" allowfullscreen></iframe>
      </div>
      <div class="tab-pane fade" id="stream2">
        <p><?= Yii::app()->language == 'ru' ? Streem::model()->findByPk(1)->name_ru : Streem::model()->findByPk(1)->name_uk; ?></p>
    <iframe width="100%" height="270px" src="<?= Streem::model()->findByPk(1)->url; ?>" frameborder="0" allowfullscreen></iframe>
      </div>
    </div>
</div>
<div class="videoBlock">

    <h3 class="top_h3"><?= Yii::t('main','Останні відеорепортажі'); ?></h3>
    <div class="content example3">
                <div id="tj_container" class="tj_container">
                    <div class="tj_nav">
                        <span id="tj_prev" class="tj_prev">Previous</span>
                        <span id="tj_next" class="tj_next">Next</span>
                    </div>
                    <div class="tj_wrapper">
                        <ul class="tj_gallery">
                            <?php foreach($lastVideos as $video): ?>
                                <li>
                                    <a href="<?= Yii::app()->createUrl('/site/video', array('id'=>$video->id)); ?>">
                                        <img src="http://img.youtube.com/vi/<?= $video->video; ?>/mqdefault.jpg" alt="image01" />
                                        <div class="hiddens">
                                        <span class="seenG">
                                            <span class="glyphicon glyphicon-play-circle"></span>
                                        </span>
                                            <p><?= Yii::app()->language == 'ru' ? $video->title_ru : $video->title_uk ?></p>
                                        <span class="seenM">
                                            <span class="glyphicon glyphicon-play-circle"></span>
                                        </span>
                                        </div>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
    
</div>

<div class="marketPieLeftDownStream">
    
</div>
<div class="marketPieRightDownVideo">
    
</div>
<!--\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ END VIDEO BLOCK \\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->

<div class="blogSlider">
    <div class="forBlogH3">
        <h3><?= Yii::t('main','Топ блогери'); ?></h3> <span class="glyphicon glyphicon-play"></span> <?= CHtml::link(Yii::t('main', 'Перейти в розділ блоги'), array('/blog/default/index')); ?>
    </div>
    <ul class="bxsliderBlog">
        <?php foreach($popularBlogers as $bloger): ?>
            <li>
                <?= CHtml::image(Yii::app()->baseUrl.'/uploads/users/avatars/'.$bloger->avatar, $bloger->name); ?>
                <h5><?= CHtml::link($bloger->name, array('/blog/default/bloger', 'id'=>$bloger->id)); ?></h5>
                <p>
                    <?php $lastNewsByBlogger = Articles::model()->find(array('condition'=>'author_id = :id', 'params'=>array(':id'=>$bloger->id), 'order'=>'date DESC', 'limit'=>1)); ?>
                    <?= CHtml::link($lastNewsByBlogger->title, array('/blog/default/post', 'id'=>$lastNewsByBlogger->id)); ?>
                </p>
            </li>
        <?php endforeach; ?>
    </ul>
</div>

<!--\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ ANALITIC & COMMENTS BLOCK \\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->
<div class="accordionBlock">
    <h3 class="top_h3 forAccordion"><?= Yii::t('main','Аналітика'); ?></h3>


    <section class="ac-container">
        <?php foreach($analitic as $i => $news): ?>
            <div>
                <input id="wer-<?= $news->id; ?>" name="accordion-<?= $news->category_id; ?>" <?php if($i == 0): ?> checked="" <?php endif; ?> type="radio" />
                <label for="wer-<?= $news->id; ?>">
                    <?= CHtml::encode(Yii::app()->language == 'ru' ? $news->title_ru : $news->title_uk); ?>
                </label>
                <article class="ac-large">
                    <?= CHtml::image(Yii::app()->baseUrl.'/uploads/news/thumb/'.$news->image, Yii::app()->language == 'ru' ? $news->title_ru : $news->title_uk); ?>
                    <p>
                        <?= CHtml::link(strip_tags($this->getShortDescription(Yii::app()->language == 'ru' ? $news->description_ru : $news->description_uk, 150).'...'), array('/site/news', 'id'=>$news->id)); ?>
                    </p>
                </article>
            </div>
        <?php endforeach; ?>
    </section>

</div>
<div class="fotogalery">
    <h3 class="top_h3"><?= Yii::t('main', 'фоторепортажі'); ?></h3>
    <?php $this->widget('application.components.widgets.PhotoNewsWidget'); ?>
</div>
<div style="clear: both"></div>
<div class="marketMaxTwolevelPhotoAnalitika"></div>
<!--\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ END ANALITIC & COMMENTS BLOCK \\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->

<!--\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ POLITIC & ECONOMIC BLOCK \\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->
<?php foreach($provider as $key=>$newsArray): ?>
    <div class="outerBlock">
    <div class="accordionBlockEconomic">
        <h3 class="top_h3 forAccordion"><?= CHtml::encode($key); ?></h3>

        <section class="ac-container">
            <?php foreach($newsArray as $i => $news): ?>
                <div>
                    <input id="wer-<?= $news->id; ?>" name="accordion-<?= $news->category_id; ?>" <?php if($i == 0): ?> checked="" <?php endif; ?> type="radio" />
                    <label for="wer-<?= $news->id; ?>">
                        <?= CHtml::encode(Yii::app()->language == 'ru' ? $news->title_ru : $news->title_uk); ?>
                    </label>
                    <article class="ac-large">
                        <?= CHtml::image(Yii::app()->baseUrl.'/uploads/news/thumb/'.$news->image, Yii::app()->language == 'ru' ? $news->title_ru : $news->title_uk); ?>
                        <p>
                            <?= CHtml::link(strip_tags($this->getShortDescription(Yii::app()->language == 'ru' ? $news->description_ru : $news->description_uk, 150).'...'), array('/site/news', 'id'=>$news->id)); ?>
                        </p>
                    </article>
                </div>
                
            <?php endforeach; ?>
        </section>
       
    </div>
     <div class="marketPieForAccordeonNews" id="<?= $news->category_id; ?>">
    
    </div>
    </div>
    
<?php endforeach; ?>
<!--\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ END POLITIC & ECONOMIC BLOCK \\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->

<!--JavaScript Files-->
<?php
    Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/mainSlider.js',
        CClientScript::POS_END);
?>
