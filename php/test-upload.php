<?php 
$justificante       = $_FILES["archivo_fls"]["tmp_name"];
$destino            = "../justificantes/".$_FILES["archivo_fls"]["name"];
echo $justificante;
echo "<br>";
echo $destino."<br>";

if(!empty($justificante)){
	move_uploaded_file($justificante, $destino);
	echo "<a href='$destino'>Descargar</a>";
} else {
	$destino = "null";
	echo "No hay archivo para esto.";
}
?>