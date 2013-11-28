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
	<script type="text/javascript" language="javascript" src="../js/funciones.js"></script>
	<script src="../js/jquery.maskedinput.js" type="text/javascript"></script>
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
					<div class="col-lg-12 well">
						<h2 class="text-primary"><span class="glyphicon glyphicon-info-sign"></span> Asiento simple </h2>
						<p align="justify" class="text-info">
							Un asiento simple se realiza cuando una transacción afecta a dos cuentas. En un asiento simple no debe preocuparse por generar otro asiento para cumplir con partida doble, pues el sistema registrará esta transacción en este tipo de asiento.
						</p>
					</div>
					<?php
					error_reporting(E_ALL ^ E_NOTICE);
					if(!isset($conexion)){ include("conexion.php");}
					$sql = "SELECT transaccion FROM registro ORDER BY id DESC LIMIT 1";
					$ejecutar_consulta = $conexion->query($sql);
					$num_regs = $ejecutar_consulta->num_rows;
					if($num_regs>0){
						$reg = $ejecutar_consulta->fetch_assoc();
						$ult_asiento = $reg["transaccion"];
						echo "<div class='alert alert-info alert-dismissable'>";
						echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
						echo "El último asiento registrado es: <strong>".$ult_asiento."</strong>";
						echo "</div>";
					}
					
					$mensaje = $_GET["mensaje"];
					$error=$_GET["error"];
					if($error=="si"){
						echo "<div class='alert alert-danger'>";
						echo $mensaje;
						echo "</div>";
					}

					if($error=="no"){
						echo "<div class='alert alert-success alert-dismissable'>";
						echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
						echo $mensaje;
						echo "</div>";
					}
					?>
					<div class="col-md-12 well">
						<form action="alta-asientosimple.php" id="asiento_simple" name="asiento_simple_frm" method="post" enctype="multipart/form-data" class="form-horizontal">
							<fieldset>
								<div class="container">
									<div class="row">
										<input type="hidden" name="tipoasiento_hdn" value="simple">
										<div class="col-md-2">
											<label for="asiento" class="control-label">N° de asiento</label>
											<input type="number" min="1" id="asiento" class="form-control" name="asiento_txt" placeholder="Asiento N°" title="Escriba el número de asiento" required/>
										</div>
										<div class="col-md-4">
											<label for="fecha" class="control-label">Fecha</label>
											<input type="date" id="fecha" name="fecha_txt" class="form-control" title="Ingrese la fecha del asiento" placeholder="AAAA-MM-DD" required/>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<label for="cuentasdebe" class="control-label">Seleccione cuenta al debe</label>
											<select name="cuentasdebe_slc" id="cuentasdebe" class="form-control" onchange="from(document.asiento_simple_frm.cuentasdebe_slc.value, 'scuentasdebe', 'cuentas2.php')" required>
												<option value="">Seleccione una cuenta</option>
												<?php 
												if(!isset($conexion)){
													include("conexion.php");
												}
												$consulta = "SELECT * FROM cuentas";
												$ejecutar_consulta = $conexion->query($consulta);
												while($registro = $ejecutar_consulta->fetch_assoc()){
													echo "<option value='";
													echo $registro["codigo_cuenta"];
													echo "'>";
													echo $registro["codigo_cuenta"];
													echo ". ";
													echo utf8_encode($registro["nombre_cuenta"]);
													echo "</option>";
												}
											?>
											</select>
										</div>
										<div class="col-md-6" id="scuentasdebe">
											<label for="subcuentasdebe" class="control-label">Seleccione subcuenta al debe</label>
											<select name="subcuentasdebe_slc" id="subcuentasdebe" class="form-control">
												<option value="">Seleccione una subcuenta</option>
											</select>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<label for="cuentashaber" class="control-label">Seleccione cuenta al haber</label>
											<select name="cuentashaber_slc" id="cuentashaber" class="form-control" onchange="from(document.asiento_simple_frm.cuentashaber_slc.value, 'scuentashaber', 'cuentas3.php')" required>
												<option value="">Seleccione una cuenta</option>
												<?php 
												if(!isset($conexion)){
													include("conexion.php");
												}
												$consulta = "SELECT * FROM cuentas";
												$ejecutar_consulta = $conexion->query($consulta);
												while($registro = $ejecutar_consulta->fetch_assoc()){
													echo "<option value='";
													echo $registro["codigo_cuenta"];
													echo "'>";
													echo $registro["codigo_cuenta"];
													echo ". ";
													echo utf8_encode($registro["nombre_cuenta"]);
													echo "</option>";
												}
											?>
											</select>
										</div>
										<div class="col-md-6" id="scuentashaber">
											<label for="subcuentashaber" class="control-label">Seleccione subcuenta al haber</label>
											<select name="subcuentashaber_slc" id="subcuentashaber" class="form-control">
												<option value="">Seleccione una subcuenta</option>
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
										<div class="col-lg-3">
											<label for="importe" class="control-label">Importe</label>
											<div class="input-group">
												<span class="input-group-addon">$</span>
												<input type="text" id="importe" name="importe_txt" class="form-control" placeholder="Importe" title="Escriba el importe del asiento" onblur="validaDinero()" required/>
											</div>
										</div>
									</div>
									<br>
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

	<script>
		function validaDinero(){
			var importe = document.getElementById("importe");
			if(isNaN(importe.value)){
				alert("El monto del importe tiene que ser numérico.");
				importe.value=null;
				importe.focus();
			}
		}
	</script>
	<script>
		jQuery(function($){
			$("#fecha").mask("9999-99-99", {placeholder:"_"});
			//$("#asiento").mask("9?99999", {placeholder:" "});
		});
	</script>
	<script src="../js/bootstrap.min.js"></script>
</body>
</html>