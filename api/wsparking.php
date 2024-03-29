<?php

require_once '../controllers/usuarioController.php';
require_once '../controllers/parqueaderoController.php';
require_once '../controllers/puestosController.php';
require_once '../controllers/vehiculoController.php';


header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: *');
header('Access-Control-Allow-Headers: Origin, Content-Type, Authorization, Accept, X-Requested-With, x-xsrf-token');
header('Content-Type: application/json; charset=utf-8');

$post = json_decode(file_get_contents('php://input'), true);

$usuarioController = new UsuarioController();
$parqueaderoController = new ParqueaderoController();
$puestosController = new PuestosController();
$vehiculoController = new VehiculoController();

if ($post['accion'] == 'login') {
    $response = $usuarioController->login($post['email'], $post['password']);
    echo json_encode($response);
}


/*  PARQUEADERO  */
if ($post['accion'] == 'registrarParqueadero') {
    $response = $parqueaderoController->insertarParqueadero($post);
    echo json_encode($response);
}
if ($post['accion'] == 'listarParqueaderos') {
    $response = $parqueaderoController->listarParqueaderos($post['usuarioId']);
    echo json_encode($response);
}
if ($post['accion'] == 'getParqueadero') {
    $response = $parqueaderoController->getParqueadero($post['id']);
    echo json_encode($response);
}


/*  PUESTOS  */
if ($post['accion'] == 'listarPuestos') {
    $response = $puestosController->listarPuestos($post['parqueaderoId']);
    echo json_encode($response);
}
if ($post['accion'] == 'actualizaEstadoPuesto') {
    $response = $puestosController->actualizaEstado($post['puestoId'], $post['estado']);
    echo json_encode($response);
}

/*  VEHICULOS  */
if ($post['accion'] == 'registrarVehiculo') {
    $response = $vehiculoController->insertarVehiculo($post);
    echo json_encode($response);
}
if ($post['accion'] == 'getVehiculo') {
    $response = $vehiculoController->getVehiculo($post['puestoId']);
    echo json_encode($response);
}
if ($post['accion'] == 'updateVehiculo') {
    $response = $vehiculoController->actualizarVehiculo($post['fecha_salida'], $post['hora_salida'], $post['id']);
    echo json_encode($response);
}
