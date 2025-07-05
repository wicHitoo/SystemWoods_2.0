<?php
require('conec.php');
$objBD = new BD();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']);
    $nombre = $_POST['Nombre'];
    $premium = intval($_POST['Premium']);

    // Actualiza el modelo en la base de datos
    $resultado = $objBD->actualizarModelo($id, $nombre, $premium);

    if ($resultado) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error al actualizar el modelo']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Método no permitido']);
}
?>
