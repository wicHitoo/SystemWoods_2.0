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
  <title>Marcas - Modelos</title>
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
  <br><br>
  <section id="blog-posts" class="blog-posts section">
    <div class="container mt-5 position-relative">
      <!-- Botón para agregar una nueva marca -->
      <a onclick="insertarMarca()" class="btn btn-success add-brand-btn">
        <i class="bi bi-plus-circle"></i> Agregar Marca
      </a>
      <br><br>
      <h1 class="text-center mb-4">Marcas y Modelos</h1>
      <div class="brand-container">
        <?php
        require('./bd/conec.php');
        $objBD = new BD();
        $marcas = $objBD->selectMarcas();
        while ($m = $marcas->fetch_assoc()) {
        ?>
          <div class="brand-item">
            <div class="dropdown">
              <button class="btn btn-dark brand-button dropdown-toggle" type="button" id="dropdown<?php echo htmlspecialchars($m["idmarcacelular"]); ?>" data-bs-toggle="dropdown" aria-expanded="false">
                <?php echo htmlspecialchars($m["Nombre"]); ?>
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdown<?php echo htmlspecialchars($m["idmarcacelular"]); ?>">
              <li>
          <a class="dropdown-item text-success" onclick="abrirFormularioModelo(<?php echo htmlspecialchars($m['idmarcacelular']); ?>)">
            <i class="bi bi-plus-circle"></i> Agregar Modelo
          </a>
        </li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <?php
                $modelos = $objBD->selectModelosPorMarca($m["idmarcacelular"]);
                while ($modelo = $modelos->fetch_assoc()) {
                  $premiumText = $modelo["Premium"] == 1 ? " ⭐ " : "";
                ?>
                  <li>
                    <div class="d-flex justify-content-between align-items-center px-5">
                      <span class="me-auto"><?php echo htmlspecialchars($modelo["Nombre"]); ?></span>
                      <span class="ms-2"><?php echo $premiumText; ?></span>
                      <a onclick="editModel(<?php echo htmlspecialchars($modelo['idmodelocelular']); ?>)" class="ms-2">
                        <i class="bi bi-pencil"></i>
                      </a>
                    </div>
                  </li>

                <?php } ?>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li>
                  <a class="dropdown-item text-warning" onclick="editMarcas(<?php echo htmlspecialchars($m['idmarcacelular']); ?>)">
                    <i class="bi bi-pencil"></i> Editar Marca
                  </a>

                </li>
              </ul>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </section>
  <!-- JavaScript -->
  <?php include('./templates/piepagina.php'); ?>
  
  <script src="assets/js/close_premium.js"></script>
  <script src="assets/js/main.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="assets/vendor/aos/aos.js"></script>
</body>

</html>