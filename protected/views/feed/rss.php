<?php
?>
<?= '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<rss version="2.0"
       xmlns="http://backend.userland.com/rss2"
       xmlns:yandex="http://news.yandex.ru">
    <channel>
        <title>Гармата</title>
        <link>http://garmata.tv</link>
        <description>Гармата — Інтернет-видання, яке ставить за мету максимально широко та об`єктивно відображати політичне, економічне, культурне життя Чернігівської області і України</description>
        <copyright>Copyright 2009, garmata.tv</copyright>

        <?php foreach ($newsFeed as $key => $news): ?>
            <item>
                <title><?= $news['title_uk']; ?></title>
                <link>
                    <?php if($news['type'] == 'news'): ?>
                        <?= Yii::app()->createAbsoluteUrl('/site/news', array('id'=>$news['id'])); ?>
                    <?php elseif($news['type'] == 'photo'): ?>
                        <?= Yii::app()->createAbsoluteUrl('/site/photos', array('id'=>$news['id'])); ?>
                    <?php elseif($news['type'] == 'video'): ?>
                        <?= Yii::app()->createAbsoluteUrl('/site/video', array('id'=>$news['id'])); ?>
                    <?php endif; ?>
                </link>
                <enclosure 
                <?php if($news['type'] == 'news'): ?>
                    url="http://garmata.tv/uploads/news/thumb/<?=$news['image'];?>" type="image/jpeg"     
                <?php elseif($news['type'] == 'photo'): ?>
                    url="http://garmata.tv/uploads/images/<?=$news['image'];?>" type="image/jpeg" 
                <?php elseif($news['type'] == 'video'): ?>
                    url="http://garmata.tv/uploads/video/<?=$news['image'];?>" type="image/jpeg" video="true"  
                <?php endif; ?>
                />
                <description><?=htmlspecialchars($this->getShortDescription(strip_tags($news['description_uk']), 300))."..."; ?></description>
                <category><?= $news['category_title_uk']; ?></category>
                <pubDate><?= date("D, d M Y H:i:s +0300", strtotime($news['date'])); ?></pubDate>
                <yandex:full-text><?= htmlspecialchars(strip_tags($news['description_uk'])); ?></yandex:full-text>
            </item>
        <?php endforeach; ?>
    </channel>
</rss>