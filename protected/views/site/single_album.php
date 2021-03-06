<?php
/* @var $category Video */
$this->pageTitle = Yii::app()->language == 'ru' ? $category->title_ru : $category->title_uk;
$this->pageDescription = Yii::app()->language == 'ru' ? $category->title_ru : $category->title_uk;
$this->metaAttributes[] = '<meta property="og:image" content="http://garmata.tv'.Yii::app()->baseUrl.'/uploads/galery/category/'.$category->image.'" />';
$this->metaAttributes[]  = '<link rel="image_src" href="http://garmata.tv'.Yii::app()->baseUrl.'/uploads/galery/category/'.$category->image.'" />';
$this->metaAttributes[]  = '<meta property="image" content="http://garmata.tv'.Yii::app()->baseUrl.'/uploads/galery/category/'.$category->image.'"/>';
$this->metaAttributes[]  = '<meta property="vk:image" content="http://garmata.tv'.Yii::app()->baseUrl.'/uploads/galery/category/'.$category->image.'"/>';
?>

<div class="outerSectionMain">
    <section class="main">
        <div class="outerLevel1">
            <div class="videoBlock pageWithoutTop oneVideoPage">
                <hr>
                <h1><?= Yii::t('main', 'Фотоальбом'); ?></h1>
                <h4><?= Yii::t('main', 'Категорія'); ?> <span class="caret-right"></span> <a href="<?= Yii::app()->createUrl('/site/category', array('alias'=>$category->category->alias)); ?>"><?= Yii::app()->language == 'ru' ? $category->category->title_ru : $category->category->title_uk; ?></a> <span><?= $this->getStringDate($category->date); ?> &nbsp;
                        <i class="fa fa-eye"></i> <?= (int)$category->views; ?></span></h4>
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
                        <?php if($category->reclame): ?>
                        <a href="#" class="tooltips fa fa-pinterest-p">
                            <span><?=Yii::t('main', 'Рекламні матеріали'); ?></span>
                        </a>
                        <?php endif; ?>
                        <?= Yii::app()->language == 'ru' ? $category->title_ru : $category->title_uk; ?>
                    </h2>
                    <div class="wraper">
                        <div class="slider-wrapper theme-default">
                            <div id="slider" class="nivoSlider">
                                <?php foreach($photos as $key => $photo): ?>
                                    <?php if($key < 1): ?>
                                        <a href="#" class="nivo-imageLink" style="display: block;"><img src="<?= Yii::app()->baseUrl.'/uploads/images/'.$photo->image; ?>" data-thumb="<?= Yii::app()->baseUrl.'/uploads/images/thumbs/'.$photo->image; ?>" alt="" />
                                            <?php if(strlen(Yii::app()->language == 'ru' ? $photo->title_ru : $photo->title_uk) > 0): ?>
                                                <div>
                                                    <p>
                                                        <span>
                                                            <i class="fa fa-quote-left"></i>
                                                        </span>
                                                        <?= Yii::app()->language == 'ru' ? $photo->title_ru : $photo->title_uk; ?>
                                                    </p>
                                                </div>
                                            <?php endif; ?>
                                        </a>
                                    <?php else: ?>
                                        <img src="<?= Yii::app()->baseUrl.'/uploads/images/'.$photo->image; ?>" data-thumb="<?= Yii::app()->baseUrl.'/uploads/images/thumbs/'.$photo->image; ?>" alt="" title="This is an example of a caption" />
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>

                        </div>
                    </div>
                    <p><?= Yii::app()->language == 'ru' ? $category->description_ru : $category->description_uk; ?></p>
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
                        <p><?= Yii::t('main', 'Коментарі'); ?>: <span> <i class="fa fa-eye"></i> <?= (int)$category->views; ?></span><p>Автор: <span><?= $category->author; ?></span></p>
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
                    /* * * CONFIGURATION VARIABLES * * */
                    var disqus_shortname = 'garmatatv';
                    
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
                <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>
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
                    <!--\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ VIDEO BLOCK \\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->
                    <div class="outerMason"> 
                    <?php foreach($relatedPhotos as $photo): ?>
                        <div class="oneVideoIn">
                            <div>
                                <img src="<?= Yii::app()->baseUrl.'/uploads/galery/category/'.$photo->image; ?>" alt="">
                                <span class="iconsforNews"><i class="fa fa-image hoverIco"></i></i></span>
                            </div>
                            <h4><?= Yii::app()->language == 'ru' ? $photo->category->title_ru : $photo->category->title_uk; ?></h4>
                            <span><?= $this->getStringDate($photo->date); ?> &nbsp;
                                <i class="fa fa-eye"></i> <?= (int)$photo->views; ?></span>
                            <h3>
                                <?= CHtml::link(Yii::app()->language == 'ru' ? $photo->title_ru : $photo->title_uk ,array('/site/photos', 'id'=>$photo->id)); ?>
                            </h3>
                            <p><?= Yii::app()->language == 'ru' ? $photo->short_ru : $photo->short_uk; ?></p>
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