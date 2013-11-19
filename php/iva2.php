<?php
/*~ Archivo iva2.php
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
    error_reporting(E_ALL ^ E_NOTICE);
    include("conexion.php"); 
    $nuevo_iva = $_POST["n_iva_txt"];
    if($nuevo_iva<0 || $nuevo_iva>1){
        header("Location: iva.php?error=invalido");
        } else{
        	$consulta="UPDATE iva SET iva='$nuevo_iva'";
        	$ejecutar_consulta=$conexion->query($consulta);
        	
            if($ejecutar_consulta){
        		header("Location: iva.php?error=no&iva=$nuevo_iva");
        	}
        }
?>