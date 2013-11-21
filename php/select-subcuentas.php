<?php
include("sesion.php");
if(!isset($conexion)){
	include("conexion.php");
}
$cuenta = $_GET["opc"];
error_reporting(E_ALL ^ E_NOTICE);
$consulta = "SELECT * FROM subcuentas WHERE cuenta = '$cuenta'";
$ejecutar_consulta = $conexion->query($consulta);
while($registro = $ejecutar_consulta->fetch_assoc()){
	echo "<option value='";
	echo $registro["codigo_subcuenta"];
	echo "'";
	if($_GET["subcuentas_slc"]==$registro["codigo_subcuenta"]){
		echo " selected";
	}
	echo ">".$registro["codigo_subcuenta"].". ".utf8_encode($registro["nombre_subcuenta"])."</option>";
}
?>