<?php
/*~ Archivo funciones.php
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

function asientos($conexion, $transaccion) {
	$sql = "SELECT id, DATE_FORMAT(fecha,'%d-%m-%Y')as fecha, cuenta, concepto, debe, haber FROM registro WHERE transaccion = $transaccion ORDER BY fecha ASC" ;
	$ex_query = $conexion->query($sql);
	if($ex_query->num_rows==0){
		return 0;
	}

	echo "<div>";
	echo "<h4><span class='label label-primary'>Asiento N°: ".$transaccion."</span>&nbsp;<small><a href='borrar-asiento.php?transaccion=".$transaccion."'>(Borrar asiento)</a></small></h4>";
	echo "<br />";
	echo "<div>";
	echo "<table class='table table-bordered table-condensed table-hover'>";
	echo "<thead>";
	echo "<tr>";
	echo "<th width='50' class='text-center'>ID</th>";
	echo "<th width='110' class='text-center'>Fecha</th>";
	echo "<th width='80' class='text-center'>Cuenta</th>";
	echo "<th width=500' class='text-center'>Descripción</th>";
	echo "<th width='100' class='text-center'>Debe</th>";
	echo "<th width='100' class='text-center'>Haber</th>";
	echo "<th width='100' class='text-center'>Diferencia</th>";
	echo "</tr>";
	echo "</thead>";
	echo "<tbody>";
	while ($regs = $ex_query->fetch_assoc()) {

		$id=$regs["id"];
		echo "<tr>";
		echo "<td align='center'><a class='label label-success' href='ver-asiento.php?id=$id'>".$regs["id"]."</td>";
		echo "<td>".$regs["fecha"]."</td>";
		echo "<td>".$regs["cuenta"]."</td>";
		echo "<td>".utf8_encode($regs["concepto"])."</td>";
		echo "<td align='right'>".$regs["debe"]."</td>";
		echo "<td align='right'>".$regs["haber"]."</td>";
		echo "<td></td>";
		echo "</tr>";


	}
	
	$sql = "SELECT SUM(debe) as sumadebe, SUM(haber) AS sumahaber FROM registro WHERE transaccion=$transaccion";
	$ex_query = $conexion->query($sql);
	while($regs = $ex_query->fetch_assoc()){
		$dif = $regs["sumadebe"]-$regs["sumahaber"];
		echo "<tr>";
		echo "<td colspan='4' class='text-right'>SUMAS</td>" ;
		echo "<td align='right'>$ ".number_format($regs["sumadebe"], 2)."</td>";
		echo "<td align='right'>$ ".number_format($regs["sumahaber"], 2)."</td>";
		if($dif!=0){
			echo "<td class='danger' align='right'><strong>$ ".number_format($dif, 2)."</strong></td>";
		} else{
			echo "<td></td>";
		}

		echo "</tr>";

		}
		echo "</tbody>";
		echo "</table>";
		echo "</div>";
		echo "</div>";	
		return 1;
	}

	function actualizarCuentas($conexion, $cuenta){
		$c = explode('.', $cuenta);
		if(isset($c[4])){
			//$sql = "SELECT SUM(debe) sumadebe, SUM(haber) sumahaber FROM registro WHERE cuenta='$cuenta'";
			$sql = "SELECT IFNULL((SELECT SUM(debe) FROM registro WHERE cuenta='$cuenta'),0) sumadebe, IFNULL((SELECT SUM(haber) FROM registro WHERE cuenta='$cuenta'),0 ) sumahaber";
			$ejecutar_consulta = $conexion->query($sql);
			while($regs = $ejecutar_consulta->fetch_assoc()){
				$saldo_debe = $regs["sumadebe"];
				$saldo_haber = $regs["sumahaber"];

				$update = "UPDATE subcuentas SET saldo_debe=$saldo_debe, saldo_haber=$saldo_haber WHERE codigo_subcuenta='$cuenta'";
				$ex_query = $conexion->query($update);
				if($ex_query){
					//echo "OK. <br>";
				}
			}
		}

		if(!isset($c[4])){
			//$sql = "SELECT SUM(debe) sumadebe, SUM(haber) sumahaber FROM registro WHERE cuenta='$cuenta'";
			$sql = "SELECT IFNULL((SELECT SUM(debe) FROM registro WHERE cuenta='$cuenta'),0) sumadebe, IFNULL((SELECT SUM(haber) FROM registro WHERE cuenta='$cuenta'),0 ) sumahaber";
			$ejecutar_consulta = $conexion->query($sql);
			if($ejecutar_consulta){
				while($regs = $ejecutar_consulta->fetch_assoc()){
					$saldo_debe = $regs["sumadebe"];
					$saldo_haber = $regs["sumahaber"];

					$update = "UPDATE cuentas SET saldo_debe=$saldo_debe, saldo_haber=$saldo_haber WHERE codigo_cuenta='$cuenta'";
					$ex_query = $conexion->query($update);
					if($ex_query){
						//echo "OK. <br>";
					}
				}
			}
		}
	}

	function generarMayor($conexion){
		$sql = "SELECT DISTINCTROW(cuenta) cuentas FROM registro";
		$ejecutar_consulta = $conexion->query($sql);
		while($regs = $ejecutar_consulta->fetch_assoc()){
			$cuenta = $regs["cuentas"];
			$c = explode('.', $cuenta);
			if(isset($c[4])){
				// Es subcuenta
				$info = "SELECT nombre_subcuenta, saldo_debe, saldo_haber FROM subcuentas WHERE codigo_subcuenta='$cuenta'";
				$exec = $conexion->query($info);
				while($registros = $exec->fetch_assoc()){
					$debe = $registros["saldo_debe"];
					$haber = $registros["saldo_haber"];
					$nombre = $registros["nombre_subcuenta"];
					$actualiza = "INSERT INTO `sic115`.`mayor`(`cuenta`, `nombre`, `debe`, `haber`) VALUES ('$cuenta', '$nombre', $debe, $haber) ON DUPLICATE KEY UPDATE debe=$debe, haber=$haber, nombre='$nombre'";
					$execute = $conexion->query($actualiza);
					if($execute){
						// echo "OK. <br>";
					}
				}

			} else {
				// Es cuenta
				$info = "SELECT nombre_cuenta, saldo_debe, saldo_haber FROM cuentas WHERE codigo_cuenta='$cuenta'";
				$exec = $conexion->query($info);
				while($registros = $exec->fetch_assoc()){
					$debe = $registros["saldo_debe"];
					$haber = $registros["saldo_haber"];
					$nombre = $registros["nombre_cuenta"];
					$actualiza = "INSERT INTO `sic115`.`mayor` (`cuenta`, `nombre`, `debe`, `haber`) VALUES ('$cuenta', '$nombre', $debe, $haber) ON DUPLICATE KEY UPDATE debe=$debe, haber=$haber, nombre='$nombre'";
					$execute = $conexion->query($actualiza);
					if($execute){
						// echo "OK. <br>";
					}
				}
			}

		}
	}

	function saldosCuentas($conexion, $cuentas){
		$sql = "SELECT IFNULL((SELECT SUM(saldo_debe) FROM subcuentas WHERE cuenta = '$cuentas'),0) sumadebe, IFNULL((SELECT SUM(saldo_haber) FROM subcuentas WHERE cuenta='$cuentas'),0) sumahaber;";
		$ejecutar_consulta = $conexion->query($sql);
		if($ejecutar_consulta->num_rows > 0 ){
			while ($regs = $ejecutar_consulta->fetch_assoc()) {
				$saldo_debe = $regs["sumadebe"];
				$saldo_haber = $regs["sumahaber"];
				//$cuenta = $regs["cuenta"];
				$consulta = "UPDATE cuentas SET saldo_debe=$saldo_debe, saldo_haber=$saldo_haber WHERE codigo_cuenta='$cuentas'";
				$ejecutar = $conexion->query($consulta);
				if($ejecutar_consulta){
					//echo "OK. <br>";
				}
			}
		}
	}

	function calculaPlanilla($conexion, $datos){
		$codigo = $datos["codigo_empleado_txt"];
		$primer_nombre = $datos["primernombre_txt"];
		$segundo_nombre = $datos["segundonombre_txt"];
		$primer_apellido = $datos["primerapellido_txt"];
		$segundo_apellido = $datos["segundoapellido_txt"];
		$cargo = $datos["cargos_slc"];
		$anios = $datos["aniostrabajados_txt"];
		$salario = $datos["salario_txt"];
		$isss_t = $salario*0.03;
		$isss_p = $salario*0.075;
		$afp_t = $salario*0.0625;
		$afp = $salario*0.0675;
		$sd = $salario/30;
		
		if($anios>=1){
			$dias=15;
		} else {
			$dias=0;
		}
		
		if($anios>=1 && anios<3){ 
			$aguinaldo = 10;
			} 
			elseif ($anios>=3&&$anios<10) {
				$aguinaldo = 15;
			} elseif ($anios >=10) {
				$aguinaldo = 18;
			}
		$vc = (($sd*$dias*1.3)+($sd*$dias*1.3)*1.4)/12;
		$ag = ($sd*$aguinaldo)/12;
		$salario_mensual = $salario+$isss_t+$afp_t+$vc+$ag;
		$amp = $isss+$afp;
		$psp = $salario_mensual+$amp;

		$sql = "INSERT INTO `sic115`.`empleados` 
		(`codigo_empleado`, `primer_nombre`, `segundo_nombre`, `primer_apellido`, `segundo_apellido`, `cargo`,
		 `salario_mensual_contratado`, `isss_trabajador`, `isss_patrono`, `afp_trabajador`, `afp_patrono`, `salario_diario`, 
		 `vacaciones`, `aguinaldo`, `salario_mensual`, `aportaciones_mensuales_patrono`, `pago_salario_patrono`) 
		VALUES ('$codigo', '$primer_nombre', '$segundo_nombre', '$primer_apellido', '$segundo_apellido', '$cargo', '$salario', 
			'$isss_t', '$isss_p', '$afp_t', '$afp', '$sd', '$vc', '$ag', '$salario_mensual', '$amp', '$psp')";
		$ejecutar_consulta = $conexion->query(utf8_decode($sql));
		if($ejecutar_consulta){
			return 1;
		}
		else {
			return 0;
		}
	}
?>