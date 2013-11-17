<?php 
	include("conexion.php");
	$consulta = "INSERT INTO usuario VALUES 
									('administrador', SHA1('admin'), '2013-01-10', 'administrador'),
									('alexander', SHA1('vigilrossi'), '2011-08-01','estandar')";
	$ejecutar_consulta = $conexion->query($consulta);
?>