<?php
/*~ Archivo nav.php
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
						<li><a href="diario.php">Diario</a></li>
						<li><a href="#">Descuadros</a></li>
						<li><a href="#">Buscar / Editar</a></li>
					</ul>
				</li>

				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Cuentas <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="alta-cuentas.php">Crear cuentas</a></li>
						<li class="divider"></li>
						<li><a href="#">Buscar Subcuenta</a></li>
						<li><a href="#">Buscar Cuenta</a></li>
						<li><a href="#">Buscar Subgrupo</a></li>
						<li class="divider"></li>
						<li><a href="catalogo-cuentas.php">Catálogo General de Cuentas</a></li>
						<li><a href="listar-subcuentas.php">Listado de Subcuentas</a></li>
						<li><a href="listar-cuentas.php">Listado de Cuentas</a></li>
						<li><a href="listar-subgrupos.php">Listado de Subgrupos</a></li>
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
						<li><a href="#acerca" data-toggle="modal"><span class="glyphicon glyphicon-info-sign"></span> &nbsp;Acerca de C.A.S</a></li>
						<li><a href="#creditos" data-toggle="modal"><span class="glyphicon glyphicon-flash"></span>&nbsp; Sobre los programadores</a></li>
					</ul>
				</li>
					
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" style="text-transform:capitalize">
						<span class="glyphicon glyphicon-user"></span> &nbsp;<?php echo $_SESSION['usuario']; ?> 
						<b class="caret"></b>
					</a>
					<ul class="dropdown-menu">
						<li><a href="ayuda.php"><span class="glyphicon glyphicon-question-sign"></span> &nbsp;Ayuda</a></li>
						<li class="divider"></li>
						<li><a href="cambio-pw.php"><span class="glyphicon glyphicon-lock"></span> &nbsp;Cambiar Contraseña</a></li>
						<li><a href="salir.php"><span class="glyphicon glyphicon-log-out"></span> &nbsp;Cerrar sesión</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</div>