<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Bootstrap Slider Full Screen with Animations</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css'>
  <link rel='stylesheet' href='//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css'>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
<!-- partial:index.partial.html -->
<!-- Full Page Image Background Carousel Header -->
  <div id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for Slides -->
        <div class="carousel-inner">
            <div class="item active">
                <!-- Set the first background image using inline CSS below. -->
                <div class="fill" style="background-image:url('http://www.marchettidesign.net/demo/optimized-bootstrap/code.jpg');"></div>
                <div class="carousel-caption">
                <?php
                    require_once("cabpie.php");//Incluyo el Archivo Externo → cabpie.php
                    cabeceraPagina("Titulo principal de la página ✔️");
                    ?>
                     <p class="animated fadeInUp">"Hasta ahora hemos visto que un archivo contiene todo el código (HTML y PHP), pero el lenguaje PHP nos permite crear librerías de funciones o clases que veremos más adelante."</p>
                     <h3 class="animated fadeInRight" <?php
                    require_once("cabpie.php");//Incluyo el Archivo Externo → cabpie.php
                    cabeceraPagina("✔️ Fin Ejercicio");
                    ?>></h3>
                    
                    <h3 class="animated fadeInRight"  <?php piePagina("©️ 2024 Todos los derechos reservados SENA ®️"); ?> ></h3>

                     <p class="animated fadeInUp"><a href="#" class="btn btn-transparent btn-rounded btn-large">Learn More</a></p>
                </div>
            </div>
            <div class="item">
                <!-- Set the second background image using inline CSS below. -->
                <div class="fill" style="background-image:url('http://www.marchettidesign.net/demo/optimized-bootstrap/conference.jpg');"></div>
                <div class="carousel-caption">
                <?php
                    require_once("cabpie.php");//Incluyo el Archivo Externo → cabpie.php
                    
                    cuerpo(" <h2>Titulo principal de la página ✔️</h2> <hr> La idea fundamental de las librerías es agrupar funciones comunes a muchas páginas, no tener que tipearlas en cada archivo, lo que supone que cuando haya que hacer cambios en esas funciones las debemos localizar y modificar y dicha modificación afectará a todos los archivos donde se las utiliza.");
                    ?>
                      <h3 class="animated fadeInRight" <?php
                    require_once("cabpie.php");//Incluyo el Archivo Externo → cabpie.php
                    cabeceraPagina("✔️ Fin Ejercicio");
                    ?>></h3>
                    
                    <h3 class="animated fadeInRight"  <?php piePagina("©️ 2024 Todos los derechos reservados SENA ®️"); ?> ></h3> 

                     <p class="animated fadeInUp"><a href="#" class="btn btn-transparent btn-rounded btn-large">Learn More</a></p>
                </div>
            </div>
            <div class="item">
                <!-- Set the third background image using inline CSS below. -->
                <div class="fill" style="background-image:url('http://www.marchettidesign.net/demo/optimized-bootstrap/campus.jpg');"></div>
                <div class="carousel-caption">
                <?php
                    require_once("cabpie.php");//Incluyo el Archivo Externo → cabpie.php
                    cabeceraPagina("Titulo principal de la página ✔️");
                    ?>
                    <p class="animated fadeInRight"><p class="animated fadeInRight">La implementación de librerías nos permite hacer que un sistema sea más modular y facilita su mantenimiento. Para probar esta característica del lenguaje, implementaremos tres funciones en la página cabpie.php y llamaremos a dichas funciones en esta página.</p></p>
                    
                    <h3 class="animated fadeInRight" <?php
                    require_once("cabpie.php");//Incluyo el Archivo Externo → cabpie.php
                    cabeceraPagina("✔️ Fin Ejercicio");
                    ?>></h3>
                    
                    <h3 class="animated fadeInRight"  <?php piePagina("©️ 2024 Todos los derechos reservados SENA ®️"); ?> ></h3>
                     <p class="animated fadeInRight"><a href="#" class="btn btn-transparent btn-rounded btn-large">Learn More</a></p>
                </div>
            </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>

    </div>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js'></script>
</body>
</html>
