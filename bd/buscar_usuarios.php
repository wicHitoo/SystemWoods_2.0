<?php

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    require_once 'conec.php'; // Asegúrate de incluir la conexión a la base de datos

    $objBD = new BD();
    $usuarios = $objBD->selectTodoUsuarios($id);

    if ($u = $usuarios->fetch_assoc()) {
        echo json_encode([
            'id' => $u['id'],
            'correo' => $u['correo'],
            'contraSystem' => $u['contraSystem'],
            'telefono' => $u['telefono']
        ]);
    } else {
        echo json_encode(['error' => 'Modelo no encontrado']);
    }
} else {
    echo json_encode(['error' => 'ID no proporcionado']);
}

?>