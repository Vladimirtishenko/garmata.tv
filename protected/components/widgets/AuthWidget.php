<?php

class AuthWidget extends CWidget
{
    public $model;

    public function init()
    {
        $this->model = new LoginForm();
    }
    public function run()
    {
        $this->render('auth', array('model'=>$this->model));
    }
}