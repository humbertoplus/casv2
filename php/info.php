<?php 
	include("sesion.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="stylesheet" type="text/css" href="../css/estilos.css"/>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"/>
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
        				<p align="justify">
        					Computerized Accountancy System es un sistema contable para ser usado en ambiente web, lo que le da la portabilidad para ser ejecutado en cualquier equipo con una conexión a internet, o de forma local en el caso de no contar con una ella. El sistema está programado en su totalidad en lenguaje PHP, apoyado con la base de datos MySQL.
        				</p>
        				<p align="justify">
        					Para el estilo visual, se ha utilizado un toolkit denominado Bootstrap 3, que es el archivo que contiene todas las reglas CSS para darle la apariencia al sistema. Además el diseño de la aplicación es completamente responsivo, es decir, que se adapta automáticamente a cualquier dispositivo en el cual esté siendo visualizado, por ejemplo dispositivos móviles como celulares inteligentes y tabletas. Se ha utilizado jQuery para algunos efectos gráficos, todo con el objetivo de tener una aplicación con una interfaz amigable para el usuario.
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