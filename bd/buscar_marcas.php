<?php

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    require_once 'conec.php'; // Asegúrate de incluir la conexión a la base de datos

    $objBD = new BD();
    $marcas = $objBD->selectTodasMarcas($id);

    if ($ma = $marcas->fetch_assoc()) {
        echo json_encode([
            'idmarcacelular' => $ma['idmarcacelular'],
            'Nombre' => $ma['Nombre'],
           
        ]);
    } else {
        echo json_encode(['error' => 'Marca no encontrado']);
    }
} else {
    echo json_encode(['error' => 'ID no proporcionado']);
}

?>