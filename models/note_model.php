<?php

class Note_Model extends Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function noteList()
    {
        return $this->db->select("SELECT * FROM note WHERE `userid` = :userid",
            array('userid' => $_SESSION['userid']));
    }

    public function noteSingleList($noteid)
    {

        return $this->db->select("SELECT * FROM note WHERE `userid` = :userid AND noteid = :noteid",
            array(
                ':noteid' => $noteid,
                ':userid' => $_SESSION['userid']
            ));

    }

    public function create($data)
    {

        $this->db->insert('note', array(
            'title' => $data['title'],
            'userid' => $_SESSION['userid'],
            'content' => $data['content'],
            'date_added' => date('Y-m-d H:i:s')
        ));
    }

    public function editSave($data)
    {

        $postData = array(
            'title' => $data['title'],
            'content' => $data['content']
        );

        $this->db->update('note', $postData,
            "`noteid` = {$data['noteid']} AND `userid` = {$_SESSION['userid']}");
    }

    public function delete($noteid)
    {
        $this->db->delete('note',  "`noteid` = {$noteid} AND  `userid` = {$_SESSION['userid']}");

    }
}

?>