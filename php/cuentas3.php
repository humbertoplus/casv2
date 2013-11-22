<?php 
if(!isset($conexion)){
	include ("conexion.php");
}
//print_r ($_GET);
$id_cuenta = $_GET["id"];
$consulta = "SELECT * FROM subcuentas WHERE cuenta = '$id_cuenta'";
$ejecutar_consulta = $conexion->query($consulta);
?>
<label for="subcuentashaber" class="control-label">Seleccione subcuenta al haber</label>
<select name="subcuentashaber_slc" id="subcuentashaber" class="form-control">
	<option value="">Seleccione una subcuenta</option>
	<?php 
		while($registro = $ejecutar_consulta->fetch_assoc()){
			?>
			<option value="<?php echo $registro["codigo_subcuenta"]; ?>"><?php echo $registro["codigo_subcuenta"] .". ". utf8_encode($registro["nombre_subcuenta"]); ?></option>
			<?php
		}
	?>
</select>