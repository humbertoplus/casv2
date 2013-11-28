<?php
/*~ Archivo crear-usuario.php
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
	<title>C.A.S | Registrar usuario</title>
</head>

<body>
    <!-- Barra de navegación -->
	<?php include("nav.php"); ?>

    <!-- Contenido de la página -->
	<div class="container" id="contenido">
		<div class="row row-offcanvas row-offcanvas-right">
			<div class="col-xs-12 col-sm-9">
				<div class="page-header">
        			<h3>Crear un nuevo usuario</h3>
        		</div>
        		<div class="row">
                    <div class="col-lg-12 well">
                        <h2 class="text-primary"><span class="glyphicon glyphicon-info-sign"></span> Dar de alta nuevos usuarios</h2>
                        <p align="justify" class="text-info">
                            Si desea crear nuevos usuarios para el sistema, rellene el formulario que aparece abajo. Cabe mencionar que esta operación sólo puede ser realizada por un usuario de tipo administrador.
                        </p>
                    </div>
                    <hr>
        			<div class="col-md-6">
        				<form id="crear_usuario" name="crear_usuario_frm" class="form-horizontal" action="agregar-usuario.php" method="post" enctype="application/x-www-form-urlencoded" role="form">
        					<fieldset>
        						<?php
        							error_reporting(E_ALL ^ E_NOTICE);
        							if($_GET["error"]=="no"){
        								echo "<div class='alert alert-success alert-dismissable'>";
        								echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
        								echo "Usuario <em>".$_GET['user']."</em> registrado exitosamente.";
        								echo "</div>";
        							} 

                                    else if($_GET["error"]=="retype"){
        								echo "<div class='alert alert-warning alert-dismissable'>";
        								echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
        								echo "Las contraseñas no coinciden.";
        								echo "</div>";
        							} 

                                    else if($_GET["error"]=="existe"){
        								echo "<div class='alert alert-danger alert-dismissable'>";
        								echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
        								echo "El usuario ingresado ya existe.";
        								echo "</div>";
        							}
        						?>
        						<div class="form-group">
        							<label for="usuario" class="control-label">Nombre de usuario</label>
        							<input type="text" class="form-control" id="usuario" name="usuario_txt" title="Escriba el nombre de usuario" placeholder="Nombre de usuario" autofocus required />
        						</div>
        						<div class="form-group">
        							<label for="password" class="control-label">Contraseña</label>
        							<input type="password" class="form-control" id="password" name="password_txt" title="Escriba la contraseña" placeholder="Contraseña" required />
        						</div>
        						<div class="form-group">
        							<label for="password2" class="control-label">Reescriba Contraseña</label>
        							<input type="password" class="form-control" id="password2" name="password2_txt" title="Reescriba la contraseña" placeholder="Reescriba la contraseña" required />
        						</div>
        						<div class="form-group">
        							<label for="tipo" class="control-label">Tipo de usuario</label>
        							<select name="tipo_slc" id="tipo" class="form-control" required>
        								<option value="">Seleccione tipo</option>
        								<option value="administrador">Administrador</option>
        								<option value="estandar">Estándar</option>
        							</select>
        						</div>
        						<div class="form-group">
        							<button type="submit" class="btn btn-primary pull-right"><span class="glyphicon glyphicon-user"></span> &nbsp;Crear usuario</button>
        						</div>
        					</fieldset>
        				</form>
        			</div>
        			<div class="col-md-6">
        				<p class="well" align="justify">
        					Este es el formulario para la creación de nuevos usuarios. Rellene los campos correctamente y al finalizar haga click en el botón &laquo;Crear usuario&raquo;. El sistema indicará si el proceso de creación del usuario se realizó correctamente o se generaron errores.
        				</p>
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