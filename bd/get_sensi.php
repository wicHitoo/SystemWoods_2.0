<?php
session_start();
require('conec.php');
header('Content-Type: application/json');

if (!isset($_GET['id'])) {
    echo json_encode(['success' => false, 'message' => 'ID de usuario no proporcionado']);
    exit;
}

$id = intval($_GET['id']);
$objBD = new BD();
$result = $objBD->selectSensi($id);

if (!$result) {
    echo json_encode(['success' => false, 'message' => 'Error al obtener sensibilidades']);
    exit;
}

// Procesar resultados a array
$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = [
        'modelo' => $row['modelo'] ,
        'marca' => $row['marca'] ,
        'sensibilidad' => $row['sensibilidad']
    ];
}

echo json_encode(['success' => true, 'data' => $data]);
