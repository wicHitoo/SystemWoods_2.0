<?php
require('conec.php');
$objBD = new BD();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']);
    $correo = $_POST['correo'];
    $contra = ($_POST['contraSystem']);
    $telefono = ($_POST['telefono']);

    // Actualiza el modelo en la base de datos
    $resultado = $objBD->actualizarUsuario($id, $correo, $contra,$telefono);

    if ($resultado) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error al actualizar el usuario']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Método no permitido']);
}
?>