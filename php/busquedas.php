<?php
/*~ Archivo busquedas.php
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
	<title>C.A.S | Búsquedas</title>
</head>

<body>
	<!-- Barra de navegación -->
	<?php include("nav.php"); ?>

	<!-- Contenido de la página -->
	<div class="container" id="contenido">
		<div class="row row-offcanvas row-offcanvas-right">
			<div class="col-xs-12 col-sm-9">
				<div class="page-header">
        			<h3>Resultado de la búsqueda</h3>
        		</div>
        		<div class="row">
        			<?php 
        			error_reporting(E_ALL ^ E_NOTICE);
        			if(!isset($conexion)){ include("conexion.php");}
        			$buscar = $_GET["buscar"];

        			/* Buscamos en los grupos */
        			$sql = "SELECT * FROM grupos WHERE codigo_grupo = '$buscar'";
        			$ejecutar_consulta = $conexion->query($sql);
        			if($ejecutar_consulta->num_rows!=0){
        				while($regs=$ejecutar_consulta->fetch_assoc()){
        					print_r($regs);
        					$codigo_grupo = $regs["codigo_grupo"];
        					$nombre_grupo = $regs["nombre_grupo"];
        					$clasificacion = $regs["clasificacion"];
        				}
        			} else {
        				$sql = "SELECT * FROM subgrupos WHERE codigo_subgrupo = '$buscar'";
        				$ejecutar_consulta = $conexion->query($sql);
        				if($ejecutar_consulta->num_rows!=0){
        					while($regs = $ejecutar_consulta->fetch_assoc()){
        						print_r($regs);
        						$codigo_subgrupo = $regs["codigo_subgrupo"];
        						$nombre_subgrupo = $regs["nombre_subgrupo"];
        						$grupo = $regs["grupo"];
        					}
        				} else {
        					$sql = "SELECT * FROM cuentas WHERE codigo_cuenta = '$buscar'";
        					$ejecutar_consulta = $conexion->query($sql);
        					if($ejecutar_consulta->num_rows!=0){
        						while($regs = $ejecutar_consulta->fetch_assoc()){
        							$codigo_cuenta = $regs["codigo_cuenta"];
        							$nombre_cuenta = $regs["nombre_cuenta"];
        							$subgrupo = $regs["subgrupo"];
        							$tiene_subcuenta = $regs["tiene_subcuenta"];
        							$descripcion = $regs["descripcion_cuenta"];
        							$saldo_debe = $regs["saldo_debe"];
        							$saldo_haber = $regs["saldo_haber"];
        							?> 
        								<div class="col-lg-12">
        									<p><h4>Nombre de la cuenta: <em class="text-danger"><?php echo utf8_encode($nombre_cuenta); ?></em></h4></p>
        									<p><h4>Código de la cuenta: <em class="text-info"><?php echo $codigo_cuenta; ?></em></h4></p>
        									<p><h4>Subgrupo al que pertenece: <em class="text-info"><?php echo $subgrupo; ?></em></h4></p>
        									<p>
        										<h4>
        											Naturaleza de la cuenta: 
        											<em class="text-info">
        												<?php
        												if(substr($codigo_cuenta, 0,1)==1){
        													echo "Activo";
        												}
        												if(substr($codigo_cuenta, 0,1)==2){
        													echo "Pasivo";
        												}
        												if(substr($codigo_cuenta, 0,1)==3){
        													echo "Capital";
        												}
        												if(substr($codigo_cuenta, 0,1)==4){
        													echo "Resultados";
        												}
        												?>
        											</em>
        										</h4>
        									</p>
        									<p><h4>Posee subcuentas: <em class="text-info"><?php echo $tiene_subcuenta; ?></em></h4></p>
        									<br>
        									<p>
        										<h4>Descripción de la subcuenta:</h4>
        										<p class="text-success" align="justify">
        											<?php echo utf8_encode($descripcion); ?>
        										</p>
        									</p>
        									<br>
        									<p><h4>Saldo en el debe: <em class="text-warning">$ <?php echo number_format($saldo_debe,2); ?></em></h4></p>
        									<p><h4>Saldo en el haber: <em class="text-warning">$ <?php echo number_format($saldo_haber,2); ?></em></h4></p>
        								</div>
        							<hr>
        							<div>
        								<a class="btn btn-primary pull-left" href="javascript:history.go(-1)"><span class="glyphicon glyphicon-circle-arrow-left"></span> &nbsp;Regresar</a>
        							</div>
        							<?php
        						}
        					} else {
        						$sql = "SELECT * FROM subcuentas WHERE codigo_subcuenta = '$buscar'";
        						$ejecutar_consulta = $conexion->query($sql);
        						if($ejecutar_consulta->num_rows!=0){
        							while($regs = $ejecutar_consulta->fetch_assoc()){
        								$codigo_subcuenta = $regs["codigo_subcuenta"];
        								$nombre_subcuenta = $regs["nombre_subcuenta"];
        								$cuenta = $regs["cuenta"];
        								$descripcion = $regs["descripcion"];
        								$saldo_debe = $regs["saldo_debe"];
        								$saldo_haber = $regs["saldo_haber"];
        								?>
        								<div class="col-lg-12">
        									<p><h4>Nombre de la subcuenta: <em class="text-danger"><?php echo utf8_encode($nombre_subcuenta); ?></em></h4></p>
        									<p><h4>Código de la subcuenta: <em class="text-info"><?php echo $codigo_subcuenta; ?></em></h4></p>
        									<p><h4>Cuenta a la que pertenece: <em class="text-info"><?php echo $cuenta; ?></em></h4></p>
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
        									<p><h4>Saldo en el debe: <em class="text-warning">$ <?php echo number_format($saldo_debe,2); ?></em></h4></p>
        									<p><h4>Saldo en el haber: <em class="text-warning">$ <?php echo number_format($saldo_haber,2); ?></em></h4></p>
        								</div> 
        								<hr>
        								<div>
        									<a class="btn btn-primary" href="javascript:history.go(-1)"><span class="glyphicon glyphicon-circle-arrow-left"></span> &nbsp;Regresar</a>
        								</div>
        								<?php
        							}
        						} else {
        							echo "No existe ninguna cuenta con el código "."<strong>".$buscar."</strong><br>";
        						}
        					}
        				}
        			}

        			?>

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