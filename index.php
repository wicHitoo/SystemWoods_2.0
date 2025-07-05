    <?php
require('./bd/get_models.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SystemWoods Free</title>
  <link rel="icon" href="Imagenes/Logo.png" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/styles.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

  <header id="header" class="header fixed-top">
  <div class="marquee-container">
    <div class="marquee-content">
        <span>¡¡No encuentras la marca y el módelo de tu dispositivo!! &nbsp; Necesitas la versión SystemWoods 2.0. Para adquirirla comunícate vía WhatsApp  <a onclick="redirectToPremium()" target="_blank"><i class="bi bi-whatsapp" style="color:green"></i> y enterate de los beneficios. Da clic en el icono </a></span>
        <span></span>
        <span></span>
        <!-- Más anuncios aquí -->
    </div>
</div>
    <div class="topbar d-flex align-items-center">
   
      <div class="container d-flex justify-content-center justify-content-md-between">
        <div class="contact-info d-flex align-items-center">
          <a onclick="redirectToPremium()" target="_blank"><i class="bi bi-whatsapp" style="color:green; font-size: 1em;"></i></a>&nbsp;&nbsp;
          <a href="https://youtube.com/@woodsff232?si=de6V_PC5i6Ugh_rm" target="_blank"><i class="bi bi-youtube" style="color:red; font-size: 1em;"></i>&nbsp;Woods FF</a>

        </div>
        <div class="social-links d-none d-md-flex align-items-center">
          <div class="col text-center">

            <a href="https://www.tiktok.com/@archiveroplusy?_t=8oGsyAXq8qU&_r=1" class="tictok" target="_blank" style="font-size: 1em;"><i class="bi bi-tiktok"></i></a>
            <a href="https://www.instagram.com/woods_yt1?igsh=MXA3bXVsa2RjazU5Ng==" class="instagram" target="_blank" style="font-size: 1em;"><i class="bi bi-instagram"></i></a>
          </div>
        </div>
      </div>
    </div><!-- End Top Bar -->
    <div class="branding d-flex align-items-center">
      <div class="container position-relative d-flex align-items-center justify-content-between">
        <a href="index.php" class="logo d-flex align-items-center">
          <h1 class="sitename">System</h1>
          <span>Woods.</span>
        </a>
        <nav id="navmenu" class="navmenu">
          <ul>
            <li></li>
            <a class="btn btn-getstarted" href="inicio.php">SystemWoods 2.0</a>
          </ul>

          <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>
      </div>
    </div>

  </header>
 
  <section class="container my-5 form">
 
    <div class="row align-items-center">

      <div class="col-12 col-md-6">
        <div class="container-form">
          <h1><span>S</span>ENSIBILIDADES WOODS_FF</h1>
          <div class="form-group">
            <label for="deviceType">Selecciona la marca</label>
            <select class="form-select" id="deviceType" name="marca" required>
              <option value="" selected>Seleciona una marca</option>
              <?php
              while ($m = $marca->fetch_assoc()) {
                if ($m["idmarcacelular"] == $marca)
                  echo '<option value="' . $m["idmarcacelular"] . '" selected>' . $m["Nombre"] . '</option>';
                else
                  echo '<option value="' . $m["idmarcacelular"] . '">' . $m["Nombre"] . '</option>';
              }
              ?>
            </select>
          </div>
          <div class="form-group">
            <label for="screenSize">Selecciona el modelo</label>
            <!-- <input type="text" id="screenSize"> -->
            <select class="form-select" id="screenSize" name="modelo" required>
              <option value=""></option>
            </select>

          </div>
          <button id="generateBtnESTO_NO">Generar sensibilidad</button>

          <section class="container my-5">
            <div class="d-flex align-items-center">
              <div id="result" class="result"></div>
              <img class="resized-image2" src="Imagenes/per2.png" alt="Imagen">
            </div>

          </section>
        </div>
      </div>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <div class="col-12 col-md-3 text-center mb-4 mb-md-4">
        <!-- <img class="img-fluid animated" src="Imagenes/per1.png" alt="Imagen"> -->
        <video class="img-fluid animated" src="Imagenes/Emote.mp4" autoplay="true" muted="false" loop="true"></video>
      </div>
    </div>
  </section>

  <?php include('./templates/piepagina.php'); ?>
  <script src="assets/js/main.js"></script>
  <script src="assets/js/script.js"></script>
  <script src="assets/js/login.js"></script>
</body>

</html>