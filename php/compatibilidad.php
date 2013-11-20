<?php
/*~ Archivo compatibilidad.php
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
	<title>C.A.S | Compatibilidad con navegadores</title>
</head>

<body>
	<!-- Barra de navegación -->
	<?php include("nav.php"); ?>

	<!-- Contenido de la página -->
	<div class="container" id="contenido">
		<div class="row row-offcanvas row-offcanvas-right">
			<div class="col-xs-12 col-sm-9">
				<div class="page-header">
        			<h3>Compatibilidad con navegadores</h3>
        		</div>
        		<div class="row">
        			<div class="col-lg-12 well">
        				<p align="justify">
        					En la actualidad existen muchos navegadores para visualizar páginas web, pero no todos pueden mostrar o interpretar correctamente algunos sitios. En el caso de nuestro sistema C.A.S, este debe ser visualizado en alguno de los siguientes navegadores:
        					<ul>
        						<li>Google Chrome</li>
        						<li>Opera</li>
        						<li>Mozilla Firefox</li>
        						<li>Maxthon</li>
        						<li>Safari</li>
        					</ul>
        				</p>
        				<h3>¿Por qué excluímos Microsoft Internet Explorer?</h3>
        				<p align="justify">
        					Microsoft Internet Explorer es uno de los navegadores en el mercado que actualmente no cumplen los estándares recientes en cuanto al renderizado de sitios web, por lo tanto, no puede mostrar los sitios web con todas sus funcionalidades. Por esta razón, es uno de los navegadores con las puntuaciones más bajas en los rankings de compatibilidad.
        				</p>
        				<p align="justify">
        					Si usted es usuario de Microsoft Internet Explorer, le recomendamos que cambie de navegador por otro que cumpla con los últimos estándares (de visualización y seguridad) para que pueda sacarle el mayor provecho a las últimas tecnologías web. 
        				</p>
        				<div class="alert alert-info">
        					<strong>Nota:</strong> Advertimos que el funcionamiento de C.A.S en Internet Explorer no está del todo asegurado.
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