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
	<title>C.A.S | </title>
</head>

<body>
	<?php include("nav.php"); ?>

	<div class="container" id="contenido">
		<div class="row row-offcanvas row-offcanvas-right">
			<div class="col-xs-12 col-sm-9">
				<div class="page-header">
        			<h3>Título de la página</h3>
        		</div>
        		<div class="row">
        			Contenido de la página
        		</div>
        	</div><!--/span-->

        	<?php include("sidebar.php"); ?>
    </div>

	<?php include("footer.php"); ?>

	<div class="modal fade" id="acerca" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4>Acerca de C.A.S</h4>
				</div>

				<div class="modal-body">
					<p>
						C.A.S son las siglas de <em>"Computerized Accountancy System"</em> que traducido al español significa <em>"Sistema Contable Computarizado"</em>. Este sistema está diseñado en ambiente web, escrito en PHP y programado por los alumnos de la cátedra de Sistemas Contables de la Facultad de Ingeniería y Arquitectura de la Universidad de El Salvador. Este sistema es fácil de usar, tiene una interfaz amigable con el usuario y además es seguro, debido a que posee un nivel de seguridad orientado a usuarios, los cuales tienen su nombre de usuario y contraseña. Si una persona no está logueada en el sistema, no podrá acceder a ninguna de las funciones del mismo, ni podrá consultar ningún tipo de información contenida dentro del sistema.
					</p>

					<div class="modal-footer">
						<a href="info.php" class="btn btn-success">Más información</a>
						<a href="#" class="btn btn-primary" data-dismiss="modal">Aceptar</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="creditos" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4>Sobre los programadores</h4>
				</div>

				<div class="modal-body">
					<p>
						Este sistema ha sido desarrollado por un equipo de 4 programadores. A continuación se detallan sus nombres:
						<br><br>
					</p>
					<ol>
						<li><b>Ingrid Elizabeth Aguilar Gonzalez</b></li>
						<li><b>Vanessa Elena Campos Garciaguirre</b></li>
						<li><b>Jhosseline Alicia Rodriguez Campos</b></li>
						<li><b>Ricardo Alexander Vigil Contreras</b></li>
					</ol>

					<div class="modal-footer">
						<a href="#" class="btn btn-primary" data-dismiss="modal">Aceptar</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="../js/bootstrap.min.js"></script>
</body>
</html>