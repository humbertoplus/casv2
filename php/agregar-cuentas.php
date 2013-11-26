<?php
/*~ Archivo agregar-cuentas.php
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

/* Evita que aparezcan notificaciones en la página. */
error_reporting(E_ALL ^ E_NOTICE);

/* Verifica que la sesión esté iniciada. */
include("sesion.php");

/* Realiza la conexión a la base de datos en caso de no estar realizada. */
if(!isset($conexion)){
	include("conexion.php");
}


/* Variables del formulario de creación de grupo */

$naturaleza 			= $_POST["naturaleza_slc"];

$codigo_grupo 			= $_POST["naturaleza_slc"].".".$_POST["corr_grupo_txt"];

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

print_r($_POST);
echo "<br>";
echo $codigo_grupo;
?>