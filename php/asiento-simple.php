<?php
/*~ Archivo asiento-simple.php
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
	<title>C.A.S | Asiento simple</title>
</head>

<body>
	<!-- Barra de navegación -->
	<?php include("nav.php"); ?>

	<!-- Contenido de la página -->
	<div class="container" id="contenido">
		<div class="row row-offcanvas row-offcanvas-right">
			<div class="col-xs-12 col-sm-9">
				<div class="page-header">
        			<h3>Asiento simple</h3>
        		</div>
        		<div class="row">
        			<div class="col-md-12 well">
        				<form action="" id="asiento_simple" name="asiento_simple_frm" method="post" enctype="multipart/form-data" class="form-horizontal">
        					<fieldset>
        						<div class="container">
        							<div class="row">
        								<div class="col-md-3">
        									<label for="asiento" class="control-label">N° de asiento</label>
        									<input type="text" id="asiento" class="form-control" name="asiento_txt" placeholder="Asiento N°" title="Escriba el número de asiento" required/>
        								</div>
        								<div class="col-md-4">
        									<label for="fecha" class="control-label">Fecha</label>
        									<input type="date" id="fecha" name="fecha_txt" class="form-control" title="Ingrese la fecha del asiento" required/>
        								</div>
        							</div>
        							<div class="row">
        								<div class="col-md-3">
        									<label for="c_debe" class="control-label">Cuenta al debe</label>
        									<input type="text" id="c_debe" name="c_debe_txt" class="form-control" placeholder="N° Cuenta" title="Escriba el número de la cuenta al debe" required/>
        								</div>
        								<div class="col-md-9">
        									<label for="cuentas" class="control-label">Seleccione cuenta</label>
        									<select name="cuentas_slc" id="cuentas" class="form-control">
        										<option value="">Seleccione una cuenta</option>
        									</select>
        								</div>
        							</div>
        							<div class="row">
        								<div class="col-md-3">
        									<label for="c_haber" class="control-label">Cuenta al haber</label>
        									<input type="text" id="c_haber" name="c_haber_txt" class="form-control" placeholder="N° Cuenta" title="Escriba el número de la cuenta al haber" required/>
        								</div>
        								<div class="col-md-9">
        									<label for="cuentas2" class="control-label">Seleccione cuenta</label>
        									<select name="cuentas_slc" id="cuentas2" class="form-control">
        										<option value="">Seleccione una cuenta</option>
        									</select>
        								</div>
        							</div>
        							<div class="row">
        								<div class="col-md-6">
        									<label for="concepto" class="control-label">Concepto</label>
        									<input type="text" id="concepto" name="concepto_txt" class="form-control" placeholder="Escriba el concepto del asiento" title="Escriba el concepto del asiento" required/>
        								</div>
        							</div>
        							<br>
        							<div class="row">
        								<div class="col-lg-3 input-group">
        									<span class="input-group-addon">$</span>
        									<input type="text" id="importe" name="importe_txt" class="form-control" placeholder="Importe" title="Escriba el importe del asiento" required/>
        								</div>
        							</div>
        							<div class="row">
        								<div class="col-lg-12">
        									<label for="justificante" class="control-label">Justificante</label>
        									<input type="file" class="form-control" id="justificante" name="justificante_fls">
        								</div>
        							</div>

        							<div class="row">
        								<div class="col-lg-12">
        									<label for="exp" class="control-label">Explicación</label>
        									<textarea name="exp_txa" id="exp" cols="30" rows="5" class="form-control" title="Proporcione una descripción o explicación del asiento a registrar" required></textarea>
        								</div>
        							</div>
        							<br>
        							<div class="row">
        								<div class="col-lg-2 pull-right">
        									<button type="submit" class="btn btn-primary btn-block"><span class="glyphicon glyphicon-floppy-disk"></span> &nbsp;Guardar</button>
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