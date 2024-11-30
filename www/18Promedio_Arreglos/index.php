<!DOCTYPE html>
<html lang="es" >
<head>
<meta charset="UTF-8">
<title>Ciclo While con Valores Aleatorios</title>
<link rel='stylesheet' href='css/bootstrap.css'>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="form-body">
        <div class="row">
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>FUNCIONES EN PHP</h3>
                        <p>Funciones y Arreglos</p>
                        <form class="requires-validation" novalidate>
                            <div class="col-md-12 mb-3 text-white">
                            <?php
                                function promedio (array $lista) {
                                $cant = count($lista);
                                $suma = array_sum($lista);
                                echo "<hr>";
                                echo "PROMEDIO DE VALORES<br>";
                                echo "Promedio de Arreglo<br>";
                                echo "<hr>";
                                echo "Arreglo = ";
                                $resultado='';
                                foreach($lista as $i => $valor){
                                    $resultado.="<b>$valor</b>, ";
                                }
                                echo $resultado."<br>";
                                echo "Promedio = ".number_format(($suma/$cant), 2, '.', ',')."<br>";
                                echo "<hr>";
                            }
                            promedio(array(1100,8550,7200));                               
                                ?>
                            </div>
                            <div class="form-button mt-3">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- partial -->
<script  src="js/script.js"></script>
</body>
</html>
