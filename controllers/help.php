<?php

/**
 * Created by IntelliJ IDEA.
 * User: ajoshi.biz
 * Date: 01/03/17
 * Time: 11:38
 */
class Help extends Controller
{

    function __construct()
    {
        parent::__construct();

    }

    function index(){
        $this->view->render("help/index");
    }

    public function other($arg = false){
        $this->view->blah = $this->model->blah();
    }
}