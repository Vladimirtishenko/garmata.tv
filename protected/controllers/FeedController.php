<?php
class FeedController extends Controller
{
    public function actionRss()
    {
        $this->layout = '';
        header('Content-Type: text/xml; charset=utf-8', true);
        $sql="
        (SELECT n.rss, n.description_uk, n.id, n.title_uk, n.title_ru, n.date, type, reclame, n.image, n.views, c.alias AS category_alias, c.title_ru AS category_title_ru, c.title_uk AS category_title_uk FROM news n INNER JOIN category c ON n.category_id = c.id WHERE n.rss = 1)
            UNION
        (SELECT n.rss, n.description_uk, n.id, n.title_uk, n.title_ru, n.date, type, reclame, n.image, n.views, c.alias AS category_alias, c.title_ru AS category_title_ru, c.title_uk AS category_title_uk FROM photo_category n INNER JOIN category c ON n.category_id = c.id WHERE n.rss = 1
            ORDER BY  `date` DESC LIMIT 20)
            UNION
        (SELECT n.rss, n.description_uk, n.id, n.title_uk, n.title_ru, n.date, type, reclame, n.image, n.views, c.alias AS category_alias, c.title_ru AS category_title_ru, c.title_uk AS category_title_uk FROM video n INNER JOIN category c ON n.category_id = c.id WHERE n.rss = 1)
            ORDER BY  `date` DESC LIMIT 20";
        $connection = Yii::app()->db;
        $command = $connection->createCommand($sql);
        $newsFeed = $command->queryAll();
        $this->renderPartial('rss', array('newsFeed'=>$newsFeed));
    }
}