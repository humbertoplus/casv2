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

$tipo = $_POST["tipo_hdn"];

/* Variables del formulario de creación de grupo */

$naturaleza 			= $_POST["naturaleza_slc"];

$codigo_grupo 			= $naturaleza.".".$_POST["corr_grupo_txt"];

$nombre_grupo 			= $_POST["nombre_grupo_txt"];

$descripcion 			= $_POST["descripcion_grupo_txa"];

/* Variables del formulario de creación de subgrupo */

$grupo 					= $_POST["grupos_slc"];

$codigo_subgrupo 		= $grupo.".".$_POST["corr_subgrupo_txt"];

$nombre_subgrupo 		= $_POST["nombre_subgrupo_txt"];

$descripcion_subgrupo 	= $_POST["descripcion_subgrupo_txa"];

/* Variables del formulario de creación de cuenta */

$subgrupo 				= $_POST["subgrupos_slc"];

$codigo_cuenta 			= $subgrupo.".".$_POST["corr_cuenta_txt"];

$tiene_subcuenta 	= $_POST["subctas_slc"];

$nombre_cuenta 			= $_POST["nombre_cuenta_txt"];

$descripcion_cuenta 	= $_POST["descripcion_cuenta_txa"];

/* Variables del formulario de creación de subcuenta */

$cuenta 				= $_POST["cuentas_slc"];

$codigo_subcuenta 		= $cuenta.".".$_POST["corr_subcuenta_txt"];

$nombre_subcuenta 		= $_POST["nombre_subcuenta_txt"];

$descripcion_subcuenta 	= $_POST["descripcion_subcuenta_txa"];

switch ($tipo) {
	case '1':
		$sql = "SELECT * FROM grupos WHERE codigo_grupo='$codigo_grupo'";
		$ejecutar_consulta = $conexion->query($sql);
		if($ejecutar_consulta->num_rows > 0){
			$mensaje = "Ya existe un grupo con el código <strong>".$codigo_grupo."</strong>";
			header("Location: alta-cuentas.php?error=si&mensaje=$mensaje");
		} else {
			$sql = "INSERT INTO `sic115`.`grupos` (`codigo_grupo`, `nombre_grupo`, `descripcion`, `clasificacion`) VALUES ('$codigo_grupo', '$nombre_grupo', '$descripcion', '$naturaleza')";
			$ejecutar_consulta = $conexion->query(utf8_decode($sql));
			if($ejecutar_consulta){
				$mensaje = "Se ha dado de alta al grupo: <strong>".$codigo_grupo."</strong>.";
				header("Location: alta-cuentas.php?error=no&mensaje=$mensaje");
			}
		}
		break;
	
	case '2':
		$sql = "SELECT * FROM subgrupos WHERE codigo_subgrupo='$codigo_subgrupo'";
		$ejecutar_consulta = $conexion->query($sql);
		if($ejecutar_consulta->num_rows>0){
			$mensaje = "Ya existe un subgrupo con el código <strong>".$codigo_subgrupo."</strong>";
			header("Location: alta-cuentas.php?error=si&mensaje=$mensaje");
		} else {
			$sql = "INSERT INTO `sic115`.`subgrupos` (`codigo_subgrupo`, `nombre_subgrupo`, `descripcion`, `grupo`) VALUES ('$codigo_subgrupo', '$nombre_subgrupo', '$descripcion_subgrupo', '$grupo')";
			$ejecutar_consulta = $conexion->query(utf8_decode($sql));
			if($ejecutar_consulta){
				$mensaje = "Se ha dado de alta al subgrupo: <strong>".$codigo_subgrupo."</strong>.";
				header("Location: alta-cuentas.php?error=no&mensaje=$mensaje");
			}
		}
		break;
	
	case '3':
		$sql = "SELECT * FROM cuentas WHERE codigo_cuenta='$codigo_cuenta'";
		$ejecutar_consulta = $conexion->query($sql);
		if($ejecutar_consulta->num_rows>0){
			$mensaje = "Ya existe una cuenta con el código <strong>".$codigo_cuenta."</strong>";
			header("Location: alta-cuentas.php?error=si&mensaje=$mensaje");
		} else {
			$sql = "INSERT INTO `sic115`.`cuentas` (`codigo_cuenta`, `subgrupo`, `nombre_cuenta`, `tiene_subcuenta`, `descripcion_cuenta`, `saldo_debe`, `saldo_haber`) VALUES ('$codigo_cuenta', '$subgrupo', '$nombre_cuenta', '$tiene_subcuenta', '$descripcion_cuenta', 0.00, 0.00)";
			$ejecutar_consulta = $conexion->query(utf8_decode($sql));
			if($ejecutar_consulta){
				$mensaje = "Se ha dado de alta la cuenta: <strong>".$codigo_cuenta."</strong>.";
				header("Location: alta-cuentas.php?error=no&mensaje=$mensaje");
			}
		}
		break;
	
	case '4':
	print_r($_POST);
		$sql = "SELECT * FROM subcuentas WHERE codigo_subcuenta='$codigo_subcuenta'";
		$ejecutar_consulta = $conexion->query($sql);
		if($ejecutar_consulta->num_rows>0){
			$mensaje = "Ya existe una subcuenta con el código <strong>".$codigo_subcuenta."</strong>";
			header("Location: alta-cuentas.php?error=si&mensaje=$mensaje");
		} else {
			$sql = "INSERT INTO `sic115`.`subcuentas` (`codigo_subcuenta`, `cuenta`, `nombre_subcuenta`, `descripcion`, `saldo_debe`, `saldo_haber`) VALUES ('$codigo_subcuenta', '$cuenta', '$nombre_subcuenta', '$descripcion_subcuenta', 0.00, 0.00)";
			$ejecutar_consulta = $conexion->query(utf8_decode($sql));
			if($ejecutar_consulta){
				$mensaje = "Se ha dado de alta la subcuenta: <strong>".$codigo_subcuenta."</strong>.";
				header("Location: alta-cuentas.php?error=no&mensaje=$mensaje");
			} else{
				echo "ERROR";
			}
		}
		break;
}

?>