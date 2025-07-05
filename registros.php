<?php
session_start();
if (!isset($_SESSION['email']) || $_SESSION['email'] !== 'woodsAdmin@gmail.com') {
    // Si no es el administrador, redirige al usuario a la página de inicio
    header("Location:custom.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registros - Usuarios</title>
  <link rel="icon" href="Imagenes/Logo.png" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;400;700&family=Poppins:wght@100;400;700&family=Raleway:wght@100;400;700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

</head>

<body class="blog-page">

  <?php include('./templates/cabeceradmin.php'); ?>

  <section id="about" class="about section"><br>
    <div class="container mt-5">
      <div class="row justify-content-center">
        <!-- Verifica si hay un mensaje de éxito en la sesión -->
        <div id="alertPlaceholder"></div>
        <!-- Clase card añadida aquí -->
        <div class="card-body">
          <!-- Título dentro de la tarjeta -->
          <div class="card-header text-center">
            <h4>Registro de Usuario</h4>
            <i class="bi bi-person-circle" style="font-size: 80px;"></i>
          </div>
          <form id="miFormulario">
            <!-- Campo de correo -->
            <div class="mb-3">
              <label for="correo" class="form-label">Correo Electrónico</label>
              <div class="input-group">
                <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                <input type="email" class="form-control" id="correo" name="correo" placeholder="Introduce el correo" required>
              </div>
            </div>
            <!-- Campo de contraseña -->
            <div class="mb-3">
              <label for="contraSystem" class="form-label">Contraseña</label>
              <div class="input-group">
                <span class="input-group-text"><i class="bi bi-lock"></i></span>
                <input type="password" class="form-control" id="contraSystem" name="contraSystem" placeholder="Introduce una contraseña segura" required>
                <button type="button" class="form-control toggle-btn" onclick="togglePassword()" id="toggleBtn" style="max-width: 40px;">👁️</button>
              </div>
            </div>
            <!-- Campo de teléfono con selección de país -->
            <div class="mb-3">
              <label for="telefono" class="form-label">Teléfono</label>
              <div class="input-group">
                <select class="form-select" id="pais" name="pais" required style="max-width: 100px;">
                  <option value="+1264">Anguila (+1264)</option>
                  <option value="+1268">Antigua y Barbuda (+1268)</option>
                  <option value="+54">Argentina (+54)</option>
                  <option value="+297">Aruba (+297)</option>
                  <option value="+1242">Bahamas (+1242)</option>
                  <option value="+1246">Barbados (+1246)</option>
                  <option value="+501">Belice (+501)</option>
                  <option value="+1441">Bermudas (+1441)</option>
                  <option value="+591">Bolivia (+591)</option>
                  <option value="+55">Brasil (+55)</option>
                  <option value="+1284">Islas Vírgenes Británicas (+1284)</option>
                  <option value="+1345">Islas Caimán (+1345)</option>
                  <option value="+56">Chile (+56)</option>
                  <option value="+57">Colombia (+57)</option>
                  <option value="+506">Costa Rica (+506)</option>
                  <option value="+53">Cuba (+53)</option>
                  <option value="+1767">Dominica (+1767)</option>
                  <option value="+1809">República Dominicana (+1809)</option>
                  <option value="+593">Ecuador (+593)</option>
                  <option value="+503">El Salvador (+503)</option>
                  <option value="+1">Estados Unidos (+1)</option>
                  <option value="+500">Islas Malvinas (+500)</option>
                  <option value="+679">Fiyi (+679)</option>
                  <option value="+502">Guatemala (+502)</option>
                  <option value="+592">Guyana (+592)</option>
                  <option value="+509">Haití (+509)</option>
                  <option value="+504">Honduras (+504)</option>
                  <option value="+876">Jamaica (+876)</option>
                  <option value="+52">México (+52)</option>
                  <option value="+505">Nicaragua (+505)</option>
                  <option value="+507">Panamá (+507)</option>
                  <option value="+595">Paraguay (+595)</option>
                  <option value="+51">Perú (+51)</option>
                  <option value="+1787">Puerto Rico (+1787)</option>
                  <option value="+1869">San Cristóbal y Nieves (+1869)</option>
                  <option value="+1758">Santa Lucía (+1758)</option>
                  <option value="+1784">San Vicente y las Granadinas (+1784)</option>
                  <option value="+1721">Sint Maarten (+1721)</option>
                  <option value="+597">Surinam (+597)</option>
                  <option value="+1649">Islas Turcas y Caicos (+1649)</option>
                  <option value="+598">Uruguay (+598)</option>
                  <option value="+58">Venezuela (+58)</option>
                  <option value="+1340">Islas Vírgenes de los Estados Unidos (+1340)</option>

                  <!-- Agrega más opciones aquí según los países que necesites -->
                </select>
                <input type="tel" class="form-control" id="telefono" name="telefono" placeholder="Introduce el número de teléfono" required>
              </div>
            </div>
            <!-- Botón de registro -->
            <div class="d-grid gap-2">
              <button type="submit" class="btn btn-success">Registrar</button>
            </div>
          </form>
          <!-- Separador -->
          <hr class="my-4">
          <!-- Formulario de actualización de estado -->
        </div>
        <!-- Fin de la tarjeta -->
      </div>
    </div>
  </section>
  <?php include('./templates/piepagina.php'); ?>
  <script src="assets/js/close_premium.js"></script>
  <script src="assets/js/main.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
</body>

</html>