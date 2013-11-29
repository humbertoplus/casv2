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
	<script src="../js/jquery.maskedinput.js" type="text/javascript"></script>
	<script type="text/javascript" language="javascript" src="../js/funciones.js"></script>
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

				
				<div class="row">
					<div class="col-lg-12 well">
					    <h2 class="text-primary"><span class="glyphicon glyphicon-info-sign"></span> Dar de alta nuevas cuentas</h2>
					    <p align="justify" class="text-info">
					        Aquí podrá dar de alta nuevas cuentas que se necesiten registrar dentro del sistema. Ubíquese en el formulario deseado y llene los campos, luego pulse el botón correspondiente para dar de alta al objeto. El sistema le indicará si todo se realizó correctamente.
					    </p>
					</div>
					<hr>
					<?php 
					error_reporting(E_ALL ^ E_NOTICE);
					$error=$_GET["error"];
					$mensaje = $_GET["mensaje"];

					switch ($error) {
						case 'si':
							echo "<div class='alert alert-danger'>";
							echo $mensaje;
							echo "</div>";
							break;
						case 'no':
							echo "<div class='alert alert-success alert-dismissable'>";
							echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
							echo $mensaje;
							echo "</div>";
					}
					?>
					<!-- Crear Grupo -->
					<div class="col-lg-12 well">
						<form action="agregar-cuentas.php" class="form-horizontal" method="post" name="crear_grupo_frm" enctype="application/x-www-form-urlencoded">
							<fieldset>
								<legend>Crear Grupo</legend>
								<div class="container">
									<div class="row">
										<input type="hidden" value="1" name="tipo_hdn"/>
										<div class="col-lg-4">
											<label for="naturaleza" class="control-label">Naturaleza</label>
											<select name="naturaleza_slc" id="naturaleza" class="form-control" onchange="from(document.crear_grupo_frm.naturaleza_slc.value, 'prefijo', 'prefijo-grupo.php'), document.getElementById('corr_grupo').focus()" required>
												<option value="">Seleccione</option>
												<option value="1">1. Activo</option>
												<option value="2">2. Pasivo</option>
												<option value="3">3. Capital</option>
												<option value="4">4. Resultados</option>
											</select>
										</div>
										<div class="col-lg-1" id="prefijo">
											<label for="codigo" class="control-label">&nbsp;&nbsp;</label>
											<p class="form-control-static text-right"><h4></h4></p>
										</div>
										<div class="col-lg-7 pull-left">
											<label for="corr_grupo" class="control-label">Correlativo del grupo</label>
											<input type="text" id="corr_grupo" class="form-control" name="corr_grupo_txt" maxlength="2" title="Escriba el correlativo del grupo." placeholder="Escriba el número correlativo del grupo." required/>
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
				<hr>
				<!-- Crear Subgrupo -->
				<div class="row">
					<div class="col-lg-12 well">
						<form action="agregar-cuentas.php" class="form-horizontal" method="post" name="crear_subgrupo_frm" enctype="application/x-www-form-urlencoded">
							<fieldset>
								<legend>Crear Subgrupo</legend>
								<div class="container">
									<div class="row">
										<input type="hidden" value="2" name="tipo_hdn"/>
										<div class="col-lg-4">
											<label for="grupos" class="control-label">Grupo</label>
											<select name="grupos_slc" id="grupos" class="form-control" onchange="from(document.crear_subgrupo_frm.grupos_slc.value, 'prefijo_subgrupo', 'prefijo-subgrupo.php'), document.getElementById('corr_subgrupo').focus()" required/>
												<option value="">Seleccione grupo</option>
												<?php include("select-grupos.php"); ?>
											</select>
										</div>
										<div class="col-lg-1" id="prefijo_subgrupo">
											<label for="" class="control-label">&nbsp;&nbsp;</label>
											<p class="form-control-static text-right"><strong>&nbsp;&nbsp;&nbsp;</strong></p>
										</div>
										<div class="col-lg-7">
											<label for="corr_subgrupo" class="control-label">Correlativo del Subgrupo</label>
											<input type="text" id="corr_subgrupo" name="corr_subgrupo_txt" class="form-control" maxlength="2" placeholder="Escriba el correlativo del subgrupo" title="Escriba el número correlativo del subgrupo" required />
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
				<hr>
				<!-- Crear Cuenta -->
				<div class="row">
					<div class="col-lg-12 well">
						<form action="agregar-cuentas.php" class="form-horizontal" id="crear-cuenta" name="crear_cuenta_frm" method="post" enctype="application/x-www-form-urlencoded">
							<fieldset>
								<legend>Crear Cuenta</legend>
								<div class="container">
									<div class="row">
										<input type="hidden" value="3" name="tipo_hdn"/>
										<div class="col-lg-3">
											<label for="subgrupos" class="control-label">Subgrupo</label>
											<select name="subgrupos_slc" id="subgrupos" class="form-control" onchange="from(document.crear_cuenta_frm.subgrupos_slc.value, 'prefijo_cuenta','prefijo-cuenta.php'), document.getElementById('corr_cuenta').focus()" required>
												<option value="">Seleccione subgrupo</option>
												<?php include("select-subgrupos.php"); ?>
											</select>
										</div>
										<div class="col-lg-1" id="prefijo_cuenta">
											<label for="" class="control-label">&nbsp;&nbsp;</label>
											<p class="form-control-static text-right"><strong>&nbsp;&nbsp;&nbsp;</strong></p>
										</div>
										<div class="col-lg-4">
											<label for="corr_cuenta" class="control-label">Correlativo de la cuenta</label>
											<input type="text" id="corr_cuenta" name="corr_cuenta_txt" class="form-control" title="Escriba el correlativo de la cuenta" placeholder="Escriba el correlativo de la cuenta." required/>
										</div>
										<div class="col-lg-4">
											<label for="subctas" class="control-label">¿Tiene Subcuentas? <a title="Si la cuenta tendrá subcuentas seleccione Si, de lo contrario seleccione No."><span class="glyphicon glyphicon-question-sign"></span></a></label>
											<select name="subctas_slc" id="subctas" class="form-control" required>
												<option value="">Seleccione una opción</option>
												<option value="Si">Si</option>
												<option value="No">No</option>
											</select>
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
				<hr>
				<!-- Crear Subcuenta -->
				<div class="row">
					<div class="col-lg-12 well">
						<form action="agregar-cuentas.php" class="form-horizontal" method="post" name="crear_subcuenta_frm" enctype="application/x-www-form-urlencoded">
							<fieldset>
								<legend>Crear Subcuenta</legend>
								<div class="container">
									<div class="row">
										<input type="hidden" value="4" name="tipo_hdn"/>
										<div class="col-lg-4">
											<label for="cuentas" class="control-label">Cuenta</label>
											<select name="cuentas_slc" id="cuentas" class="form-control" onchange="from(document.crear_subcuenta_frm.cuentas_slc.value, 'prefijo_subcuenta', 'prefijo-subcuenta.php'), document.getElementById('corr_subcuenta').focus()" required>
												<option value="">Seleccione cuenta</option>
												<?php include("select-cuentas.php"); ?>												
											</select>
										</div>
										<div class="col-lg-1" id="prefijo_subcuenta">
											<label for="" class="control-label">&nbsp;&nbsp;</label>
											<p class="form-control-static text-right"><strong>&nbsp;&nbsp;&nbsp;</strong></p>
										</div>
										<div class="col-lg-7">
											<label for="corr_subcuenta" class="control-label">Correlativo de la subcuenta</label>
											<input type="text" id="corr_subcuenta" name="corr_subcuenta_txt" class="form-control" placeholder="Escriba el número correlativo de la subcuenta" title="Escriba el número correlativo de la subcuenta" maxlength="2" required />
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
				<hr>
			</div><!--/span-->

			<!-- Barra lateral o sidebar -->
			<?php include("sidebar.php"); ?>
			
		</div>
	</div>

	<!-- Pie de página o Footer -->
	<?php include("footer.php"); ?>

	<!-- Ventanas flotantes -->
	<?php include("modal.php"); ?>

	<script>
	jQuery(function($){
		$("#corr_grupo").mask("9?9", {placeholder:" "});
		$("#corr_subgrupo").mask("9?9", {placeholder:" "});
		$("#corr_cuenta").mask("9?9", {placeholder:" "});
		$("#corr_subcuenta").mask("9?9", {placeholder:" "});
	});
	</script>
	<script src="../js/bootstrap.min.js"></script>
</body>
</html>