<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
    'name'=>'Garmata TV',

    // preloading 'log' component
    'preload' => array(
        'debug',
    ),
    //language for project
    'sourceLanguage'=>'uk',
    'language'=>'uk',

    // autoloading model and component classes
    'import'=>array(
        'application.models.*',
        'application.components.*',
        'ext.eoauth.*',
        'ext.eoauth.lib.*',
        'ext.lightopenid.*',
        'ext.eauth.services.*',
    ),
    'modules'=>array(
        'gii'=>array(
            'class'=>'system.gii.GiiModule',
            'password'=>'123',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters'=>array('127.0.0.1','::1'),
        ),
        'admin'=>array(
            'defaultController'=>'News',
        ),
        'blog',
        'vip',
    ),

    // application components
    'components'=>array(
		'loid' => array(
            'class' => 'ext.lightopenid.loid',
        ),
        'eauth' => array(
            'class' => 'ext.eauth.EAuth',
            'services' => array(
			'google-oauth' => array(
                    // register your app here: https://code.google.com/apis/console/
                    'class' => 'GoogleOAuthService',
                    'client_id' => '882402898162-hm0ofk30hh8f1v3cg8vhkjjhdkbgsp42.apps.googleusercontent.com',
                    'client_secret' => 'el___ZRH2jOxj_rYPOl1ybnH',
                    'title' => 'Google (OAuth2)',
                ),
                'facebook' => array(
                    // register your app here: https://developers.facebook.com/apps/
                    'class' => 'FacebookOAuthService',
                    'client_id' => '835898546525811',
                    'client_secret' => '88d357104f0d65846bfc2205b4681127',
                    'title' => 'Facebook',
                ),
                'vkontakte' => array(
                    // register your app here: https://vk.com/editapp?act=create&site=1
                    'class' => 'VKontakteOAuthService',
                    'client_id' => '4863776',
                    'client_secret' => 'dOIZQ5TFbBAyAFbAntJ0',
                    'title' => 'VKontakte',
                ),
            ),
        ),
        'debug' => array(
            'class' => 'ext.yii2-debug.Yii2Debug',
        ),
        'settings'=>array(
            'class'=>'application.components.Settings',
        ),
        'request'=>array(
            'enableCookieValidation'=>true,
            'enableCsrfValidation'=>false,
        ),
        'user'=>array(
            // enable cookie-based authentication
            'allowAutoLogin'=>true,
            'loginUrl'=>array('admin/default/login'),
            'class' => 'WebUser',
        ),
        'authManager' => array(
            // Будем использовать свой менеджер авторизации
            'class' => 'PhpAuthManager',
            // Роль по умолчанию. Все, кто не админы, модераторы и юзеры — гости.
            'defaultRoles' => array('guest'),
        ),
        // uncomment the following to enable URLs in path-format
        'urlManager'=>array(
            'class'=>'application.components.UrlManager',
            'urlFormat'=>'path',
            'urlSuffix'=>'.html',
            'showScriptName'=>false,
            'rules'=>array(
                '<language:(ru|uk)>/' => 'site/index',
                '<language:(ru|uk)>/<id:\d+>' => 'site/news',
                '<category:\w+>/<id:\d+>'=>'site/news/',

                '<language:(ru|uk)>/<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
                '<language:(ru|uk)>/<controller:\w+>/<action:\w+>/*'=>'<controller>/<action>',

                '<module:\w+>/<controller:\w+>/<action:\w+>/<id:\d+>/<language:(uk|ru)>'=>'<module>/<controller>/<action>',
                '<module:\w+>/<controller:\w+>/<action:\w+>/<language:(uk|ru)>'=>'<module>/<controller>/<action>',


            ),
        ),
        'db'=>array(
            'connectionString' => 'mysql:host=localhost;dbname=garmata',
            'emulatePrepare' => true,
            'enableProfiling' => true,
            'enableParamLogging' => true,
            'username' => 'garmata',
            'password' => 'qwedsazxc123',
            'charset' => 'utf8',
        ),
        'errorHandler'=>array(
            // use 'site/error' action to display errors
            'errorAction'=>'site/error',
        ),
        'log'=>array(
            'class'=>'CLogRouter',
            'routes'=>array(
                array(
                    'class'=>'CFileLogRoute',
                    'levels'=>'error, warning',
                ), 
                // uncomment the following to show log messages on web pages
                /*
                array(
                    'class'=>'CWebLogRoute',
                ),
                */
            ),
        ),
        'image'=>array(
            'class'=>'application.extensions.image.CImageComponent',
            'driver'=>'GD',
        ),
    ),

    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params'=>array(
        'languages'=>array('ru'=>'Русский', 'uk'=>'Українська'),
    ),
);