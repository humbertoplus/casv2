<?php
/*~ Archivo agregar-usuario.php
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
	/* Realiza la conexión a la base de datos en caso de no estar realizada. */
	if(!isset($conexion)){
		include("conexion.php");
	} 

	/* Variables que vienen del formulario de creación de usuario. */
	$usuario = $_POST["usuario_txt"];
	$password = $_POST["password_txt"];
	$password2 = $_POST["password2_txt"];
	$tipo = $_POST["tipo_slc"];

	/* Verificamos que el usuario que se quiere crear no exista ya en la base de datos. */
	$consulta = "SELECT * FROM usuario WHERE usuario='$usuario'";
	$ejecutar_consulta = $conexion->query($consulta);
	$num_regs = $ejecutar_consulta->num_rows;

	/*Si no hay registros, el usuario no existe. */
	if($num_regs==0){

		/* Verificamos que la contraseñas contraseñas coincidan. */
		if($password==$password2){

			/* Si coinciden, guardamos la información en nuestra base de datos. */
			$consulta = "INSERT INTO usuario VALUES ('$usuario', SHA1('$password'), curdate(), '$tipo')";
			$ejecutar_consulta = $conexion->query($consulta);
			
			/* Si se ejecutó la consulta, redirigimos al archivo del formulario con una clave de que se ejecutó correctamente. */
			if($ejecutar_consulta){
				header("Location: crear-usuario.php?error=no&user=$usuario");
			}
		}
		/* Si no coinciden, solicitamos al usuario que las reescriba. */
		else
		{
			header("Location: crear-usuario.php?error=retype");
		}
		
	}
	/* Si existen registros, indicamos que el usuario a crear ya existe. */
	else
	{
		header("Location: crear-usuario.php?error=existe");
	}
?>