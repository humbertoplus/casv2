<?php
/*~ Archivo cambio-pw.php
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
	<title>C.A.S | Cambio de Contraseña</title>
</head>
<body>
	<!-- Barra de navegación -->
	<?php include("nav.php"); ?>

	<!-- Contenido de la página -->
	<div class="container" id="contenido">
		<div class="row row-offcanvas row-offcanvas-right">
			<div class="col-xs-12 col-sm-9">
				<div class="page-header">
        			<h3>Cambio de contraseña</h3>
        		</div>
        		<div class="row">
            		<div class="col-md-8">            		
            			<form id="cambio_pw" name="cambio_pw_frm" class="form-horizontal" action="cambiar-pw.php" method="post" enctype="application/x-www-form-urlencoded" role="form">
            				<fieldset>
	            				<?php 
	            					error_reporting(E_ALL ^ E_NOTICE);
	            					
	            					if($_GET["error"]=="si"){
	            						echo "<div class='alert alert-danger alert-dismissable'>";
	            						echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
	            						echo "Contraseña incorrecta. Verifique sus datos e intente nuevamente.";
	            						echo "</div>";
	            					} 

	            					else if($_GET["error"]=='retype'){
	            						echo "<div class='alert alert-warning alert-dismissable'>";
	            						echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
	            						echo "Las contraseñas no coinciden.";
	            						echo "</div>";
	            					} 

	            					else if($_GET["error"]=='no'){
	            						echo "<div class='alert alert-success alert-dismissable'>";
	            						echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
	            						echo "La contraseña se cambió exitosamente.";
	            						echo "</div>";
	            					}
	            				?>
			            		<div class="form-group <?php $has = $_GET["has"]; echo $has; ?>">
			            			<label for="actual" class="control-label">Escriba su contraseña actual</label>
			            			<input type="password" id="actual" name="actual_txt" class="form-control" autofocus required/>
			            		</div>
			            		<div class="form-group <?php $has = $_GET["has"]; echo $has; ?>">
			            			<label for="nueva" class="control-label">Nueva contraseña</label>
			            			<input type="password" id="nueva" name="nueva_txt" class="form-control" required/>
			            		</div>
								<div class="form-group <?php $has = $_GET["has"]; echo $has; ?>">
									<label for="confirmar" class="control-label">Confirme contraseña</label>
									<input type="password" id="confirmar" name="confirmar_txt" class="form-control" required/>
								</div>
								<div class="form-group">
									<button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-lock"></span> &nbsp;Cambiar Contraseña</button>
								</div>
            				</fieldset>
            			</form>
            		</div>
            		<div class="col-md-4 pull-right">
            			<p align="justify" class="well">
            				En esta sección usted podrá cambiar su contraseña de acceso al sistema. Ingrese su contraseña actual, luego la contraseña nueva que quiere asignar a su perfil, y después ingrese la contraseña de nuevo para asegurarse de escribirla correctamente. Cuando haya finalizado, haga click en el botón &laquo;Cambiar contraseña&raquo; y el sistema le indicará si el cambio se realizó correctamente.
            			</p>
            		</div>
          		</div><!--/row-->
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