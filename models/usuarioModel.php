<?php
require_once '../config/database.php';
class UsuarioModel extends Database
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getUserByLogin($email, $password)
    {
        $email = $this->connection->real_escape_string($email);
        $password = $this->connection->real_escape_string($password);

        $sql = sprintf("SELECT * FROM usuarios WHERE email = '%s' AND password = '%s'", $email, $password);
        return $this->executeSql($sql);
    }
}
