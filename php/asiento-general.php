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
        									<label for="cuenta" class="control-label">Cuenta</label>
        									<input type="text" class="form-control" id="cuenta">
        								</div>
        								<div class="col-lg-10">
        									<label for="cuentas" class="control-label">Seleccionar</label>
        								<select name="cuentas_slc" id="cuentas" class="form-control">
        									<option value="">Introduzca el número de cuenta, o seleccione uno de esta lista</option>
        								</select>
        								</div>
        							</div>
        							<div class="row">
        								<div class="col-lg-6">
        									<label for="concepto" class="control-label">Concepto</label>
        									<input type="text" class="form-control" id="concepto" name="concepto_txt" placeholder="Escriba el concepto del asiento" required >
        								</div>
        							</div>
        							<br>
        							<div class="row">
        								<div class="input-group col-lg-2">
        									<label for="debe" class="control-label sr-only">Debe</label>
        									<span class="input-group-addon">$</span>
	        								<input type="text" id="debe" name="debe_frm" class="form-control" placeholder="Debe">
        								</div>
        							</div>
        							<br>
        							<div class="row">
        								<div class="input-group col-lg-2">
        									<label for="haber" class="control-label sr-only">Haber</label>
        									<span class="input-group-addon">$</span>
	        								<input type="text" id="haber" name="haber_frm" class="form-control" placeholder="Haber">
        								</div>
        							</div>
        							
        							<div class="row">
        								<div class="col-lg-6">
        									<label for="justificante" class="control-label">Justificante</label>
        									<input type="file" class="form-control" id="justificante" name="justificante_fls">
        								</div>
        							</div>

        							<div class="row">
        								<div class="col-lg-9">
        									<label for="exp" class="control-label">Explicación</label>
        									<textarea name="exp_txa" id="exp" cols="30" rows="5" class="form-control"></textarea>
        								</div>
        							</div>
        							<br>
        							<div class="row">
        								<div class="col-lg-2 pull-right">
        									<button type="submit" class="btn btn-primary btn-block"><span class="glyphicon glyphicon-save"></span> &nbsp;Guardar</button>
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