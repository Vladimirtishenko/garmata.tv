<?php

class DefaultController extends Controller
{
    public $rightReclameId = 48;
	public function actionIndex()
	{
        $this->layout = '//layouts/main';
        $lastPosts = Articles::model()->with('author')->findAll(array(
            'limit'=>18,
            'order'=>'`t`.`id` DESC',
        ));
        $allPosts = new CActiveDataProvider('Articles',
            array(
                'criteria'=>array(
                    'with'=>array('author'),
                    'order'=>'date DESC',
                ),
                'sort'=>false,
                'pagination'=>array(
                    'pageSize'=>10
                ),
            )
        );
        $allBlogers = User::model()->findAll(array('condition'=>'role = :role', 'params'=>array(':role'=>'bloger')));
        $popularBlogers = User::model()->findAllBySql("SELECT DISTINCT *, (SELECT COUNT(*) FROM articles WHERE author_id = `user`.id) AS count FROM `user` WHERE (role = 'bloger') ORDER BY count DESC LIMIT 3");
		$this->render('index',array('lastPosts'=>$lastPosts, 'allPosts'=>$allPosts, 'allBlogers'=>$allBlogers, 'popularBlogers'=>$popularBlogers));
	}

    public function actionPost($id)
    {
        $this->layout = '//layouts/main';
        $model = Articles::model()->findByPk($id);
        $model->views++;
        $model->save();
        $user = User::model()->findByPk($model->author_id);

        $relatedNews = Articles::model()->with('author')->findAll(array(
            'limit'=>18,
            'order'=>'date DESC',
        ));
        $this->render('post', array('model'=>$model, 'user'=>$user, 'relatedNews'=>$relatedNews));
    }

    public function actionBloger($id)
    {
        $this->layout = '//layouts/main';
        $user = User::model()->findByPk($id);

        $lastPost = Articles::model()->find(array('condition'=>'author_id = '.$user->id, 'order'=>'id Desc', 'select'=>'date'));
        $allBlogers = User::model()->findAll(array('condition'=>'role = :role', 'params'=>array(':role'=>'bloger')));

        $allPosts = new CActiveDataProvider('Articles',
            array(
                'criteria'=>array(
                    'with'=>array('author'),
                    'order'=>'date DESC',
                    'condition'=>'author_id = :id',
                    'params'=>array(':id'=>$id),
                ),
                'sort'=>false,
                'pagination'=>array(
                    'pageSize'=>10
                ),
            )
        );
        $this->render('bloger',array('allPosts'=>$allPosts, 'user'=>$user, 'allBlogers'=>$allBlogers, 'lastPost'=>$lastPost));
    }

    public function actionDelBloger($id)
    {
        if(Yii::app()->user->role == 'admin') {
            $user = User::model()->findByPk($id);
            Articles::model()->deleteAll('author_id = :id', array(':id'=>$user->id));
            User::model()->deleteByPk($id);
            $this->redirect('/site/index');
        }
    }
}