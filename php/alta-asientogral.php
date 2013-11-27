<?php
/*~ Archivo alta-asientogral.php
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
/* Verifica que la sesión esté iniciada */
include("sesion.php");

/* Variables que vienen del formulario de nuevo asiento general. */

$n_asiento 			= $_POST["n_asiento_txt"];
$fecha 				= $_POST["fecha_txt"];
$cuenta 			= $_POST["cuentas_slc"];
$subcuenta 			= $_POST["subcuentas_slc"];
$concepto 			= $_POST["concepto_txt"];
$debe 				= $_POST["debe_txt"];
$haber 				= $_POST["haber_txt"];
$explicacion 		= $_POST["exp_txa"];

/* Variable para determinar el usuario que está logueado en el sistema. */ 
$usuario 			= $_SESSION["usuario"];


/* Convertimos la fecha ingresada en un vector de cadenas sin los símbolos '-' */
$a = explode("-", $fecha);

$fecha_valida = checkdate($a[1], $a[2], $a[0]);

if($fecha_valida){
	/* Extraemos el año del vector que se acaba de crear, se almacena en la primera posición del vector puesto que la fecha se ingresa en el formato aaaa-mm-dd. */
	$b = $a[0];

	/* Realiza la conexión en caso de no estar realizada. */
	if(!isset($conexion)){ include("conexion.php"); }

	/* Verificamos que el año de la fecha ingresada sea igual al año contable registrado en el sistema. */
	$sql = "SELECT anio_contable FROM anio_contable WHERE anio_contable='$b'";
	$ejecutar_consulta = $conexion->query($sql);
	$num_regs = $ejecutar_consulta->num_rows;
	
	/* Si existen registros, el año introducido es el año contable, y se podría realizar el asiento. */
	if($num_regs!=0){
		
		/* Verificamos que exista una subcuenta a la cual hacer el registro. */
		if($subcuenta!=0){
			$ip = $_SERVER["HTTP_CLIENT_IP"];
			if(!$ip) {$ip = $_SERVER["REMOTE_ADDR"];}
			$sql = "INSERT INTO `sic115`.`registro`( `fecha`, `transaccion`, `cuenta`, `concepto`, `debe`, `haber`, `descripcion`, `partida_doble`, `fecha_modificacion`, `usuario_creacion`, `usuario_modif`, `ip`) VALUES ('$fecha', '$n_asiento', '$subcuenta', '$concepto', '$debe', '$haber', '$explicacion', null, null, '$usuario', null, '$ip')";
			$ejecutar_consulta = $conexion->query(utf8_decode($sql));
			if($ejecutar_consulta){
				header("Location: asiento-general.php?error=no");
			}
		}

		/* Si el usuario no ingresó una subcuenta, verificamos que la cuenta ingresada no posea subcuentas. */
		else if($subcuenta==0) {
			$sql = "SELECT tiene_subcuenta FROM cuentas WHERE codigo_cuenta = '$cuenta'";
			$ejecutar_consulta = $conexion->query($sql);
			$res = $ejecutar_consulta->fetch_assoc();

			/* Si no existen subcuentas relacionadas con la cuenta, hacemos el asiento. */
			if($res["tiene_subcuenta"] == "No"){
				$ip = $_SERVER["HTTP_CLIENT_IP"];
				if(!$ip) {$ip = $_SERVER["REMOTE_ADDR"];}
				$sql = "INSERT INTO `sic115`.`registro`( `fecha`, `transaccion`, `cuenta`, `concepto`, `debe`, `haber`, `descripcion`, `partida_doble`, `fecha_modificacion`, `usuario_creacion`, `usuario_modif`, `ip`) VALUES ('$fecha', '$n_asiento', '$cuenta', '$concepto', '$debe', '$haber', '$explicacion', null, null, '$usuario', null, '$ip')";
				$ejecutar_consulta = $conexion->query(utf8_decode($sql));
				if($ejecutar_consulta){
					header("Location: asiento-general.php?error=no");
				}

			/*Si existen subcuentas relacionadas a la cuenta ingresada, solicitamos al usuario que indique una subcuenta. */	
			} else if($res["tiene_subcuenta"]=="Si"){
				header("Location: asiento-general.php?error=subcuenta");
			}
				
		}

		/* El año contable difiere del año ingresado. */
		} else{
			header("Location: asiento-general.php?error=anio");
		}

	} else {
		header("Location: asiento-general.php?error=fecha-invalida");
	}

?>