<?php
/**
 * Created by PhpStorm.
 * User: Lee
 * Date: 14.09.14
 * Time: 17:04
 */
class MainNewsWidget extends CWidget
{
    public $model = array();
    public function init()
    {
        $start = date('Y-m-d H:i:s');
        $end = date('Y-m-d H:i:s', time()-(60*60*24*5));
        $sql="
        (SELECT n.id, n.title_uk, n.title_ru, n.date, type, reclame, n.image, n.views, c.alias AS category_alias, c.title_ru AS category_title_ru, c.title_uk AS category_title_uk FROM news n INNER JOIN category c ON n.category_id = c.id)
            UNION
        (SELECT n.id, n.title_uk, n.title_ru, n.date, type, reclame, n.image, n.views, c.alias AS category_alias, c.title_ru AS category_title_ru, c.title_uk AS category_title_uk FROM video n INNER JOIN category c ON n.category_id = c.id)
            UNION
        (SELECT n.id, n.title_uk, n.title_ru, n.date, type, reclame, n.image, n.views, c.alias AS category_alias, c.title_ru AS category_title_ru, c.title_uk AS category_title_uk FROM photo_category n INNER JOIN category c ON n.category_id = c.id)
            ORDER BY  `views` DESC LIMIT 8";
        
        $connection = Yii::app()->db;
        $command = $connection->createCommand($sql);
        $this->model = $command->queryAll();
    }
    public function run()
    {
        $this->render('mainNews', array('model'=>$this->model));
    }
}