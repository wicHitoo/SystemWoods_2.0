<?php
session_start(); // Asegúrate de iniciar la sesión

require('conec.php');
$objBD = new BD();
$objBD->actualizarEstados();

// Cierra sesión
session_unset();     // Limpia variables de sesión
session_destroy();   // Elimina la sesión

header('Location: ../index.php'); // Redirige al login o página principal
exit();
?>
