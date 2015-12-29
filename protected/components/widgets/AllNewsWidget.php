<?php
class AllNewsWidget extends CWidget
{
    public $allNews;
    public $limit = 12;
    public $showPictures = true;
    public $justNews = false;

    public function init()
    {
        $sql="
        (SELECT n.id, n.title_uk, n.title_ru, n.date, type, reclame, n.image, n.views, c.alias AS category_alias, c.title_ru AS category_title_ru, c.title_uk AS category_title_uk FROM news n INNER JOIN category c ON n.category_id = c.id WHERE n.category_id != 11)
            UNION
        (SELECT n.id, n.title_uk, n.title_ru, n.date, type, reclame, n.image, n.views, c.alias AS category_alias, c.title_ru AS category_title_ru, c.title_uk AS category_title_uk FROM video n INNER JOIN category c ON n.category_id = c.id WHERE n.category_id != 11)
            UNION
        (SELECT n.id, n.title_uk, n.title_ru, n.date, type, reclame, n.image, n.views, c.alias AS category_alias, c.title_ru AS category_title_ru, c.title_uk AS category_title_uk FROM photo_category n INNER JOIN category c ON n.category_id = c.id WHERE n.category_id != 11)
            ORDER BY  `date` DESC LIMIT ".$this->limit;
        if($this->justNews)
            $sql="SELECT n.id, n.title_uk, n.title_ru, n.date, type, reclame, n.image, n.views, c.alias AS category_alias, c.title_ru AS category_title_ru, c.title_uk AS category_title_uk FROM news n INNER JOIN category c ON n.category_id = c.id WHERE n.category_id != 11 ORDER BY  `date` DESC LIMIT ".$this->limit;
        $connection = Yii::app()->db;
        $command = $connection->createCommand($sql);
        $this->allNews = $command->queryAll();
    }
    public function run()
    {
        if($this->showPictures)
            $this->render('allNews', array('allNews' => $this->allNews, 'showPictures'=>$this->showPictures));
        else
            $this->render('allNewsSecond', array('allNews' => $this->allNews, 'showPictures'=>$this->showPictures));
    }
}