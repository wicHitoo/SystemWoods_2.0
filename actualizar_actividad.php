<?php
session_start();
require_once './bd/cadeConexion.php';

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];

    $db = new Database();
    $conexion = $db->connect();

    $update_query = $conexion->prepare("UPDATE usuario_woods SET ultimaActividad = NOW() WHERE correo = ?");
    $update_query->bind_param("s", $email);
    $update_query->execute();

    $update_query->close();
    $db->disconnect();
}
?>
