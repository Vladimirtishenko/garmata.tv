<?php

class AjaxController extends Controller
{
    public function actionPools()
    {
        $pool = Pools::model()->with('answers')->findByPk($_POST['poolId']);
        if(!PoolsIp::model()->count('ip = :ip AND pool_id = :id', array(':ip'=>$_SERVER['REMOTE_ADDR'], ':id'=>$pool->id)))
        {
            if(isset($_POST['value']))
            {
                $pool->hits++;
                $poolsIp = new PoolsIp();
                $poolsIp->answer_id = $_POST['value'];
                $poolsIp->pool_id = $pool->id;
                $poolsIp->ip = $_SERVER['REMOTE_ADDR'];

                $answer = Answers::model()->findByPk($_POST['value']);
                $answer->hits++;

                $answer->save();
                $poolsIp->save();
                $pool->save();

                $refreshedPools = Pools::model()->with('answers')->findByPk($_POST['poolId']);

                $this->renderPartial('pool', array('pool'=>$refreshedPools), false, false);
            }
        }
    }

    public function actionMoreNews()
    {
        $allNews = News::model()->findAll(array(
            'order'=>'date DESC', 
            'limit'=>$_GET['limit'],
            'condition'=>'date < :now',
            'params'=>array(':now'=>date("Y-m-d H:i:s",time()+3600))

        ));
        $limit = $_GET['limit'] + 10;
        $this->renderPartial('moreNews', array('allNews'=>$allNews, 'limit'=>$limit), false, true);
    }

    public function actionNewsNoImage()
    {
        if(Yii::app()->request->isAjaxRequest)
        {
            $date = date('Y-m-d H:i:s',time()+3600);

            $lastDate = isset($_POST['lastDate']) ? $_POST['lastDate'] : '';
            $sql="
        (SELECT n.id, n.title_uk, n.title_ru, n.date, type, reclame, n.image, n.views, c.alias AS category_alias, c.title_ru AS category_title_ru, c.title_uk AS category_title_uk FROM news n INNER JOIN category c ON n.category_id = c.id WHERE n.category_id != 11 AND n.date < '".$date."')
            UNION
        (SELECT n.id, n.title_uk, n.title_ru, n.date, type, reclame, n.image, n.views, c.alias AS category_alias, c.title_ru AS category_title_ru, c.title_uk AS category_title_uk FROM video n INNER JOIN category c ON n.category_id = c.id WHERE n.category_id != 11 AND n.date < '".$date."')
            UNION
        (SELECT n.id, n.title_uk, n.title_ru, n.date, type, reclame, n.image, n.views, c.alias AS category_alias, c.title_ru AS category_title_ru, c.title_uk AS category_title_uk FROM photo_category n INNER JOIN category c ON n.category_id = c.id WHERE n.category_id != 11 AND n.date < '".$date."')
            ORDER BY  `date` DESC LIMIT ".$_POST['count'].",5";
            $connection = Yii::app()->db;
            $command = $connection->createCommand($sql);
            $allNews = $command->queryAll();

            $this->renderPartial('noimg', array('allNews'=>$allNews, 'lastDate'=> $lastDate));
        }
    }

    public function actionNewsWithImage()
    {
        if(Yii::app()->request->isAjaxRequest)
        {
            $date = date('Y-m-d H:i:s',time()+3600);
            $lastDate = isset($_POST['lastDate']) ? $_POST['lastDate'] : '';
            $sql="
            SELECT n.id, n.title_uk, n.title_ru, n.date, type, reclame, n.image, n.views, c.alias AS category_alias, c.title_ru AS category_title_ru, c.title_uk AS category_title_uk 
            FROM news n INNER JOIN category c ON n.category_id = c.id WHERE n.date < '".$date."'
            ORDER BY  `date` DESC LIMIT ".$_POST['count'].",5";
            $connection = Yii::app()->db;
            $command = $connection->createCommand($sql);
            $allNews = $command->queryAll();

            $this->renderPartial('withimg', array('allNews'=>$allNews, 'lastDate'=> $lastDate));
        }
    }

    public function actionAddEmail()
    {
        if(isset($_POST['url'])) {
            $email = Emails::model()->find(array('condition'=>'email = :email', 'params'=>array(':email'=>$_POST['url'])));
            if($email) {
                echo Yii::t('main', 'Такий email уже використовується');
            }else{
                $email = new Emails();
                $email->email = $_POST['url'];
                if($email->save())
                    echo Yii::t('main', 'Дякуэмо за підписку!');
            }
        }
    }

    public function actionDelEmail($email)
    {
        if(isset($email)) {
            $mail = Emails::model()->find(array('condition'=>'email = :email', 'params'=>array(':email'=>$email)));
            $mail->delete();
        }
    }

    public function actionSendEmails()
    {
        $emails = Emails::model()->findAll();
        foreach($emails as $email) {
            $this->sendMail($email->email);
        }
    }

    public function sendMail($email)
    {
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
        $headers .= 'To: '.$email.' <'.$email.'>'. "\r\n";
        $headers .= 'From: Garmata <admin@'.$_SERVER['HTTP_HOST'].'>' . "\r\n";

        $message = '
        <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <title>mail</title>
            </head>
            <style>
            a:hover{text-decoration: none;}
            </style>
            <body style="font-family:Georgia">
                <table class="wrapp" style="width:100%; max-width: 600px; background: url(http://garmata.tv/mail/back.jpg); border-collapse:collapse; font-family: Georgia;">
                    <tr>
                        <td style="background-color: #3c3c3c; border:1px solid #e3e3e3; border-right: 0; padding: 10px 30px 10px 30px; text-align: center">
                            <img src="http://garmata.tv/mail/logo.png" style="width: 140px;" alt="">
                            <p style="color: #fff; font-size:12px; margin: 0;">Інтернет-телебачення Чернігова</p>
                        </td>
                        <td style="background-color: #3c3c3c;  border:1px solid #e3e3e3; border-left: 0; padding: 10px 30px 10px 30px; text-align: center">
                              <a href="#"><img src="http://garmata.tv/mail/fb.png" width="11px" height="15px" style="margin-right: 10px;" alt=""></a>
                              <a href="#"><img src="http://garmata.tv/mail/t.png" width="17px" style="margin-right: 10px;" alt=""></a>
                              <a href="#"><img src="http://garmata.tv/mail/vk.png" width="22px" style="margin-right: 10px;" alt=""></a>
                              <a href="#"><img src="http://garmata.tv/mail/y.png" width="20px" alt=""></a>
                            <p style="margin: 3px; font-size: 13px; color: #fff;">Пошта редакції: <a href="#" style="color: #687D84; font-size: 13px;">news@garmata.tv</a></p>
                            <p style="margin: 3px; font-size: 13px; color: #fff">Телефон редакції: <span style="color: #687D84;>+380 63 441 65 74</span></p>
                        </td>
                    </tr>
                    <tr style="text-align: center" >
                        <td colspan="2" style="padding: 10px 50px 50px 50px;">
                            <h2 style="font-size: 23px; font-weight: normal; text-aligin: center; color: #333;">Добрий день шановний читач</h2>
                            <p style="color: #6c6c6c; font-size: 12px; text-align: center; margin: 0;">Ознайомтесь з останніми новинами за день на <a href="http://garmata.tv" style="color: #687D84; text-decoration: underline; font-size: 12px" href="">garmata.tv</a></p>
                            <hr style="margin: 35px 0; background: #e3e3e3; height: 1px; border: none" noshade="">
                            <table width="100%">
                                <tr>
                                    <td style="background: url(http://garmata.tv/mail/backFigure.png), #687D84; padding: 30px 65px; color: #fff; font-size: 23px; letter-spacing: 1px;">Актуальні новини:</td>
                                </tr>
                                <tr>
                                    <td style="background: #fff; padding: 5px 5px 5px 5px; font-size: 25px; border: 1px solid #e3e3e3; border-top: none; text-align: left; color: #333">

                                        '.$this->findNews().'

                                    </td>
                                </tr>
                            </table>
                            <h4 style=" font-size: 13px; text-align: center;  margin: 35px 0 20px 0; letter-spacing: 1px;" color:#666>Хочете відписатися від розсилки перейдіть за <a style="color: #687D84; text-decoration: underline; font-size: 13px" href="">посиланням</a> </h4>
                            <a href="#" style="display: inline-block; padding: 12px 17px 10px 17px;   background: #687D84; color: #fff; text-transform: uppercase; border-radius: 2px; font-size:12px; text-decoration: none;">Перейти на сайт</a>
                        </td>

                    </tr>
                </table>
            </body>
            </html>
        ';


        return mail($email, 'Розсилка', $message, $headers);
    }

    protected function findNews()
    {
        $result = '';
        $date = date('Y-m-d H:i:s',time()+3600);
        $sql="
        (SELECT n.id, n.title_uk, n.title_ru, n.date, type, reclame, n.image, n.views, c.alias AS category_alias, c.title_ru AS category_title_ru, c.title_uk AS category_title_uk FROM news n INNER JOIN category c ON n.category_id = c.id WHERE n.category_id != 11 AND  n.date < '".$date."')
            UNION
        (SELECT n.id, n.title_uk, n.title_ru, n.date, type, reclame, n.image, n.views, c.alias AS category_alias, c.title_ru AS category_title_ru, c.title_uk AS category_title_uk FROM video n INNER JOIN category c ON n.category_id = c.id WHERE n.category_id != 11 AND  n.date < '".$date."')
            UNION
        (SELECT n.id, n.title_uk, n.title_ru, n.date, type, reclame, n.image, n.views, c.alias AS category_alias, c.title_ru AS category_title_ru, c.title_uk AS category_title_uk FROM photo_category n INNER JOIN category c ON n.category_id = c.id WHERE n.category_id != 11 AND  n.date < '".$date."')
            ORDER BY  `date` DESC LIMIT 15";
        $connection = Yii::app()->db;
        $command = $connection->createCommand($sql);
        $news = $command->queryAll();


        $result .= CHtml::openTag('ol');
            foreach($news as $new) {
                if($new['type'] == 'news'):
                    $textLink = Yii::app()->createAbsoluteUrl('/site/news', array('id'=>$new['id']));
                elseif($new['type'] == 'photo'):
                    $textLink = Yii::app()->createAbsoluteUrl('/site/photos', array('id'=>$new['id']));
                elseif($new['type'] == 'video'):
                    $textLink = Yii::app()->createAbsoluteUrl('/site/video', array('id'=>$new['id']));
                endif;
                $result .= '<li style="font-size: 13px; padding: 5px 0"><a style="color:#333" href="'.$textLink.'"> '.$new['title_uk'].'</a></li>';
            }
        $result .= CHtml::closeTag('ol');
        return $result;
    }

    public function actionPublications()
    {
        if(Yii::app()->request->isAjaxRequest) {
            $date = date('Y-m-d H:i:s',time()+3600);
            $sql = "
        (SELECT n.short_ru, n.short_uk, n.id, n.title_uk, n.title_ru, n.date, type, reclame, n.image, n.views, c.alias AS category_alias, c.title_ru AS category_title_ru, c.title_uk AS category_title_uk FROM news n INNER JOIN category c ON n.category_id = c.id WHERE n.category_id != 11 AND n.date < '".$date."')
            UNION
        (SELECT n.short_ru, n.short_uk, n.id, n.title_uk, n.title_ru, n.date, type, reclame, n.image, n.views, c.alias AS category_alias, c.title_ru AS category_title_ru, c.title_uk AS category_title_uk FROM video n INNER JOIN category c ON n.category_id = c.id WHERE n.category_id != 11 AND n.date < '".$date."')
            UNION
        (SELECT n.short_ru, n.short_uk, n.id, n.title_uk, n.title_ru, n.date, type, reclame, n.image, n.views, c.alias AS category_alias, c.title_ru AS category_title_ru, c.title_uk AS category_title_uk FROM photo_category n INNER JOIN category c ON n.category_id = c.id WHERE n.category_id != 11 AND n.date < '".$date."')
            ORDER BY  `date` DESC LIMIT " . $_POST['count'] . ",8";
            $connection = Yii::app()->db;
            $command = $connection->createCommand($sql);
            $lastNews = $command->queryAll();
            $this->renderPartial('publications', array('lastNews' => $lastNews));
        }
    }

    public function actionMoreAllNews()
    {

        $criteria = new CDbCriteria();
        $criteria->offset = $_POST['count'];
        $criteria->limit = 6;
        $criteria->order = 'date DESC';

        if(isset($_POST['category'])) {
            $criteria->condition = 'category_id = :cat';
            $criteria->params = array(':cat'=>$_POST['category']);
        }

          if(!empty($_POST['date'])){
            $criteria->distinct = true;
            $criteria->condition='date >= :date_start AND date <= :date_end';
            $criteria->params = array(':date_start'=>$_GET['date'].' 00.00.00', ':date_end'=>$_GET['date'].' 23.59.59');
            $criteria->order = 'date DESC';
        }

        $news = News::model()->findAll($criteria);
        $this->renderPartial('moreAllNews', array('news'=>$news));
        
    }
    public function actionMoreAllPhotos()
    {

        $criteria = new CDbCriteria();
        $criteria->offset = $_POST['count'];
        $criteria->limit = 3;
        $criteria->order = 'date DESC';

        if(isset($_POST['category'])) {
            $criteria->condition = 'category_id = :cat';
            $criteria->params = array(':cat'=>$_POST['category']);
        }

        if(!empty($_POST['date'])){
            $criteria->distinct = true;
            $criteria->condition='date >= :date_start AND date <= :date_end';
            $criteria->params = array(':date_start'=>$_GET['date'].' 00.00.00', ':date_end'=>$_GET['date'].' 23.59.59');
            $criteria->order = 'date DESC';
        }

        $photoCategories = PhotoCategory::model()->findAll($criteria);
        var_dump($photoCategories);
        $this->renderPartial('moreAllPhotos', array('photoCategories'=>$photoCategories));
    }
    public function actionMoreAllVideos()
    {
        $criteria = new CDbCriteria();
        $criteria->offset = $_POST['count'];
        $criteria->condition = 'category_id != :category_id';
        $criteria->limit = 3;
        $criteria->order = 'date DESC';
        $criteria->params = array(':category_id'=>11);

        if(isset($_POST['category'])) {
            $criteria->condition = 'category_id = :cat';
            $criteria->params = array(':cat'=>$_POST['category']);
        }

         if(!empty($_POST['date'])){
            $criteria->distinct = true;
            $criteria->condition='date >= :date_start AND date <= :date_end';
            $criteria->params = array(':date_start'=>$_GET['date'].' 00.00.00', ':date_end'=>$_GET['date'].' 23.59.59');
            $criteria->order = 'date DESC';
        }

        $videos = Video::model()->findAll($criteria);
        $this->renderPartial('moreAllVideos', array('videos'=>$videos));
    }
}