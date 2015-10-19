<?php

class PhotoNewsWidget extends CWidget
{
    public $model;
    public function init()
    {
        $this->model = PhotoCategory::model()->findAll(array('order'=>'date DESC', 'limit'=>4, 'select'=>'title_ru, views, title_uk, id, image, category_id, short_uk, short_ru, date, reclame'));
    }
    public function run()
    {
        $this->render('photoNews', array('model'=>$this->model));
    }
}