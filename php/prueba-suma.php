<?php 
include("funciones.php");
if(!isset($conexion)){ include("conexion.php");}

$sql = "SELECT DISTINCTROW(cuenta) cuentas FROM registro";
$ejecutar_consulta = $conexion->query($sql);
while($registro = $ejecutar_consulta->fetch_assoc()){
	actualizarCuentas($conexion, $registro["cuentas"]);
}
?>