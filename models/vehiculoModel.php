<?php
require_once '../config/config.php';
class VehiculoModel extends Database
{

    public function __construct()
    {
        parent::__construct();
    }

    public function insertVehiculo($placa, $modelo, $anio, $fecha_ingreso, $hora_ingreso, $puesto_id)
    {

        $placa = $this->connection->real_escape_string($placa);
        $modelo = $this->connection->real_escape_string($modelo);
        $anio = $this->connection->real_escape_string($anio);
        $fecha_ingreso = $this->connection->real_escape_string($fecha_ingreso);
        $hora_ingreso = $this->connection->real_escape_string($hora_ingreso);
        $puesto_id = $this->connection->real_escape_string($puesto_id);


        $sql = sprintf(
            "INSERT INTO vehiculos (placa, modelo, anio, fecha_ingreso, hora_ingreso, estado, puesto_id) VALUES ('%s', '%s', '%s', '%s', '%s', '0', '%s')",
            $placa,
            $modelo,
            $anio,
            $fecha_ingreso,
            $hora_ingreso,
            $puesto_id
        );


        try {
            return $this->connection->query($sql);
        } catch (Exception $e) {

            throw new Exception("Error al insertar el vehículo: " . $e->getMessage());
        }
    }

    public function getVehiculobyPuesto($puesto_id)
    {
        $sql = sprintf(
            "SELECT v.id, v.placa, v.modelo, v.anio, v.fecha_ingreso, v.hora_ingreso FROM vehiculos v INNER JOIN puestos p ON v.puesto_id = p.id WHERE p.id = '%s'",

            $puesto_id
        );
        return $this->executeSql($sql);
    }

    public function updateVehiculo($fecha_salida, $hora_salida, $id)
    {
        $sql = sprintf(
            "UPDATE vehiculos SET fecha_salida = '%s', hora_salida = '%s' WHERE id = '%s'",
            $fecha_salida,
            $hora_salida,
            $id
        );
        try {
            return $this->connection->query($sql);
        } catch (Exception $e) {

            throw new Exception("Error al insertar el vehículo: " . $e->getMessage());
        }
    }
}
