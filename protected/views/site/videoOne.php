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
                <h1><?= Yii::t('main', 'Відеоматеріал'); ?></h1>
                <h4>
                    <?= Yii::t('main', 'Категорія'); ?> 
                    <span class="caret-right"></span> 
                    <?php if($model->category_id == 11): ?>
                    <a href="<?= Yii::app()->createUrl('/site/day_of_news'); ?>"><?= Yii::app()->language == 'ru' ? $model->category->title_ru : $model->category->title_uk; ?></a> 
                    <?php else: ?>
                    <a href="<?= Yii::app()->createUrl('/site/category', array('alias'=>$model->category->alias)); ?>"><?= Yii::app()->language == 'ru' ? $model->category->title_ru : $model->category->title_uk; ?></a> 
                    <?php endif; ?>
                    <span><?= $this->getStringDate($model->date); ?> &nbsp;
                    <i class="fa fa-eye"></i> <?= (int)$model->views; ?></span>
                </h4>
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
                <div id="GNM3203" style="text-align:center; display:none; margin: 20px 0;" ><a href="http://www.novostimira.com.ua" id="GNM3203t" style="display:none" target="_blank"><strong>Новости</strong></a></div>
                 <div class="google-market">
                    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                    <!-- garmata response -news -->
                    <ins class="adsbygoogle"
                         style="display:block"
                         data-ad-client="ca-pub-2479511460292648"
                         data-ad-slot="5642837217"
                         data-ad-format="auto"></ins>
                    <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
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
                <div id="traffim-widget-416"></div>
                <script language="javascript" type="text/javascript">
                    (function() {
                    var useSSL = 'https:' == document.location.protocol;
                    var traffim = document.createElement('script');
                    traffim.type = 'text/javascript'; traffim.async = true;traffim.charset = 'UTF-8';
                    traffim.src = (useSSL ? 'https:' : 'http:') + '//ua.traffim.com/load/416.js';
                    var nrvrscr = document.getElementsByTagName('script')[0];
                    nrvrscr.parentNode.insertBefore(traffim, nrvrscr);
                    })();
                </script>
                <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                 <div class="google-market">
                    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                    <!-- garmata after discus -->
                    <ins class="adsbygoogle"
                         style="display:block"
                         data-ad-client="ca-pub-2479511460292648"
                         data-ad-slot="8177501218"
                         data-ad-format="auto"></ins>
                    <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                </div>
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

            <div class="allmini pageWithoutTop this-tab-margin">
                <?php $this->widget('application.components.widgets.StreemsWidget'); ?>
                <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                <!-- garmata left -->
                <ins class="adsbygoogle"
                     style="display:inline-block;width:300px;height:250px"
                     data-ad-client="ca-pub-2479511460292648"
                     data-ad-slot="3247774015"></ins>
                <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
                <div class="-reclama" id="n4p_30721"></div>
                <?php $this->widget('application.components.widgets.AllNewsWidget', array('limit'=>50, 'showPictures'=>false)); ?>
                <div class="google-market-top-side">
                    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                    <!-- Grmata news Line full 600 -->
                    <ins class="adsbygoogle"
                         style="display:inline-block;width:300px;height:600px"
                         data-ad-client="ca-pub-2479511460292648"
                         data-ad-slot="8528924812"></ins>
                    <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                </div>
            </div>
        </div>
    </section>
</div>
<script type="text/javascript">
  var el = document.getElementById('GNM3203');
  if (el) {
    if (document.getElementById('GNM3203t').style.display == 'none') {
      document.getElementById('GNM3203t').style.display = '';
      var dateNM = new Date();
      var t = Math.floor(dateNM.getTime()/(1000*600));
      var NMces=document.createElement('script');
      NMces.type = 'text/javascript';
      NMces.src='http'+(window.location.protocol=='https:'?'s':'')+'://g.novostimira.biz/l/3203?v='+t;
      el.parentNode.appendChild(NMces);
    }
}
</script>