<?php
require_once '../config/config.php';

class ParqueaderoModel extends Database
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getParqueaderoById($id)
    {

        $sql = sprintf("SELECT * FROM parqueadero WHERE id = '%s' ", $id);
        return $this->executeSql($sql);
    }

    public function insertParqueadero($nombre, $direccion, $valorHora, $usuario_id)
    {

        $nombre = $this->connection->real_escape_string($nombre);
        $direccion = $this->connection->real_escape_string($direccion);
        $valorHora = $this->connection->real_escape_string($valorHora);
        $usuario_id = $this->connection->real_escape_string($usuario_id);

        // Crear la consulta SQL
        $sql = sprintf(
            "INSERT INTO parqueadero (nombre, direccion, valorHora, usuario_id) VALUES ('%s', '%s', '%s', '%s')",
            $nombre,
            $direccion,
            $valorHora,
            $usuario_id
        );

        try {
            if ($this->connection->query($sql)) {
                return $this->connection->insert_id;
            }
        } catch (Exception $e) {
            throw new Exception("Error al insertar el parqueadero: " . $e->getMessage());
        }
    }
    public function getAllParqueaderosByUsuarioId($usuarioId)
    {
        $usuarioId = $this->connection->real_escape_string($usuarioId);
        $sql = sprintf("SELECT * FROM parqueadero WHERE usuario_id = '%s'", $usuarioId);
        return $this->executeSql($sql);
    }

    public function insertarPuestos($nro, $parqueaderoId)
    {
        $parqueadero_id = $this->connection->real_escape_string($parqueaderoId);
        $sql = sprintf(
            "INSERT INTO puestos (nro,disponible, parqueadero_id) VALUES ('%s','0', '%s')",
            $nro,
            $parqueadero_id
        );
        try {
            return $this->connection->query($sql);
        } catch (Exception $e) {
            throw new Exception("Error al insertar el parqueadero: " . $e->getMessage());
        }
    }
}
