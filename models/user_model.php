<?php

class User_Model extends Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function userList()
    {
        return $this->db->select("SELECT userid,login, role FROM user");
    }

    public function userSingleList($userid)
    {

        return $this->db->select("SELECT userid, login, role FROM user WHERE userid = :userid", array(':userid' => $userid));

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
        $this->db->update('user', $postData, "`userid` = {$data['userid']}");
    }

    public function delete($userid)
    {
        $data =  $this->db->select('SELECT role FROM user WHERE userid = :userid', array(':userid' => $userid));
        if ($data[0]['role'] == 'owner')
            return false;
        $this->db->delete('user', "userid = '$userid'");

    }
}

?>