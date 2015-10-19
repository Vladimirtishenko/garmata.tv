<div class="outerSectionMain">
    <section class="main">
        <div class="outerLevel1">
            <div class="videoBlock pageWithoutTop oneNewsPage">
                <hr>
                <h1><?= Yii::t('main', 'Пост читача'); ?></h1>
                <h4>
                    Автор
                    <span class="caret-right"></span>
                        <?= CHtml::link($user->name, array('/blog/default/bloger', 'id'=>$user->id)); ?>
                    <span>
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

                <div class="allTextOneNewsAdmin">
                    <h2><?= $model->title; ?></h2>
                    <?=preg_replace('/<iframe width="(.*?)"/i', '<iframe width="100%"',strip_tags($model->description, '<a><p><iframe><br><b><span><img>'));?>
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
                </div>

                <div class="seenAllnews oneBlogerP">
                    <hr>
                    <h1><?= Yii::t('main', 'Читайте інші пости'); ?></h1>
                    <div class="book">
                        <div class="clears">
                    <?php foreach($relatedNews as $news): ?>
                        <p>
                            <i class="fa fa-bookmark "></i> &nbsp;
                            <?= CHtml::link($news->title, array('/blog/default/post', 'id'=>$news->id)); ?>
                            <?= CHtml::link('Автор: '.$news->author->name, array('/blog/default/bloger', 'id'=>$news->author->id)); ?>
                        </p>
                    <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="allmini pageWithoutTop">
                <?php $this->widget('application.components.widgets.AllNewsWidget', array('limit'=>50, 'showPictures'=>false)); ?>
            </div>
        </div>
    </section>
</div>

