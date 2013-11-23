<?php
/*~ Archivo anio-contable.php
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
  <script src="../js/validaciones.js"></script>
	<script>
	    !window.jQuery && document.write("<script src='../js/jquery.min.js'><\/script>");
	</script>
	<title>C.A.S | Año Contable</title>
</head>

<body>
	<!-- Barra de navegación -->
	<?php include("nav.php"); ?>

	<!-- Contenido de la página -->
	<div class="container" id="contenido">
		<div class="row row-offcanvas row-offcanvas-right">
			<div class="col-xs-12 col-sm-9">
				<div class="page-header">
        			<h3>Configurar Año Contable</h3>
        		</div>
        		<div class="row">
        			<div class="col-lg-12">
        				<form action="anio-contable-form.php" class="form-inline" method="post" enctype="application/x-www-form-urlencoded" onsubmit="return validarAnioContable()">
        					<fieldset>
        						<div class="container">
        							<div class="row">
        								<div class="col-lg-12">
        									<?php 
        										include("conexion.php");
        										$consulta = "SELECT anio_contable FROM anio_contable";
        										$ejecutar_consulta = $conexion->query($consulta);
        										while ($registro=$ejecutar_consulta->fetch_assoc()) {
        											echo "<div class='alert alert-info'>";
        											echo "El año contable actual es: ";
        											echo "<strong>".$registro["anio_contable"].".</strong>";
        											echo " Si desea cambiar este valor seleccionelo en la lista de abajo.";
        											echo "</div>";
        										}

        									?>
        								</div>
        							</div>
        							<br>
        							<div class="row">
        								<div class="col-lg-2">
        									<label for="anio" class="control-label">Año contable:</label>
        								</div>
        								<div class="col-lg-6">
        									<select name="anio_slc" id="anio" class="form-control">
        										<option value="">Seleccione el año contable</option>
        										<option value="2013">2013</option>
        										<option value="2014">2014</option>
        										<option value="2015">2015</option>
        										<option value="2016">2016</option>
        										<option value="2017">2017</option>
        										<option value="2018">2018</option>
        										<option value="2019">2019</option>
        									</select>
        								</div>
        								<div class="col-lg-4">
        									<button class="btn btn-warning">Enviar</button>
        								</div>
        							</div>
        							<br>
        							<div class="row">
        								<div class="col-lg-12">
        									<?php 
        										if(isset($_GET["mensaje"])){
        											echo "<div class='alert alert-success alert-dismissable'>";
        											echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
        											echo $_GET["mensaje"];
        											echo "</div>";
        										}
        									?>
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