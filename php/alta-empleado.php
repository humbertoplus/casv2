<?php
/*~ Archivo alta-empleado.php
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
	<title>C.A.S | Alta empleado</title>
</head>

<body>
	<!-- Barra de navegación -->
	<?php include("nav.php"); ?>

	<!-- Contenido de la página -->
	<div class="container" id="contenido">
		<div class="row row-offcanvas row-offcanvas-right">
			<div class="col-xs-12 col-sm-9">
				<div class="page-header">
        			<h3>Registrar a un empleado</h3>
        		</div>
        		<div class="row">
           <?php 
           error_reporting(0);
           $error = $_GET["error"];
           if($error=="no"){
            echo "<div class='alert alert-success alert-dismissable'>";
            echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
            echo "Se agregó al empleado correctamente.";
            echo "</div>";
           } else if($error == "si"){
              echo "<div class='alert alert-danger alert-dismissable'>";
              echo "<button type='button' class='close' data-dismiss='alert'>";
              echo "Ocurrió un error al guardar al empleado.";
              echo "</div>";
           }
           ?>
        			<div class="col-lg-12 well">
        				<form action="agregar-empleado.php" id="nuevo_empleado" name="nuevo_empleado_frm" method="post" class="form-horizontal" enctype="application/x-www-form-urlencoded" onSubmit="return validarEmpleado()">
        					<fieldset>
        						<legend>Datos del empleado</legend>
        						<div class="container">
        							<div class="row">
        								<div class="col-lg-4">
        									<label for="codigo_empleado" class="control-label">Código del empleado</label>
        									<input type="text" class="form-control" id="codigo_empleado" name="codigo_empleado_txt" title="Escriba el código único para el empleado" placeholder="Por ejemplo AA000001" required />
        								</div>
        							</div>
        							<br>
        							<div class="row">
        								<div class="col-lg-3">
        									<label for="primernombre" class="control-label">Primer Nombre</label>
        									<input type="text" id="primernombre" name="primernombre_txt" class="form-control" title="Escriba el primer nombre del empleado" placeholder="Primer nombre" required />
        								</div>
        								<div class="col-lg-3">
        									<label for="segundonombre" class="control-label">Segundo Nombre</label>
        									<input type="text" id="segundonombre" name="segundonombre_txt" class="form-control" title="Escriba el segundo nombre del empleado" placeholder="Segundo nombre" />
        								</div>
        								<div class="col-lg-3">
        									<label for="primerapellido" class="control-label">Primer Apellido</label>
        									<input type="text" id="primerapellido" name="primerapellido_txt" class="form-control" title="Escriba el primer apellido del empleado" placeholder="Primer nombre" required />
        								</div>
        								<div class="col-lg-3">
        									<label for="segundoapellido" class="control-label">Segundo Apellido</label>
        									<input type="text" id="segundoapellido" name="segundoapellido_txt" class="form-control" title="Escriba el segundo apellido del empleado" placeholder="Segundo apellido" />
        								</div>
        							</div>
        							<br>
        							<div class="row">
        								<div class="col-lg-4">
        									<label for="cargo" class="control-label">Cargo del empleado</label>
        									<select name="cargos_slc" id="cargo" class="form-control">
        										<option value="">Seleccione cargo</option>
        										<?php include("select-cargos.php"); ?>
        									</select>
        								</div>
        								<div class="col-lg-4">
        									<label for="aniostrabajados" class="control-label">Años trabajados</label>
        									<input type="number" class="form-control" id="aniostrabajados" name="aniostrabajados_txt" title="Digite los años de trabajo del empleado" placeholder="Años trabajados" required/>
        								</div>
        								<div class="col-lg-4">
        									<label for="salario" class="control-label">Salario contratado</label>
        									<div class="input-group">
        										<span class="input-group-addon">$</span>
        										<input type="text" id="salario" name="salario_txt" class="form-control" title="Escriba el salario del empleado" placeholder="Salario base" required />
        									</div>
        								</div>
        							</div>
        							<br>
        							<div class="row">
        								<div class="col-lg-12">
        									<button class="btn btn-primary pull-right" type="submit"><span class="glyphicon glyphicon-save"></span>&nbsp; Guardar</button>
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