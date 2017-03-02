<?php

class Dashboard_Model extends  Model{

    function __construct(){
        parent::__construct();
    }

    function xhrInsert(){
        $text =  $_POST['text'];
        $statementHandler = $this->db->prepare('INSERT INTO data (text) VALUES (:text)');
        $statementHandler->execute(array(':text' => $text));
        $data = array('text'=>$text, 'id' => $this->db->lastInsertId());
        echo json_encode($data);

    }

    function xhrGetListings(){
        $statementHandler = $this->db->prepare('SELECT * FROM data');
        $statementHandler->setFetchMode(PDO::FETCH_ASSOC);
        $statementHandler->execute();
        $data = $statementHandler->fetchAll();
        echo json_encode($data);

    }

    function xhrDeleteListing(){

        $id = $_POST['id'];
        $statementHandler = $this->db->prepare('DELETE FROM data WHERE id = "'. $id .'"');
        $statementHandler->execute();
        echo $id;
    }
}

?>