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
  <title>Usuarios - SystemWoods</title>
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
  <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body class="blog-page">

  <?php include('./templates/cabeceradmin.php'); ?>
  <section id="blog-posts" class="blog-posts section">
    <div class="container mt-5 position-relative">
      <br><br>
      <h2 class="text-center mb-4">Lista de Usuarios</h2>
      <div class="d-flex justify-content-end mb-3">
  <a href="registros.php" class="btn btn-success me-2">
    <i class="bi bi-plus-circle"></i>
    <span class="d-none d-sm-inline">Agregar</span>
  </a>
   <form action="./bd/updateestado.php" method="post">
  <button class="btn btn-warning">
    <i class="bi bi-arrow-clockwise"></i>
    <span class="d-none d-sm-inline">Actualizar</span>
  </button></form>
</div>


      <div class="table-responsive">

        <table class="table table-striped table-sm">
          <thead class="table-dark">
            <tr>
              <th>Correo</th>
              
              <th>Activo</th>
              <th>Teléfono</th>
              <th>Última Conexión</th>
              <th>Último Intento</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody id="modelTableBody">
            <?php
            require('./bd/conec.php');
            $objBD = new BD();
            $usuarios = $objBD->selectUsuarios();
            while ($u = $usuarios->fetch_assoc()) {
              echo "<tr>";
              echo "<td>" . htmlspecialchars($u["correo"]) . "</td>";
             
              echo "<td>";
              if ($u["estadoActivo"] == 1) {
                  echo '<i class="bi bi-check-circle text-success"></i>';
              } else {
                  echo '<i class="bi bi-x-circle text-danger"></i>';
              }
              echo "</td>";
              
              echo "<td>" . htmlspecialchars($u["telefono"]) . "</td>";
              echo "<td>" . htmlspecialchars($u["ultimaActividad"]) . "</td>";
              echo "<td>" . htmlspecialchars($u["ultimoIntento"]) . "</td>";
              echo '<td>
                  <div class="btn-group" role="group">
                    <a onclick="eliminarUsuario(' . htmlspecialchars($u["id"]) . ')" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                    <a onclick="editUser(' . htmlspecialchars($u["id"]) . ')" class="btn btn-warning"><i class="bi bi-pencil"></i></a>
                  </div>
                </td>';
              echo "</tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>



  </section>

  <!-- SweetAlert2 JS -->
  
  <?php include('./templates/piepagina.php'); ?>
  <script src="assets/js/close_premium.js"></script>
  <script src="assets/js/main.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="assets/vendor/aos/aos.js"></script>
</body>

</html>