<?php

class Database extends PDO
{
    public function __construct($DB_TYPE, $DB_HOST, $DB_NAME, $DB_USER, $DB_PASS)
    {
        parent::__construct($DB_TYPE . ':host=' . $DB_HOST . ';dbname=' . $DB_NAME, $DB_USER, $DB_PASS);
        //parent::setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTIONS);
    }

    /**
     * select
     * @param $sql : "query to execute"
     * @param $array : any additional array to be passed default empty
     * @param int $fetchMode : "fetch Mode enabled by default
     * @return array
     */
    public function select($sql, $array = array(), $fetchMode = PDO::FETCH_ASSOC)
    {
        $statementHandler = $this->prepare($sql);
        foreach ($array as $key => $value) {
            $statementHandler->bindValue("$key", $value);
        }
        $statementHandler->execute();
        return $statementHandler->fetchAll($fetchMode);
    }

    /**
     * @param $table A table name for data to insert into
     * @param $data A Data array associative
     */

    public function insert($table, $data)
    {

        ksort($data);
        $fieldNames = implode('`, `', array_keys($data));
        $fieldValues = ':' . implode(',:', array_keys($data));

        $statementHandler = $this->prepare("INSERT INTO $table (`$fieldNames`) VALUES ($fieldValues)");

        foreach ($data as $key => $value) {
            $statementHandler->bindValue("$key", $value);
        }
        $statementHandler->execute();
    }


    /**
     * @param $table A table name for data to be updated into
     * @param $data A Data array associative
     * @param $where where condition to be implemented in
     */
    public function update($table, $data, $where)
    {
        ksort($data);
        $fieldDetails = NULL;
        foreach ($data as $key => $value) {
            $fieldDetails .= "`$key` = :$key,";
        }
        $fieldDetails = rtrim($fieldDetails, ',');

        $statementHandler = $this->prepare("UPDATE $table SET $fieldDetails WHERE $where");
        foreach ($data as $key => $value) {
            $statementHandler->bindValue("$key", $value);
        }
        $statementHandler->execute();
    }


    /**
     * delete
     *
     * @param string $table
     * @param string $where
     * @param integer $limit
     * @return integer Affected Rows
     */
    public function delete($table, $where, $limit = 1)
    {
        return $this->exec("DELETE FROM $table WHERE $where LIMIT $limit");
    }

}

?>