<?php
/* @var $model Video */
$this->pageTitle = Yii::app()->language == 'ru' ? $model->title_ru : $model->title_uk;
$this->pageDescription = Yii::app()->language == 'ru' ? $model->title_ru : $model->title_uk;
$this->metaAttributes[] = '<meta property="og:image" content="http://garmata.tv'.Yii::app()->baseUrl.'/uploads/video/'.$model->image.'" />';
$this->metaAttributes[]  = '<link rel="image_src" href="http://garmata.tv'.Yii::app()->baseUrl.'/uploads/video/'.$model->image.'" />';
$this->metaAttributes[]  = '<meta property="image" content="http://garmata.tv'.Yii::app()->baseUrl.'/uploads/video/'.$model->image.'"/>';
$this->metaAttributes[]  = '<meta property="vk:image" content="http://garmata.tv'.Yii::app()->baseUrl.'/uploads/video/'.$model->image.'"/>';
?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/uk_UA/sdk.js#xfbml=1&version=v2.5&appId=835898546525811";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="outerSectionMain">
    <section class="main">
        <div class="outerLevel1">
            <div class="videoBlock pageWithoutTop oneVideoPage">
                <hr>
                <h1><?= Yii::t('main', 'Відеоматеріал новини дня'); ?></h1>
                <h4><i class="fa fa-eye"></i> <?= (int)$model->views; ?></span></h4>
                <div class="socialShare">
                    <script type="text/javascript">(function() {
                            if (window.pluso)if (typeof window.pluso.start == "function") return;
                            if (window.ifpluso==undefined) { window.ifpluso = 1;
                                var d = document, s = d.createElement('script'), g = 'getElementsByTagName';
                                s.type = 'text/javascript'; s.charset='UTF-8'; s.async = true;
                                s.src = ('https:' == window.location.protocol ? 'https' : 'http')  + '://share.pluso.ru/pluso-like.js';
                                var h=d[g]('body')[0];
                                h.appendChild(s);
                            }})();</script>
                    <div class="pluso" data-background="transparent" data-options="small,square,line,horizontal,nocounter,theme=06" data-services="vkontakte,odnoklassniki,facebook,twitter,google">
                    </div>
                </div>
                <div class="allTextOneVideoAdmin">

                    <h2>
                        <?php if($model->reclame): ?>
                            <a href="#" class="tooltips fa fa-pinterest-p">
                                <span><?=Yii::t('main', 'Рекламні матеріали'); ?></span>
                            </a>
                        <?php endif; ?>
                        <?= Yii::app()->language == 'ru' ? $model->title_ru : $model->title_uk; ?></h2>
                        <? 

                            $mystring = $model->video; 
                            $findme = 'facebook.com'; 
                            $pos = strpos($mystring, $findme); 

                            if($pos !== false){
                                echo "<div class='fb-video' data-href='".$model->video."' data-width='650'></div>";
                            } else {
                                $findme = 'vk.com'; 
                                $pos = strpos($mystring, $findme);
                                if($pos !== false){
                                    echo "<iframe src='".$model->video."' frameborder='0' allowfullscreen></iframe>";
                                } else {
                                    $findme = 'http'; 
                                    $pos = strpos($mystring, $findme);

                                    if($pos !== false){
                                        echo "<iframe src='".$model->video."' frameborder='0' allowfullscreen></iframe>";
                                    } else {
                                        echo "<iframe src='http://www.youtube.com/embed/".$model->video."' frameborder='0' allowfullscreen></iframe>";
                                    }
                                }
                            } 


                           ?>
                    <p><?= Yii::app()->language == 'ru' ? $model->description_ru : $model->description_uk; ?></p>
                </div>
                <div class="socialShare">
                    <script type="text/javascript">(function() {
                            if (window.pluso)if (typeof window.pluso.start == "function") return;
                            if (window.ifpluso==undefined) { window.ifpluso = 1;
                                var d = document, s = d.createElement('script'), g = 'getElementsByTagName';
                                s.type = 'text/javascript'; s.charset='UTF-8'; s.async = true;
                                s.src = ('https:' == window.location.protocol ? 'https' : 'http')  + '://share.pluso.ru/pluso-like.js';
                                var h=d[g]('body')[0];
                                h.appendChild(s);
                            }})();</script>
                    <div class="pluso" data-background="transparent" data-options="small,square,line,horizontal,nocounter,theme=06" data-services="vkontakte,odnoklassniki,facebook,twitter,google">
                    </div>
                <div class="sensAndAuthor">
                        <p>Просмотры <span><i class="fa fa-eye"></i> <?= (int)$model->views; ?></span><p>Автор: <span>Garmata.tv</span></p>
                    </div>
                </div>

                <div id="disqus_thread"></div>
                <script type="text/javascript">
                    /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
                    var disqus_shortname = 'garmatatv'; // required: replace example with your forum shortname

                    /* * * DON'T EDIT BELOW THIS LINE * * */
                    (function() {
                        var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
                        dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
                        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
                    })();
                </script>
                <div class="-reclama" id="n4p_30721"></div>

                <div class="seenAll">
                    <hr>
                    <h1><?= Yii::t('main', 'Дивіться також'); ?></h1>
                    <div class="outerMason"> 
                    <!--\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ VIDEO BLOCK \\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->
                    <?php foreach($relatedVideos as $video): ?>
                        <div class="oneVideoIn">
                            <div>
                                <img src="<?= Yii::app()->baseUrl.'/uploads/video/'.$video->image; ?>" alt="" />
                                <span class="iconsforNews"><i class="fa fa-play-circle hoverIco"></i></span>
                            </div>
                            <h4><?= Yii::app()->language == 'ru' ? $video->category->title_ru : $video->category->title_uk; ?></h4>
                            <span><?= $this->getStringDate($video->date); ?> &nbsp;
                                <i class="fa fa-eye"></i> <?= (int)$video->views; ?></span>
                            <h3>
                                <?= CHtml::link(Yii::app()->language == 'ru' ? $video->title_ru : $video->title_uk ,array('/site/video', 'id'=>$video->id)); ?>
                            </h3>
                            <p><?= Yii::app()->language == 'ru' ? $video->short_ru : $video->short_uk; ?></p>
                            <hr>
                        </div>
                    <?php endforeach; ?>
                    </div>
                </div>

            </div>

            <div class="allmini pageWithoutTop">
                <?php $this->widget('application.components.widgets.StreemsWidget'); ?>
                <?php $this->widget('application.components.widgets.AllNewsWidget', array('limit'=>50, 'showPictures'=>false)); ?>
            </div>
        </div>
    </section>
</div>