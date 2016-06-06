<?php
$this->pageTitle = Yii::app()->language == 'ru' ? $data->title_ru : $data->title_uk;
$this->pageDescription = Yii::app()->language == 'ru' ? $data->title_ru : $data->title_uk;
$this->metaAttributes[] = '<meta property="og:image" content="http://garmata.tv'.Yii::app()->baseUrl.'/uploads/news/full/'.$data->image.'" />';
$this->metaAttributes[]  = '<link rel="image_src" href="http://garmata.tv'.Yii::app()->baseUrl.'/uploads/news/full/'.$data->image.'" />';
$this->metaAttributes[]  = '<meta property="image" content="http://garmata.tv'.Yii::app()->baseUrl.'/uploads/news/full/'.$data->image.'"/>';
$this->metaAttributes[]  = '<meta property="vk:image" content="http://garmata.tv'.Yii::app()->baseUrl.'/uploads/news/full/'.$data->image.'"/>';
?>
<div class="outerSectionMain">
    <section class="main">
        <div class="outerLevel1">
            <div class="videoBlock pageWithoutTop oneNewsPage">
                <hr>
                <h1><?= Yii::t('main', 'Новини'); ?></h1>
                <h4><?= Yii::t('main', 'Категорія'); ?> <span class="caret-right"></span>
                    <?php if($data->reclame): ?>
                        <a href="#" class="tooltips fa fa-pinterest-p">
                            <span><?=Yii::t('main', 'Рекламні матеріали'); ?></span>
                        </a>
                    <?php endif; ?>
                    <?= CHtml::link(Yii::app()->language == 'ru' ? $data->category->title_ru : $data->category->title_uk, array('/site/category', 'alias'=>$data->category->alias)); ?>
                    <span><?= $this->getStringDate($data->date); ?> &nbsp;
                        <i class="fa fa-eye"></i> <?= (int)$data->views; ?></span></h4>

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

                <div class="allTextOneNewsAdmin">
                    <h2><?= Yii::app()->language == 'ru' ? $data->title_ru : $data->title_uk; ?></h2>
                    <?= CHtml::image(Yii::app()->baseUrl.'/uploads/news/thumb/'.$data->image, '', array('class'=>'gen')); ?>
                    <p><?= Yii::app()->language == 'ru' ? $data->description_ru : $data->description_uk; ?></p>
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
                       <p>Просмотры <span><i class="fa fa-eye"></i> <?= (int)$data->views; ?></span><p>Автор: <span><?= $data->author; ?></span></p>
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
                <div class="seenAllnews">
                    <hr>
                    <h1><?= Yii::t('main', 'Читайте також'); ?></h1>

                    <?php foreach($relatedNews as $news): ?>
                        <div class="blockNews">
                            <div>
                                <?= CHtml::image(Yii::app()->baseUrl.'/uploads/news/thumb/'.$news->image); ?>
                                <span class="iconsforNews">
                                    <i class="fa fa-file hoverIco"></i>
                                </span>
                            </div>
                            <h4>
                                <?= CHtml::link(Yii::app()->language == 'ru' ? $news->category->title_ru : $news->category->title_uk, array('/site/category', 'alias'=>$data->category->alias)); ?>
                                <span>
                                    <?= $this->getStringDate($news->date); ?> &nbsp;
                                    <i class="fa fa-eye"></i> <?= (int)$news->views; ?>
                                </span>
                            </h4>
                            <h5>
                                <?= CHtml::link(Yii::app()->language == 'ru' ? $news->title_ru : $news->title_uk, array('/site/news', 'id'=>$news->id)); ?>
                            </h5>
                            <p><?= Yii::app()->language == 'ru' ? $news->short_ru : $news->short_uk; ?></p>
                        </div>
                        <hr class="beforeLine">
                    <?php endforeach; ?>
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
