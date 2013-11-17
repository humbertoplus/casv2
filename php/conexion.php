<?php

	/**********************************************************************************************************************
	*	Archivo 'conexion.php'. Este archivo es parte del sistema contable C.A.S para la cátedra de Sistemas Contables.   *
	* 	Tiene permiso para usar este archivo bajo la licencia GPL v3. Todos los derechos reservados (C) 2013.		      *
	* 	Este archivo contiene la información del servidor y de la base de datos.                             		      *
	**********************************************************************************************************************/
?>

<?php
	function conectarse()
	{
		$servidor = "localhost";
		$usuario = "root";
		$password = "root";
		$bd = "sic115";

		$conectar = new mysqli($servidor, $usuario, $password, $bd);
		    return $conectar;
	}

	$conexion= conectarse();
?>