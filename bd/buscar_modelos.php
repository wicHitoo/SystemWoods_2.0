<?php

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    require_once 'conec.php'; // Asegúrate de incluir la conexión a la base de datos

    $objBD = new BD();
    $modelo = $objBD->buscarModelos($id);

    if ($mo = $modelo->fetch_assoc()) {
        echo json_encode([
            'idmodelocelular' => $mo['idmodelocelular'],
            'Nombre' => $mo['Nombre'],
            'Premium' => $mo['Premium']
        ]);
    } else {
        echo json_encode(['error' => 'Modelo no encontrado']);
    }
} else {
    echo json_encode(['error' => 'ID no proporcionado']);
}

?>
