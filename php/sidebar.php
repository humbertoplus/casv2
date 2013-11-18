<div class="row">
	<div class="col-sm-3">

		<?php
			include_once("conexion.php");
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
				echo "<a href='usuarios.php' class='list-group-item'>&#0171 Listado de usuarios</a>";
				echo "<a href='crear-usuario.php' class='list-group-item'>&#0171 Crear un nuevo usuario</a>";
				echo "<a href='eliminar-usuario.php' class='list-group-item'>&#0171 Eliminar usuario</a>";
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
					<a href="#" class="list-group-item">&#0171; Facturas Recibidas</a>
					<a href="#" class="list-group-item">&#0171; Facturas Emitidas</a>
					<a href="#" class="list-group-item">&#0171; Diario</a>
					<a href="#" class="list-group-item">&#0171; Descuadros</a>
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
					<a href="#" class="list-group-item">&#0171; Nueva cuenta</a>
					<a href="#" class="list-group-item">&#0171; Extracto de Subcuenta</a>
					<a href="#" class="list-group-item">&#0171; Extracto de Cuenta</a>
					<a href="#" class="list-group-item">&#0171; Extracto de Subgrupo</a>
					<a href="#" class="list-group-item">&#0171; Listado de Subcuentas</a>
					<a href="#" class="list-group-item">&#0171; Listado de Cuentas</a>
					<a href="#" class="list-group-item">&#0171; Listado de Subgrupos</a>
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
					<a href="#" class="list-group-item">&#0171; Otros Listados</a>
					<a href="#" class="list-group-item">&#0171; Procesos Periódicos</a>
					<a href="#" class="list-group-item">&#0171; Control de tablas</a>
					<a href="#" class="list-group-item">&#0171; Búsquedas</a>
					<a href="#" class="list-group-item">&#0171; Listados</a>
					<a href="#" class="list-group-item">&#0171; Otros</a>
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
					<a href="#" class="list-group-item">&#0171; Asignar Facturas a Pedidos</a>
					<a href="#" class="list-group-item">&#0171; Facturas Emitidas</a>
					<a href="#" class="list-group-item">&#0171; Listados</a>
				</div>
			</div>
		</div>

		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title text-center">Configuración</h3>
			</div>

			<div class="panel-body" id="sb">
				<div class="list-group text-right">
					<a href="iva.php" class="list-group-item">&#0171; IVA</a>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- </div> -->