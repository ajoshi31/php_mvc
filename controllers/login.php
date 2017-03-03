<?php

/**
 * Created by IntelliJ IDEA.
 * User: ajoshi.biz
 * Date: 01/03/17
 * Time: 11:35
 */
class Login extends  Controller
{
    function __construct()
    {
        parent::__construct();

    }

    function index(){

        $this->view->render("login/index");
    }

    function run(){
       $a = $this->model->run();
    }

}