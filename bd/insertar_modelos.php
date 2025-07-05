<?php
require('conec.php');

header('Content-Type: application/json');

try {
    $objBD = new BD();
    $nombre = $_POST["Nombre"];
    $premium = $_POST["Premium"];
    $marcaId = $_POST["MarcaID"];

    if ($objBD->insertarModelos($nombre, $marcaId, $premium)) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error al insertar el modelo']);
    }
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}

