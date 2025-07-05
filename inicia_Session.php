<?php
session_start();
require_once './bd/cadeConexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Conexión a la base de datos
    $db = new Database();
    $conexion = $db->connect();

    $consulta_ultima = $conexion->prepare("SELECT * FROM usuario_woods WHERE correo = ? AND contraSystem = ? and TIMESTAMPDIFF(SECOND, ultimoIntento, NOW()) > 180");
    $consulta_ultima->bind_param("ss", $email, $password);
    $consulta_ultima->execute();
    $resultado_ultimo = $consulta_ultima->get_result();
    if ($resultado_ultimo->num_rows > 0) {
        // Usuario válido, activar sesión
        $update_query_ultima = $conexion->prepare("UPDATE usuario_woods SET ultimoIntento = null ;");
        $update_query_ultima->execute();
        $_SESSION['email'] = $email;
        header("Location:usuarios.php");
    }

    // Consulta para verificar si la cuenta está activa
    $consulta_activa = $conexion->prepare("SELECT estadoActivo FROM usuario_woods WHERE correo = ?");
    $consulta_activa->bind_param("s", $email);
    $consulta_activa->execute();
    $resultado_activa = $consulta_activa->get_result();

    if ($resultado_activa->num_rows > 0) {
        $usuario = $resultado_activa->fetch_assoc();

        if ($usuario['estadoActivo'] == 1) {
            $update_query_ultimo = $conexion->prepare("UPDATE usuario_woods SET ultimoIntento = NOW() where estadoActivo = 1 and correo = ?;");
            $update_query_ultimo->bind_param("s", $email);
            $update_query_ultimo->execute();
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
                            title: "¡Sesión activa! ",
                           html: `
                                <p style="font-size: 1.1rem; line-height: 1.5;">
                                    Por seguridad, solo puedes usar tu cuenta en un solo dispositivo.
                                </p>
                                <p style="font-size: 1.1rem;">
                                    Si olvidaste cerrar sesión, no te preocupes. Solo necesitas esperar <strong>5 minutos</strong> para volver a intentarlo.<br> ¡Gracias por tu paciencia!
                                </p>
                                <p style="font-size: 0.8rem; color: #555;">
                                    Consejo: Recuerda siempre cerrar sesión cuando termines de usar tu cuenta para evitar este inconveniente.
                                </p>
                            `,
                            showConfirmButton: true,
                            confirmButtonColor: "#d33",
                        }).then(() => {
                            window.location.href = "inicio.php";
                        });
                        </script>
                    </body>
                    </html>';
            exit;
        }
    }

    // Consulta para validar el usuario
    $consulta = $conexion->prepare("SELECT * FROM usuario_woods WHERE correo = ? AND contraSystem = ?");
    $consulta->bind_param("ss", $email, $password);
    $consulta->execute();
    $resultado = $consulta->get_result();

    if ($resultado->num_rows > 0) {
        // Usuario válido, activar sesión
        $update_query = $conexion->prepare("UPDATE usuario_woods SET estadoActivo = 1, ultimaActividad = NOW() WHERE correo = ?");
        $update_query->bind_param("s", $email);
        $update_query->execute();

        $_SESSION['email'] = $email;
        header("Location:usuarios.php");
    } else {
        // Usuario inválido
        echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
        echo '<script>
        setTimeout(function() {
            Swal.fire({
                icon: "error",
                title: "¡Error!",
                text: "Correo electrónico o contraseña incorrectos.",
                showConfirmButton: true,
                confirmButtonColor: "#d33",
                onClose: () => { window.location.href = "inicio.php";
                }});
        }, 100);
        </script>';
    }
    $consulta->close();
    $db->disconnect();
}
