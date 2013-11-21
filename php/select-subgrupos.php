<?php 
include("sesion.php");
//include("conexion.php");
error_reporting(E_ALL ^ E_NOTICE);
$consulta = "SELECT * FROM subgrupos";
$ejecutar_consulta = $conexion->query($consulta);
while($registro = $ejecutar_consulta->fetch_assoc()){
	echo "<option value='";
	echo $registro["codigo_subgrupo"];
	echo "'";
	if($_GET["subgrupos_slc"]==$registro["codigo_subgrupo"]){
		echo " selected";
	}
	echo ">".$registro["codigo_subgrupo"].". ".utf8_encode($registro["nombre_subgrupo"])."</option>";
}
?>