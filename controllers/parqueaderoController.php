<?php
require_once '../models/parqueaderoModel.php';
class ParqueaderoController extends ParqueaderoModel
{

    public function __construct()
    {
        parent::__construct();
    }

    public function insertarParqueadero($post)
    {

        $usuarioId = $post['usuarioId'];
        $nombre = $post['nombre'];
        $direccion = $post['direccion'];
        $valorHora = $post['valorHora'];

        $numeroPuestos = $post['cantidadPuestos'];




        try {
            $parqueaderoId = $this->insertParqueadero($nombre, $direccion, $valorHora, $usuarioId);

            for ($i = 1; $i <= $numeroPuestos; $i++) {
                $this->insertarPuestos($i, $parqueaderoId);
            }
            return array("status" => true, "msg" => "Parqueadero Guardado");
        } catch (Exception $e) {
            return array("status" => false, "msg" => $e->getMessage());
        }
    }

    public function listarParqueaderos($usuarioId)
    {
        try {
            $parqueaderos = $this->getAllParqueaderosByUsuarioId($usuarioId);
            return array("status" => true, "msg" => "Parqueaderos", "data" => $parqueaderos);
        } catch (Exception $e) {
            return array("status" => false, "msg" => $e->getMessage());
        }
    }

    public function getParqueadero($id)
    {
        try {
            $parqueadero = $this->getParqueaderoById($id);
            return array("status" => true, "msg" => "Parqueadero", "data" => $parqueadero);
        } catch (Exception $e) {
            return array("status" => false, "msg" => $e->getMessage());
        }
    }
}
