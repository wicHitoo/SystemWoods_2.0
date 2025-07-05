<?php include("revisa_sesion.php");?>
<?php
require('./bd/get_models_premium.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SystemWoods 2.0</title>
    <link rel="icon" href="image/Logo.png" type="image/png">
    <link rel="stylesheet" href="assets/css/styles.css">
    <!-- Incluye la referencia al archivo JavaScript de SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
    <!-- <link rel="stylesheet" href="assets/css/CssPremium.css"> -->

</head>
<body>

<?php include('./templates/cabecerapremium.php'); ?>
<section class="container my-1 form">
  <div class="row align-items-center">
           <div class="col-12 col-md-8">
           <div class="container-form">
                <h1>SENSIBILIDADES WOODS_FF</h1>
                
                    <div class="form-group">
                <!-- Reemplazamos el select por un datalist -->
                        <label for="deviceType">Selecciona la marca</label>
                        <select class="form-select" id="deviceType" name="marca"required>
                  <option value="" selected>Seleciona una marca</option>
                    <?php
                                while($m = $marca->fetch_assoc()) 
                                {
                                  if ($m["idmarcacelular"] == $marca)
                                    echo '<option value="'. $m["idmarcacelular"] .'" selected>'. $m["Nombre"] .'</option>';
                                  else
                                    echo '<option value="'. $m["idmarcacelular"] .'">'. $m["Nombre"] .'</option>';
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
                    <div class="form-group">
                    <button id="generateBtn">Generar sensibilidad</button>
                    </div>
                    <section class="container my-5">
                    <div class="form-group">
                <!-- Mantenemos el label activo -->
                <div id="result" class="result"></div>
                    </div>           
                      
            </div>
           </div>
            <div class="col-12 col-md-4 text-center mb-4 mb-md-0">
                <img class="img-fluid" src="Imagenes/per1.png" alt="Imagen">
            </div>
  </div>
</section>    
     <!-- Enlace al archivo JS -->
<?php include('./templates/piepagina.php'); ?>
<script src="assets/js/main.js"></script> 
<script src="assets/js/scriptPremium.js"></script>
<script src="assets/js/closesesion.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/aos/aos.js"></script>
</body>
</html>
