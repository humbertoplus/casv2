<?php
/*~ Archivo eliminar-usuario.php
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
        header("Location: home.php");
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
	<title>C.A.S | Eliminar usuario</title>
</head>

<body>
	<!-- Barra de navegación -->
	<?php include("nav.php"); ?>

	<!-- Contenido de la página -->
	<div class="container" id="contenido">
		<div class="row row-offcanvas row-offcanvas-right">
			<div class="col-xs-12 col-sm-9">
				<div class="page-header">
        			<h3>Eliminar usuario</h3>
        		</div>
        		<div class="row">
                    <div class="col-lg-12 well">
                        <h2 class="text-primary"><span class="glyphicon glyphicon-info-sign"></span> Eliminar usuarios</h2>
                        <p align="justify" class="text-info">
                            Si desea eliminar el perfil de alguno de los usuarios del sistema, selecciónelo en la lista que aparece abajo. Deberá proporcionar su contraseña para que C.A.S se asegure de que usted quiere realizar la operación de eliminación. Recuerde que usted no puede eliminar su propia cuenta.
                        </p>
                    </div>
                    <hr>
        			<div class="col-md-6">
        				<form id="eliminar_usuario" name="eliminar_usuario_frm" action="borrar-usuario.php" method="post" class="form-horizontal" enctype="application/x-www-form-urlencoded">
        					<fieldset>
        						<?php 
        							error_reporting(E_ALL ^ E_NOTICE);
        							if($_GET["error"]=="actual"){
        								echo "<div class='alert alert-danger alert-dismissable'>";
	            						echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
	            						echo "No se puede eliminar al usuario actual.";
	            						echo "</div>";
        							} else if($_GET["error"]=="bad-pw"){
        								echo "<div class='alert alert-warning alert-dismissable'>";
	            						echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
	            						echo "Contraseña incorrecta. Verifique sus datos e intente nuevamente.";
	            						echo "</div>";
        							} else if($_GET["error"]=="no"){
                                        $user = $_GET["user"];
        								echo "<div class='alert alert-success alert-dismissable'>";
	            						echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
	            						echo "Se eliminó al usuario <em>$user</em> correctamente.";
	            						echo "</div>";
        							} else if($_GET["error"]=="si"){
        								echo "<div class='alert alert-info alert-dismissable'>";
	            						echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
	            						echo "Ocurrió un error al intentar eliminar al usuario.";
	            						echo "</div>";
        							}
        						?>
        						<div class="form-group">
        							<label for="usuarios" class="control-label">Seleccionar usuario a eliminar</label>
        							<select name="usuario_slc" id="usuarios" class="form-control" required>
        								<option value="">Seleccione un usuario</option>
        								<?php include("select-usuario.php"); ?>
        							</select>
        						</div>
        						<div class="form-group">
        							<label for="password" class="control-label">Ingrese su contraseña</label>
        							<input type="password" class="form-control" id="password" name="password_txt" placeholder="Escriba su contraseña" title="Debe escribir su contraseña por cuestiones de seguridad." required>
        						</div>
        						<div class="form-group">
        							<button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>&nbsp; Eliminar usuario</button>
        						</div>
        					</fieldset>
        				</form>
        			</div>
                    <div class="col-md-6">
                        <p class="well" align="justify">
                            En este apartado, el usuario administrador podrá dar de baja a algún usuario registrado en el sistema. Vale la pena mencionar que el usuario que actualmente está logueado no puede eliminarse a sí mismo. Se solicita su contraseña por razones de seguridad.
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