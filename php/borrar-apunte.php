<?php
error_reporting(0);
if(!isset($conexion)){ include("conexion.php"); }
$id = $_GET["id"];
$sql = "DELETE FROM registro WHERE id='$id'";
?>