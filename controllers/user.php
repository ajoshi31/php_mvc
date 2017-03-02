<?php

/**
 * Created by IntelliJ IDEA.
 * User: ajoshi.biz
 * Date: 01/03/17
 * Time: 11:36
 */
class User extends Controller
{

    public function __construct()
    {
        parent::__construct();
        Session::init();

        $logged = Session::get('loggedIn');

        $role = Session::get('role');

        if($logged == false || $role != "owner"){
            Session::destroy();
            header('location: '.URL.'login');
            exit;
        }

    }

    public function index(){
        $this->view->userList = $this->model->userList();
        $this->view->render("user/index");
    }

    public function create(){

        $data = array();

        $data['login'] = $_POST['login'];
        $data['password'] = md5($_POST['password']);
        $data['role'] = $_POST['role'];

        //todo do youre error checking

        $this->model->create($data);
        header('location: ' .URL. 'user');
    }

    public function edit($id){

        $this->view->user = $this->model->userSingleList($id);
        $this->view->render("user/edit");

    }

    public function editSave($id){

        $data = array();
        $data['id'] = $id;
        $data['login'] = $_POST['login'];
        $data['password'] = md5($_POST['password']);
        $data['role'] = $_POST['role'];

        //todo do youre error checking
        $this->model->editSave($data);
        header('location: ' .URL. 'user');
    }



    public function delete($id){

        $this->model->delete($id);
        header('location: ' .URL. 'user');
    }

}