<?php
/*~ Archivo mayor.php
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
	<title>C.A.S | Libro Mayor</title>
</head>

<body>
	<!-- Barra de navegación -->
	<?php include("nav.php"); ?>
	<?php include("funciones.php"); ?>
    <?php 
    if(!isset($conexion)){ include("conexion.php");}
    $sql = "SELECT * FROM cuentas";
    $ejecutar_consulta = $conexion->query($sql);
    while($regs = $ejecutar_consulta->fetch_assoc()){
        actualizarCuentas($conexion, $regs["codigo_cuenta"]);
        saldosCuentas($conexion, $regs["codigo_cuenta"]);
    }
    ?>

	<!-- Contenido de la página -->
	<div class="container" id="contenido">
		<div class="row row-offcanvas row-offcanvas-right">
			<div class="col-xs-12 col-sm-9">
				<div class="page-header">
        			<h3>Libro Mayor</h3>
        		</div>
        		<div class="row">
                    <div class="col-lg-12 well">
                        <h2 class="text-primary"><span class="glyphicon glyphicon-info-sign"></span> Libro Mayor General</h2>
                        <p align="justify" class="text-info">
                            Aquí se muestran los saldos de todas las cuentas registradas en el sistema. No aparecen las subcuentas puesto que sus montos totales se ven reflejados en las cuentas a las que pertenecen.
                        </p>
                    </div>
                    <hr>

        			<div class="col-lg-12">
        				<table class="table table-condensed table-bordered table-striped">
        					<thead>
        						<tr>
        							<th>Cuenta</th>
        							<th width="100">Debe</th>
        							<th width="100">Haber</th>
        						</tr>
        					</thead>
        					<tbody>
        						<?php 
        						if(!isset($conexion)){
        							include("conexion.php");
        						}
        						$sql = "SELECT DISTINCTROW(cuenta) cuentas FROM registro";
        						$ejecutar_consulta = $conexion->query($sql);
        						while($registro = $ejecutar_consulta->fetch_assoc()){
        							actualizarCuentas($conexion, $registro["cuentas"]);
        						}
        						$sql = "SELECT * FROM cuentas";
        						$ejecutar_consulta = $conexion->query($sql);
        						while($regs = $ejecutar_consulta->fetch_assoc()){
        							echo "<tr>";
        							echo "<td>".$regs["codigo_cuenta"]." - ".utf8_encode($regs["nombre_cuenta"])."</td>";
        							echo "<td align='right'>".number_format($regs["saldo_debe"],2)."</td>";
        							echo "<td align='right'>".number_format($regs["saldo_haber"],2)."</td>";
        							echo "</tr>";
        						}
        						?>
        					</tbody>
        				</table>
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