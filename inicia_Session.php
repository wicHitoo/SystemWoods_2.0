<?php
session_start();
require_once './bd/cadeConexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $db = new Database();
    $conexion = $db->connect();

    // Paso 1: Verificar si el usuario existe y la contraseña es correcta
    $consulta = $conexion->prepare("SELECT * FROM usuario_woods WHERE correo = ? AND contraSystem = ?");
    $consulta->bind_param("ss", $email, $password);
    $consulta->execute();
    $resultado = $consulta->get_result();

    if ($resultado->num_rows === 0) {
        // Credenciales inválidas
        echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
        echo '<script>
        setTimeout(function() {
            Swal.fire({
                icon: "error",
                title: "¡Error!",
                text: "Correo electrónico o contraseña incorrectos.",
                confirmButtonColor: "#d33"
            }).then(() => {
                window.location.href = "inicio.php";
            });
        }, 100);
        </script>';
        exit;
    }

    $usuario = $resultado->fetch_assoc();
    $id_usuario = $usuario['id'];

    // Paso 2: Verificar si tiene una sesión activa reciente (<180s)
    $consulta_tiempo = $conexion->prepare("SELECT TIMESTAMPDIFF(SECOND, ultimoIntento, NOW()) AS segundos FROM usuario_woods WHERE id = ?");
    $consulta_tiempo->bind_param("i", $id_usuario);
    $consulta_tiempo->execute();
    $resultado_tiempo = $consulta_tiempo->get_result();
    $tiempo = $resultado_tiempo->fetch_assoc();

    if ($usuario['estadoActivo'] == 1 && $tiempo['segundos'] < 180) {
        // Usuario ya está activo y debe esperar
        $update_espera = $conexion->prepare("UPDATE usuario_woods SET ultimoIntento = NOW() WHERE id = ?");
        $update_espera->bind_param("i", $id_usuario);
        $update_espera->execute();

       echo '<!DOCTYPE html>
                <html lang="es">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Login - SystemWoods</title>
                    <link rel="icon" href="Imagenes/Logo.png" type="image/png">
                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                    <link rel="stylesheet" href="assets/css/styles.css">
                    <link href="assets/css/main.css" rel="stylesheet">
                </head>
                <body>
                <script>
                Swal.fire({
                    icon: "info",
                    title: "¡Sesión activa!",
                    html: "<p style=\'font-size: 1.1rem;\'>Por seguridad, solo puedes usar tu cuenta en un solo dispositivo.</p>" +
                        "<p style=\'font-size: 1.1rem;\'>Espera <strong>5 minutos</strong> para volver a intentarlo.</p>" +
                        "<p style=\'font-size: 0.8rem; color: #555;\'>Recuerda cerrar sesión al salir para evitar este mensaje.</p>",
                    confirmButtonColor: "#d33"
                }).then(() => {
                    window.location.href = "inicio.php";
                });
                </script>
                </body>
                </html>';
        exit;
    }

    // Paso 3: Activar sesión y actualizar datos
    $update_estado = $conexion->prepare("UPDATE usuario_woods SET estadoActivo = 1, ultimaActividad = NOW(), ultimoIntento = NULL WHERE id = ?");
    $update_estado->bind_param("i", $id_usuario);
    $update_estado->execute();

    $_SESSION['email'] = $usuario['correo'];
    $_SESSION['id_usuario'] = $usuario['id'];

    header("Location: usuarios.php");
    exit;
}
