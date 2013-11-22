<?php 
if(!isset($conexion)){
	include ("conexion.php");
}
$id_cuenta = $_GET["id"];
$consulta = "SELECT * FROM subcuentas WHERE cuenta = '$id_cuenta'";
$ejecutar_consulta = $conexion->query($consulta);
?>
<label for="subcuentasdebe" class="control-label">Seleccione subcuenta al debe</label>
<select name="subcuentasdebe_slc" id="subcuentasdebe" class="form-control">
	<option value="">Seleccione una subcuenta</option>
	<?php 
		while($registro = $ejecutar_consulta->fetch_assoc()){
			?>
			<option value="<?php echo $registro["codigo_subcuenta"]; ?>"><?php echo $registro["codigo_subcuenta"] .". ". utf8_encode($registro["nombre_subcuenta"]); ?></option>
			<?php
		}
	?>
</select>