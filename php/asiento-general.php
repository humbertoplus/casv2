<?php
/*~ Archivo asiento-general.php
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
	<title>C.A.S | Asiento General</title>
</head>

<body>
	<!-- Barra de navegación -->
	<?php include("nav.php"); ?>

	<!-- Contenido de la página -->
	<div class="container" id="contenido">
		<div class="row row-offcanvas row-offcanvas-right">
			<div class="col-xs-12 col-sm-9">
				<div class="page-header">
					<h3>Asiento General</h3>
				</div>
				<div class="row">
					<div class="col-md-12 well">
						<form action="" id="asiento_gral" name="asiento_gral_frm" class="form-horizontal" method="post" enctype="multipart/form-data" role="form">
							<fieldset>
								<div class="container">
									<div class="row">
										<div class="col-lg-2">
											<label for="n_asiento" class="control-label">N° de asiento</label>
											<input type="text" class="form-control" id="n_asiento" name="n_asiento_txt" placeholder="Asiento N°" title="Escriba el número de asiento a registrar" required/>
										</div>
										<div class="col-lg-4">
											<label for="fecha" class="control-label">Fecha</label>
											<input type="date" class="form-control" id="fecha" name="fecha_txt" title="Ingrese la fecha del asiento" required/>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-3">
											<label for="cuenta" class="control-label">Cuenta o subcuenta</label>
											<input type="text" class="form-control" id="cuenta" placeholder="N° de cuenta" title="Escriba el número de la cuenta afectada" required/>
										</div>
										<div class="col-lg-5">
											<label for="cuentas" class="control-label">Seleccionar Cuenta</label>
										<select name="cuentas_slc" id="cuentas" class="form-control">
											<option value="">Seleccione uno de esta lista</option>
											<?php include("select-cuentas.php");?>
										</select>
										</div>
										<div class="col-lg-4">
											<label for="subcuentas" class="control-label">Seleccionar Subcuenta</label>
											<select name="subcuentas_slc" id="subcuentas" class="form-control">
												<option value="">Subcuenta</option>
												<?php include("select-subcuentas.php?opc=subcuentas_slc"); ?>
											</select>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-6">
											<label for="concepto" class="control-label">Concepto</label>
											<input type="text" class="form-control" id="concepto" name="concepto_txt" placeholder="Escriba el concepto del asiento" title="Escriba el concepto del asiento" required />
										</div>
									</div>
									<br>
									<div class="row">
										<div class="input-group col-lg-2">
											<label for="debe" class="control-label sr-only">Debe</label>
											<span class="input-group-addon">$</span>
											<input type="text" id="debe" name="debe_frm" class="form-control" placeholder="Debe" title="Ingrese el importe para el debe" required/>
										</div>
									</div>
									<br>
									<div class="row">
										<div class="input-group col-lg-2">
											<label for="haber" class="control-label sr-only">Haber</label>
											<span class="input-group-addon">$</span>
											<input type="text" id="haber" name="haber_frm" class="form-control" placeholder="Haber" title="Ingrese el importe para el haber" required/>
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