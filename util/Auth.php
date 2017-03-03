<?php

class Auth {

    public static function handleLogin(){

        @session_start();

        $logged = $_SESSION['loggedIn'];
        $role = Session::get('role');
        if($logged == false || $role != "owner"){
            @session_destroy();
            header('location: '.URL.'login');
            exit;
        }

    }
}

?>