<?php

class User_Model extends  Model{

    function __construct(){
        parent::__construct();
    }

    public function userList(){
        $statementHandler = $this->db->prepare("SELECT id,login, role FROM users");
        $statementHandler->execute();
        return $statementHandler->fetchAll();
    }

    public function userSingleList($id){

        $statementHandler = $this->db->prepare("SELECT id,login, role FROM users WHERE id = :id");
        $statementHandler->execute(array(
            ':id' => $id
        ));
        return $statementHandler->fetch();
    }

    public function create($data){
        $statementHandler = $this->db->prepare('INSERT INTO users (`login`,`password`,`role`) VALUES (:login, md5(:password),:role )');
        $statementHandler->execute(array(
            ':login' => $data['login'],
            ':password' => $data['password'],
            ':role' => $data['role']
        ));
    }

    public function editSave($data){

        $statementHandler = $this->db->prepare('UPDATE  users 
        SET  `login` = :login, `password` = :password, `role` = :role WHERE `id` = :id');

        $statementHandler->execute(array(
            ':id' => $data['id'],
            ':login' => $data['login'],
            ':password' => md5($data['password']),
            ':role' => $data['role']
        ));
    }

    public function delete($id){
        $statementHandler = $this->db->prepare('DELETE FROM users WHERE id = :id');
        $statementHandler->execute(array(
           ':id' => $id
        ));
    }

}

?>