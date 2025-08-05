<?php include('revisa_sesion.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Custom HUD - SystemWoods</title>
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
    <script>

    </script>
</head>

<?php include('./templates/cabecerapremium.php'); ?>
<div class="page-title">
    <div class="heading">
        <div class="container">
            <div class="row d-flex justify-content-center text-center">
                <div class="col-lg-8">
                    <h1>Custom HUD (Heads-Up Display)</h1>
                    <p class="mb-0"> Configurar el HUD de Free Fire con un estilo personalizado tiene varias ventajas que pueden mejorar tu experiencia. Utiliza la que mejor se adapte a tu modo de juego.</p>
                    <!-- <p class="mb-0">La mejores configuraciones de custom HUD, mejoran tus movimientos en el juego.</p> -->
                </div>
            </div>
        </div>
    </div>
    <nav class="breadcrumbs">
        <div class="container">
            <ol>
                <li><a href="custom.php">Custom HUD </a></li>
                <li class="current"><a href="blog.php">Curso 2.0</a></li>
            </ol>
        </div>
    </nav>
</div><!-- End Page Title -->

<section id="about" class="about section">

    <div class="container" data-aos-delay="100">
        <div class="row gy-4">
            <div class="col-lg-6 order-1 order-lg-2">
                <a href="javascript:void(0);" onclick="openImageViewer('Imagenes/FreeFire/21.jpg')"><img src="Imagenes/FreeFire/21.jpg" class="img-fluid about-img" alt=""></a>
            </div>
            <div class="col-lg-6 order-2 order-lg-1 content">
                <h3>Custom HUD, a 4 dedos.</h3>
                <ul>
                    <li><i class="bi bi-check2-all"></i> <span>Precisión 80%</span></li>
                    <li><i class="bi bi-check2-all"></i> <span>Velocidad 90%</span></li>
                    <li><i class="bi bi-check2-all"></i> <span>Jugabilidad + 85%.</span></li><br>

                </ul>
                <div style="margin-top: 10px;">
                    <code id="codigoHUD" style="font-size: 16px; background: #eee; padding: 5px 10px; border-radius: 6px;">woods</code>
                    <button onclick="copiarCodigo()" style="border: none; background: none; cursor: pointer;" title="Copiar">
                        <i class="bi bi-clipboard" style="font-size: 20px; color: #ffee00ff;"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <br><br>
    <div class="container" data-aos-delay="100">
        <div class="row gy-4">
            <div class="col-lg-6 order-1 order-lg-2 content">
                <h3>Custom HUD, a 2 dedos.</h3>
                <ul>
                    <li><i class="bi bi-check2-all"></i> <span>Precisión 88%</span></li>
                    <li><i class="bi bi-check2-all"></i> <span>Velocidad 80%</span></li>
                    <li><i class="bi bi-check2-all"></i> <span>Jugabilidad + 81%.</span></li><br>

                </ul>
                <div style="margin-top: 10px;">
                    <code id="codigoHUD" style="font-size: 16px; background: #eee; padding: 5px 10px; border-radius: 6px;">FF-HUD-123</code>
                    <button onclick="copiarCodigo()" style="border: none; background: none; cursor: pointer;" title="Copiar">
                        <i class="bi bi-clipboard" style="font-size: 20px; color: #ffee00ff;"></i>
                    </button>
                </div>
            </div>
            <div class="col-lg-6 order-2 order-lg-1">
                <a href="javascript:void(0);" onclick="openImageViewer('Imagenes/FreeFire/22.jpg')"><img src="Imagenes/FreeFire/22.jpg" class="img-fluid about-img" alt=""></a>
            </div>
        </div>
    </div>
    <br><br>

    <div class="container" data-aos-delay="100">
        <div class="row gy-4">
            <div class="col-lg-6 order-1 order-lg-2">
                <a href="javascript:void(0);" onclick="openImageViewer('Imagenes/FreeFire/1.jpg')"><img src="Imagenes/FreeFire/1.jpg" class="img-fluid about-img" alt=""></a>
            </div>
            <div class="col-lg-6 order-2 order-lg-1 content">
                <h3>Custom HUD, a 3 dedos.</h3>
                <ul>
                    <li><i class="bi bi-check2-all"></i> <span>Precisión 75%</span></li>
                    <li><i class="bi bi-check2-all"></i> <span>Velocidad 80%</span></li>
                    <li><i class="bi bi-check2-all"></i> <span>Jugabilidad + 70%.</span></li><br>

                </ul>
                <div style="margin-top: 10px;">
                    <code id="codigoHUD" style="font-size: 16px; background: #eee; padding: 5px 10px; border-radius: 6px;">FF-HUD-123</code>
                    <button onclick="copiarCodigo()" style="border: none; background: none; cursor: pointer;" title="Copiar">
                        <i class="bi bi-clipboard" style="font-size: 20px; color: #ffee00ff;"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <br><br>
    <div class="container" data-aos-delay="100">
        <div class="row gy-4">
            <div class="col-lg-6 order-1 order-lg-2 content">
                <h3>Custom HUD, a 2 dedos.</h3>

                <ul>
                    <li><i class="bi bi-check2-all"></i> <span>Precisión 65%</span></li>
                    <li><i class="bi bi-check2-all"></i> <span>Velocidad 60%</span></li>
                    <li><i class="bi bi-check2-all"></i> <span>Jugabilidad + 80%</span></li><br>
                </ul>
                <!-- Copiar código -->
                <div style="margin-top: 10px;">
                    <code id="codigoHUD" style="font-size: 16px; background: #eee; padding: 5px 10px; border-radius: 6px;">FF-HUD-123</code>
                    <button onclick="copiarCodigo()" style="border: none; background: none; cursor: pointer;" title="Copiar">
                        <i class="bi bi-clipboard" style="font-size: 20px; color: #ffee00ff;"></i>
                    </button>
                </div>
            </div>

            <div class="col-lg-6 order-2 order-lg-1">
                <a href="javascript:void(0);" onclick="openImageViewer('Imagenes/FreeFire/2.jpg')">
                    <img src="Imagenes/FreeFire/2.jpg" class="img-fluid about-img" alt="">
                </a>
            </div>
        </div>
    </div>
    <br><br>

    <div class="container" data-aos-delay="100">
        <div class="row gy-4">
            <div class="col-lg-6 order-1 order-lg-2">
                <a href="javascript:void(0);" onclick="openImageViewer('Imagenes/FreeFire/3.jpg')"><img src="Imagenes/FreeFire/3.jpg" class="img-fluid about-img" alt=""></a>
            </div>
            <div class="col-lg-6 order-2 order-lg-1 content">
                <h3>Custom HUD, a 4 dedos.</h3>

                <ul>
                    <li><i class="bi bi-check2-all"></i> <span>Precisión 85%</span></li>
                    <li><i class="bi bi-check2-all"></i> <span>Velocidad 85%</span></li>
                    <li><i class="bi bi-check2-all"></i> <span>Jugabilidad + 90%.</span></li><br>

                </ul>
                <div style="margin-top: 10px;">
                    <code id="codigoHUD" style="font-size: 16px; background: #eee; padding: 5px 10px; border-radius: 6px;">FF-HUD-123</code>
                    <button onclick="copiarCodigo()" style="border: none; background: none; cursor: pointer;" title="Copiar">
                        <i class="bi bi-clipboard" style="font-size: 20px; color: #ffee00ff;"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <br><br>
    <div class="container" data-aos-delay="100">
        <div class="row gy-4">
            <div class="col-lg-6 order-1 order-lg-2 content">
                <h3>Custom HUD, a 3 dedos.</h3>

                <ul>
                    <li><i class="bi bi-check2-all"></i> <span>Precisión 70%</span></li>
                    <li><i class="bi bi-check2-all"></i> <span>Velocidad 80%</span></li>
                    <li><i class="bi bi-check2-all"></i> <span>Jugabilidad + 65%.</span></li><br>

                </ul>
                <div style="margin-top: 10px;">
                    <code id="codigoHUD" style="font-size: 16px; background: #eee; padding: 5px 10px; border-radius: 6px;">FF-HUD-123</code>
                    <button onclick="copiarCodigo()" style="border: none; background: none; cursor: pointer;" title="Copiar">
                        <i class="bi bi-clipboard" style="font-size: 20px; color: #ffee00ff;"></i>
                    </button>
                </div>
            </div>
            <div class="col-lg-6 order-2 order-lg-1">
                <a href="javascript:void(0);" onclick="openImageViewer('Imagenes/FreeFire/4.jpg')"><img src="Imagenes/FreeFire/4.jpg" class="img-fluid about-img" alt=""></a>
            </div>

        </div>
    </div>

    <br><br>

    <div class="container" data-aos-delay="100">
        <div class="row gy-4">
            <div class="col-lg-6 order-1 order-lg-2">
                <a href="javascript:void(0);" onclick="openImageViewer('Imagenes/FreeFire/5.jpg')"><img src="Imagenes/FreeFire/5.jpg" class="img-fluid about-img" alt=""></a>
            </div>
            <div class="col-lg-6 order-2 order-lg-1 content">
                <h3>Custom HUD, a 5 dedos.</h3>

                <ul>
                    <li><i class="bi bi-check2-all"></i> <span>Precisión 90%</span></li>
                    <li><i class="bi bi-check2-all"></i> <span>Velocidad 87%</span></li>
                    <li><i class="bi bi-check2-all"></i> <span>Jugabilidad + 90%.</span></li><br>

                </ul>
                <div style="margin-top: 10px;">
                    <code id="codigoHUD" style="font-size: 16px; background: #eee; padding: 5px 10px; border-radius: 6px;">FF-HUD-123</code>
                    <button onclick="copiarCodigo()" style="border: none; background: none; cursor: pointer;" title="Copiar">
                        <i class="bi bi-clipboard" style="font-size: 20px; color: #ffee00ff;"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <br><br>
    <div class="container" data-aos-delay="100">
        <div class="row gy-4">
            <div class="col-lg-6 order-1 order-lg-2 content">
                <h3>Custom HUD, a 3 dedos.</h3>

                <li><i class="bi bi-check2-all"></i> <span>Precisión 90%</span></li>
                <li><i class="bi bi-check2-all"></i> <span>Velocidad 85%</span></li>
                <li><i class="bi bi-check2-all"></i> <span>Jugabilidad + 93%.</span></li><br>

                </ul>
                <div style="margin-top: 10px;">
                    <code id="codigoHUD" style="font-size: 16px; background: #eee; padding: 5px 10px; border-radius: 6px;">FF-HUD-123</code>
                    <button onclick="copiarCodigo()" style="border: none; background: none; cursor: pointer;" title="Copiar">
                        <i class="bi bi-clipboard" style="font-size: 20px; color: #ffee00ff;"></i>
                    </button>
                </div>
            </div>
            <div class="col-lg-6 order-2 order-lg-1">
                <a href="javascript:void(0);" onclick="openImageViewer('Imagenes/FreeFire/6.jpg')"><img src="Imagenes/FreeFire/6.jpg" class="img-fluid about-img" alt=""></a>
            </div>
        </div>
    </div>

    <br><br>

    <div class="container" data-aos-delay="100">
        <div class="row gy-4">
            <div class="col-lg-6 order-1 order-lg-2">
                <a href="javascript:void(0);" onclick="openImageViewer('Imagenes/FreeFire/7.jpg')"><img src="Imagenes/FreeFire/7.jpg" class="img-fluid about-img" alt=""></a>
            </div>
            <div class="col-lg-6 order-2 order-lg-1 content">
                <h3>Custom HUD, a 4 dedos.</h3>

                <ul>
                    <li><i class="bi bi-check2-all"></i> <span>Precisión 75%</span></li>
                    <li><i class="bi bi-check2-all"></i> <span>Velocidad 81%</span></li>
                    <li><i class="bi bi-check2-all"></i> <span>Jugabilidad + 85%.</span></li><br>

                </ul>
                <div style="margin-top: 10px;">
                    <code id="codigoHUD" style="font-size: 16px; background: #eee; padding: 5px 10px; border-radius: 6px;">FF-HUD-123</code>
                    <button onclick="copiarCodigo()" style="border: none; background: none; cursor: pointer;" title="Copiar">
                        <i class="bi bi-clipboard" style="font-size: 20px; color: #ffee00ff;"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <br><br>
    <div class="container" data-aos-delay="100">
        <div class="row gy-4">
            <div class="col-lg-6 order-1 order-lg-2 content">
                <h3>Custom HUD, a 3 dedos.</h3>

                <ul>
                    <li><i class="bi bi-check2-all"></i> <span>Precisión 87%</span></li>
                    <li><i class="bi bi-check2-all"></i> <span>Velocidad 93%</span></li>
                    <li><i class="bi bi-check2-all"></i> <span>Jugabilidad + 95%.</span></li><br>

                </ul>
                <div style="margin-top: 10px;">
                    <code id="codigoHUD" style="font-size: 16px; background: #eee; padding: 5px 10px; border-radius: 6px;">FF-HUD-123</code>
                    <button onclick="copiarCodigo()" style="border: none; background: none; cursor: pointer;" title="Copiar">
                        <i class="bi bi-clipboard" style="font-size: 20px; color: #ffee00ff;"></i>
                    </button>
                </div>
            </div>
            <div class="col-lg-6 order-2 order-lg-1">
                <a href="javascript:void(0);" onclick="openImageViewer('Imagenes/FreeFire/8.jpg')"><img src="Imagenes/FreeFire/8.jpg" class="img-fluid about-img" alt=""></a>
            </div>
        </div>
    </div>

    <br><br>

    <div class="container" data-aos-delay="100">
        <div class="row gy-4">
            <div class="col-lg-6 order-1 order-lg-2">
                <a href="javascript:void(0);" onclick="openImageViewer('Imagenes/FreeFire/9.jpg')"><img src="Imagenes/FreeFire/9.jpg" class="img-fluid about-img" alt=""></a>
            </div>
            <div class="col-lg-6 order-2 order-lg-1 content">
                <h3>Custom HUD, a 3 dedos.</h3>

                <ul>
                    <li><i class="bi bi-check2-all"></i> <span>Precisión 83%</span></li>
                    <li><i class="bi bi-check2-all"></i> <span>Velocidad 90%</span></li>
                    <li><i class="bi bi-check2-all"></i> <span>Jugabilidad + 95%.</span></li><br>

                </ul>
                <div style="margin-top: 10px;">
                    <code id="codigoHUD" style="font-size: 16px; background: #eee; padding: 5px 10px; border-radius: 6px;">FF-HUD-123</code>
                    <button onclick="copiarCodigo()" style="border: none; background: none; cursor: pointer;" title="Copiar">
                        <i class="bi bi-clipboard" style="font-size: 20px; color: #ffee00ff;"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <br><br>
    <div class="container" data-aos-delay="100">
        <div class="row gy-4">
            <div class="col-lg-6 order-1 order-lg-2 content">
                <h3>Custom HUD, a 3 dedos.</h3>

                <ul>
                    <li><i class="bi bi-check2-all"></i> <span>Precisión 88%</span></li>
                    <li><i class="bi bi-check2-all"></i> <span>Velocidad 97%</span></li>
                    <li><i class="bi bi-check2-all"></i> <span>Jugabilidad + 93%.</span></li><br>

                </ul>
                <div style="margin-top: 10px;">
                    <code id="codigoHUD" style="font-size: 16px; background: #eee; padding: 5px 10px; border-radius: 6px;">FF-HUD-123</code>
                    <button onclick="copiarCodigo()" style="border: none; background: none; cursor: pointer;" title="Copiar">
                        <i class="bi bi-clipboard" style="font-size: 20px; color: #ffee00ff;"></i>
                    </button>
                </div>
            </div>
            <div class="col-lg-6 order-2 order-lg-1">
                <a href="javascript:void(0);" onclick="openImageViewer('Imagenes/FreeFire/10.jpg')"><img src="Imagenes/FreeFire/10.jpg" class="img-fluid about-img" alt=""></a>
            </div>
        </div>
    </div>

    <br><br>

    <div class="container" data-aos-delay="100">
        <div class="row gy-4">
            <div class="col-lg-6 order-1 order-lg-2">
                <a href="javascript:void(0);" onclick="openImageViewer('Imagenes/FreeFire/11.jpg')"><img src="Imagenes/FreeFire/11.jpg" class="img-fluid about-img" alt=""></a>
            </div>
            <div class="col-lg-6 order-2 order-lg-1 content">
                <h3>Custom HUD, a 3 dedos.</h3>

                <ul>
                    <li><i class="bi bi-check2-all"></i> <span>Precisión 92%</span></li>
                    <li><i class="bi bi-check2-all"></i> <span>Velocidad 75%</span></li>
                    <li><i class="bi bi-check2-all"></i> <span>Jugabilidad + 86%.</span></li><br>

                </ul>
                <div style="margin-top: 10px;">
                    <code id="codigoHUD" style="font-size: 16px; background: #eee; padding: 5px 10px; border-radius: 6px;">FF-HUD-123</code>
                    <button onclick="copiarCodigo()" style="border: none; background: none; cursor: pointer;" title="Copiar">
                        <i class="bi bi-clipboard" style="font-size: 20px; color: #ffee00ff;"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <br><br>
    <div class="container" data-aos-delay="100">
        <div class="row gy-4">
            <div class="col-lg-6 order-1 order-lg-2 content">
                <h3>Custom HUD, a 3 dedos.</h3>

                <ul>
                    <li><i class="bi bi-check2-all"></i> <span>Precisión 90%</span></li>
                    <li><i class="bi bi-check2-all"></i> <span>Velocidad 80%</span></li>
                    <li><i class="bi bi-check2-all"></i> <span>Jugabilidad + 90%.</span></li><br>

                </ul>
                <div style="margin-top: 10px;">
                    <code id="codigoHUD" style="font-size: 16px; background: #eee; padding: 5px 10px; border-radius: 6px;">FF-HUD-123</code>
                    <button onclick="copiarCodigo()" style="border: none; background: none; cursor: pointer;" title="Copiar">
                        <i class="bi bi-clipboard" style="font-size: 20px; color: #ffee00ff;"></i>
                    </button>
                </div>
            </div>
            <div class="col-lg-6 order-2 order-lg-1">
                <a href="javascript:void(0);" onclick="openImageViewer('Imagenes/FreeFire/12.jpg')"><img src="Imagenes/FreeFire/12.jpg" class="img-fluid about-img" alt=""></a>
            </div>
        </div>
    </div>

    <br><br>

    <div class="container" data-aos-delay="100">
        <div class="row gy-4">
            <div class="col-lg-6 order-1 order-lg-2">
                <a href="javascript:void(0);" onclick="openImageViewer('Imagenes/FreeFire/13.jpg')"><img src="Imagenes/FreeFire/13.jpg" class="img-fluid about-img" alt=""></a>
            </div>
            <div class="col-lg-6 order-2 order-lg-1 content">
                <h3>Custom HUD, a 4 dedos.</h3>

                <ul>
                    <li><i class="bi bi-check2-all"></i> <span>Precisión 95%</span></li>
                    <li><i class="bi bi-check2-all"></i> <span>Velocidad 75%</span></li>
                    <li><i class="bi bi-check2-all"></i> <span>Jugabilidad + 90%.</span></li><br>

                </ul>
                <div style="margin-top: 10px;">
                    <code id="codigoHUD" style="font-size: 16px; background: #eee; padding: 5px 10px; border-radius: 6px;">FF-HUD-123</code>
                    <button onclick="copiarCodigo()" style="border: none; background: none; cursor: pointer;" title="Copiar">
                        <i class="bi bi-clipboard" style="font-size: 20px; color: #ffee00ff;"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <br><br>
    <div class="container" data-aos-delay="100">
        <div class="row gy-4">
            <div class="col-lg-6 order-1 order-lg-2 content">
                <h3>Custom HUD, a 3 dedos.</h3>

                <ul>
                    <li><i class="bi bi-check2-all"></i> <span>Precisión 92%</span></li>
                    <li><i class="bi bi-check2-all"></i> <span>Velocidad 89%</span></li>
                    <li><i class="bi bi-check2-all"></i> <span>Jugabilidad + 87%.</span></li><br>

                </ul>
                <div style="margin-top: 10px;">
                    <code id="codigoHUD" style="font-size: 16px; background: #eee; padding: 5px 10px; border-radius: 6px;">FF-HUD-123</code>
                    <button onclick="copiarCodigo()" style="border: none; background: none; cursor: pointer;" title="Copiar">
                        <i class="bi bi-clipboard" style="font-size: 20px; color: #ffee00ff;"></i>
                    </button>
                </div>
            </div>
            <div class="col-lg-6 order-2 order-lg-1">
                <a href="javascript:void(0);" onclick="openImageViewer('Imagenes/FreeFire/14.jpg')"><img src="Imagenes/FreeFire/14.jpg" class="img-fluid about-img" alt=""></a>
            </div>
        </div>
    </div>

    <br><br>

    <div class="container" data-aos-delay="100">
        <div class="row gy-4">
            <div class="col-lg-6 order-1 order-lg-2">
                <a href="javascript:void(0);" onclick="openImageViewer('Imagenes/FreeFire/15.jpg')"><img src="Imagenes/FreeFire/15.jpg" class="img-fluid about-img" alt=""></a>
            </div>
            <div class="col-lg-6 order-2 order-lg-1 content">
                <h3>Custom HUD, a 3 dedos.</h3>

                <ul>
                    <li><i class="bi bi-check2-all"></i> <span>Precisión 88%</span></li>
                    <li><i class="bi bi-check2-all"></i> <span>Velocidad 92%</span></li>
                    <li><i class="bi bi-check2-all"></i> <span>Jugabilidad + 92%.</span></li><br>

                </ul>
                <div style="margin-top: 10px;">
                    <code id="codigoHUD" style="font-size: 16px; background: #eee; padding: 5px 10px; border-radius: 6px;">FF-HUD-123</code>
                    <button onclick="copiarCodigo()" style="border: none; background: none; cursor: pointer;" title="Copiar">
                        <i class="bi bi-clipboard" style="font-size: 20px; color: #ffee00ff;"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <br><br>
    <div class="container" data-aos-delay="100">
        <div class="row gy-4">
            <div class="col-lg-6 order-1 order-lg-2 content">
                <h3>Custom HUD, a 2 dedos.</h3>

                <ul>
                    <li><i class="bi bi-check2-all"></i> <span>Precisión 80%</span></li>
                    <li><i class="bi bi-check2-all"></i> <span>Velocidad 60%</span></li>
                    <li><i class="bi bi-check2-all"></i> <span>Jugabilidad + 70%.</span></li><br>

                </ul>
                <div style="margin-top: 10px;">
                    <code id="codigoHUD" style="font-size: 16px; background: #eee; padding: 5px 10px; border-radius: 6px;">FF-HUD-123</code>
                    <button onclick="copiarCodigo()" style="border: none; background: none; cursor: pointer;" title="Copiar">
                        <i class="bi bi-clipboard" style="font-size: 20px; color: #ffee00ff;"></i>
                    </button>
                </div>
            </div>
            <div class="col-lg-6 order-2 order-lg-1">
                <a href="javascript:void(0);" onclick="openImageViewer('Imagenes/FreeFire/16.jpg')"><img src="Imagenes/FreeFire/16.jpg" class="img-fluid about-img" alt=""></a>
            </div>
        </div>
    </div>

    <br><br>

    <div class="container" data-aos-delay="100">
        <div class="row gy-4">
            <div class="col-lg-6 order-1 order-lg-2">
                <a href="javascript:void(0);" onclick="openImageViewer('Imagenes/FreeFire/17.jpg')"><img src="Imagenes/FreeFire/17.jpg" class="img-fluid about-img" alt=""></a>
            </div>
            <div class="col-lg-6 order-2 order-lg-1 content">
                <h3>Custom HUD, a 3 dedos.</h3>

                <ul>
                    <li><i class="bi bi-check2-all"></i> <span>Precisión 75%</span></li>
                    <li><i class="bi bi-check2-all"></i> <span>Velocidad 80%</span></li>
                    <li><i class="bi bi-check2-all"></i> <span>Jugabilidad + 90%.</span></li><br>

                </ul>
                <div style="margin-top: 10px;">
                    <code id="codigoHUD" style="font-size: 16px; background: #eee; padding: 5px 10px; border-radius: 6px;">FF-HUD-123</code>
                    <button onclick="copiarCodigo()" style="border: none; background: none; cursor: pointer;" title="Copiar">
                        <i class="bi bi-clipboard" style="font-size: 20px; color: #ffee00ff;"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <br><br>
    <div class="container" data-aos-delay="100">
        <div class="row gy-4">
            <div class="col-lg-6 order-1 order-lg-2 content">
                <h3>Custom HUD, a 3 dedos.</h3>

                <ul>
                    <li><i class="bi bi-check2-all"></i> <span>Precisión 78%</span></li>
                    <li><i class="bi bi-check2-all"></i> <span>Velocidad 95%</span></li>
                    <li><i class="bi bi-check2-all"></i> <span>Jugabilidad + 82%.</span></li><br>

                </ul>
                <div style="margin-top: 10px;">
                    <code id="codigoHUD" style="font-size: 16px; background: #eee; padding: 5px 10px; border-radius: 6px;">FF-HUD-123</code>
                    <button onclick="copiarCodigo()" style="border: none; background: none; cursor: pointer;" title="Copiar">
                        <i class="bi bi-clipboard" style="font-size: 20px; color: #ffee00ff;"></i>
                    </button>
                </div>
            </div>
            <div class="col-lg-6 order-2 order-lg-1">
                <a href="javascript:void(0);" onclick="openImageViewer('Imagenes/FreeFire/18.jpg')"><img src="Imagenes/FreeFire/18.jpg" class="img-fluid about-img" alt=""></a>
            </div>
        </div>
    </div>

    <br><br>

    <div class="container" data-aos-delay="100">
        <div class="row gy-4">
            <div class="col-lg-6 order-1 order-lg-2">
                <a href="javascript:void(0);" onclick="openImageViewer('Imagenes/FreeFire/19.jpg')"><img src="Imagenes/FreeFire/19.jpg" class="img-fluid about-img" alt=""></a>
            </div>
            <div class="col-lg-6 order-2 order-lg-1 content">
                <h3>Custom HUD, a 3 dedos.</h3>

                <ul>
                    <li><i class="bi bi-check2-all"></i> <span>Precisión 77%</span></li>
                    <li><i class="bi bi-check2-all"></i> <span>Velocidad 88%</span></li>
                    <li><i class="bi bi-check2-all"></i> <span>Jugabilidad + 91%.</span></li><br>

                </ul>
                <div style="margin-top: 10px;">
                    <code id="codigoHUD" style="font-size: 16px; background: #eee; padding: 5px 10px; border-radius: 6px;">FF-HUD-123</code>
                    <button onclick="copiarCodigo()" style="border: none; background: none; cursor: pointer;" title="Copiar">
                        <i class="bi bi-clipboard" style="font-size: 20px; color: #ffee00ff;"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <br><br>
    <div class="container" data-aos-delay="100">
        <div class="row gy-4">
            <div class="col-lg-6 order-1 order-lg-2 content">
                <h3>Custom HUD, a 3 dedos.</h3>

                <ul>
                    <li><i class="bi bi-check2-all"></i> <span>Precisión 87%</span></li>
                    <li><i class="bi bi-check2-all"></i> <span>Velocidad 90%</span></li>
                    <li><i class="bi bi-check2-all"></i> <span>Jugabilidad + 92%.</span></li><br>

                </ul>
                <div style="margin-top: 10px;">
                    <code id="codigoHUD" style="font-size: 16px; background: #eee; padding: 5px 10px; border-radius: 6px;">FF-HUD-123</code>
                    <button onclick="copiarCodigo()" style="border: none; background: none; cursor: pointer;" title="Copiar">
                        <i class="bi bi-clipboard" style="font-size: 20px; color: #ffee00ff;"></i>
                    </button>
                </div>
            </div>
            <div class="col-lg-6 order-2 order-lg-1">
                <a href="javascript:void(0);" onclick="openImageViewer('Imagenes/FreeFire/20.jpg')"><img src="Imagenes/FreeFire/20.jpg" class="img-fluid about-img" alt=""></a>
            </div>
        </div>
    </div>

</section><!-- /About Section -->
<?php include('./templates/piepagina.php'); ?>
<script>
    function copiarCodigo() {
        const texto = document.getElementById("codigoHUD").innerText;
        navigator.clipboard.writeText(texto).then(() => {
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'success',
                title: '¡Código copiado!',
                showConfirmButton: false,
                timer: 1500,
                timerProgressBar: true,
                background: '#f0f0f0',
                color: '#333'
            });
        }).catch(err => {
            console.error("Error al copiar: ", err);
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'error',
                title: 'Error al copiar',
                showConfirmButton: false,
                timer: 1500
            });
        });
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="assets/js/closesesion.js"></script>
<script src="assets/js/main.js"></script>

</body>

</html>