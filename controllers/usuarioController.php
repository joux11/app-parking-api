<?php
require_once '../models/usuarioModel.php';
class UsuarioController extends UsuarioModel
{

    public function __construct()
    {
        parent::__construct();
    }
    public function login($email, $password)
    {
        try {
            $user = $this->getUserByLogin($email, $password);
            if ($user) {
                return array("status" => true, "msg" => "Bienvenido", "data" => $user);
            } else {
                return array("status" => false, "msg" => "Datos Incorrectos");
            }
        } catch (Exception $e) {
            return array("status" => false, "msg" => $e->getMessage());
        }
    }
}
