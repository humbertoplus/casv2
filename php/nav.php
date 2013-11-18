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
				<li><a href="home.php"><span class="glyphicon glyphicon-home"></span> &nbsp;Inicio</a></li>

				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Asientos <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="asiento-general.php">Generales</a></li>
						<li><a href="asiento-simple.php">Simples</a></li>
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

				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Acerca <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="#acerca" data-toggle="modal">Acerca de C.A.S</a></li>
						<li><a href="#creditos" data-toggle="modal">Sobre los programadores</a></li>
					</ul>
				</li>
					
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" style="text-transform:capitalize">
						<span class="glyphicon glyphicon-user"></span> &nbsp;<?php echo $_SESSION['usuario']; ?> 
						<b class="caret"></b>
					</a>
					<ul class="dropdown-menu">
						<li><a href="cambio-pw.php"><span class="glyphicon glyphicon-lock"></span> &nbsp;Cambiar Contraseña</a></li>
						<li><a href="salir.php"><span class="glyphicon glyphicon-log-out"></span> &nbsp;Cerrar sesión</a></li>
						<li><a href="ayuda.php"><span class="glyphicon glyphicon-question-sign"></span> &nbsp;Ayuda</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</div>