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