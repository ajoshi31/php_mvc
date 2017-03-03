<?php

class Login_Model extends Model{

    public function __construct()
    {
        parent::__construct();
    }

    public function run (){

        $statement = $this->db->prepare("SELECT id,role FROM users WHERE 
        login = :login AND password = :password");

        $statement->execute(array(
            ':login' => $_POST['login'],
            ':password' => Hash::create('md5',$_POST['password'],HASH_PASSWORD_KEY)
        ));

        $data = $statement->fetch();

        $count =  $statement->rowCount();

        if($count > 0){
            Session::init();
            Session::set('loggedIn',true);
            Session::set('role',$data['role']);
            header('location:../dashboard');
        } else{
            header('location:../login');
        }

    }
}

?>