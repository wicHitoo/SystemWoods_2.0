<?php
session_start();

$inactividad = 300; // 7 minutos
$idUsuario = isset($_SESSION['id_usuario']) ? $_SESSION['id_usuario'] : null;
// Verificar si la sesión está activa
if (!isset($_SESSION['email'])) {
    // Si la sesión no está activa, redirigir al usuario a la página de inicio de sesión
    header("Location: inicio.php");
    exit; // Asegura que el script se detenga aquí para evitar que se ejecute el resto del código
}

// Verificar la inactividad de la sesión
if (isset($_SESSION['tiempo'])) {
    $tiempo_inactividad = time() - $_SESSION['tiempo'];
    if ($tiempo_inactividad > $inactividad) {
        header("Location: logout.php");
        exit;
    }
}
$_SESSION['tiempo'] = time();
?>