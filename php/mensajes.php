<?php
/*~ Archivo mensajes.php
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
error_reporting(0);
if($_GET["error"]=="acceso-denegado"){
	echo "<div class='alert alert-danger alert-dismissable'>";
	echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
	echo "<strong>¡Acceso Denegado!</strong> Usted no tiene permiso para utilizar esta función.";
	echo "</div>";
}
?>