<?php
/*~ Archivo plantilla-maestra.php
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
	<title>C.A.S | Crear Grupo</title>
</head>

<body>
	<!-- Barra de navegación -->
	<?php include("nav.php"); ?>

	<!-- Contenido de la página -->
	<div class="container" id="contenido">
		<div class="row row-offcanvas row-offcanvas-right">
			<div class="col-xs-12 col-sm-9">
				<div class="page-header">
        			<h3>Crear Grupo</h3>
        		</div>
        		<div class="row">
        			<div class="col-lg-12">
        				<form action="agregar-grupo.php" class="form-horizontal" method="post" name="crear-grupo_frm" enctype="application/x-www-form-urlencoded">
        					<fieldset>
        						<div class="container">
        							<div class="row">
        								<div class="col-lg-3">
        									<label for="id_grupo" class="control-label">Código del grupo</label>
        									<input type="text" id="id_grupo" class="form-control" name="id_grupo_txt" title="Escriba el código en el formato #.#" placeholder="Formato: #.#" required/>
        								</div>
        								<div class="col-lg-9">
        									<label for="nombre" class="control-label">Nombre</label>
        									<input type="text" id="nombre" name="descripcion_txt" class="form-control" title="Escriba un nombre para el grupo" placeholder="Nombre del grupo" required/>
        								</div>
        							</div>
        						</div>
        					</fieldset>
        				</form>
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