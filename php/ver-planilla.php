<?php
/*~ Archivo ver-planilla.php
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
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<meta name="description" content="Este es un sistema de contabilidad basado en la web, para administrar los procesos contables de la empresa dedicada a la elaboración de vinos en El Salvador. "/>
	<link rel="stylesheet" href="../css/bootstrap.min.css"/>
	<link rel="stylesheet" href="../css/estilos.css"/>
	<link rel="shortcut icon" type="image/x-icon" href="../favicon.ico" />
	<script>
	    !window.jQuery && document.write("<script src='../js/jquery.min.js'><\/script>");
	</script>
	<title>C.A.S | Planilla de Empleados</title>
</head>
<body style='background:#C2E7F5'>
	<?php 
		include("sesion.php");
		if(!$_COOKIE["sesion"]){
			header("Location: salir.php");
		}
		if($_SESSION["tipo"]=="estandar"){
		header("Location: home.php?error=acceso-denegado");
	}
	?>
	<?php include("nav.php"); ?>
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<h1>Vinos Nonualcos y Cía. S.A</h1>
				<h2>Planilla de empleados</h2>
			</div>
			<br><br>
			<table class='table table-bordered table-striped table-hover'>
				<thead>
					<tr>
						<th class="text-center">Empleado</th>
						<th class="text-center">Cargo</th>
						<th class="text-center">SM</th>
						<th class="text-center">ISSS*</th>
						<th class="text-center">ISSS</th>
						<th class="text-center">AFP*</th>
						<th class="text-center">AFP</th>
						<th class="text-center">SD</th>
						<th class="text-center">VC</th>
						<th class="text-center">AG</th>
						<th class="text-center">SMT</th>
						<th class="text-center">AMP</th>
						<th class="text-center">Salario</th>
					</tr>
				</thead>
				<tbody>
					
						<?php 
						if(!isset($conexion)) { include("conexion.php");}
						$sql = "SELECT * FROM empleados";
						$ejecutar_consulta = $conexion->query($sql);
						if($ejecutar_consulta->num_rows > 0){
							while ($reg = $ejecutar_consulta->fetch_assoc()) {
								echo "<tr align='right'>";
								echo "<td align='left'>".utf8_encode($reg["primer_nombre"])." ".utf8_encode($reg["primer_apellido"])."</td>";
								echo "<td align='left'>".utf8_encode($reg["cargo"])."</td>";
								echo "<td>".number_format($reg["salario_mensual_contratado"],2)."</td>";
								echo "<td>".number_format($reg["isss_trabajador"],2)."</td>";
								echo "<td>".number_format($reg["isss_patrono"],2)."</td>";
								echo "<td>".number_format($reg["afp_trabajador"],2)."</td>";
								echo "<td>".number_format($reg["afp_patrono"],2)."</td>";
								echo "<td>".number_format($reg["salario_diario"],2)."</td>";
								echo "<td>".number_format($reg["vacaciones"],2)."</td>";
								echo "<td>".number_format($reg["aguinaldo"],2)."</td>";
								echo "<td>".number_format($reg["salario_mensual"],2)."</td>";
								echo "<td>".number_format($reg["aportaciones_mensuales_patrono"],2)."</td>";
								echo "<td>".number_format($reg["pago_salario_patrono"],2)."</td>";
								echo "</tr>";
							}
						}
						?>
						<?php 
						$sql = "SELECT sum(pago_salario_patrono) total FROM empleados";
						$ejecutar_consulta = $conexion->query($sql);
						$total = $ejecutar_consulta->fetch_assoc();
						?>
						<tr>
							<td colspan="12" class="text-right"><strong>Total salarios:</strong></td>
							<td class="text-right"><?php echo number_format($total["total"],2); ?></td>
						</tr>
				</tbody>
			</table>
			<br><br><br><hr>
			<div class="col-lg-6">
				<h3>Leyenda:</h3>
				<br>
				<div class="col-lg-6">
					<p><strong>SM: </strong>Salario Mensual</p>
					<p><strong>ISSS*: </strong>ISSS empleado</p>
					<p><strong>ISSS: </strong>ISSS Patrono</p>
					<p><strong>AFP*: </strong>AFP empleado</p>
					<p><strong>AFP: </strong>AFP Patrono</p>
				</div>
				<div class="col-lg-6 pull-left">
					<p><strong>SD: </strong>Salario Diario</p>
					<p><strong>VC: </strong>Vacaciones</p>
					<p><strong>AG: </strong>Aguinaldo</p>
					<p><strong>SMT: </strong>Salario mensual trabajador</p>
					<p><strong>AMP: </strong>Aportaciones Mensuales Patrono</p>
				</div>
			</div>
		</div>
	
	<?php include("footer.php"); ?>
	
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/jquery.min.js"></script>
</body>
</html>

