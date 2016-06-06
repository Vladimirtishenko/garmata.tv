<?php
?>

<div class="outerSectionMain">
    <section class="main">
        <div class="outerLevel1">
            <div class="videoBlock pageWithoutTop">
                <hr>
                <h1><?=Yii::t('main', 'Останні фоторепортажі'); ?></h1>
                <div class="carousel carousel--wide" data-carousel>
                    <!-- Items to cycle -->
                    <div class="carousel-items">
                        <ul data-carousel-items>
                            <?php foreach($lastPhotos as $photo): ?>
                                <li>
                                    <a href="<?= Yii::app()->createUrl('/site/photos', array('id'=>$photo->id)); ?>">
                                        <img src="<?= Yii::app()->baseUrl.'/uploads/galery/category/'.$photo->image; ?>" alt="" class="fluid">
                                    </a>
                                    <span class="iconsforNews"><i class="fa fa-image hoverIco"></i></i></span>
                                    <div class="forTextPageVideo">
                                        <h3>
                                            <a href="<?= Yii::app()->createUrl('/site/photos', array('id'=>$photo->id)); ?>"><?= Yii::app()->language == 'ru' ? $photo->title_ru : $photo->title_uk; ?></a>
                                        </h3>
                                        <p><?= Yii::app()->language == 'ru' ? $photo->short_ru : $photo->short_uk; ?></p>
                                        <h4>
                                            <?= Yii::app()->language == 'ru' ? $photo->category->title_ru : $photo->category->title_uk; ?>
                                        </h4>
                                        <span><?= $this->getStringDate($photo->date); ?> &nbsp;
                                            <i class="fa fa-eye"></i> <?= (int)$photo->views; ?></span>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <a href="javascript:;" class="carousel-prev" data-carousel-prev><span class="caret-left"></span></a>
                    <a href="javascript:;" class="carousel-next" data-carousel-next><span class="caret-right"></span></a>
                    <div class="carousel-tabs">
                        <ol class="bullets" data-carousel-tabs>
                            <?php foreach($lastPhotos as $photo): ?>
                                <li><a href="javascript:;"></a></li>
                            <?php endforeach; ?>
                        </ol>
                    </div>

                </div>     
                <div class="google-market-top">
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
                <div id="GNM3203" style="text-align:center; display:none; margin: 20px 0;" ><a href="http://www.novostimira.com.ua" id="GNM3203t" style="display:none" target="_blank"><strong>Новости</strong></a></div>
                <div class="allVideoPage">
                    <hr>
                    <h1><?=Yii::t('main', 'Всі фоторепортажі'); ?></h1>

                    <?php
                    $this->widget('zii.widgets.CListView', array(
                        'dataProvider'=>$data,
                        'ajaxUpdate'=>false,
                        'itemView'=>'_albums',
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