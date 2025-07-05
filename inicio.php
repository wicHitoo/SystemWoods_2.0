<?php include('inicia_Session.php'); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SystemWoods</title>
    
    <link rel="icon" href="Imagenes/Logo.png" type="image/png">
    <link rel="stylesheet" href="assets/css/cssLogin.css">
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
    
  
</head>
<body>
    <header id="header" class="header fixed-top">
        <div class="topbar d-flex align-items-center">
          <div class="container d-flex justify-content-center justify-content-md-between">
            <div class="contact-info d-flex align-items-center">
             <a onclick="redirectToPremium()" target="_blank"><i class="bi bi-whatsapp"   style="color:green; font-size: 1em;"></i></a>&nbsp;&nbsp;
             <a href="https://youtube.com/@woodsff232?si=de6V_PC5i6Ugh_rm" target="_blank"><i class="bi bi-youtube"  style="color:red; font-size: 1em;"></i>&nbsp;Woods FF</a>
              
              
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
              </ul>
            </nav>
          </div>    
        </div>
    
      </header>

      <section class="container">
      <div class="login-wrapper">
        <div class="login-container">
            <h1>SystemWoods-2.0</h1>
            <form id="loginForm" action="inicio.php" method="post">
                <div class="form-group">
                    <label for="email">Correo electrónico</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <div class="password-input">
                        <input type="password" id="password" name="password" required>
                    </div>
                </div>
                <button type="submit">Iniciar sesión</button>
            </form>
        </div>
    </div>
      </section>
    
    
    <?php include('./templates/piepagina.php'); ?>
    
    <script src="assets/js/login.js"></script>
</body>
</html>
