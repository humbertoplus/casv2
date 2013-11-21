<?php 
include("sesion.php");
if(!isset($conexion)){
	include("conexion.php");
}
error_reporting(E_ALL ^ E_NOTICE);
$consulta = "SELECT * FROM grupos;";
$ejecutar_consulta = $conexion->query($consulta);
while($registro = $ejecutar_consulta->fetch_assoc()){
	echo "<option value='";
	echo $registro["codigo_grupo"];
	echo "'";
	if($_GET["grupos_slc"]==$registro["codigo_grupo"]){
		echo " selected";
	}
	echo ">" . $registro["codigo_grupo"].". ".utf8_encode($registro["nombre_grupo"])."</option>";
}
?>