<?php 
include("conexion.php");
include("funciones.php");
$sql = "SELECT codigo_cuenta FROM cuentas";
$ejecutar = $conexion->query($sql);
if($ejecutar->num_rows > 0){
	while ($regs = $ejecutar->fetch_assoc()) {
		//echo $regs["codigo_cuenta"]."<br>";
		saldosCuentas($conexion, $regs["codigo_cuenta"]);
	}
}

?>