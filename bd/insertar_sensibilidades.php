<?php
session_start();
require('conec.php');
header('Content-Type: application/json');

if (!isset($_SESSION['id_usuario'])) {
    echo json_encode(['success' => false, 'message' => 'Sesión no iniciada.']);
    exit;
}

try {
    $objBD = new BD();
    $userId = $_SESSION['id_usuario'];
    $modeloid = $_POST["_modelo"];
    $fecha = $_POST["fecha"];
    $sensibilidades = $_POST["sensibilidad"];

    if ($objBD->agregarSensibilidades($userId, $modeloid, $fecha, $sensibilidades)) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error al insertar el registro de sensibilidades']);
    }
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}
