<?php

include('config.php');

class Database

{

    protected $connection = null;

    public function __construct()
    {

        try {

            $this->connection = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE_NAME);



            if (mysqli_connect_errno()) {

                throw new Exception("Could not connect to database.");
            }
        } catch (Exception $e) {

            throw new Exception($e->getMessage());
        }
    }

    public function executeSql($sql)
    {
        $result = $this->connection->query($sql);
        if (!$result) {
            throw new Exception("Error en la query: " . $this->connection->error);
        }

        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }
}
