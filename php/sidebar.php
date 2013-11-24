<?php
/*~ Archivo sidebar.php
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
<div class="row">
	<div class="col-sm-3">

		<?php
			if(!isset($conexion)){
				include("conexion.php");
			}
			$usuario = $_SESSION["usuario"];
        	$consulta = "SELECT * FROM usuario WHERE usuario='$usuario'";
        	$ejecutar_consulta = $conexion->query($consulta); 
        	while($registro=$ejecutar_consulta->fetch_assoc()) 
				{
					$_SESSION["tipo"]=$registro["tipo"];
				}
			
			if($_SESSION['tipo']=="administrador"){
				echo "<div class='panel panel-primary'>";
				echo "<div class='panel-heading'>";
				echo "<h3 class='panel-title text-center'>Panel de administración</h3>";
				echo "</div>";
				echo "<div class='panel-body' id='sb'>";
				echo "<div class='list-group text-right'>";
				echo "<a href='usuarios.php' class='list-group-item'>&#0171; Listado de usuarios</a>";
				echo "<a href='crear-usuario.php' class='list-group-item'>&#0171; Crear un nuevo usuario</a>";
				echo "<a href='eliminar-usuario.php' class='list-group-item'>&#0171; Eliminar usuario</a>";
				echo "<a href='iva.php' class='list-group-item'>&#0171; IVA</a>";
				echo "<a href='anio-contable.php' class='list-group-item'>&#0171; Año Contable</a>";
				echo "<a href='log.php' class='list-group-item'>&#0171; Ver log</a>";
				echo "</div>";
				echo "</div>";
				echo "</div>";
			}
			$conexion->close();
		?>

		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title text-center">Asientos</h3>
			</div>

			<div class="panel-body" id="sb">
				<div class="list-group text-right">
					<a href="asiento-general.php" class="list-group-item">&#0171; Generales</a>
					<a href="asiento-simple.php" class="list-group-item">&#0171; Simples</a>
					<a href="diario.php" class="list-group-item">&#0171; Diario</a>
					<a href="#" class="list-group-item">&#0171; Buscar/Editar</a>
				</div>
			</div>
		</div>

		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title text-center">Cuentas</h3>
			</div>

			<div class="panel-body" id="sb">
				<div class="list-group text-right">
					<a href="alta-cuentas.php" class="list-group-item">&#0171; Crear cuentas</a>
					<a href="#" class="list-group-item">&#0171; Buscar Subcuenta</a>
					<a href="#" class="list-group-item">&#0171; Buscar Cuenta</a>
					<a href="#" class="list-group-item">&#0171; Buscar Subgrupo</a>
					<a href="catalogo-cuentas.php" class="list-group-item">&#0171; Catálogo General de Cuentas</a>
					<a href="listar-subcuentas.php" class="list-group-item">&#0171; Listado de Subcuentas</a>
					<a href="listar-cuentas.php" class="list-group-item">&#0171; Listado de Cuentas</a>
					<a href="listar-subgrupos.php" class="list-group-item">&#0171; Listado de Subgrupos</a>
					<a href="#" class="list-group-item">&#0171; Editar</a>
					<a href="#" class="list-group-item">&#0171; Borrar cuenta</a>				            
				</div>
			</div>
		</div>

		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title text-center">Otros</h3>
			</div>

			<div class="panel-body" id="sb">
				<div class="list-group text-right">
					<a href="#" class="list-group-item">&#0171; Balances</a>
					<a href="#" class="list-group-item">&#0171; Búsquedas</a>
					<a href="#" class="list-group-item">&#0171; Listados</a>
				</div>
			</div>
		</div>

		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title text-center">Gestión Comercial</h3>
			</div>

			<div class="panel-body" id="sb">
				<div class="list-group text-right">
					<a href="#" class="list-group-item">&#0171; Proveedores</a>
					<a href="#" class="list-group-item">&#0171; Clientes</a>
					<a href="#" class="list-group-item">&#0171; Inventario</a>
					<a href="#" class="list-group-item">&#0171; Facturas Recibidas</a>
					<a href="#" class="list-group-item">&#0171; Pedidos</a>
					<a href="#" class="list-group-item">&#0171; Pedidos por Cliente</a>
					<a href="#" class="list-group-item">&#0171; Facturas Emitidas</a>
				</div>
			</div>
		</div>

	</div>
</div>