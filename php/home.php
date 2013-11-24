<?php
/*~ Archivo home.php
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
	<title>C.A.S | Inicio</title>
</head>

<body>
	<!-- Barra de navegación -->
	<?php include("nav.php"); ?>
	
	<!-- Contenido de la página -->
	<div class="container" id="contenido">
		<div class="row row-offcanvas row-offcanvas-right">
			<div class="col-xs-12 col-sm-9">
				
				<?php include("mensajes.php"); ?>
				<div class="page-header">
        			<h3>Bienvenido/a, <?php echo "<em style='text-transform:capitalize'>" . $_SESSION['usuario'] . "</em>"; ?></h3>
        		</div>

        		<div class="row">
            		<div class="jumbotron col-xs-12 text-center">
            			<div class="container">
	            			<h1>¡Gracias por usar C.A.S!</h1>
	            			<br>
	            			<p>
	            				C.A.S es un sistema de contabilidad basado en la web, en donde puede registrar los procesos contables de manera eficaz, rápida y sencilla. Para utilizar las funciones, puede acceder a ellas mediante la barra de navegación que se encuentra en la parte superior de su pantalla, o bien, puede utilizar el menú de la derecha. 
	            			</p>
            			</div>
            		</div>
          		</div><!--/row-->

          		<div class="row">
          			<div class="col-lg-12 well">
          				<h3>Objetivo de C.A.S</h3>
          				<p align="justify">
          					El objetivo primordial de este software es el de cumplir adecuadamente con los requerimientos de la contabilidad para llevar a cabo el proceso de registro de todas las transacciones relativas a los aspectos contables de una empresa. En este caso, el sistema facilitará los registros contables de una "Sociedad propuesta", que se encarga de la fabricación de vinos a base de frutas naturales de la región de los nonualcos en El Salvador.
          				</p>
          			</div>
          		</div>

          		<div class="row">
          			<div class="col-lg-12 well">
          				<h3>¿Cómo empezar?</h3>
          				<p align="justify">
          					Una buena forma de comenzar es echándole un vistazo al catálogo general de cuentas, en él aparecen las cuentas que el sistema posee por defecto, organizadas por Grupo, Subgrupo, Cuenta y Subcuenta, y subdivididas en Activo, Pasivo, Capital y Resultados. Luego de revisar estas cuentas, podría iniciar registrando nuevas cuentas (sólo si es usuario administrador) y con esto estará listo para empezar a hacer asientos de sus transacciones contables.
          				</p>
          			</div>
          		</div>

          		<div class="row">
          			<div class="col-lg-12 well">
          				<h3>Recomendaciones</h3>
          				<p align="justify">
          					Como todo software, C.A.S depende exclusivamente de los datos introducidos por el mismo usuario, por lo tanto, si usted desea ver buenos resultados con el uso de este sistema, deberá ingresarle información coherente y ordenada. Sin embargo, puede despreocuparse al momento de ingresar datos en formatos no admitidos, pues el sistema validará todas las entradas para obtener los datos en los formatos adecuados.
          				</p>
          				<p align="justify">
          					<span class="label label-warning">Importante:</span> La duración de la sesión está preconfigurada en 60 minutos. Luego de este tiempo la sesión se cerrará, todo esto con el objetivo de aumentar la seguridad y evitar los accesos no autorizados que podrían suceder si se dejara el equipo sin la supervisión adecuada por un largo período de tiempo.
          				</p>
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