<?php
/*~ Archivo info.php
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
	<title>C.A.S | Acerca de</title>
</head>

<body>
	<!-- Barra de navegación -->
	<?php include("nav.php"); ?>

	<!-- Contenido de la página -->
	<div class="container" id="contenido">
		<div class="row row-offcanvas row-offcanvas-right">
			<div class="col-xs-12 col-sm-9">
				<div class="page-header">
        			<h3>Acerca de C.A.S</h3>
        		</div>
        		<div class="row">
        			<div class="col-md-12 well">
        				<div class="alert alert-danger text-center">
        					<strong>Aviso importante:</strong> <br>Este sistema ha sido diseñado para ser visualizado en los navegadores Google Chrome, Mozilla Firefox, Opera, Safari y Maxthon. Recomendamos encarecidamente no usar Microsoft Internet Explorer. <a href="compatibilidad.php">Detalles.</a>
        				</div>
        				<p align="justify">
        					Computerized Accountancy System es un sistema contable para ser usado en ambiente web, lo que le da la portabilidad para ser ejecutado en cualquier equipo con una conexión a internet, o de forma local en el caso de no contar con ella. El sistema está programado en su totalidad en lenguaje PHP, apoyado con la base de datos MySQL.
        				</p>
        				<p align="justify">
        					Para el estilo visual, se ha utilizado un toolkit denominado Bootstrap 3, que es el archivo que contiene todas las reglas CSS para darle la apariencia al sistema. Además el diseño de la aplicación es completamente responsivo, es decir, que se adapta automáticamente a cualquier dispositivo en el cual esté siendo visualizado, por ejemplo dispositivos móviles como celulares inteligentes y tabletas. Se ha utilizado jQuery para algunos efectos gráficos, todo con el objetivo de tener una aplicación con una interfaz amigable para el usuario.
        				</p>
        				<p align="justify">
        					El sistema gestor de base de datos que se ha utilizado es MySQL, debido a su versatilidad y compatibilidad en ambientes web con PHP.
        					Se han utilizado los últimos estándares en diseño web para mejorar el desempeño en los nuevos navegadores.
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