<?php
require_once '../models/vehiculoModel.php';

class VehiculoController extends VehiculoModel
{

    public function __construct()
    {
        parent::__construct();
    }
    public function insertarVehiculo($post)
    {
        $placa = $post["placa"];
        $modelo = $post["modelo"];
        $anio = $post["anio"];
        $fecha_ingreso = $post["fecha_ingreso"];
        $hora_ingreso = $post["hora_ingreso"];
        $puesto_id = $post["puesto_id"];

        try {

            $this->insertVehiculo($placa, $modelo, $anio, $fecha_ingreso, $hora_ingreso,  $puesto_id);

            return array("status" => true, "msg" => "Vehiculo Guardado");
        } catch (Exception $e) {

            return array("status" => false, "msg" => $e->getMessage());
        }
    }
    public function getVehiculo($puestoId)
    {
        try {
            $vehiculo = $this->getVehiculobyPuesto($puestoId);
            return array("status" => true, "msg" => "Vehiculo", "data" => $vehiculo);
        } catch (Exception $e) {
            return array("status" => false, "msg" => $e->getMessage());
        }
    }

    public function actualizarVehiculo($fecha_salida, $hora_salida, $id)
    {
        try {
            $this->updateVehiculo($fecha_salida, $hora_salida, $id);
            return array("status" => true, "msg" => "Vehiculo Actualizado");
        } catch (Exception $e) {
            return array("status" => false, "msg" => $e->getMessage());
        }
    }
}
