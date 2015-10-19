<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class AdminController extends CController
{
    public $layout='/layouts/admin';
    public $actionHeader = '';
    public $mainMenu = array(
        array(
            'label'=>'
                <i class="fa fa-home"></i>
                <span>Главная</span>
            ',
            'url'=>array('/admin/default/index'),
        ),
        array(
            'label'=>'
                <i class="fa fa-file-text-o"></i>
                <span>Новости</span>
            ',
            'url'=>array('/admin/news/index'),
        ),
        array(
            'label'=>'
                <i class="fa fa-shopping-cart"></i>
                <span>Категории</span>
                <small class="badge pull-right bg-green">new</small>
            ',
            'url'=>array('/admin/category/index'),
        ),
        array(
            'label'=>'
                <i class="fa fa-shopping-cart"></i>
                <span>Галерея фото</span>
                <small class="badge pull-right bg-green">new</small>
            ',
            'url'=>array('/admin/photoCategory/index'),
        ),
        array(
            'label'=>'
                <i class="fa fa-shopping-cart"></i>
                <span>Фотографии</span>
                <small class="badge pull-right bg-green">new</small>
            ',
            'url'=>array('/admin/photo/index'),
        ),
        array(
            'label'=>'
                <i class="fa fa-shopping-cart"></i>
                <span>Видеозаписи</span>
                <small class="badge pull-right bg-green">new</small>
            ',
            'url'=>array('/admin/video/index'),
        ),
        array(
            'label'=>'
                <i class="fa fa-shopping-cart"></i>
                <span>Дополнительные страницы</span>
                <small class="badge pull-right bg-green">new</small>
            ',
            'url'=>array('/admin/pages/index'),
        ),
    );
    public $breadcrumbs=array();
    private $_assetsPath;

    public function getAssetsPath()
    {
        if ($this->_assetsPath === null) {
            $this->_assetsPath = Yii::app()->assetManager->publish(
                Yii::getPathOfAlias('application.modules.admin.assets'),
                false,
                -1,
                YII_DEBUG
            );
        }
        return $this->_assetsPath;
    }


    /**
     * @return array action filters
     */
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules()
    {
        return array(
            array('allow',
                'actions' => array('login'),
                'users' => array('*'),// для всех
            ),
            array('allow',
                'actions' => array('view', 'create', 'update', 'delete', 'index', 'logout','admin', 'upload', 'crop'),
                'roles' => array('admin'),// для авторизованных
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }
}