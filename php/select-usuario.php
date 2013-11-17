<?php 
//Incluyo el archivo de la conexión a la BD
include("sesion.php");
include("conexion.php");
error_reporting(E_ALL ^ E_NOTICE);
$consulta = "SELECT usuario FROM usuario ORDER BY usuario";
//Ejecuto el query
$ejecutar_consulta = $conexion->query($consulta);
//Con un while recorro todos los registros generados de la consulta anterior
//Construyo las opciones del select de forma dinámica con los registros de la consulta
while ($registro = $ejecutar_consulta->fetch_assoc()) {
	echo "<option value='".utf8_encode($registro["usuario"])."'";
	if($_GET["usuario_slc"]==$registro["usuario"])
	{
		echo " selected";
	}
	echo ">" . utf8_encode($registro["usuario"])."</option>";
}
// $conexion->close();
?>