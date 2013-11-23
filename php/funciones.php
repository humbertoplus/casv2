<?php 

function asientos($conexion, $transaccion){
	$sql = "SELECT DATE_FORMAT(fecha,'%d-%m-%Y')as fecha, cuenta, concepto, debe, haber FROM registro WHERE transaccion = $transaccion";
	$ex_query = $conexion->query($sql);
	//$fin = 0;
	echo "<h4>Asiento N°: ".$transaccion."</h4>";
	echo "<div>";
	echo "<table class='table table-hover table-condensed table-striped table-bordered'>";
	echo "<thead>";
	echo "<tr>";
	echo "<th>Fecha</th>";
	echo "<th>Cuenta</th>";
	echo "<th>Descripcion</th>";
	echo "<th>Debe</th>";
	echo "<th>Haber</th>";
	echo "<th>Diferencia</th>";
	echo "</tr>";
	echo "</thead>";
	echo "<tbody>";
	while ($regs = $ex_query->fetch_assoc()) {
		//echo $regs["fecha"]." | ".$regs["cuenta"]." | ".$regs["debe"]." | ".$regs["haber"]."<br />";
		//$fin = 0;
		echo "<tr>";
		echo "<td width='100'>".$regs["fecha"]."</td>";
		echo "<td width='80'>".$regs["cuenta"]."</td>";
		echo "<td width=500'>".utf8_encode($regs["concepto"])."</td>";
		echo "<td width='90'>".$regs["debe"]."</td>";
		echo "<td width='90'>".$regs["haber"]."</td>";
		echo "<td width='90'></td>";
		echo "</tr>";


	}
	
	//$fin=1;
	//if($fin==1){
		$sql = "SELECT SUM(debe) as sumadebe, SUM(haber) AS sumahaber FROM registro WHERE transaccion=$transaccion";
		$ex_query = $conexion->query($sql);
		while($regs = $ex_query->fetch_assoc()){
			$dif = $regs["sumadebe"]-$regs["sumahaber"];
			echo "<tr>";
			echo "<td colspan='3'>SUMAS</td>" ;
			echo "<td>".$regs["sumadebe"]."</td>";
			echo "<td>".$regs["sumahaber"]."</td>";
			if($dif!=0){
				echo "<td class='danger'>".$dif."</td>";
			} else{
				echo "<td></td>";
			}

			echo "</tr>";

		}
		echo "</tbody>";
		echo "</table>";
		echo "</div>";
	//}
	
	
}
?>