<?php

/**
 * Created by IntelliJ IDEA.
 * User: ajoshi.biz
 * Date: 01/03/17
 * Time: 11:35
 */
class Index extends  Controller
{
    function __construct()
    {
        parent::__construct();

    }

    function index(){
        $this->view->render("index/index");
    }

    function details(){
        $this->view->render("index/index");
    }

}