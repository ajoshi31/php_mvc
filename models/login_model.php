<?php

class Login_Model extends Model{

    public function __construct()
    {
        parent::__construct();
    }

    public function run (){

        $statement = $this->db->prepare("SELECT id FROM users WHERE 
        login = :login AND password = MD5(:password)");

        $statement->execute(array(
            ':login' => $_POST['login'],
            ':password' => $_POST['password']
        ));

        $count =  $statement->rowCount();

        if($count > 0){
            Session::init();
            Session::set('loggedIn',true);
            header('location:../dashboard');
        } else{
            header('location:../login');
        }

    }
}

?>