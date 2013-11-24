<?php 

function asientos($conexion, $transaccion){
	$sql = "SELECT DATE_FORMAT(fecha,'%d-%m-%Y')as fecha, cuenta, concepto, debe, haber FROM registro WHERE transaccion = $transaccion ORDER BY fecha ASC" ;
	$ex_query = $conexion->query($sql);
	//$fin = 0;
	echo "<div>";
	echo "<h4><span class='label label-primary'>Asiento N°: ".$transaccion."</span></h4>";
	echo "<br />";
	echo "<div>";
	echo "<table class='table table-bordered table-condensed table-hover'>";
	echo "<thead>";
	echo "<tr>";
	echo "<th class='text-center'>Fecha</th>";
	echo "<th class='text-center'>Cuenta</th>";
	echo "<th class='text-center'>Descripción</th>";
	echo "<th class='text-center'>Debe</th>";
	echo "<th class='text-center'>Haber</th>";
	echo "<th class='text-center'>Diferencia</th>";
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
		echo "<td width='90' align='right'>".$regs["debe"]."</td>";
		echo "<td width='90' align='right'>".$regs["haber"]."</td>";
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
			echo "<td colspan='3' class='text-right'>SUMAS</td>" ;
			echo "<td align='right'>".$regs["sumadebe"]."</td>";
			echo "<td align='right'>".$regs["sumahaber"]."</td>";
			if($dif!=0){
				echo "<td class='danger' align='right'>".$dif."</td>";
			} else{
				echo "<td></td>";
			}

			echo "</tr>";

		}
		echo "</tbody>";
		echo "</table>";
		echo "</div>";
		echo "</div>";
	//}
	
	
}
?>