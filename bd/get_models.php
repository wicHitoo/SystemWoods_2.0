<?php
require('conec.php');
$objbd = new BD();
$marca = $objbd->selecMarca1();

if (isset($_GET['marca'])) {
    $idmarca = intval($_GET['marca']);
    $modelos = $objbd->selectModeloMarca($idmarca);
    
    $response = [];
    while ($row = $modelos->fetch_assoc()) {
        $response[] = $row;
    }
    
    echo json_encode($response);
};


?>