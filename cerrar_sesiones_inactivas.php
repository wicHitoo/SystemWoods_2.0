<?php
require_once './bd/cadeConexion.php';
$db = new Database();
$conexion = $db->connect();

$conexion->query("UPDATE usuario_woods SET estadoActivo = 0,ultimoIntento = NULL WHERE TIMESTAMPDIFF(SECOND, ultimaActividad, NOW()) > 180");

$db->disconnect();
?>
