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

        $this->db->insert('users', array(
            'login' => $data['login'],
            'password' => Hash::create('md5', $data['password'], HASH_PASSWORD_KEY),
            'role' => $data['role']
        ));

    }

    public function editSave($data){

        $postData = array(
            'login' => $data['login'],
            'password' => Hash::create('md5', $data['password'], HASH_PASSWORD_KEY),
            'role' => $data['role']
        );

        $this->db->update('users', $postData, "`id` = {$data['id']}");
    }

    public function delete($id){
        $statementHandler = $this->db->prepare('DELETE FROM users WHERE id = :id');
        $statementHandler->execute(array(
           ':id' => $id
        ));
    }

}

?>