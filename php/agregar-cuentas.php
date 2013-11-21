<?php 

include("sesion.php");

if(!isset($conexion)){
	include("conexion.php");
}

/* Variables del formulario de creación de grupo */

$naturaleza 			= $_POST["naturaleza_slc"];

$codigo_grupo 			= $_POST["id_grupo_txt"];

$nombre_grupo 			= $_POST["nombre_grupo_txt"];

$descripcion 			= $_POST["descripcion_grupo_txa"];

/* Variables del formulario de creación de subgrupo */

$grupo 					= $_POST["grupos_slc"];

$codigo_subgrupo 		= $_POST["id_subgrupo_txt"];

$nombre_subgrupo 		= $_POST["nombre_subgrupo_txt"];

$descripcion_subgrupo 	= $_POST["descripcion_subgrupo_txa"];

/* Variables del formulario de creación de cuenta */

$subgrupo 				= $_POST["subgrupos_slc"];

$codigo_cuenta 			= $_POST["id_cuenta_txt"];

$nombre_cuenta 			= $_POST["nombre_cuenta_txt"];

$descripcion_cuenta 	= $_POST["descripcion_cuenta_txa"];

/* Variables del formulario de creación de subcuenta */

$cuenta 				= $_POST["cuentas_slc"];

$codigo_subcuenta 		= $_POST["id_subcuenta_txt"];

$nombre_subcuenta 		= $_POST["nombre_subcuenta_txt"];

$descripcion_subcuenta 	= $_POST["descripcion_subcuenta_txa"];


?>