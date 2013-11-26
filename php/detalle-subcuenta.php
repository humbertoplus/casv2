<?php
/*~ Archivo detalle-subcuenta.php
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
	<title>C.A.S | Detalle Subcuenta</title>
</head>

<body>
	<!-- Barra de navegación -->
	<?php include("nav.php"); ?>
	<?php 
	if(!isset($conexion)){ include("conexion.php");}
	$id = $_GET["subcuenta"];
	$sql = "SELECT * FROM subcuentas WHERE codigo_subcuenta='$id'";
	$ejecutar_consulta = $conexion->query($sql);
	while ($registro = $ejecutar_consulta->fetch_assoc()) {
		$cuenta = $registro["cuenta"];
		$nombre = $registro["nombre_subcuenta"];
		$codigo_subcuenta = $registro["codigo_subcuenta"];
		$descripcion = $registro["descripcion"];
		$saldodebe = $registro["saldo_debe"];
		$saldohaber = $registro["saldo_haber"];
	}
	$sql = "SELECT nombre_cuenta from cuentas where codigo_cuenta='$cuenta'";
	$ejecutar_consulta = $conexion->query($sql);
	$reg = $ejecutar_consulta->fetch_assoc();
	$nombre_cuenta = $reg["nombre_cuenta"];
	?>

	<!-- Contenido de la página -->
	<div class="container" id="contenido">
		<div class="row row-offcanvas row-offcanvas-right">
			<div class="col-xs-12 col-sm-9">
				<div class="page-header">
        			<h3>Detalle Subcuenta: Subcuenta N° <?php echo $_GET["subcuenta"]; ?></h3>
        		</div>
        		<div class="row well">
        			<div class="col-lg-12">
        				<p><h4>Nombre de la subcuenta: <em class="text-danger"><?php echo utf8_encode($nombre); ?></em></h4></p>
        				<p><h4>Código de la subcuenta: <em class="text-info"><?php echo $codigo_subcuenta; ?></em></h4></p>
        				<p><h4>Cuenta a la que pertenece: <em class="text-info"><?php echo $cuenta.": ".utf8_encode($nombre_cuenta); ?></em></h4></p>
        				<p>
        					<h4>
        						Naturaleza de la subcuenta: 
        						<em class="text-info">
        							<?php
        							if(substr($codigo_subcuenta, 0,1)==1){
        								echo "Activo";
        							}
        							if(substr($codigo_subcuenta, 0,1)==2){
        								echo "Pasivo";
        							}
        							if(substr($codigo_subcuenta, 0,1)==3){
        								echo "Capital";
        							}
        							if(substr($codigo_subcuenta, 0,1)==4){
        								echo "Resultados";
        							}
        							?>
        						</em>
        					</h4>
        				</p>
        				<br>
        				<p>
        					<h4>Descripción de la subcuenta:</h4>
        					<p class="text-success" align="justify">
        						<?php echo utf8_encode($descripcion); ?>
        					</p>
        				</p>
        				<br>
        				<p><h4>Saldo en el debe: <em class="text-warning">$ <?php echo number_format($saldodebe,2); ?></em></h4></p>
        				<p><h4>Saldo en el haber: <em class="text-warning">$ <?php echo number_format($saldohaber,2); ?></em></h4></p>
        			</div>
        		</div>
        		<div>
        			<a class="btn btn-primary" href="javascript:history.go(-1)"><span class="glyphicon glyphicon-circle-arrow-left"></span> &nbsp;Regresar</a>
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