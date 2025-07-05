<?php
session_start();
require_once './bd/cadeConexion.php';

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];

    // Conexión a la base de datos
    $db = new Database();
    $conexion = $db->connect();

    // Actualizar estadoActivo a 0
    $update_query = $conexion->prepare("UPDATE usuario_woods SET ultimoIntento = NULL, estadoActivo = 0 WHERE correo = ?");
    $update_query->bind_param("s", $email);
    $update_query->execute();

    $update_query->close();
    $db->disconnect();
}

// Destruir la sesión
session_unset();
session_destroy();

header("Location: index.php");
exit;
?>
