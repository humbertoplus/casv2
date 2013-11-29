<?php
/*~ Archivo balance-comprobación.php
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
	<title>C.A.S | Balance de Comprobación</title>
</head>

<body>
	<!-- Barra de navegación -->
	<?php include("nav.php"); ?>

	<!-- Contenido de la página -->
	<div class="container" id="contenido">
		<div class="row row-offcanvas row-offcanvas-right">
			<div class="col-xs-12 col-sm-9">
				<div class="page-header">
        			<h3>Balance de Comprobación</h3>
        		</div>
        		<div class="row">
        			<div class="container">
        				<table class="table table-bordered table-hover">
        					<thead>
								<tr>
									<th colspan="4">
										<h2 class="text-center">Vinos Nonualcos y Cia. S.A</h2>
										<p align="center">
											<strong>Balance de Comprobación</strong>
										</p>

										<p align="center">
											<script>
												var month=new Array();
												month[0]="Enero";
												month[1]="Febrero";
												month[2]="Marzo";
												month[3]="Abril";
												month[4]="Mayo";
												month[5]="Junio";
												month[6]="Julio";
												month[7]="Agosto";
												month[8]="Septiembre";
												month[9]="Octubre";
												month[10]="Noviembre";
												month[11]="Diciembre";
												var fecha = new Date();
												document.write("Al " + fecha.getDate() + " de " + month[fecha.getMonth()] + " de " + fecha.getFullYear());
											</script>
										</p>
									</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<th>Cuenta</th>
									<th>Debe</th>
									<th>Haber</th>
								</tr>
								<?php 
								error_reporting(E_ALL ^ E_NOTICE);
								if(!isset($conexion)){
									include("conexion.php");
									$sql = "SELECT * FROM cuentas";
									$ejecutar = $conexion->query($sql);
									while($regs = $ejecutar->fetch_assoc()){
										echo "<tr>";
										echo "<td>".utf8_encode($regs["nombre_cuenta"])."</td>";
										if($regs["saldo_debe"]==0){
											echo "<td></td>";
										} else {
											echo "<td class='text-right'>".number_format($regs["saldo_debe"],2)."</td>";
										}
										if($regs["saldo_haber"]==0){
											echo "<td></td>";
										} else {
											echo "<td class='text-right'>".number_format($regs["saldo_haber"],2)."</td>";
										}
										
										echo "</tr>";
									}
									$sql = "SELECT SUM(saldo_debe) sumadebe, SUM(saldo_haber) sumahaber FROM cuentas";
									$ejecutar = $conexion->query($sql);
									echo "<tr>";
									while($reg = $ejecutar->fetch_assoc()){
										if($reg["sumadebe"]!=$reg["sumahaber"]){
											echo "<td class='danger'><strong>Totales:</strong> </td>";
											echo "<td class='text-right danger'><strong>".number_format($reg["sumadebe"],2)."</strong></td>";
											echo "<td class='text-right danger'><strong>".number_format($reg["sumahaber"],2)."</strong></td>";
										} else {
											echo "<td><strong>Totales:</strong> </td>";
											echo "<td class='text-right'><strong>".number_format($reg["sumadebe"],2)."</strong></td>";
											echo "<td class='text-right'><strong>".number_format($reg["sumahaber"],2)."</strong></td>";
										}
									}
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