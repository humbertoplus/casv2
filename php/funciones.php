<?php 

function asientos($conexion, $transaccion) {
	$sql = "SELECT id, DATE_FORMAT(fecha,'%d-%m-%Y')as fecha, cuenta, concepto, debe, haber FROM registro WHERE transaccion = $transaccion ORDER BY fecha ASC" ;
	$ex_query = $conexion->query($sql);
	if($ex_query->num_rows==0){
		return;
	}

	echo "<div>";
	echo "<h4><span class='label label-primary'>Asiento N°: ".$transaccion."</span></h4>";
	echo "<br />";
	echo "<div>";
	echo "<table class='table table-bordered table-condensed table-hover'>";
	echo "<thead>";
	echo "<tr>";
	echo "<th class='text-center'>ID</th>";
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

		$id=$regs["id"];
		echo "<tr>";
		echo "<td width='50' align='center'><a class='label label-danger' href='ver-asiento.php?id=$id'>".$regs["id"]."</td>";
		echo "<td width='100'>".$regs["fecha"]."</td>";
		echo "<td width='80'>".$regs["cuenta"]."</td>";
		echo "<td width=500'>".utf8_encode($regs["concepto"])."</td>";
		echo "<td width='90' align='right'>".$regs["debe"]."</td>";
		echo "<td width='90' align='right'>".$regs["haber"]."</td>";
		echo "<td width='90'></td>";
		echo "</tr>";


	}
	
	$sql = "SELECT SUM(debe) as sumadebe, SUM(haber) AS sumahaber FROM registro WHERE transaccion=$transaccion";
	$ex_query = $conexion->query($sql);
	while($regs = $ex_query->fetch_assoc()){
		$dif = $regs["sumadebe"]-$regs["sumahaber"];
		echo "<tr>";
		echo "<td colspan='4' class='text-right'>SUMAS</td>" ;
		echo "<td align='right'>$ ".number_format($regs["sumadebe"], 2)."</td>";
		echo "<td align='right'>$ ".number_format($regs["sumahaber"], 2)."</td>";
		if($dif!=0){
			echo "<td class='danger' align='right'><strong>$ ".number_format($dif, 2)."</strong></td>";
		} else{
			echo "<td></td>";
		}

		echo "</tr>";

		}
		echo "</tbody>";
		echo "</table>";
		echo "</div>";
		echo "</div>";	
	}
?>