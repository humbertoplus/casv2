<?php 
require_once("conexion.php");
//print_r ($_GET);
$id_cuenta = $_GET["id"];
$sql = "SELECT * FROM subcuentas WHERE cuenta = '$id_cuenta'";
$res = $conexion->query($sql);
?>
<label for="subcuentas" class="control-label">Seleccionar Subcuenta</label>
	<select name="subcuentas_slc" id="subcuentas" class="form-control">
		<option value="">Seleccione Subcuenta</option>
		<?php 
			while($reg = $res->fetch_assoc()){
				?>
				<option value="<?php echo $reg["codigo_subcuenta"]; ?>"><?php echo $reg["codigo_subcuenta"] .". ". utf8_encode($reg["nombre_subcuenta"]); ?></option>
				<?php
			}
		?>
</select>