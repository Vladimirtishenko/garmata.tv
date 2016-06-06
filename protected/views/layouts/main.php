<!-- VK1122 -->
<?php
/**
 * @var $this Controller
 */
?>
<!DOCTYPE html>
<html xmlns:og="http://ogp.me/ns#">
<head>
    <title><?= $this->pageTitle; ?></title>
    <meta http-equiv="Content-Language" content="<?= Yii::app()->language == 'uk' ? 'ua' : 'ru'; ?>" />
    <meta name="author" content="Garmata TV">
    <meta name="viewport" content="width=1280, initial-scale=-1">
    <meta name="copyright" content="copyright ©2015 Garmata TV" />
    <meta content="<?= $this->pageDescription; ?>" name="description">
    <meta property = "og:title" content = "<?= $this->pageTitle; ?>" />
    <meta property = "og:type" content = "website" />
    <meta property="article:author" content="Garmata TV">
    <meta property="og:url" content="<?='http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];?>">
    <meta property = "og:description" content = "<?= $this->pageDescription; ?>" />  
    <meta property="og:site_name" content="Garmata TV" />
     <?php
        foreach($this->metaAttributes as $meta) {
            echo $meta;
        }
    ?>
    <meta name="twitter:card" content="summary">
    <meta name="twitter:url" content="<?='http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];?>">
    <meta name="twitter:title" content="<?= $this->pageTitle; ?>">
    <meta name="twitter:description" content="<?= $this->pageDescription; ?>">
    <meta name="twitter:site" content="Garmata TV">

    <link rel="alternate" href="http://garmata.tv/feed/rss/" type="application/xml" title="garmata.tv Rss">
    <link rel="icon" type="image/png" href="<?= Yii::app()->baseUrl; ?>/images/favicon.png">
    <link rel="stylesheet" href="<?= Yii::app()->baseUrl; ?>/css/defultOne.min.css">
    <!-- <link rel="stylesheet" href="<?= Yii::app()->baseUrl; ?>/prodaction/default.min.css"> -->
</head>
<body>
<style>
    .rt_photo_30721{
        width: 138px !important;
        height: initial !important;
        box-shadow: none !important;
        background: transparent !important;
    }
    
    .rt_photo_30721 img {
        width: 140px!important;
        height: 150px!important;
    }

    .rt_table_30721{
        width: 300px !important;
    }

    .rt_title_30721{
        font-size: 14px !important;
        font-weight: normal !important;
        font-family: Georgia !important;
    }
    .google-market{
        display: table;
        margin: 10px auto;
        width: 100%;
        padding: 0 0 10px;
    }
    .google-market-top{
        display: table;
        margin: 35px auto -10px;
        width: 100%;
    }
    .google-market-top-side{
        display: table;
        padding: 30px 0;
        width: 100%;
    }
    .this-tab-margin .tabsStream{
        margin-bottom: 0 !important;
    }
    .banners-garmata-top-image{
        width: 100%;
    }
</style>
<div class="popUpAbout">
    <?php $info = Pages::model()->findByPk(1); ?>
    <div class="contentAbout">
        <div class="closer aboutCloser">
            <span>X</span>
        </div>
        <div class="forLogoAbout">
             <?= CHtml::image(Yii::app()->baseUrl.'/images/logoBottom.png'); ?>
            <?= CHtml::image(Yii::app()->baseUrl.'/uploads/galery/category/'. $info->image, '', array('class'=>'redaktorImg')); ?>
            <p><?= Yii::app()->language == 'ru' ? $info->profession_ru : $info->profession_uk; ?></p>
            <h4><?= Yii::app()->language == 'ru' ? $info->author_ru : $info->author_uk; ?></h4>
             <div class="social">
                <a href="https://www.youtube.com/user/garmatachetv" target="_blank"><i class="fa fa-youtube-play"></i></a>
                <a href="https://twitter.com/garmatachannel" target="_blank"><i class="fa fa-twitter"></i></a>
                <a href="https://vk.com/garmata_tv" target="_blank"><i class="fa fa-vk"></i></a>
                <a href="https://www.facebook.com/garmatatv" class="youTube" target="_blank"><i class="fa fa-facebook-square"></i></a>
            </div>
        </div>
        <hr noshade>
        <h3><?= Yii::app()->language == 'ru' ? $info->title_ru : $info->title_uk; ?></h3>
        <div class="allText">
            <?= Yii::app()->language == 'ru' ? $info->description_ru : $info->description_uk; ?>
        </div>
    </div>
</div>
<div class="popUpNewsAssept">
<div class="contentNewsAccept animated">
<div class="closer">
<span>X</span>
</div>
<div class="sucsseccMassage" id="success">
<hr noshade="">
<h2><?= Yii::t('main', 'Ваша новина відправлена'); ?></h2>
</div> 
<div class="outersSucsess">
<hr noshade="">
<h3><?= Yii::t('main', 'Запропонувати нам новину'); ?></h3>
<form action="<?= Yii::app()->createUrl('/site/sendNews'); ?>" id="formNewsSend" method="post">
<div class="outerInputs">
<input type="text" name="name" required><label><?= Yii::t('main', 'Ваше ім\'я'); ?> *</label>
</div>
<div class="outerInputs">
<input type="email" name="email" required><label><?= Yii::t('main', 'Ваша пошта'); ?> *</label>
</div>
<div class="outerInputs">
<input type="text" name="number" required><label><?= Yii::t('main', 'Номер телефона'); ?> *</label>
</div>
<div class="outerInputs">
<input type="text" name="title" required><label><?= Yii::t('main', 'Тема новини'); ?> *</label>
</div>
<div class="outerInputs textareaOuter">
<textarea required name="mess"></textarea><label><?= Yii::t('main', 'Текст новини'); ?> *</label>
</div>
<div class="outerInputs">
<input type="file" name="uploaded_file" id="changeFile"><label class="changeFileFor" for="changeFile"><?= Yii::t('main', 'Прикріпити файл'); ?></label><span class="fileName"></span>
</div>
<button type="submit"><?= Yii::t('main', 'Відправити'); ?></button> <label> * <?= Yii::t('main', 'Усі поля бажано заповнити'); ?></label>
</form>
</div>
</div>
</div>
<!--\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ MAIN BLOCK \\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->
<!---- Flash message ---->
<?php $this->widget('application.components.widgets.FlashWidget'); ?>
<!---- End Flash message ---->
<header>
    <nav>
        <ul class="topMenu">
            <li>
                <?= CHtml::link(
                    CHtml::image(Yii::app()->baseUrl.'/images/logo.png', 'logo', array('id'=>'blink1')),
                    array('/site/index')
                ); ?>
                <ul class="outDropDown">
                    <?php foreach(Category::model()->findAll() as $category): ?>
                        <?php if($category->id != 11): ?>
                        <li>
                            <?= CHtml::link(Yii::app()->language == 'ru' ? $category->title_ru : $category->title_uk, array('/site/category', 'alias'=>$category->alias)); ?>
                            <ul class="inDrop">
                                <li>
                                    <?php $lastVideo = Video::model()->find(array('order'=>'date Desc', 'condition'=>'category_id = :category_id', 'params'=>array(':category_id'=>$category->id))); ?>
                                    <a href="<?= Yii::app()->createUrl('/site/video', array('id'=>$lastVideo->id)); ?>" class="menuOuterImg">
                                        <img src="<?= Yii::app()->baseUrl.'/uploads/video/'.$lastVideo->image; ?>" alt="">
                                    </a>
                                    <div class="videoDescrMenu">
                                        <div>
                                            <span><?= $this->getStringDate($lastVideo->date); ?> &nbsp;
                                                <i class="fa fa-eye"></i> <?= (int)$lastVideo->views; ?></span>
                                            <?= CHtml::link(strip_tags($this->getShortDescription(Yii::app()->language == 'ru' ? $lastVideo->title_ru : $lastVideo->title_uk, 70)."..."), array('/site/video', 'id'=>$lastVideo->id)) ?>
                                            <p><?= Yii::app()->language == 'ru' ? $lastVideo->short_ru : $lastVideo->short_uk; ?></p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="helpersPhoto"></div>
                                    <div class="rightPhoto">
                                        <?php $lastPhotos = PhotoCategory::model()->findAll(array('condition'=>'category_id = :category_id', 'params'=>array(':category_id'=>$category->id), 'limit'=>2, 'order'=>'date DESC')); ?>
                                        <?php foreach($lastPhotos as $photo): ?>
                                            <div class="discrPhoto">
                                                <span><?= $this->getStringDate($photo->date); ?> &nbsp;
                                                    <i class="fa fa-eye"></i> <?= (int)$photo->views; ?></span>
                                                <?= CHtml::link(strip_tags($this->getShortDescription(Yii::app()->language == 'ru' ? $photo->title_ru : $photo->title_uk, 50)."..."), array('/site/photos', 'id'=>$photo->id)); ?>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>

                                    <?php foreach($lastPhotos as $key => $photo): ?>
                                        <?php if($key == 0): ?>
                                            <a href="<?= Yii::app()->createUrl('/site/photos', array('id'=>$photo->id)); ?>"  class="menuOuterpImg">
                                                <img src="<?= Yii::app()->baseUrl.'/uploads/galery/category/'.$photo->image; ?>" alt="image01">
                                            </a>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </li>
                            </ul>
                        </li>
                    <?php endif; ?>
                    <?php endforeach; ?>

                    <li>
                        <a href="<?= Yii::app()->createUrl('/site/videos'); ?>"><?= Yii::t('main', 'Відео'); ?></a>
                        <ul class="inDrop">
                            <li>
                                <?php $lastVideo = Video::model()->find(array('order'=>'id DESC', 'condition'=>'category_id != :category_id', 'params'=>array(':category_id'=>11)  /*, 'condition'=>'category_id = :category_id', 'params'=>array(':category_id'=>$category->id)*/)); ?>
                                <a href="<?= Yii::app()->createUrl('/site/video', array('id'=>$lastVideo->id)); ?>" class="menuOuterImg">
                                    <img src="<?= Yii::app()->baseUrl.'/uploads/video/'.$lastVideo->image; ?>" alt="">
                                </a>
                                <div class="videoDescrMenu">
                                    <div>
                                        <span><?= $this->getStringDate($lastVideo->date); ?> &nbsp;
                                         <i class="fa fa-eye"></i> <?= (int)$lastVideo->views; ?></span>
                                         <?= CHtml::link(strip_tags($this->getShortDescription(Yii::app()->language == 'ru' ? $lastVideo->title_ru : $lastVideo->title_uk, 70)."..."), array('/site/video', 'id'=>$lastVideo->id)) ?>
                                        <p><?= Yii::app()->language == 'ru' ? $lastVideo->short_ru : $lastVideo->short_uk; ?></p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="helpersPhoto"></div>
                                <div class="rightPhoto">
                                    <?php $lastPhotos = Video::model()->findAll(array('limit'=>2, 'offset'=>1, 'order'=>'id DESC', 'condition'=>'category_id != :category_id', 'params'=>array(':category_id'=>11)));?>
                                    <?php foreach($lastPhotos as $photo): ?>
                                        <div class="discrPhoto">
                                            <span><?= $this->getStringDate($photo->date); ?> &nbsp;
                                                <i class="fa fa-eye"></i> <?= (int)$photo->views; ?></span>     
                                             <?= CHtml::link(strip_tags($this->getShortDescription(Yii::app()->language == 'ru' ? $photo->title_ru : $photo->title_uk, 50)."..."), array('/site/video', 'id'=>$photo->id)); ?>
                                        </div>
                                    <?php endforeach; ?>
                                </div>

                                <?php foreach($lastPhotos as $key => $photo): ?>
                                    <?php if($key == 0): ?>
                                        <a href="<?= Yii::app()->createUrl('/site/video', array('id'=>$photo->id)); ?>" class="menuOuterpImg">
                                            <img src="<?= Yii::app()->baseUrl.'/uploads/video/'.$photo->image; ?>" alt="image01">
                                        </a>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?= Yii::app()->createUrl('/site/photos'); ?>">Фото</a>
                        <ul class="inDrop">
                            <li>
                                <?php $lastVideo = PhotoCategory::model()->find(array('order'=>'date Desc')); ?>
                                <a href="<?= Yii::app()->createUrl('/site/video', array('id'=>$lastVideo->id)); ?>" class="menuOuterImg">
                                    <img src="<?= Yii::app()->baseUrl.'/uploads/galery/category/'.$lastVideo->image; ?>" alt="">
                                </a>
                                <div class="videoDescrMenu">
                                    <div>
                                        <span><?= $this->getStringDate($lastVideo->date); ?> &nbsp;
                                            <i class="fa fa-eye"></i> <?= (int)$lastVideo->views; ?></span>
                                       <?= CHtml::link(strip_tags($this->getShortDescription(Yii::app()->language == 'ru' ? $lastVideo->title_ru : $lastVideo->title_uk, 70)."..."), array('/site/video', 'id'=>$lastVideo->id)) ?>
                                        <p><?= Yii::app()->language == 'ru' ? $lastVideo->short_ru : $lastVideo->short_uk; ?></p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="helpersPhoto"></div>
                                <div class="rightPhoto">
                                    <?php $lastPhotos = PhotoCategory::model()->findAll(array('limit'=>2, 'offset'=>1, 'order'=>'date DESC')); ?>
                                    <?php foreach($lastPhotos as $photo): ?>
                                        <div class="discrPhoto">
                                            <span><?= $this->getStringDate($photo->date); ?> &nbsp;
                                                <i class="fa fa-eye"></i> <?= (int)$photo->views; ?></span>
                                             <?= CHtml::link(strip_tags($this->getShortDescription(Yii::app()->language == 'ru' ? $photo->title_ru : $photo->title_uk, 50)."..."), array('/site/photos', 'id'=>$photo->id)); ?>
                                        </div>
                                    <?php endforeach; ?>
                                </div>

                                <?php foreach($lastPhotos as $key => $photo): ?>
                                    <?php if($key == 0): ?>
                                    <a href="<?= Yii::app()->createUrl('/site/video', array('id'=>$photo->id)); ?>" class="menuOuterpImg">
                                        <img src="<?= Yii::app()->baseUrl.'/uploads/galery/category/'.$photo->image; ?>" alt="image01">
                                    </a>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li>
                <a href="<?= Yii::app()->createUrl('/site/allNews'); ?>"><h3><?= Yii::t('main', 'Новини'); ?><br><span><?= Yii::t('main', 'Про головне'); ?></span></h3></a>
            </li>
            <li><a href="<?= Yii::app()->createUrl('/site/videos'); ?>"><h3><?= Yii::t('main', 'Відео'); ?><br><span><?= Yii::t('main', 'Репортажі'); ?></span></h3></a></li>
            <li class="sticky"><a href="<?= Yii::app()->createUrl('/site/photos'); ?>"><h3>Фото<br><span><?= Yii::t('main', 'Репортажі'); ?></span></h3></a></li>
            <li class="arhiveGenDrop"><a href="#"><h3><?= Yii::t('main', 'Архів'); ?><br><span><?= Yii::t('main', 'Наших матеріалів'); ?></span></h3></a>
				<ul class="arhiveDrop">
					<li>
						<article>
							<input type="hidden" class="newDate" value="">
						</article>
					</li>
				</ul>
            </li>
            <li><a href="<?= Yii::app()->createUrl('/blog/default/index'); ?>"><h3>Я репортер<br><span><?= Yii::t('main', 'Авторські колонки та блоги'); ?></span></h3></a></li>
            <li class="search">
                <div>
                    <?php
                    $this->beginWidget('CActiveForm', array(
                        'id'=>'srhiv',
                        'method'=>'get',
                        'action'=>array('/site/search'),
                    ));
                    ?>
                     <div class="closersForm"></div>
                    <?= CHtml::textField('find', '', array('class'=>'formSearch')); ?>
                    <?= CHtml::tag('button',array('class' => 'searchButton')); ?>
                   
                    <?php $this->endWidget(); ?>

                    <button type="button" class="button openFormNews"><?= Yii::t('main', 'Відправити новину'); ?></button>

                    </div>
            </li>
            <li><div><img src="<?= Yii::app()->baseUrl; ?>/images/user.gif" alt=""><a href=""><span class="caret-down"></span></a></div>
                <ul class="forRegAuth">
                    <?php if(Yii::app()->user->isGuest): ?>
                    <li class="authUser">
                        <hr noshade>
                        <p><?= Yii::t('main', 'Використовуйте соціальні мережі'); ?></p>
                        <div class="socgroup">
                            <?php Yii::app()->eauth->renderWidget(); ?>
                        </div>
                        <hr noshade>
                        <p><?= Yii::t('main', 'Використовуйте електронну пошту'); ?></p>
                        <div class="input-group round">
                            <?php $this->widget('application.components.widgets.AuthWidget'); ?>
                        </div>
                    </li>
                    <?php else: ?>
					<?php $user = User::model()->findByPk(Yii::app()->user->id); ?>
                    <li class="logINCabinet">
                        <hr noshade>
                        <p><?= Yii::t('main', 'Особистий кабінет користувача'); ?></p>
                        <img src="<?= Yii::app()->baseUrl.'/uploads/users/avatars/'.$user->avatar; ?>" alt="">
                        <h3><?= $user->name; ?></h3>
                        <span><?= Yii::t('main', 'Кількість постів'); ?>: <span><?= Articles::model()->count(array('condition'=>'author_id = '.Yii::app()->user->id)); ?></span></span>
                        <?php $article = Articles::model()->find(array('order'=>'date DESC', 'condition'=>'author_id = '.Yii::app()->user->id)); ?>
                        <span><?= Yii::t('main', 'Останній пост'); ?>: <span><?= !empty($article) ? date('d-m-Y', strtotime($article->date)) : Yii::t('main', 'Немає постів'); ?></span></span>
                        <?= Chtml::link(Yii::t('main', 'Особистий кабінет'), array('/blog/cabinet/index'), array('class'=>'button')); ?>
                        <?= Chtml::link(Yii::t('main', 'Вийти'), array('/site/logout')); ?>
                    </li>
                    <?php endif; ?>
                </ul>
            </li>
        </ul>
    </nav>
</header>
<div class="topBlockInfo">
    <div class="titleGarmata">
        <p><?= Yii::t('main', 'Перше міське інтернет телебачення Чернігова'); ?></p> &nbsp; &mdash; &nbsp; <p><i class="fa fa-calendar"></i> <?= $this->getCurrentDate(); ?></p>
    </div>
    <div class="forTopButton">
        <button>Реклама</button> &nbsp; &mdash; &nbsp; <button class="openModalAbout"><?= Yii::t('main', 'Редакція'); ?></button>
    </div>
    <div class="social">
        <a href="https://www.youtube.com/user/garmatachetv" target="_blank"><i class="fa fa-youtube-play"></i></a>
        <a href="https://twitter.com/garmatachannel" target="_blank"><i class="fa fa-twitter"></i></a>
        <a href="https://vk.com/garmata_tv" target="_blank"><i class="fa fa-vk"></i></a>
        <a href="https://www.facebook.com/garmatatv" class="youTube" target="_blank"><i class="fa fa-facebook-square"></i></a>
        <a href="http://garmata.tv/feed/rss" class="rss" target="_blank"><i class="fa fa-rss"></i></a>
    </div>

    <?php $this->widget('application.components.widgets.LanguageSelector'); ?>
    <div class="outer-for-weather"></div>
    <div class="currency -this-currency-state">
        <p><i class="fa fa-bar-chart"></i> &nbsp; Курс валют</p>
    </div>
</div>

<div class="-market-link" style="display:none"><a href="http://garmata.tv/uk/site/video/769.html" target="_blank"><img src="http://garmata.tv/images/garmata-baner.gif" alt=""></a></div>

<?= $content; ?>

<div class="linkator">
    <p><?= Yii::t('main', 'Дивитися на ukr.net: '); ?></p>
    <?php
        include($_SERVER['DOCUMENT_ROOT'].'/linkator_ukrnet/links.php');
        echo makeUkrnetLink();
    ?>
</div>

<footer>
    <div class="footer">
        <div>
            <p><b> 2015 Інтернет-телебачення Чернігова Garmata TV.</b><br> При будь-якому використанні матеріалів гіперпосилання на <a href="http://garmata.tv">Garmata.tv</a> є обов'язковим. </p>
            <p>Передрук в газетах і електронних ЗМІ - виключно за наявності письмової угоди з Редакцією! </p>
            <p>Email: <a href="mailto: news@garmata.tv">news@garmata.tv</a></p>
            <div class="forTopButton">
                <button>Реклама</button>
                <button class="openModalAbout"><?= Yii::t('main', 'Редакція'); ?></button>
            </div>
            <p><i class="fa fa-exclamation-triangle"></i>Допускається цитування матеріалів сайту з обовязковим прямим, відкритим для пошукових систем гіперпосиланням на <a href="http://garmata.tv">Garmata.tv</a></p>
            <p>Матеріали з позначкою <b>"Р"</b> - публікуються на правах реклами.</p>

        </div>
        <div>
            <div>
                <?php $category = Category::model()->findByPk(1); ?>
                <h1>
                <?= CHtml::link(Yii::app()->language == 'ru' ? $category->title_ru : $category->title_uk, array('/site/category', 'alias'=>$category->alias)); ?></h1>
                <?php $news = News::model()->find(array('condition'=>'category_id = :category_id', 'order'=>'date DESC', 'params'=>array(':category_id'=>$category->id))); ?>
                <span>
                    <?= CHtml::link(Yii::app()->language == 'ru' ? $news->title_ru : $news->title_uk, array('/site/news', 'id'=>$news->id)); ?>
                </span>
                <?= CHtml::link(Yii::t('main', 'Всі новини з категорії'), array('/site/category', 'alias'=>$category->alias)); ?>
            </div>
            <div>
                <?php $category = Category::model()->findByPk(2); ?>
                <h1>
                <?= CHtml::link(Yii::app()->language == 'ru' ? $category->title_ru : $category->title_uk, array('/site/category', 'alias'=>$category->alias)); ?></h1>
                <?php $news = News::model()->find(array('condition'=>'category_id = :category_id', 'order'=>'date DESC', 'params'=>array(':category_id'=>$category->id))); ?>
                <span>
                    <?= CHtml::link(Yii::app()->language == 'ru' ? $news->title_ru : $news->title_uk, array('/site/news', 'id'=>$news->id)); ?>
                </span>
                <?= CHtml::link(Yii::t('main', 'Всі новини з категорії'), array('/site/category', 'alias'=>$category->alias)); ?>
            </div>
            <div>
                <?php $category = Category::model()->findByPk(4); ?>
                <h1>
                <?= CHtml::link(Yii::app()->language == 'ru' ? $category->title_ru : $category->title_uk, array('/site/category', 'alias'=>$category->alias)); ?></h1>
                <?php $news = News::model()->find(array('condition'=>'category_id = :category_id', 'order'=>'date DESC', 'params'=>array(':category_id'=>$category->id))); ?>
                <span>
                    <?= CHtml::link(Yii::app()->language == 'ru' ? $news->title_ru : $news->title_uk, array('/site/news', 'id'=>$news->id)); ?>
                </span>
                <?= CHtml::link(Yii::t('main', 'Всі новини з категорії'), array('/site/category', 'alias'=>$category->alias)); ?>
            </div>
        </div>
        <div>
            <div>
                <?php $category = Category::model()->findByPk(8); ?>
                <h1>
                <?= CHtml::link(Yii::app()->language == 'ru' ? $category->title_ru : $category->title_uk, array('/site/category', 'alias'=>$category->alias)); ?></h1>
                <?php $news = News::model()->find(array('condition'=>'category_id = :category_id', 'order'=>'date DESC', 'params'=>array(':category_id'=>$category->id))); ?>
                <span>
                    <?= CHtml::link(Yii::app()->language == 'ru' ? $news->title_ru : $news->title_uk, array('/site/news', 'id'=>$news->id)); ?>
                </span>
                <?= CHtml::link(Yii::t('main', 'Всі новини з категорії'), array('/site/category', 'alias'=>$category->alias)); ?>
            </div>
            <div>
                <?php $category = Category::model()->findByPk(3); ?>
                <h1>
                <?= CHtml::link(Yii::app()->language == 'ru' ? $category->title_ru : $category->title_uk, array('/site/category', 'alias'=>$category->alias)); ?></h1>
                <?php $news = News::model()->find(array('condition'=>'category_id = :category_id', 'order'=>'date DESC', 'params'=>array(':category_id'=>$category->id))); ?>
                <span>
                    <?= CHtml::link(Yii::app()->language == 'ru' ? $news->title_ru : $news->title_uk, array('/site/news', 'id'=>$news->id)); ?>
                </span>
                <?= CHtml::link(Yii::t('main', 'Всі новини з категорії'), array('/site/category', 'alias'=>$category->alias)); ?>
            </div>
            <div>
                <?php $category = Category::model()->findByPk(9); ?>
                <h1>
                <?= CHtml::link(Yii::app()->language == 'ru' ? $category->title_ru : $category->title_uk, array('/site/category', 'alias'=>$category->alias)); ?></h1>
                <?php $news = News::model()->find(array('condition'=>'category_id = :category_id', 'order'=>'date DESC', 'params'=>array(':category_id'=>$category->id))); ?>
                <span>
                    <?= CHtml::link(Yii::app()->language == 'ru' ? $news->title_ru : $news->title_uk, array('/site/news', 'id'=>$news->id)); ?>
                </span>
                <?= CHtml::link(Yii::t('main', 'Всі новини з категорії'), array('/site/category', 'alias'=>$category->alias)); ?>
            </div>
        </div>
        <div>
            <div>
                <h1><?= CHtml::link(Yii::t('main', 'Відеозаписи'), array('/site/videos')); ?></h1>
                <?php $news = Video::model()->find(array('order'=>'date DESC', 'condition'=>'category_id != :category_id', 'params'=>array(':category_id'=>11))); ?>
                <span>
                    <?= CHtml::link(Yii::app()->language == 'ru' ? $news->title_ru : $news->title_uk, array('/site/videos', 'id'=>$news->id)); ?>
                </span>
                <?= CHtml::link(Yii::t('main', 'Всі новини з категорії'), array('/site/videos')); ?>
            </div>
            <div>
                <h1><?= CHtml::link(Yii::t('main', 'Фоторепортажі'), array('/site/photos')); ?></h1>
                <?php $news = PhotoCategory::model()->find(array('order'=>'date DESC')); ?>
                <span>
                    <?= CHtml::link(Yii::app()->language == 'ru' ? $news->title_ru : $news->title_uk, array('/site/photos', 'id'=>$news->id)); ?>
                </span>
                <?= CHtml::link(Yii::t('main', 'Всі новини з категорії'), array('/site/photos')); ?>
            </div>
            <form action="#" class="forSubscribe">
            <div class="input-group">
                <div class="input-addon">@</div>
                <input type="email" class="input" name="url" placeholder="Подписаться..." required>
                <div class="input-addon"><button type="submit"><i class="fa fa-envelope"></i></button></div>
            </div>
            </form>
            <div class="resultSubscribe">
                <p>Вы подписались на рассылку новостей Garmata.tv</p>
            </div>
            <p class="socF">Garmata.tv <?= Yii::t('main', 'в соціальних мережах'); ?></p>
             <div class="social">
                <a href="https://www.youtube.com/user/garmatachetv" target="_blank"><i class="fa fa-youtube-play"></i></a>
                <a href="https://twitter.com/garmatachannel" target="_blank"><i class="fa fa-twitter"></i></a>
                <a href="https://vk.com/garmata_tv" target="_blank"><i class="fa fa-vk"></i></a>
                <a href="https://www.facebook.com/garmatatv" class="youTube" target="_blank"><i class="fa fa-facebook-square"></i></a>
                <a href="http://garmata.tv/feed/rss" class="rss" target="_blank"><i class="fa fa-rss"></i></a>
            </div>
        </div>
    </div>
</footer>
<?php Yii::app()->clientScript->registerCoreScript('jquery',CClientScript::POS_END, array('async'=>true)); ?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/lib/production.min.js',CClientScript::POS_END, array('async'=>true)); ?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/lib/currency.js',CClientScript::POS_END); ?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/lib/weather.js',CClientScript::POS_END); ?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/lib/seen_to_video.js',CClientScript::POS_END); ?>
 <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;document.head.appendChild(a);
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
    ga('create', 'UA-62900554-1', 'auto');
    ga('send', 'pageview');
</script>
<script>
    (function(d,s){
    var m =d.querySelector(".-reclama");
    if(!m) {return;}
    var o=d.createElement(s);
    o.async=true;
    o.charset="utf-8";
    if (location.protocol == "https:") {
    o.setAttribute("src", "https://js-ua.redtram.com/n4p/0/30/ticker_30721.js");
    }
    else {
    o.setAttribute("src", "http://js.ua.redtram.com/n4p/0/30/ticker_30721.js");
    }
    var x=document.body;
    x.insertBefore(o,x.firstElementChild);
    setTimeout(function(){
      var link = m.querySelectorAll("a");
      var block = m.querySelectorAll("div");
      m.style.display = "block";
      setTimeout(function(){m.style.opacity = 1},300)
    },1000)
    })(document,"script");
</script>
</body>
</html>