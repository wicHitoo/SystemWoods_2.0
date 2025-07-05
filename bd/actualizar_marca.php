<?php
require('conec.php');
$objBD = new BD();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']);
    $nombre = $_POST['Nombre'];
   

    // Actualiza el modelo en la base de datos
    $resultado = $objBD->actualizarMarca($id, $nombre);

    if ($resultado) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error al actualizar el modelo']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Método no permitido']);
}
?>