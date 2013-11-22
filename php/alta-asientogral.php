<?php 
include("sesion.php");
// Variables del formulario de creación de asiento general.

$n_asiento 			= $_POST["n_asiento_txt"];
$fecha 				= $_POST["fecha_txt"];
$cuenta 			= $_POST["cuentas_slc"];
$subcuenta 			= $_POST["subcuentas_slc"];
$concepto 			= $_POST["concepto_txt"];
$debe 				= $_POST["debe_txt"];
$haber 				= $_POST["haber_txt"];
$explicacion 		= $_POST["exp_txa"];
$usuario 			= $_SESSION["usuario"];

$a = explode("-", $fecha);
$b = $a[0];

if(!isset($conexion)){
	include("conexion.php");
}

$sql = "SELECT anio_contable FROM anio_contable WHERE anio_contable='$b'";
$ejecutar_consulta = $conexion->query($sql);
$num_regs = $ejecutar_consulta->num_rows;

if($num_regs!=0){
	if($subcuenta!=0){
		$ip = $_SERVER["HTTP_CLIENT_IP"];
		if(!$ip) {$ip = $_SERVER["REMOTE_ADDR"];}
		$sql = "INSERT INTO `sic115`.`registro`( `fecha`, `transaccion`, `cuenta`, `concepto`, `debe`, `haber`, `descripcion`, `partida_doble`, `fecha_modificacion`, `usuario_creacion`, `usuario_modif`, `ip`) VALUES ('$fecha', '$n_asiento', '$subcuenta', '$concepto', '$debe', '$haber', '$explicacion', null, null, '$usuario', null, '$ip')";
		$ejecutar_consulta = $conexion->query($sql);
		if($ejecutar_consulta){
			header("Location: asiento-general.php?mensaje=si");
		}
	}
	else if($subcuenta==0) {
		$ip = $_SERVER["HTTP_CLIENT_IP"];
		if(!$ip) {$ip = $_SERVER["REMOTE_ADDR"];}
		$sql = "INSERT INTO `sic115`.`registro`( `fecha`, `transaccion`, `cuenta`, `concepto`, `debe`, `haber`, `descripcion`, `partida_doble`, `fecha_modificacion`, `usuario_creacion`, `usuario_modif`, `ip`) VALUES ('$fecha', '$n_asiento', '$cuenta', '$concepto', '$debe', '$haber', '$explicacion', null, null, '$usuario', null, '$ip')";
		$ejecutar_consulta = $conexion->query($sql);
		if($ejecutar_consulta){
			header("Location: asiento-general.php?mensaje=si");
		}
	}
}

?>