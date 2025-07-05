<?php
session_start();  // Inicia la sesión

require('conec.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = trim($_POST["correo"]);
    $contra = trim($_POST["contraSystem"]);
    $telefono = trim($_POST["telefono"]);

    // Validación básica
    if (filter_var($correo, FILTER_VALIDATE_EMAIL) && !empty($contra) && preg_match('/^\+\d{1,3}\s?\d{8,15}$/', $telefono)) {
        $objbd = new BD();
        $objbd->insertar_registro($correo, $contra, $telefono);
    
        // Establece el mensaje de éxito en la sesión
        $_SESSION['mensaje'] = "Usuario insertado correctamente";
    
        // Redirección después del registro exitoso
        echo json_encode(['mensaje' => $_SESSION['mensaje']]);
        exit();
    } else {
        echo json_encode(['error' => 'Por favor, asegúrate de que todos los campos sean válidos.']);
    }
} else {
    echo json_encode(['error' => 'Método no permitido.']);
}
?>
