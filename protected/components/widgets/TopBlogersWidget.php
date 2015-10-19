<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 22.08.14
 * Time: 15:17
 */
class TopBlogersWidget extends CWidget
{
    public $blogers;
    public function init()
    {
        $this->blogers = User::model()->findAllBySql("SELECT DISTINCT *, (SELECT COUNT(*) FROM articles WHERE author_id = `user`.id) AS count FROM `user` WHERE (role = 'bloger') ORDER BY count DESC LIMIT 2");
    }
    public function run()
    {
        $this->render('top_blogers', array('blogers'=>$this->blogers));
    }
}