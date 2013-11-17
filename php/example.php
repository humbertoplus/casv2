<?php 
	include("sesion.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="stylesheet" type="text/css" href="../css/estilos.css"/>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"/>
	<script>
	    !window.jQuery && document.write("<script src='../js/jquery.min.js'><\/script>");
	</script>
	<title>C.A.S | Inicio</title>
</head>
<body>
	<div class="navbar navbar-inverse navbar-static-top">
		<div class="container">
			<a href="home.php" class="navbar-brand">Computerized Accountancy System &#0153;</a>
			<button class="navbar-toggle" data-toggle="collapse" data-target=".navHeaderCollapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<div class="collapse navbar-collapse navHeaderCollapse">
				<ul class="nav navbar-nav navbar-right">
					<li class="active"><a href="home.php">Inicio</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Asientos <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="#">Generales</a></li>
							<li><a href="#">Simples</a></li>
							<li><a href="#">Facturas Recibidas</a></li>
							<li><a href="#">Facturas Emitidas</a></li>
							<li><a href="#">Diario</a></li>
							<li><a href="#">Descuadros</a></li>
							<li><a href="#">Buscar / Editar</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Cuentas <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="#">Nueva cuenta</a></li>
							<li><a href="#">Extracto de Subcuenta</a></li>
							<li><a href="#">Extracto de Cuenta</a></li>
							<li><a href="#">Extracto de Subgrupo</a></li>
							<li><a href="#">Listado de Subcuentas</a></li>
							<li><a href="#">Listado de Cuentas</a></li>
							<li><a href="#">Listado de Subgrupos</a></li>
							<li><a href="#">Editar</a></li>
							<li><a href="#">Borrar cuenta</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Otros <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="#">Balances</a></li>
							<li><a href="#">Otros Listados</a></li>
							<li><a href="#">Procesos Periódicos</a></li>
							<li><a href="#">Control de tablas</a></li>
							<li><a href="#">Búsquedas</a></li>
							<li><a href="#">Listados</a></li>
							<li><a href="#">Otros</a></li>
						</ul>
					</li>
					<li><a href="#acerca" data-toggle="modal">Acerca</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" style="text-transform:capitalize">
							<?php echo $_SESSION['usuario']; ?> 
							<b class="caret"></b>
						</a>
						<ul class="dropdown-menu">
							<li><a href="cambio-pw.php">Cambiar Contraseña</a></li>
							<li><a href="salir.php">Cerrar sesión</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</div>

	<div class="container" id="contenido">

		<div class="row row-offcanvas row-offcanvas-right">

        <div class="col-xs-12 col-sm-9">
        	<div class="row">
        		<h1>Bienvenido</h1>
        		<div class="jumbotron col-lg-11"></div>
        	</div>
        	<div class="row">
            	<div class="jumbotron col-md-11">
            		
            	</div>
          	</div><!--/row-->
        </div><!--/span-->

        <div class="row">
        	<div class="col-sm-3">
        		<div class="panel panel-default">
        			<div class="panel-heading">
        				<h3 class="panel-title text-center">Contabilidad General</h3>
        			</div>
        			<div class="panel-body" id="sb">
        				<div class="list-group text-right">
        					<h4 class="text-center">Asientos</h4>
				            <a href="#" class="list-group-item">&#0171; Generales</a>
				            <a href="#" class="list-group-item">&#0171; Simples</a>
				            <a href="#" class="list-group-item">&#0171; Facturas Recibidas</a>
				            <a href="#" class="list-group-item">&#0171; Facturas Emitidas</a>
				            <a href="#" class="list-group-item">&#0171; Diario</a>
				            <a href="#" class="list-group-item">&#0171; Descuadros</a>
				            <a href="#" class="list-group-item">&#0171; Buscar/Editar</a>
				            <h4 class="text-center">Cuentas</h4>
				            <a href="#" class="list-group-item">&#0171; Nueva cuenta</a>
				            <a href="#" class="list-group-item">&#0171; Extracto de Subcuenta</a>
				            <a href="#" class="list-group-item">&#0171; Extracto de Cuenta</a>
				            <a href="#" class="list-group-item">&#0171; Extracto de Subgrupo</a>
				            <a href="#" class="list-group-item">&#0171; Listado de Subcuentas</a>
				            <a href="#" class="list-group-item">&#0171; Listado de Cuentas</a>
				            <a href="#" class="list-group-item">&#0171; Listado de Subgrupos</a>
				            <a href="#" class="list-group-item">&#0171; Editar</a>
				            <a href="#" class="list-group-item">&#0171; Borrar cuenta</a>
				            <h4 class="text-center">Otros</h4>
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
        		<div class="panel panel-default">
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
        	</div>
        	
        </div>

	</div>

	<div class="navbar navbar-inverse navbar-fixed-bottom" id="footer">
			<div class="container">
				<p class="navbar-text pull-left">
					Computerized Accountancy System | Todos los derechos reservados &copy; 2013.
				</p>
				<p class="navbar-text pull-right">
					<a href="#">Volver arriba</a>
				</p>
			</div>
	</div>
	<div class="modal fade" id="acerca" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4>Acerca de C.A.S</h4>
				</div>
				<div class="modal-body">
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
					<div class="modal-footer">
						<a href="#" class="btn btn-primary" data-dismiss="modal">Aceptar</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="../js/bootstrap.min.js"></script>
</body>
</html>