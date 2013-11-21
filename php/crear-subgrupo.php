<?php
/*~ Archivo crear-subgrupo.php
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
	<title>C.A.S | Crear Subgrupo</title>
</head>

<body>
	<!-- Barra de navegación -->
	<?php include("nav.php"); ?>

	<!-- Contenido de la página -->
	<div class="container" id="contenido">
		<div class="row row-offcanvas row-offcanvas-right">
			<div class="col-xs-12 col-sm-9">
				<div class="page-header">
        			<h3>Crear Subgrupo</h3>
        		</div>
        		<div class="row">
        			<div class="col-lg-12 well">
        				<form action="agregar-subgrupo.php" class="form-horizontal" method="post" id="crear-subgrupo_frm" enctype="application/x-www-form-urlencoded">
        					<fieldset>
        						<div class="container">
        							<div class="row">
        								<div class="col-lg-4">
        									<label for="grupos" class="control-label">Grupo</label>
        									<select name="grupos_slc" id="grupos" class="form-control">
        										<option value="">Seleccione grupo</option>
        										<?php include("select-grupos.php"); ?>
        									</select>
        								</div>
        								<div class="col-lg-5">
        									<label for="id_subgrupo" class="control-label">Código del subgrupo</label>
        									<input type="text" id="id_subgrupo" name="id_subgrupo_txt" class="form-control" placeholder="Escriba el código en el formato #.#.#" title="Escriba el código para el grupo en el formato #.#.#" required />
        								</div>
        							</div>
        							<div class="row">
        								<div class="col-lg-12">
        									<label for="nombre" class="control-label">Nombre del subgrupo</label>
        									<input type="text" id="nombre" class="form-control" name="nombre_txt" title="Escriba el nombre del subgrupo" placeholder="Escriba el nombre asignado al subgrupo" required/>
        								</div>
        							</div>
        							<div class="row">
        								<div class="col-lg-12">
        									<label for="descripcion" class="control-label">Descripción</label>
        									<textarea name="descripcion_txa" id="descripcion" class="form-control" placeholder="Escriba una descripción para el subgrupo"></textarea>
        								</div>
        							</div>
        							<br>
        							<div class="row">
        								<div class="col-lg-12">
        									<button class="btn btn-primary pull-right" type="submit"><span class="glyphicon glyphicon-floppy-save"></span>&nbsp;Guardar</button>
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