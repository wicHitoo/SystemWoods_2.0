<?php
session_start();
require_once './bd/cadeConexion.php';

if (isset($_SESSION['id_usuario'])) {
    $id_usuario = $_SESSION['id_usuario'];

    // Desactivar al usuario en la base de datos
    $db = new Database();
    $conexion = $db->connect();

    $consulta = $conexion->prepare("UPDATE usuario_woods SET estadoActivo = 0, ultimoIntento = NOW() WHERE id = ?");
    $consulta->bind_param("i", $id_usuario);
    $consulta->execute();

    $consulta->close();
    $db->disconnect();
}

// Destruir la sesión
session_unset();
session_destroy();

header("Location: index.php");
exit;
?>
