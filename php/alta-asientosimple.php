<?php
/*~ Archivo alta-asientosimple.php
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
$tipoasiento = $_POST["tipoasiento_hdn"];
$transaccion = $_POST["asiento_txt"];
$fecha = $_POST["fecha_txt"];
$cuenta = $_POST["cuentasdebe_slc"];
$subcuenta = $_POST["subcuentasdebe_slc"];
$cuenta_pd = $_POST["cuentashaber_slc"];
$subcuenta_pd = $_POST["subcuentashaber_slc"];
$concepto = $_POST["concepto_txt"];
$importe = $_POST["importe_txt"];
$descripcion = $_POST["exp_txa"];
$usuario = $_SESSION["usuario"];

$a = explode("-", $fecha);

$fecha_valida = checkdate($a[1], $a[2], $a[0]);

if($fecha_valida){
	$b = $a[0];

	if(!isset($conexion)){
		include("conexion.php");
	}

	$sql = "SELECT anio_contable from anio_contable WHERE anio_contable='$b'";
	$ejecutar_consulta = $conexion->query($sql);
	$num_regs = $ejecutar_consulta->num_rows;
	$ok1 = "false";
	$ok2 = "false";
	if($num_regs==0){
		$mensaje = "El año de la fecha del asiento difiere con el año contable.";
		header("Location: asiento-simple.php?mensaje=$mensaje&error=si");
	} else {
		if($subcuenta==0){
			$sql = "SELECT tiene_subcuenta FROM cuentas WHERE codigo_cuenta='$cuenta'";
			$ejecutar_consulta = $conexion->query($sql);
			$reg = $ejecutar_consulta->fetch_assoc();
			if($reg["tiene_subcuenta"]=="Si"){
				$mensaje = "Error, la cuenta en el debe tiene subcuentas, debe seleccionar una.";
				header("Location: asiento-simple.php?mensaje=$mensaje&error=si");
			} else {
				$ok1 = "true";
			}

			if($subcuenta_pd==0){
				$sql = "SELECT tiene_subcuenta FROM cuentas WHERE codigo_cuenta='$cuenta_pd'";
				$ejecutar_consulta = $conexion->query($sql);
				$reg = $ejecutar_consulta->fetch_assoc();
				if($reg["tiene_subcuenta"]=="Si"){
					$mensaje = "Error, la cuenta en el haber tiene subcuentas, debe seleccionar una.";
					header("Location: asiento-simple.php?mensaje=$mensaje&error=si");
				} else {
					$ok2 = "true";
				}
			} else {
				$ok2 = "true";
			}
		} else {
			$ok1 = "true";
			if($subcuenta_pd==0){
				$sql = "SELECT tiene_subcuenta FROM cuentas WHERE codigo_cuenta='$cuenta_pd'";
				$ejecutar_consulta = $conexion->query($sql);
				$reg = $ejecutar_consulta->fetch_assoc();
				if($reg["tiene_subcuenta"]=="Si"){
					$mensaje = "Error, la cuenta en el haber tiene subcuentas, debe seleccionar una.";
					header("Location: asiento-simple.php?mensaje=$mensaje&error=si");
				} else {
					$ok2 = "true";
				}
			} else {
				$ok2 = "true";
			}
		}
	}

	if($ok1=="true" && $ok2=="true"){
		//echo "Todo blue!";
		//echo "<br>";
		if($subcuenta==0){
			// echo "Metemos la info del debe en la BD afectando a la CUENTA. <br>";
			$ip = $_SERVER["HTTP_CLIENT_IP"];
			if(!$ip) { $ip = $_SERVER["REMOTE_ADDR"]; }
			$sql = "INSERT INTO `sic115`.`registro` (`fecha`, `transaccion`,`tipo`, `cuenta`, `concepto`, `debe`, `haber`, `descripcion`, `partida_doble`, `fecha_modificacion`, `usuario_creacion`, `usuario_modif`, `ip`) VALUES ('$fecha', '$transaccion', '$tipoasiento', '$cuenta', '$concepto', '$importe', 0.00, '$descripcion', null, null, '$usuario', null, '$ip')";
			$ejecutar_consulta = $conexion->query(utf8_decode($sql));
			if($ejecutar_consulta){
				$mensaje = "Se ha dado de alta al asiento exitosamente.";
				header("Location: asiento-simple.php?mensaje=$mensaje&error=no");
			}
		} else {
			//echo "Metemos la info del debe en la BD afectando a la SUBCUENTA. <br>";
			$ip = $_SERVER["HTTP_CLIENT_IP"];
			if(!$ip) { $ip = $_SERVER["REMOTE_ADDR"]; }
			$sql = "INSERT INTO `sic115`.`registro` (`fecha`, `transaccion`, `tipo`, `cuenta`, `concepto`, `debe`, `haber`, `descripcion`, `partida_doble`, `fecha_modificacion`, `usuario_creacion`, `usuario_modif`, `ip`) VALUES ('$fecha', '$transaccion', '$tipoasiento', '$subcuenta', '$concepto', '$importe', 0.00, '$descripcion', null, null, '$usuario', null, '$ip')";
			$ejecutar_consulta = $conexion->query(utf8_decode($sql));
			if($ejecutar_consulta){
				$mensaje = "Se ha dado de alta al asiento exitosamente.";
				header("Location: asiento-simple.php?mensaje=$mensaje&error=no");
			}
		}

		if($subcuenta_pd==0){
			//echo "Metemos la info del haber en la BD afectando a la CUENTA. <br>";
			$ip = $_SERVER["HTTP_CLIENT_IP"];
			if(!$ip) { $ip = $_SERVER["REMOTE_ADDR"]; }
			$sql = "INSERT INTO `sic115`.`registro` (`fecha`, `transaccion`, `tipo`, `cuenta`, `concepto`, `debe`, `haber`, `descripcion`, `partida_doble`, `fecha_modificacion`, `usuario_creacion`, `usuario_modif`, `ip`) VALUES ('$fecha', '$transaccion', '$tipoasiento', '$cuenta_pd', '$concepto', 0.00, '$importe', '$descripcion', null, null, '$usuario', null, '$ip')";
			$ejecutar_consulta = $conexion->query(utf8_decode($sql));
			if($ejecutar_consulta){
				$mensaje = "Se ha dado de alta al asiento exitosamente.";
				header("Location: asiento-simple.php?mensaje=$mensaje&error=no");
			}
		} else {
			//echo "Metemos la info del haber en la BD afectando a la SUBCUENTA. <br>";
			$ip = $_SERVER["HTTP_CLIENT_IP"];
			if(!$ip) { $ip = $_SERVER["REMOTE_ADDR"]; }
			$sql = "INSERT INTO `sic115`.`registro` (`fecha`, `transaccion`, `tipo`, `cuenta`, `concepto`, `debe`, `haber`, `descripcion`, `partida_doble`, `fecha_modificacion`, `usuario_creacion`, `usuario_modif`, `ip`) VALUES ('$fecha', '$transaccion', '$tipoasiento', '$subcuenta_pd', '$concepto', 0.00, '$importe', '$descripcion', null, null, '$usuario', null, '$ip')";
			$ejecutar_consulta = $conexion->query(utf8_decode($sql));
			if($ejecutar_consulta){
				$mensaje = "Se ha dado de alta al asiento exitosamente.";
				header("Location: asiento-simple.php?mensaje=$mensaje&error=no");
			}
		}
	}
} else {
	$mensaje = "Debe ingresar una fecha válida.";
	header("Location: asiento-simple.php?mensaje=$mensaje&error=si");
}


?>