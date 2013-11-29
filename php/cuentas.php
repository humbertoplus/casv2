<?php
/*~ Archivo cuentas.php
.---------------------------------------------------------------------------.
|    Software: CAS - Computerized Accountancy System                        |
|     Versión: 1.0                                                          |
|   Lenguajes: PHP, HTML, CSS3 y Javascript                                 |
| ------------------------------------------------------------------------- |
|   Autores: Ricardo Vigil (alexcontreras@outlook.com)                      |
|          : Vanessa Campos                                                 |
|          : Ingrid Aguilar                                                 |
|          : Jhosseline Rodriguez                                           |
| Copyright (C) 2013, FIA-UES. Todos los derechos reservados.               |
| ------------------------------------------------------------------------- |
|                                                                           |
| Este archivo es parte del sistema de contabilidad C.A.S para la cátedra   |
| de Sistemas Contables de la Facultad de Ingeniería y Arquitectura de la   |
| Universidad de El Salvador.                                               |
|                                                                           |
'---------------------------------------------------------------------------'
*/
?>
<?php 
if(!isset($conexion)){
	include ("conexion.php");
}
//print_r ($_GET);
$id_cuenta = $_GET["id"];
$consulta = "SELECT * FROM subcuentas WHERE cuenta = '$id_cuenta'";
$ejecutar_consulta = $conexion->query($consulta);
?>
<label for="subcuentas" class="control-label">Seleccionar Subcuenta</label>
	<select name="subcuentas_slc" id="subcuentas" class="form-control">
		<option value="">Seleccione Subcuenta</option>
		<?php 
			while($registro = $ejecutar_consulta->fetch_assoc()){
				?>
				<option value="<?php echo $registro["codigo_subcuenta"]; ?>"><?php echo $registro["codigo_subcuenta"] .". ". utf8_encode($registro["nombre_subcuenta"]); ?></option>
				<?php
			}
		?>
</select>