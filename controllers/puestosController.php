<?php
require '../models/puestosModel.php';

class PuestosController extends PuestoModel
{

    public function __construct()
    {
        parent::__construct();
    }
    public function listarPuestos($parqueaderoId)
    {
        try {
            $puestos = $this->getAllPuestos($parqueaderoId);
            return array("status" => true, "msg" => "Puestos", "data" => $puestos);
        } catch (Exception $e) {
            return array("status" => false, "msg" => $e->getMessage());
        }
    }

    public function actualizaEstado($puestoId, $estado)
    {
        try {
            $this->updateState($puestoId, $estado);
            return array("status" => true, "msg" => "Puesto Actualizado");
        } catch (Exception $e) {
            return array("status" => false, "msg" => $e->getMessage());
        }
    }
}
