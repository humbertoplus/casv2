<?php
/*~ Archivo catalogo-cuentas.php
.---------------------------------------------------------------------------.
|    Software: CAS - Computerized Accountancy System                        |
|     Versión: 1.0                                                          |
|   Lenguajes: PHP, HTML, CSS3 y Javascript                                 |
| ------------------------------------------------------------------------- |
|   Autores: Ricardo Vigil (alexcontreras@outlook.com)                      |
|          : Vanessa Campos                                                 |
|          : Ingrid Aguilar                                                 |
|          : Jhosseline Rodriguez                                           |
| Copyright (C) 2013, FIA-UES. Todos los derechos reservados.               |
| ------------------------------------------------------------------------- |
|                                                                           |
| Este archivo es parte del sistema de contabilidad C.A.S para la cátedra   |
| de Sistemas Contables de la Facultad de Ingeniería y Arquitectura de la   |
| Universidad de El Salvador.                                               |
|                                                                           |
'---------------------------------------------------------------------------'
*/
?>
<?php 
        include("sesion.php");
        if(!$_COOKIE["sesion"]){
                header("Location: salir.php");
        }
?>
<!DOCTYPE html>
<html lang="es">
<head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="../css/estilos.css"/>
        <link rel="shortcut icon" type="image/x-icon" href="../favicon.ico" />
        <script>
            !window.jQuery && document.write("<script src='../js/jquery.min.js'><\/script>");
        </script>
        <title>C.A.S | Catálogo de Cuentas</title>
</head>

<body>
    <!-- Barra de navegación -->
    <?php include("nav.php"); ?>

    <!-- Contenido de la página -->
    <div class="container" id="contenido">
        <div class="row row-offcanvas row-offcanvas-right">
            <div class="col-xs-12 col-sm-9">
                <div class="page-header">
                    <h3>Catálogo de cuentas</h3>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 well">
                            <h2 class="text-primary"><span class="glyphicon glyphicon-info-sign"></span> Catálogo General de Cuentas</h2>
                            <p align="justify" class="text-info">
                                En este apartado se listan todas las cuentas que el sistema posee inicialmente, basadas en el documento de la empresa propuesta. Se muestran las cuentas desglosadas y clasificadas por su naturaleza y en grupos, subgrupos, cuentas y subcuentas.
                            </p>
                        </div>
                        <hr>
                        <div class="col-lg-12">
                            <h2>Grupos</h2>
                            <br>
                            <h3><span class="label label-primary">Activos</span></h3>
                            <?php
                                if(!isset($conexion)){
                                    include("conexion.php");
                                } 
                                $consulta = "SELECT * FROM grupos WHERE clasificacion=1";

                                $ejecutar_consulta = $conexion->query($consulta);

                                echo "<div>";
                                        echo "<table class='table table-hover table-condensed table-bordered text-left'>";
                                        echo "<thead>";
                                        echo "<tr>";
                                        echo "<th width='110px' class='text-center'>Código Grupo</th>";
                                        echo "<th class='text-center'>Nombre del Grupo</th>";
                                        echo "</tr>";
                                        echo "</thead>";
                                        echo "<tbody>";

                                        while($registro = $ejecutar_consulta->fetch_assoc()){
                                            echo "<tr>";
                                            echo "<td class='text-right'>".utf8_encode($registro["codigo_grupo"])."</td>";
                                            echo "<td>".utf8_encode($registro["nombre_grupo"])."</td>";
                                            echo "</tr>";
                                        }
                                        
                                        echo "</tbody>";
                                        echo "</table>";
                                        echo "</div>";
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <br>
                            <h3><span class="label label-success">Pasivos</span></h3>
                            <?php
                                if(!isset($conexion)){
                                    include("conexion.php");
                                } 
                                $consulta = "SELECT * FROM grupos WHERE clasificacion=2";

                                $ejecutar_consulta = $conexion->query($consulta);

                                echo "<div>";
                                        echo "<table class='table table-hover table-condensed table-bordered text-left'>";
                                        echo "<thead>";
                                        echo "<tr>";
                                        echo "<th width='110px' class='text-center'>Código Grupo</th>";
                                        echo "<th class='text-center'>Nombre del Grupo</th>";
                                        echo "</tr>";
                                        echo "</thead>";
                                        echo "<tbody>";

                                        while($registro = $ejecutar_consulta->fetch_assoc()){
                                            echo "<tr>";
                                            echo "<td class='text-right'>".utf8_encode($registro["codigo_grupo"])."</td>";
                                            echo "<td>".utf8_encode($registro["nombre_grupo"])."</td>";
                                            echo "</tr>";
                                        }
                                        
                                        echo "</tbody>";
                                        echo "</table>";
                                        echo "</div>";
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <br>
                            <h3><span class="label label-warning">Capital</span></h3>
                            <?php
                                if(!isset($conexion)){
                                    include("conexion.php");
                                } 
                                $consulta = "SELECT * FROM grupos WHERE clasificacion=3";

                                $ejecutar_consulta = $conexion->query($consulta);

                                echo "<div>";
                                        echo "<table class='table table-hover table-condensed table-bordered text-left'>";
                                        echo "<thead>";
                                        echo "<tr>";
                                        echo "<th width='110px' class='text-center'>Código Grupo</th>";
                                        echo "<th class='text-center'>Nombre del Grupo</th>";
                                        echo "</tr>";
                                        echo "</thead>";
                                        echo "<tbody>";

                                        while($registro = $ejecutar_consulta->fetch_assoc()){
                                            echo "<tr>";
                                            echo "<td class='text-right'>".utf8_encode($registro["codigo_grupo"])."</td>";
                                            echo "<td>".utf8_encode($registro["nombre_grupo"])."</td>";
                                            echo "</tr>";
                                        }
                                        
                                        echo "</tbody>";
                                        echo "</table>";
                                        echo "</div>";
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <br>
                            <h3><span class="label label-danger">Resultados</span></h3>
                            <?php
                                if(!isset($conexion)){
                                    include("conexion.php");
                                } 
                                $consulta = "SELECT * FROM grupos WHERE clasificacion=4";

                                $ejecutar_consulta = $conexion->query($consulta);

                                echo "<div>";
                                        echo "<table class='table table-hover table-condensed table-bordered text-left'>";
                                        echo "<thead>";
                                        echo "<tr>";
                                        echo "<th width='110px' class='text-center'>Código Grupo</th>";
                                        echo "<th class='text-center'>Nombre del Grupo</th>";
                                        echo "</tr>";
                                        echo "</thead>";
                                        echo "<tbody>";

                                        while($registro = $ejecutar_consulta->fetch_assoc()){
                                            echo "<tr>";
                                            echo "<td class='text-right'>".utf8_encode($registro["codigo_grupo"])."</td>";
                                            echo "<td>".utf8_encode($registro["nombre_grupo"])."</td>";
                                            echo "</tr>";
                                        }
                                        
                                        echo "</tbody>";
                                        echo "</table>";
                                        echo "</div>";
                            ?>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h2>Subgrupos</h2>
                            <br>
                            <h3><span class="label label-primary">Activos</span></h3>
                            <?php
                                if(!isset($conexion)){
                                    include("conexion.php");
                                } 
                                $consulta = "SELECT * FROM subgrupos WHERE codigo_subgrupo LIKE '1%'";

                                $ejecutar_consulta = $conexion->query($consulta);

                                echo "<div>";
                                echo "<table class='table table-hover table-condensed table-bordered text-left'>";
                                echo "<thead>";
                                echo "<tr>";
                                echo "<th width='110px' class='text-center'>Código Subgrupo</th>";
                                echo "<th class='text-center'>Nombre del Subrupo</th>";
                                echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";

                                while($registro = $ejecutar_consulta->fetch_assoc()){
                                    echo "<tr>";
                                    echo "<td class='text-right'>".utf8_encode($registro["codigo_subgrupo"])."</td>";
                                    echo "<td>".utf8_encode($registro["nombre_subgrupo"])."</td>";
                                    echo "</tr>";
                                }
                                        
                                echo "</tbody>";
                                echo "</table>";
                                echo "</div>";
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <br>
                            <h3><span class="label label-success">Pasivos</span></h3>
                            <?php
                                if(!isset($conexion)){
                                    include("conexion.php");
                                } 
                                $consulta = "SELECT * FROM subgrupos WHERE codigo_subgrupo LIKE '2%'";

                                $ejecutar_consulta = $conexion->query($consulta);

                                echo "<div>";
                                echo "<table class='table table-hover table-condensed table-bordered text-left'>";
                                echo "<thead>";
                                echo "<tr>";
                                echo "<th width='110px' class='text-center'>Código Subgrupo</th>";
                                echo "<th class='text-center'>Nombre del Subgrupo</th>";
                                echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";

                                while($registro = $ejecutar_consulta->fetch_assoc()){
                                    echo "<tr>";
                                    echo "<td class='text-right'>".utf8_encode($registro["codigo_subgrupo"])."</td>";
                                    echo "<td>".utf8_encode($registro["nombre_subgrupo"])."</td>";
                                    echo "</tr>";
                                }
                                
                                echo "</tbody>";
                                echo "</table>";
                                echo "</div>";
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <br>
                            <h3><span class="label label-warning">Capital</span></h3>
                            <?php
                                if(!isset($conexion)){
                                    include("conexion.php");
                                } 
                                $consulta = "SELECT * FROM subgrupos WHERE codigo_subgrupo LIKE '3%'";

                                $ejecutar_consulta = $conexion->query($consulta);

                                echo "<div>";
                                echo "<table class='table table-hover table-condensed table-bordered text-left'>";
                                echo "<thead>";
                                echo "<tr>";
                                echo "<th width='110px' class='text-center'>Código Subgrupo</th>";
                                echo "<th class='text-center'>Nombre del Subgrupo</th>";
                                echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";

                                while($registro = $ejecutar_consulta->fetch_assoc()){
                                    echo "<tr>";
                                    echo "<td class='text-right'>".utf8_encode($registro["codigo_subgrupo"])."</td>";
                                    echo "<td>".utf8_encode($registro["nombre_subgrupo"])."</td>";
                                    echo "</tr>";
                                }
                                
                                echo "</tbody>";
                                echo "</table>";
                                echo "</div>";
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <br>
                            <h3><span class="label label-danger">Resultados</span></h3>
                            <?php
                                if(!isset($conexion)){
                                    include("conexion.php");
                                } 
                                $consulta = "SELECT * FROM subgrupos WHERE codigo_subgrupo LIKE '4%'";

                                $ejecutar_consulta = $conexion->query($consulta);

                                echo "<div>";
                                echo "<table class='table table-hover table-condensed table-bordered text-left'>";
                                echo "<thead>";
                                echo "<tr>";
                                echo "<th width='110px' class='text-center'>Código Subgrupo</th>";
                                echo "<th class='text-center'>Nombre del Subgrupo</th>";
                                echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";

                                while($registro = $ejecutar_consulta->fetch_assoc()){
                                    echo "<tr>";
                                    echo "<td class='text-right'>".utf8_encode($registro["codigo_subgrupo"])."</td>";
                                    echo "<td>".utf8_encode($registro["nombre_subgrupo"])."</td>";
                                    echo "</tr>";
                                }
                                
                                echo "</tbody>";
                                echo "</table>";
                                echo "</div>";
                            ?>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h2>Cuentas</h2>
                            <br>
                            <h3><span class="label label-primary">Activos</span></h3>
                            <?php
                                if(!isset($conexion)){
                                    include("conexion.php");
                                } 
                                $consulta = "SELECT * FROM cuentas WHERE codigo_cuenta LIKE '1%'";

                                $ejecutar_consulta = $conexion->query($consulta);

                                echo "<div>";
                                echo "<table class='table table-hover table-condensed table-bordered text-left'>";
                                echo "<thead>";
                                echo "<tr>";
                                echo "<th width='110px' class='text-center'>Código Cuenta</th>";
                                echo "<th class='text-center'>Nombre de la Cuenta</th>";
                                echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";

                                while($registro = $ejecutar_consulta->fetch_assoc()){
                                    echo "<tr>";
                                    echo "<td class='text-right'>".utf8_encode($registro["codigo_cuenta"])."</td>";
                                    echo "<td>".utf8_encode($registro["nombre_cuenta"])."</td>";
                                    echo "</tr>";
                                }
                                        
                                echo "</tbody>";
                                echo "</table>";
                                echo "</div>";
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <br>
                            <h3><span class="label label-success">Pasivos</span></h3>
                            <?php
                                if(!isset($conexion)){
                                    include("conexion.php");
                                } 
                                $consulta = "SELECT * FROM cuentas WHERE codigo_cuenta LIKE '2%'";

                                $ejecutar_consulta = $conexion->query($consulta);

                                echo "<div>";
                                echo "<table class='table table-hover table-condensed table-bordered text-left'>";
                                echo "<thead>";
                                echo "<tr>";
                                echo "<th width='110px' class='text-center'>Código Cuenta</th>";
                                echo "<th class='text-center'>Nombre de la Cuenta</th>";
                                echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";

                                while($registro = $ejecutar_consulta->fetch_assoc()){
                                    echo "<tr>";
                                    echo "<td class='text-right'>".utf8_encode($registro["codigo_cuenta"])."</td>";
                                    echo "<td>".utf8_encode($registro["nombre_cuenta"])."</td>";
                                    echo "</tr>";
                                }
                                
                                echo "</tbody>";
                                echo "</table>";
                                echo "</div>";
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <br>
                            <h3><span class="label label-warning">Capital</span></h3>
                            <?php
                                if(!isset($conexion)){
                                    include("conexion.php");
                                } 
                                $consulta = "SELECT * FROM cuentas WHERE codigo_cuenta LIKE '3%'";

                                $ejecutar_consulta = $conexion->query($consulta);

                                echo "<div>";
                                echo "<table class='table table-hover table-condensed table-bordered text-left'>";
                                echo "<thead>";
                                echo "<tr>";
                                echo "<th width='110px' class='text-center'>Código Cuenta</th>";
                                echo "<th class='text-center'>Nombre de la Cuenta</th>";
                                echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";

                                while($registro = $ejecutar_consulta->fetch_assoc()){
                                    echo "<tr>";
                                    echo "<td class='text-right'>".utf8_encode($registro["codigo_cuenta"])."</td>";
                                    echo "<td>".utf8_encode($registro["nombre_cuenta"])."</td>";
                                    echo "</tr>";
                                }
                                
                                echo "</tbody>";
                                echo "</table>";
                                echo "</div>";
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <br>
                            <h3><span class="label label-danger">Resultados</span></h3>
                            <?php
                                if(!isset($conexion)){
                                    include("conexion.php");
                                } 
                                $consulta = "SELECT * FROM cuentas WHERE codigo_cuenta LIKE '4%'";

                                $ejecutar_consulta = $conexion->query($consulta);

                                echo "<div>";
                                echo "<table class='table table-hover table-condensed table-bordered text-left'>";
                                echo "<thead>";
                                echo "<tr>";
                                echo "<th width='110px' class='text-center'>Código Cuenta</th>";
                                echo "<th class='text-center'>Nombre de la Cuenta</th>";
                                echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";

                                while($registro = $ejecutar_consulta->fetch_assoc()){
                                    echo "<tr>";
                                    echo "<td class='text-right'>".utf8_encode($registro["codigo_cuenta"])."</td>";
                                    echo "<td>".utf8_encode($registro["nombre_cuenta"])."</td>";
                                    echo "</tr>";
                                }
                                
                                echo "</tbody>";
                                echo "</table>";
                                echo "</div>";
                            ?>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h2>Subcuentas</h2>
                            <br>
                            <h3><span class="label label-primary">Activos</span></h3>
                            <?php
                                if(!isset($conexion)){
                                    include("conexion.php");
                                } 
                                $consulta = "SELECT * FROM subcuentas WHERE codigo_subcuenta LIKE '1%'";

                                $ejecutar_consulta = $conexion->query($consulta);

                                echo "<div>";
                                echo "<table class='table table-hover table-condensed table-bordered text-left'>";
                                echo "<thead>";
                                echo "<tr>";
                                echo "<th width='110px' class='text-center'>Código Subcuenta</th>";
                                echo "<th class='text-center'>Nombre de la Subcuenta</th>";
                                echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";

                                while($registro = $ejecutar_consulta->fetch_assoc()){
                                    echo "<tr>";
                                    echo "<td class='text-right'>".utf8_encode($registro["codigo_subcuenta"])."</td>";
                                    echo "<td>".utf8_encode($registro["nombre_subcuenta"])."</td>";
                                    echo "</tr>";
                                }
                                        
                                echo "</tbody>";
                                echo "</table>";
                                echo "</div>";
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <br>
                            <h3><span class="label label-success">Pasivos</span></h3>
                            <?php
                                if(!isset($conexion)){
                                    include("conexion.php");
                                } 
                                $consulta = "SELECT * FROM subcuentas WHERE codigo_subcuenta LIKE '2%'";

                                $ejecutar_consulta = $conexion->query($consulta);

                                echo "<div>";
                                echo "<table class='table table-hover table-condensed table-bordered text-left'>";
                                echo "<thead>";
                                echo "<tr>";
                                echo "<th width='110px' class='text-center'>Código Subcuenta</th>";
                                echo "<th class='text-center'>Nombre de la Subcuenta</th>";
                                echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";

                                while($registro = $ejecutar_consulta->fetch_assoc()){
                                    echo "<tr>";
                                    echo "<td class='text-right'>".utf8_encode($registro["codigo_subcuenta"])."</td>";
                                    echo "<td>".utf8_encode($registro["nombre_subcuenta"])."</td>";
                                    echo "</tr>";
                                }
                                
                                echo "</tbody>";
                                echo "</table>";
                                echo "</div>";
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <br>
                            <h3><span class="label label-warning">Capital</span></h3>
                            <?php
                                if(!isset($conexion)){
                                    include("conexion.php");
                                } 
                                $consulta = "SELECT * FROM subcuentas WHERE codigo_subcuenta LIKE '3%'";

                                $ejecutar_consulta = $conexion->query($consulta);

                                echo "<div>";
                                echo "<table class='table table-hover table-condensed table-bordered text-left'>";
                                echo "<thead>";
                                echo "<tr>";
                                echo "<th width='110px' class='text-center'>Código Subcuenta</th>";
                                echo "<th class='text-center'>Nombre de la Subcuenta</th>";
                                echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";

                                while($registro = $ejecutar_consulta->fetch_assoc()){
                                    echo "<tr>";
                                    echo "<td class='text-right'>".utf8_encode($registro["codigo_subcuenta"])."</td>";
                                    echo "<td>".utf8_encode($registro["nombre_subcuenta"])."</td>";
                                    echo "</tr>";
                                }
                                
                                echo "</tbody>";
                                echo "</table>";
                                echo "</div>";
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <br>
                            <h3><span class="label label-danger">Resultados</span></h3>
                            <?php
                                if(!isset($conexion)){
                                    include("conexion.php");
                                } 
                                $consulta = "SELECT * FROM subcuentas WHERE codigo_subcuenta LIKE '4%'";

                                $ejecutar_consulta = $conexion->query($consulta);

                                echo "<div>";
                                echo "<table class='table table-hover table-condensed table-bordered text-left'>";
                                echo "<thead>";
                                echo "<tr>";
                                echo "<th width='110px' class='text-center'>Código Subcuenta</th>";
                                echo "<th class='text-center'>Nombre de la Subcuenta</th>";
                                echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";

                                while($registro = $ejecutar_consulta->fetch_assoc()){
                                    echo "<tr>";
                                    echo "<td class='text-right'>".utf8_encode($registro["codigo_subcuenta"])."</td>";
                                    echo "<td>".utf8_encode($registro["nombre_subcuenta"])."</td>";
                                    echo "</tr>";
                                }
                                
                                echo "</tbody>";
                                echo "</table>";
                                echo "</div>";
                            ?>
                        </div>
                    </div>
                </div>
            </div><!--/span-->

            <!-- Barra lateral o sidebar -->
            <?php include("sidebar.php"); ?>
                
        </div>
    </div>

        <!-- Pie de página o Footer -->
        <?php include("footer.php"); ?>

        <!-- Ventanas flotantes -->
        <?php include("modal.php"); ?>

        <script src="../js/bootstrap.min.js"></script>
</body>
</html>
