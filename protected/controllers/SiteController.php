<?php

class SiteController extends Controller
{
    public $rightReclameId = null;
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

    protected function beforeAction()
    {
        $serviceName = Yii::app()->request->getQuery('service');
        if (isset($serviceName)) {
            /** @var $eauth EAuthServiceBase */
            $eauth = Yii::app()->eauth->getIdentity($serviceName);
            $eauth->redirectUrl = Yii::app()->user->returnUrl;
            $eauth->cancelUrl = $this->createAbsoluteUrl('site/login');
            //try {
                if ($eauth->authenticate()) {
                    //$identity = new EAuthUserIdentity($eauth);
					//var_dump($eauth->getAttributes()); exit;
                    // successful authentication

                    $attributes = $eauth->getAttributes();

                    //var_dump($identity->id, $identity->name, Yii::app()->user->id);exit;
                    // Save the attributes to display it in layouts/main.php
                    $user = User::model()->find(array(
                            'condition'=>'service = :service AND service_user_id = :service_user_id',
                            'params'=>array(':service'=>$serviceName, ':service_user_id'=>$attributes['id']))
                    );

                    if(!$user) {
                        $user = new User();
                        $user->name = $attributes['name'];
                        $user->service = $serviceName;
                        $user->service_user_id = $attributes['id'];
                        $user->verification = uniqid();
                        $user->active = 0;
                        $user->reg_date = date('Y-m-d H:i:s', time());
                        $user->avatar = 'default-user-icon-profile.png';
                        $user->save();
                    }
                    $auth = new ServiceUserIdentity($eauth, $user->id);
                    if($auth->authenticate()) {
                        Yii::app()->user->login($auth);
                    }
                    // redirect and close the popup window if needed
                    $eauth->redirect();

                }
                // Something went wrong, redirect back to login page
                $this->redirect(array('site/login'));
            //}
            /*catch (EAuthException $e) {
                // save authentication error to session
                Yii::app()->user->setFlash('error', 'EAuthException: '.$e->getMessage());
                // close popup window and redirect to cancelUrl
                $eauth->redirect($eauth->getCancelUrl());
            }*/
        }
        return true;
    }

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
        $date = date('Y-m-d H:i:s',time()+3600);

        $sql="
        (SELECT n.id, n.title_uk, n.title_ru, n.short_ru, n.short_uk, n.date, n.category_id, type, reclame, n.image, n.views, c.alias AS category_alias, c.title_ru AS category_title_ru, c.title_uk AS category_title_uk FROM news n INNER JOIN category c ON n.category_id = c.id WHERE n.date < '".$date."')
            UNION
        (SELECT n.id, n.title_uk, n.title_ru, n.short_ru, n.short_uk, n.date, n.category_id, type, reclame, n.image, n.views, c.alias AS category_alias, c.title_ru AS category_title_ru, c.title_uk AS category_title_uk FROM video n INNER JOIN category c ON n.category_id = c.id WHERE n.date < '".$date."')
            UNION
        (SELECT n.id, n.title_uk, n.title_ru, n.short_ru, n.short_uk, n.date, n.category_id, type, reclame, n.image, n.views, c.alias AS category_alias, c.title_ru AS category_title_ru, c.title_uk AS category_title_uk FROM photo_category n INNER JOIN category c ON n.category_id = c.id WHERE n.date < '".$date."')
        ORDER BY  `date` DESC LIMIT 12";

        $connection = Yii::app()->db;
        $command = $connection->createCommand($sql);
        $lastNews = $command->queryAll();

        $criteria = new CDbCriteria();
        $criteria->condition = 'category_id != :category_id AND date < :now';
        $criteria->order = 'date DESC';
        $criteria->limit = 5;
        $criteria->params = array(':category_id'=>11, ':now'=>date("Y-m-d H:i:s",time()+3600));

        $lastVideos = Video::model()->findAll($criteria);
        $this->render('index', array(
            'lastVideos'=>$lastVideos,
            'lastNews'=>$lastNews,
        ));

	}

    public function actionSearch()
    {
        if(isset($_GET['find']) && !empty($_GET['find']))
        {
            $keyword = trim(strip_tags($_GET['find']));
            $criteria = new CDbCriteria();
            $criteria->distinct = true;

            $criteria->condition = 'title_'.Yii::app()->language.' LIKE :keyword OR description_'.Yii::app()->language.' LIKE :keyword';

            $criteria->order = 'date DESC';
            $criteria->params = array(':keyword'=>'%'.$keyword.'%');

            $news = News::model()->findAll($criteria);
            $photoCategories = PhotoCategory::model()->findAll($criteria);
            $videos = Video::model()->findAll($criteria);

            $this->render('allNews', array(
                'news'=>$news,
                'photoCategories'=>$photoCategories,
                'videos'=>$videos,
            ));
        }
        else
        {
            $this->redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function actionAllNews()
    {
        $news = News::model()->findAll(array(
            'order'=>'date DESC', 
            'limit'=>6, 
            'condition'=>'date < :now',
            'params'=>array(':now'=>date("Y-m-d H:i:s",time()+3600))));

        $photoCategories = PhotoCategory::model()->findAll(array(
            'order'=>'date DESC', 
            'limit'=>3,
            'condition'=>'date < :now',
            'params'=>array(':now'=>date("Y-m-d H:i:s",time()+3600))));

        $videos = Video::model()->findAll(array(
            'order'=>'date DESC', 
            'limit'=>3, 
            'condition'=>'category_id != :category_id AND date < :now',
            'params'=>array(':category_id'=>11, ':now'=>date("Y-m-d H:i:s",time()+3600))));


        $this->render('allNews', array(
            'news'=>$news,
            'photoCategories'=>$photoCategories,
            'videos'=>$videos,
        ));
    }

    public function actionVideos()
    {
        $data = new CActiveDataProvider('Video',
            array(
                'criteria'=>array(
                	'condition'=> 'category_id != 11 AND date < :now',
                    'order'=>'id DESC',
                    'params'=>array(':now'=>date("Y-m-d H:i:s",time()+3600)),
                ),
                'sort'=>false,
                'pagination'=>array(
                    'pageSize'=>8
                ),
            ));

        $criteria = new CDbCriteria();
        $criteria->condition = 'category_id != :category_id AND date < :now';
        $criteria->order = 'date DESC';
        $criteria->limit = 4;
        $criteria->params = array(':category_id'=>11, ':now'=>date("Y-m-d H:i:s",time()+3600));

        $lastVideos = Video::model()->findAll($criteria);

        $this->render('videos', array('data'=>$data, 'lastVideos'=>$lastVideos));
    }

    public function actionDay_of_news()
    {
        $data = new CActiveDataProvider('Video',
            array(
                'criteria'=>array(
                	'condition'=> 'category_id = 11 AND date < :now',
                    'order'=>'id DESC',
                    'params'=>array(':now'=>date("Y-m-d H:i:s",time()+3600))
                ),
                'sort'=>false,
                'pagination'=>array(
                    'pageSize'=>8
                ),
            ));
        
        $this->render('news_to_day', array('data'=>$data));
    }

    
    public function actionVideo($id)
    {
        $model = Video::model()->findByPk($id);
        $model->views ++;
        $model->save();
        $relatedVideos = Video::model()->findAll(array(
            'order'=>'date DESC', 
            'limit'=>6, 
            'condition'=>'id != :id AND date < :now', 
            'params'=>array(':id'=>$id, ':now'=>date("Y-m-d H:i:s",time()+3600))));
        

        $this->rightReclameId = 22;
        $this->render('videoOne', array('model'=>$model, 'relatedVideos'=>$relatedVideos));
    }

    public function actionPhotos($id = null)
    {
        if(isset($_GET['id']))
        {
            $criteria = new CDbCriteria();
            $criteria->condition = 'category_id = :category_id';
            $criteria->params = array(':category_id'=>$id);
            $category = PhotoCategory::model()->findByPk($id);
            $category->views ++;
            $category->save();
            $photos = Photo::model()->findAll($criteria);

            $relatedPhotos = PhotoCategory::model()->findAll(array('order'=>'date DESC', 'limit'=>4, 'condition'=>'id != :id AND date < :now', 'params'=>array(':id'=>$id, ':now'=>date("Y-m-d H:i:s",time()+3600))));

            $this->render('single_album', array('photos'=>$photos, 'category'=>$category, 'relatedPhotos'=>$relatedPhotos));
        }
        else
        {
            $lastPhotos = PhotoCategory::model()->findAll(array('limit'=>4, 'order'=>'id DESC'));
            $data = new CActiveDataProvider('PhotoCategory',
                array(
                    'criteria'=>array(
                        'condition'=>'date < :now', 
                        'order'=>'id DESC',
                        'offset'=>4,
                        'params'=>array(':now'=>date("Y-m-d H:i:s",time()+3600))
                    ),
                    'sort'=>false,
                    'pagination'=>array(
                        'pageSize'=>10
                    ),
                )
            );
            $this->rightReclameId = 46;
            $this->render('albums', array('data'=>$data, 'lastPhotos'=>$lastPhotos));
        }
    }

    /**
     * @param $alias
     */
    public function actionCategory($alias)
    {
        $category = Category::model()->find('alias = :alias', array(':alias'=>$alias));
        $news = News::model()->findAll(array(
            'order'=>'date DESC', 
            'limit'=>6, 
            'condition'=>'category_id = :category_id AND date < :now', 
            'params'=>array(':category_id'=>$category->id, ':now'=>date("Y-m-d H:i:s",time()+3600))
        ));

        $photoCategories = PhotoCategory::model()->findAll(array(
            'order'=>'date DESC', 
            'limit'=>6, 
            'condition'=>'category_id = :category_id AND date < :now', 
            'params'=>array(':category_id'=>$category->id, ':now'=>date("Y-m-d H:i:s",time()+3600))
        ));

        $videos = Video::model()->findAll(array(
            'order'=>'date DESC', 
            'limit'=>6, 
            'condition'=>'category_id = :category_id AND date < :now', 
            'params'=>array(':category_id'=>$category->id, ':now'=>date("Y-m-d H:i:s",time()+3600))
        ));
        
        $this->render('allNews', array(
            'news'=>$news,
            'photoCategories'=>$photoCategories,
            'videos'=>$videos,
        ));
    }

    /**
     * @param $id
     */
    public function actionNews($id = 1)
    {
        if(isset($_GET['date']))
        {
            $criteria = new CDbCriteria();
            $criteria->distinct = true;
            $criteria->condition='date >= :date_start AND date <= :date_end';
            $criteria->params = array(':date_start'=>$_GET['date'].' 00:00:00', ':date_end'=>$_GET['date'].' 23:59:59');
            $criteria->order = 'date DESC';

            $news = News::model()->findAll($criteria);
            $photoCategories = PhotoCategory::model()->findAll($criteria);
            $videos = Video::model()->findAll($criteria);

            $this->render('allNews', array(
                'news'=>$news,
                'photoCategories'=>$photoCategories,
                'videos'=>$videos,
            ));
        }
        else
        {
            $data = News::model()->findByPk($id);
            $data->views++;
            $data->save();
            $relatedNews = News::model()->findAll(array(
                'condition'=>'category_id = :cat_id AND id NOT IN (:id) AND date < :now', 
                'params'=>array(':cat_id'=>$data->category_id, ':id'=>$data->id, ':now'=>date("Y-m-d H:i:s",time()+3600)), 
                'limit'=>20, 
                'order'=>'date Desc'));
            
            $this->render('news', array('data'=>$data, 'relatedNews'=>$relatedNews));
        }
    }

    public function actionRegions($region)
    {
        $dataProvider = new CActiveDataProvider('News',
            array(
                'criteria'=>array(
                    'condition'=>'region = :region',
                    'params'=>array(':region'=>$region),
                    'order'=>'date DESC',
                ),
                'sort'=>false,
                'pagination'=>array(
                    'pageSize'=>12
                ),
            ));

        $mostViewed = News::model()->findAll(array(
            'condition'=>'region = :region AND date < :now', 
            'params'=> array(':region'=>$region, ':now'=>date("Y-m-d H:i:s",time()+3600)),
            'order'=>'date DESC', 
            'limit'=>9));

        $this->render('category', array(
            'dataProvider'=>$dataProvider,
            'category'=>$region,
            'mostViewed'=>$mostViewed,
        ));
    }

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

    public function actionRegistration()
    {
        $model = new User('register');
        if(isset($_POST['LoginForm']))
        {
            $model->attributes = $_POST['LoginForm'];
            $model->verification = uniqid();
            $model->avatar = 'default-user-icon-profile.png';
            $link = 'http://' . $_SERVER['HTTP_HOST'].$this->createUrl('/site/verify', array('verification'=>$model->verification));
            if($model->sendMail($model, Yii::t('main', 'Підтвердження регістрації'), $link) && $model->save())
            {
                Yii::app()->user->setFlash('success',Yii::t('main', 'Дякуємо за регістрацію, на вашу електронну адресу відправлено лист з подальшими інструкціями'));
                $this->redirect('/site/index');
            }
            else {
                Yii::app()->user->setFlash('error', CHtml::errorSummary($model));
                $this->redirect('/site/index');
            }
        }
    }

    public function actionVerify()
    {
        $user = User::model()->find('verification = :verification', array(':verification'=>$_GET['verification']));
        if(isset($user))
        {
            $user->active = 1;
            $user->verification = uniqid();
            $user->password = md5($user->password);
            if($user->save())
                Yii::app()->user->setFlash('success', Yii::t('main', 'Дякуємо за підтвердження реєстрації, ви можете зайти на сайт, використовуючи вказані вами данні при реєстрації'));
            else
                Yii::app()->user->setFlash('error', CHtml::errorSummary($user));
        }
        else
        {
            Yii::app()->user->setFlash('success',Yii::t('main', 'Нажаль посилання, за яким ви перейшли вже не актуальне'));
        }
        $this->redirect('/site/index');
    }

    /**
     * Displays the login page
     */
    public function actionLogin()
    {
        $model=new LoginForm;

        // if it is ajax validation request
        if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if(isset($_POST['LoginForm']))
        {
            $model->attributes=$_POST['LoginForm'];

            if($model->validate() && $model->login()) {
                Yii::app()->user->setFlash('success', Yii::t('main', 'Вы успешно залогинились'));
                Yii::app()->user->role == 'admin' ? $this->redirect('/admin/default/index') : $this->redirect(Yii::app()->user->returnUrl);
            }
            else {
                $this->actionRegistration();
            }
        }
        else {
            $this->redirect('index');
        }

    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout()
    {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

    public function actionResize()
    {
        $path = Yii::getPathOfAlias('webroot.uploads.resize').DIRECTORY_SEPARATOR;
        $img =  $path.'540429ce7e3a6_full.jpg';

        $resource = array();
        list($resource['width'], $resource['height'], $resource['type']) = getimagesize($img);

        $types = array("", "gif", "jpeg", "png"); // Массив с типами изображений

        $newImageSizes = array('width'=>300, 'height'=>273);


        $resource_img = imagecreatefromjpeg($path.'540429ce7e3a6_full.jpg');

        $newImage = imagecreatetruecolor($newImageSizes['width'], $newImageSizes['height']);


        $dst_x = 0;
        $dst_y = 0;

        $src_y = 0;
        $src_x = 300;

        imagecopyresampled ($newImage, $resource_img, $dst_x , $dst_y , $src_x , $src_y , $newImageSizes['width'], $newImageSizes['height'], $newImageSizes['width'], $newImageSizes['height']);

        imagejpeg($newImage,$path.'newName.jpg',100);

        echo 'saved';
    }

    public function actionSendNews()
    {
          $picture = ""; 
          // Если поле выбора вложения не пустое - закачиваем его на сервер 
          if (!empty($_FILES['uploaded_file']['tmp_name'])) 
          { 
            // Закачиваем файл 
            $path = $_FILES['uploaded_file']['name']; 
            if (copy($_FILES['uploaded_file']['tmp_name'], $path)) $picture = $path; 
          } 

          $headers  = "Content-type: text/html; charset=windows-1251 \r\n"; 
          $headers .= "From:".$_POST['email']."\r\n"; 
          $headers .= "Reply-To: ".$_POST['email']."\r\n"; 
          $mail_to  = "news@garmata.tv" ; 
          $thm = "Новое письмо с сайта Garmata.tv"; 
          $msg = ' <p>Автор:'.$_POST['name'].'</p></br> <p>Email:'.$_POST['email'].'</p> </br> <p>Номер телефона:'.$_POST['number'].'</p> </br> <p>Тема новости:'.$_POST['title'].'</p> <br /> <p>Текст новости:'.$_POST['mess'].'</p>';
          // Отправляем почтовое сообщение 
          if(empty($picture))
              mail($mail_to, $thm, $msg, $headers);
          else
              $this->send_mail($mail_to, $thm, $msg, $picture);

          header('Location: /', true, 307);
    }

    public function actionYahooWeather($code, $units, $lang) {

        header('Content-Type: text/html; charset=utf-8');

        $wind_chill;
        $wind_direction;
        $wind_speed;
        // Атмосферные показатели
        $humidity;
        $visibility;
        $pressure;
        // Время восхода и заката переводим в формат unix time
        $sunrise;
        $sunset;
        // Текущая температура воздуха и погода
        $temp;
        $condition_text;
        $condition_code;
        // Прогноз погоды на 5 дней
        $forecast;

        $text = Array(
        '0' => 'Торнадо', 
        '1' => 'Тропічний шторм',
        '2' => 'Ураган',
        '3' => 'Сильні грози',
        '4' => 'Грози',
        '5' => 'Змішаний дощ зi снігом',
        '6' => 'Змішаний дощ зi снігом',
        '7' => 'Змішаний дощ зi снігом',
        '8' => 'Паморозь',
        '9' => 'Мряка',
        '10' => 'Град',
        '11' => 'Зливи',
        '12' => 'Зливи',
        '13' => 'Сніговi пориви',
        '14' => 'Легкий сніг',
        '15' => 'Хуртовина',
        '16' => 'Снiг',
        '17' => 'Град',
        '18' => 'Дощ зі снігом',
        '19' => 'Туманно',
        '20' => 'Туманно',
        '21' => 'Туманно',
        '22' => 'Туманно',
        '23' => 'Вітрянно',
        '24' => 'Вітрянно',
        '25' => 'Прохолодно',
        '26' => 'Хмарно',
        '27' => 'Переважно хмарно',
        '28' => 'Переважно хмарно',
        '29' => 'Мінлива хмарність',
        '30' => 'Мінлива хмарність',
        '31' => 'Ясно',
        '32' => 'Сонячно',
        '33' => 'Ясно',
        '34' => 'Ясно',
        '35' => 'Змішаний дощ з градом',
        '36' => 'Спекотно',
        '37' => 'Грози',
        '38' => 'Розсіяні грози',
        '39' => 'Розсіяні грози',
        '40' => 'Мінлива хмарність',
        '41' => 'Сильний снігопад',
        '42' => 'Снігопад',
        '43' => 'Сильний снігопад',
        '44' => 'Мінлива хмарність',
        '45' => 'Зливи',
        '46' => 'Зливовий сніг',
        '47' => 'Зливи'
        );

        $days = Array(
            'Mon' => 'Понедiлок',
            'Tue' => 'Вiвторок',
            'Wed' => 'Середа',
            'Thu' => 'Четвер',
            'Fri' => 'П`ятниця',
            'Sat' => 'Субота',
            'Sun' => 'Недiля'
            );

        $units = ($units == 'c')?'c':'f';
        
        $url = 'http://xml.weather.yahoo.com/forecastrss?p='.
            $code.'&u='.$units.'&l';
        
        $xml_contents = file_get_contents($url);
        if($xml_contents === false) 
            throw new Exception('Error loading '.$url);
        
        $xml = new SimpleXMLElement($xml_contents);
        
        // Ветер
        $tmp = $xml->xpath('/rss/channel/yweather:wind');
        if($tmp === false) throw new Exception("Error parsing XML.");
        $tmp = $tmp[0];
        
        $wind_chill = (int)$tmp['chill'];
        $wind_direction = (int)$tmp['direction'];
        $wind_speed = (int)$tmp['speed'];
        
        // Атмосферные показатели
        $tmp = $xml->xpath('/rss/channel/yweather:atmosphere');
        if($tmp === false) throw new Exception("Error parsing XML.");
        $tmp = $tmp[0];
        
        $humidity = (int)$tmp['humidity'];
        $visibility = (int)$tmp['visibility'];
        $pressure = (int)$tmp['pressure'];
        
        // Время восхода и заката переводим в формат unix time
        $tmp = $xml->xpath('/rss/channel/yweather:astronomy');
        if($tmp === false) throw new Exception("Error parsing XML.");
        $tmp = $tmp[0];
        
        $sunrise = strtotime($tmp['sunrise']);
        $sunset = strtotime($tmp['sunset']);
        
        // Текущая температура воздуха и погода
        $tmp = $xml->xpath('/rss/channel/item/yweather:condition');
        if($tmp === false) throw new Exception("Error parsing XML.");
        $tmp = $tmp[0];
        
        $temp = (int)$tmp['temp'];
        $condition_text = strtolower((string)$tmp['text']);
        $condition_code = (int)$tmp['code'];
        
        // Прогноз погоды на 5 дней
        $forecast = array();
        $tmp = $xml->xpath('/rss/channel/item/yweather:forecast');
        if($tmp === false) throw new Exception("Error parsing XML.");
        
        foreach($tmp as $day) {
            $forecast[] = array(
                'date' => $days[(string)$day['day']],
                'low' => (int)$day['low'],
                'high' => (int)$day['high'],
                'text' => $text[(int)$day['code']],
                'code' => (int)$day['code']
            );
        }
        return array("forecast" => $forecast, "now" => $temp);
    }

    public function actiontryWeather(){
        try {
            $weather = $this->actionYahooWeather("UPXX0007", 'c', 'ru');
            echo json_encode($weather);
        } catch(Exception $e) {
            echo "Caught exception: ".$e->getMessage();
            exit();
        }
    }

     public function actiontryCurrency(){
        $a = file_get_contents("http://bank-ua.com/export/exchange_rate_cash.json");
        echo $a;
    }
}