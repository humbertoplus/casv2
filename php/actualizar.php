<?php
/*~ Archivo actualizar.php
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
	<title>C.A.S | Actualizaciones</title>
</head>

<body>
	<!-- Barra de navegación -->
	<?php include("nav.php"); ?>
	<?php error_reporting(E_ALL ^ E_NOTICE); ?>

	<!-- Contenido de la página -->
	<div class="container" id="contenido">
		<div class="row row-offcanvas row-offcanvas-right">
			<div class="col-xs-12 col-sm-9">
				<div class="page-header">
        			<h3>Actualizaciones</h3>
        		</div>
        		<div class="row">
        			<div class="col-lg-12">
        				<div class="panel panel-primary">
        				  <div class="panel-heading">Actualizar saldos</div>
        				  <div class="panel-body">
        				  	<br>
        				    <p>
        				    	Haga click en un elemento para actualizar los saldos de las cuentas o subcuentas en caso de tener inconsistencias con los datos. 
        				    </p>
        				  </div>

        				  <!-- List group -->
        				  <ul class="list-group">
        				    <a href="actualiza.php?q=cuentas"><li class="list-group-item">Actualizar saldos de las cuentas</li></a>
        				    <a href="actualiza.php?q=subcuentas"><li class="list-group-item">Actualizar saldos de las subcuentas</li></a>
        				  </ul>
        				</div>
        			</div>
        			<?php if(isset($_GET["mensaje"])){
        				echo "<div class='alert alert-info alert-dismissable'>";
        				echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
        				echo $_GET["mensaje"];
        				echo "</div>";
        			} ?>
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