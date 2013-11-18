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
	<!-- Barra de navegación -->
	<?php include("nav.php"); ?>

	<!-- Contenido de la página -->
	<div class="container" id="contenido">
		<div class="row row-offcanvas row-offcanvas-right">
			<div class="col-xs-12 col-sm-9">
				<div class="page-header">
        			<h3>Título de la página</h3>
        		</div>
        		<div class="row">
        			<div class="col-md-12">
						<?php 
							include("conexion.php");
							$consulta = "SELECT iva FROM iva";
							$ejecutar_consulta = $conexion->query($consulta);
							while ($registro=$ejecutar_consulta->fetch_assoc()) {
								echo "<div class='alert alert-info'>";
								echo "El valor de IVA actual es: ";
								echo "<strong>".$registro["iva"].".</strong>";
								echo " Si desea cambiar este valor establezcalo en el espacio de abajo.";
								echo "</div>";
							}

						?>
        			</div>
        		</div>
        		<div class="row">
        			<div class="col-md-12">
        				<form action="iva2.php" class="form-inline" method="post">
        					<fieldset>
        						<legend>Cambiar IVA</legend>

        						<div class="col-md-6">
        							<input type="text" class="form-control" id="n_iva" name="n_iva_txt" placeholder="Escriba el nuevo valor para el IVA" required/>
        						</div>
        						<div class="col-md-4">
        							<button type="submit" class="btn btn-info">Cambiar IVA</button>
        						</div>
        					</fieldset>
        				</form>
        			</div>
        		</div>
        		<br>
        		<div class="row">
        			<div class="col-md-12">
        				<?php
        				error_reporting(E_ALL ^ E_NOTICE);
        					if($_GET["error"]=="no"){
        						echo "<div class='alert alert-success alert-dismissable'>";
        						echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
								echo "El valor de IVA se cambió a: ";
								echo "<strong>".$_GET["iva"].".</strong>";
								echo "</div>";
        					} else if($_GET["error"]=="invalido"){
        						echo "<div class='alert alert-danger'>";
								echo "¡Error! El IVA no puede ser negativo ni mayor que 1.";
								echo "</div>";
        					}
        				?>
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