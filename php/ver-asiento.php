<?php
/*~ Archivo ver-asiento.php
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
	<title>C.A.S | Ver asiento</title>
</head>

<body>
	<!-- Barra de navegación -->
	<?php include("nav.php"); ?>

	<!-- Contenido de la página -->
	<div class="container" id="contenido">
		<div class="row row-offcanvas row-offcanvas-right">
			<div class="col-xs-12 col-sm-9">
				<div class="page-header">
        			<h3>Detalles de la transacción</h3>
        		</div>
        		<div class="row">
        			<div class="row">
					<div class="col-md-12">
						<form action="alta-asientogral.php" id="asiento_gral" name="asiento_gral_frm" class="form-horizontal" method="post" enctype="multipart/form-data" role="form">
							<fieldset>
								<div class="container">

									<div class="row">
										<?php 
										error_reporting(0);
										if(!isset($conexion)){include("conexion.php");}
										$transaccion = $_GET["id"];
										$sql = "SELECT * FROM registro WHERE id=$transaccion";
										$ejecutar_consulta = $conexion->query($sql);
										$registro = $ejecutar_consulta->fetch_assoc();
										?>
										<div class="col-lg-2">
											<label for="n_asiento" class="control-label">N° de asiento</label>
											<input type="text" min="1" class="form-control" id="n_asiento" name="n_asiento_txt" placeholder="Asiento N°" title="Número de asiento registrado" value='<?php echo $registro["transaccion"]; ?>' disabled required/>
										</div>
										<div class="col-lg-4">
											<label for="fecha" class="control-label">Fecha</label>
											<input type="text" class="form-control" id="fecha" name="fecha_txt" title="Fecha del asiento registrado" placeholder="aaaa-mm-dd" value="<?php echo $registro['fecha'];?>" disabled required/>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-6">
											<label for="cuentas" class="control-label">Cuenta o Subcuenta</label>
											<input type="text" class="form-control" id="cuentas" value='<?php echo $registro["cuenta"]; ?>' title="Cuenta o Subcuenta registrada en el asiento." disabled>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-6">
											<label for="concepto" class="control-label">Concepto</label>
											<input type="text" class="form-control" id="concepto" name="concepto_txt" placeholder="Escriba el concepto del asiento" title="Concepto del asiento registrado." value='<?php echo utf8_encode($registro["concepto"]); ?>' disabled />
										</div>
									</div>
									<br>
									<div class="row">
										<div class="col-lg-1">
											<p class="form-control-static pull-right"><strong align="right">Debe</strong></p>
										</div>
										<div class="input-group col-lg-3">
											<label for="debe" class="control-label sr-only">Debe</label>
											<span class="input-group-addon">$</span>
											<input type="text" id="debe" name="debe_txt" class="form-control" placeholder="Debe" title="Importe para el debe registrado" value='<?php echo $registro["debe"]; ?>' disabled/>
										</div>
										
									</div>
									<br>
									<div class="row">
										<div class="col-lg-1">
											<p class="form-control-static pull-right"><strong align="right">Haber</strong></p>
										</div>
										<div class="input-group col-lg-3">
											<label for="haber" class="control-label sr-only">Haber</label>
											<span class="input-group-addon">$</span>
											<input type="text" id="haber" name="haber_txt" class="form-control" placeholder="Haber" title="Importe para el haber registrado" value='<?php echo $registro["haber"]; ?>' disabled/>
										</div>
										
									</div>
									
									<div class="row">
										<div class="col-lg-12">
											<label for="justificante" class="control-label">Justificante</label>
											<input type="file" class="form-control" id="justificante" name="justificante_fls" disabled>
										</div>
									</div>

									<div class="row">
										<div class="col-lg-12">
											<label for="exp" class="control-label">Explicación</label>
											<textarea name="exp_txa" id="exp" cols="30" rows="5" class="form-control" title="Descripción detallada del asiento"  disabled><?php echo utf8_encode($registro["descripcion"]) ; ?></textarea>
										</div>
									</div>
									<br>
									<div class="row">
										<div class="col-lg-12">
											<a href="javascript:history.go(-1)" class="btn btn-success pull-left">
												<span class="glyphicon glyphicon-circle-arrow-left"></span>  
												Regresar
											</a>
											&nbsp;&nbsp;&nbsp;
											<a href="borrar-apunte.php?id=<?php echo $transaccion;?>" class="btn btn-danger">
												<span class="glyphicon glyphicon-trash"></span>
												Borrar
											</a>
										</div>
									</div>
								</div>        						
							</fieldset>
						</form>
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