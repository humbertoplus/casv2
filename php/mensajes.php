<?php 
error_reporting(0);
if($_GET["error"]=="acceso-denegado"){
	echo "<div class='alert alert-danger alert-dismissable'>";
	echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
	echo "<strong>¡Acceso Denegado!</strong> Usted no tiene permiso para utilizar esta función.";
	echo "</div>";
}
?>