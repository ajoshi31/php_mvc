<?php

class User_Model extends Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function userList()
    {
        return $this->db->select("SELECT id,login, role FROM user");
    }

    public function userSingleList($id)
    {

        return $this->db->select("SELECT id, login, role FROM user WHERE id = :id", array(':id' => $id));

    }

    public function create($data)
    {
        $this->db->insert('user', array(
            'login' => $data['login'],
            'password' => Hash::create('sha256', $data['password'], HASH_PASSWORD_KEY),
            'role' => $data['role']
        ));
    }

    public function editSave($data)
    {
        $postData = array(
            'login' => $data['login'],
            'password' => Hash::create('sha256', $data['password'], HASH_PASSWORD_KEY),
            'role' => $data['role']
        );
        $this->db->update('user', $postData, "`id` = {$data['id']}");
    }

    public function delete($id)
    {
        $data =  $this->db->select('SELECT role FROM user WHERE id = :id', array(':id' => $id));
        if ($data[0]['role'] == 'owner')
            return false;
        $this->db->delete('user', "id = '$id'");

    }
}

?>