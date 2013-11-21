<?php
/*~ Archivo alta-cuentas.php
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
	include("sesion.php");
	if(!$_COOKIE["sesion"]){
		header("Location: salir.php");
	}
		if($_SESSION["tipo"]=="estandar"){
		header("Location: home.php?error=acceso-denegado");
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="../css/estilos.css"/>
	<link rel="shortcut icon" type="image/x-icon" href="../favicon.ico" />
	<script>
		!window.jQuery && document.write("<script src='../js/jquery.min.js'><\/script>");
	</script>
	<title>C.A.S | Crear Cuentas</title>
</head>

<body>
	<!-- Barra de navegación -->
	<?php include("nav.php"); ?>

	<!-- Contenido de la página -->
	<div class="container" id="contenido">
		<div class="row row-offcanvas row-offcanvas-right">
			<div class="col-xs-12 col-sm-9">
				<div class="page-header">
					<h3>Crear Grupos, Subgrupos, Cuentas o Subcuentas</h3>
				</div>

				<!-- Crear Grupo -->
				<div class="row">
					<div class="col-lg-12 well">
						<form action="agregar-cuentas.php" class="form-horizontal" method="post" name="crear-grupo_frm" enctype="application/x-www-form-urlencoded">
							<fieldset>
								<legend>Crear Grupo</legend>
								<div class="container">
									<div class="row">
										<div class="col-lg-4">
											<label for="naturaleza" class="control-label">Naturaleza</label>
											<select name="naturaleza_slc" id="naturaleza" class="form-control" required>
												<option value="">Seleccione</option>
												<option value="1">1. Activo</option>
												<option value="2">2. Pasivo</option>
												<option value="3">3. Capital</option>
												<option value="4">4. Resultados</option>
											</select>
										</div>
										<div class="col-lg-5">
											<label for="id_grupo" class="control-label">Código del grupo</label>
											<input type="text" id="id_grupo" class="form-control" name="id_grupo_txt" title="Escriba el código en el formato #.#" placeholder="Escriba el código en el formato #.#" required/>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-12">
											<label for="nombre_grupo" class="control-label">Nombre</label>
											<input type="text" id="nombre_grupo" name="nombre_grupo_txt" class="form-control" title="Escriba un nombre para el grupo" placeholder="Escriba el nombre asignado al grupo" required/>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-12">
											<label for="descripcion_grupo" class="control-label">Descripción</label>
											<textarea name="descripcion_grupo_txa" id="descripcion_grupo" class="form-control" placeholder="Escriba una descripción para el grupo a crear." required></textarea>
										</div>
									</div>
									<br>
									<div class="row">
										<div class="col-lg-12">
											<button class="btn btn-success pull-right" type="submit"><span class="glyphicon glyphicon-save"></span>&nbsp; Guardar Grupo</button>
										</div>
									</div>
								</div>
							</fieldset>
						</form>
					</div>
				</div>
				
				<!-- Crear Subgrupo -->
				<div class="row">
					<div class="col-lg-12 well">
						<form action="agregar-cuentas.php" class="form-horizontal" method="post" id="crear-subgrupo_frm" enctype="application/x-www-form-urlencoded">
							<fieldset>
								<legend>Crear Subgrupo</legend>
								<div class="container">
									<div class="row">
										<div class="col-lg-4">
											<label for="grupos" class="control-label">Grupo</label>
											<select name="grupos_slc" id="grupos" class="form-control" required>
												<option value="">Seleccione grupo</option>
												<?php include("select-grupos.php"); ?>
											</select>
										</div>
										<div class="col-lg-5">
											<label for="id_subgrupo" class="control-label">Código del subgrupo</label>
											<input type="text" id="id_subgrupo" name="id_subgrupo_txt" class="form-control" placeholder="Escriba el código en el formato #.#.#" title="Escriba el código para el subgrupo en el formato #.#.#" required />
										</div>
									</div>
									<div class="row">
										<div class="col-lg-12">
											<label for="nombre_subgrupo" class="control-label">Nombre del subgrupo</label>
											<input type="text" id="nombre_subgrupo" class="form-control" name="nombre_subgrupo_txt" title="Escriba el nombre del subgrupo" placeholder="Escriba el nombre asignado al subgrupo" required/>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-12">
											<label for="descripcion_subgrupo" class="control-label">Descripción</label>
											<textarea name="descripcion_subgrupo_txa" id="descripcion_subgrupo" class="form-control" placeholder="Escriba una descripción para el subgrupo" required></textarea>
										</div>
									</div>
									<br>
									<div class="row">
										<div class="col-lg-12">
											<button class="btn btn-success pull-right" type="submit"><span class="glyphicon glyphicon-save"></span>&nbsp;Guardar Subgrupo</button>
										</div>
									</div>
								</div>
							</fieldset>
						</form>
					</div>
				</div>

				<!-- Crear Cuenta -->
				<div class="row">
					<div class="col-lg-12 well">
						<form action="agregar-cuentas.php" class="form-horizontal" id="crear-cuenta" name="crear-cuenta_frm" method="post" enctype="application/x-www-form-urlencoded">
							<fieldset>
								<legend>Crear Cuenta</legend>
								<div class="container">
									<div class="row">
										<div class="col-lg-4">
											<label for="subgrupos" class="control-label">Subgrupo</label>
											<select name="grupos_slc" id="subgrupos" class="form-control" required>
												<option value="">Seleccione subgrupo</option>
												<?php include("select-subgrupos.php"); ?>
											</select>
										</div>
										<div class="col-lg-5">
											<label for="id_cuenta" class="control-label">Código de la cuenta</label>
											<input type="text" id="id_cuenta" name="id_cuenta_txt" class="form-control" title="Escriba el código de la cuenta" placeholder="Escriba el código en el formato #.#.#.#" required/>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-12">
											<label for="nombre_cuenta" class="control-label">Nombre de la cuenta</label>
											<input type="text" id="nombre_cuenta" name="nombre_cuenta_txt" class="form-control" title="Escriba el nombre de la cuenta" placeholder="Escriba el nombre de la cuenta" required/>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-12">
											<label for="descripcion_cuenta" class="control-label">Descripción</label>
											<textarea name="descripcion_cuenta_txa" id="descripcion_cuenta" class="form-control" placeholder="Escriba una descripción para la cuenta a crear." required></textarea>
										</div>
									</div>
									<br>
									<div class="row">
										<div class="col-lg-12">
											<button class="btn btn-success pull-right" type="submit"><span class="glyphicon glyphicon-save"></span>&nbsp; Guardar Cuenta</button>
										</div>
									</div>
								</div>
							</fieldset>
						</form>
					</div>
				</div>

				<!-- Crear Subcuenta -->
				<div class="row">
					<div class="col-lg-12 well">
						<form action="agregar-cuentas.php" class="form-horizontal" method="post" id="crear-subgrupo_frm" enctype="application/x-www-form-urlencoded">
							<fieldset>
								<legend>Crear Subcuenta</legend>
								<div class="container">
									<div class="row">
										<div class="col-lg-4">
											<label for="cuentas" class="control-label">Cuenta</label>
											<select name="cuentas_slc" id="cuentas" class="form-control" required>
												<option value="">Seleccione cuenta</option>
												<?php include("select-cuentas.php"); ?>
												
											</select>
										</div>
										<div class="col-lg-5">
											<label for="id_subcuenta" class="control-label">Código de la subcuenta</label>
											<input type="text" id="id_subcuenta" name="id_subcuenta_txt" class="form-control" placeholder="Escriba el código en el formato #.#.#.#.#" title="Escriba el código para la subcuenta en el formato #.#.#.#.#" required />
										</div>
									</div>
									<div class="row">
										<div class="col-lg-12">
											<label for="nombre_subcuenta" class="control-label">Nombre de la subcuenta</label>
											<input type="text" id="nombre_subcuenta" class="form-control" name="nombre_subcuenta_txt" title="Escriba el nombre de la subcuenta" placeholder="Escriba el nombre asignado a la subcuenta" required/>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-12">
											<label for="descripcion_subcuenta" class="control-label">Descripción</label>
											<textarea name="descripcion_subcuenta_txa" id="descripcion_subcuenta" class="form-control" placeholder="Escriba una descripción para la subcuenta" required></textarea>
										</div>
									</div>
									<br>
									<div class="row">
										<div class="col-lg-12">
											<button class="btn btn-success pull-right" type="submit"><span class="glyphicon glyphicon-save"></span>&nbsp;Guardar Subcuenta</button>
										</div>
									</div>
								</div>
							</fieldset>
						</form>
					</div>
				</div>

			</div><!--/span-->

			<!-- Barra lateral o sidebar -->
			<?php include("sidebar.php"); ?>
			
		</div>
	</div>

	<!-- Pie de página o Footer -->
	<?php include("footer.php"); ?>

	<!-- Ventanas flotantes -->
	<?php include("modal.php"); ?>

	<script src="../js/bootstrap.min.js"></script>
</body>
</html>