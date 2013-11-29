<?php
/*~ Archivo planilla-empleados.php
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
		if($_SESSION["tipo"]=="estandar"){
		header("Location: home.php?error=acceso-denegado");
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
	<title>C.A.S | Planilla de Empleados</title>
</head>

<body>
	<!-- Barra de navegación -->
	<?php include("nav.php"); ?>

	<!-- Contenido de la página -->
	<div class="container" id="contenido">
		<div class="row row-offcanvas row-offcanvas-right">
			<div class="col-xs-12 col-sm-9">
				<div class="page-header">
        			<h3>Planilla de empleados</h3>
        		</div>
        		<div class="row">
        			<div class="col-lg-12">
        				<h4><a href="ver-planilla.php" target="_blank">Haga click aquí para ver la planilla</a></h4>
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