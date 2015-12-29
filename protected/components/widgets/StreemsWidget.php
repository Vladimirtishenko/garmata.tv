<?php
class StreemsWidget extends CWidget
{
    public $streems;

    public function init()
    {
        // $sql = "SELECT n.id, n.title_uk, n.title_ru, n.date, n.video, type, reclame, n.image, n.views, c.alias AS category_alias, c.title_ru AS category_title_ru, c.title_uk AS category_title_uk FROM video n INNER JOIN category c ON n.category_id = c.id WHERE n.category_id = 11 ORDER BY `date` DESC LIMIT 2";


        // Redaction choice
        $sql="
        (SELECT n.id, n.title_uk, n.title_ru, n.date, type, reclame, n.image, n.views, c.alias AS category_alias, c.title_ru AS category_title_ru, c.title_uk AS category_title_uk FROM news n INNER JOIN category c ON n.category_id = c.id WHERE redaction_chose = 1)
            UNION
        (SELECT n.id, n.title_uk, n.title_ru, n.date, type, reclame, n.image, n.views, c.alias AS category_alias, c.title_ru AS category_title_ru, c.title_uk AS category_title_uk FROM video n INNER JOIN category c ON n.category_id = c.id WHERE redaction_chose = 1)
            UNION
        (SELECT n.id, n.title_uk, n.title_ru, n.date, type, reclame, n.image, n.views, c.alias AS category_alias, c.title_ru AS category_title_ru, c.title_uk AS category_title_uk FROM photo_category n INNER JOIN category c ON n.category_id = c.id WHERE redaction_chose = 1)
            ORDER BY  `date` DESC LIMIT 2";

        $connection = Yii::app()->db;
        $command = $connection->createCommand($sql);
        $this->streems = $command->queryAll();

    }
    public function run()
    {
        $this->render('streems', array('translations'=>$this->streems));
    }
}