<?php
    require('conec.php');
	$objBD = new BD();
    $objBD->actualizarEstados();
    header('Location: ../index.php');
?>