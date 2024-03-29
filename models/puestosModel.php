<?php
require_once '../config/database.php';

class PuestoModel extends Database
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllPuestos($parqueadero_id)
    {
        $parqueadero_id = $this->connection->real_escape_string($parqueadero_id);
        $sql = sprintf("SELECT * FROM puestos WHERE parqueadero_id = '%s' ORDER BY nro ASC", $parqueadero_id);
        return $this->executeSql($sql);
    }

    public function updateState($id, $state)
    {
        $id = $this->connection->real_escape_string($id);
        $state = $this->connection->real_escape_string($state);
        $sql = sprintf("UPDATE puestos SET disponible = '%s' WHERE id = '%s'", $state, $id);
        try {
            return $this->connection->query($sql);
        } catch (Exception $e) {

            throw new Exception("Error al actualizar el estado del puesto: " . $e->getMessage());
        }
    }
}
