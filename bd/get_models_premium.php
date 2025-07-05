<?php
require('conec.php');
$objbd = new BD();
$marca = $objbd->selecMarca();

if (isset($_GET['marca'])) {
    $idmarca = intval($_GET['marca']);
    $modelos = $objbd->selectModeloMarcPremium($idmarca);
    
    $response = [];
    while ($row = $modelos->fetch_assoc()) {
        $response[] = $row;
    }
    
    echo json_encode($response);
};


?>