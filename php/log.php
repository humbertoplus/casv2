<?php
/*~ Archivo log.php
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
	<title>C.A.S | Log de Operaciones</title>
</head>

<body>
	<!-- Barra de navegación -->
	<?php include("nav.php"); ?>

	<!-- Contenido de la página -->
	<div class="container" id="contenido">
		<div class="row row-offcanvas row-offcanvas-right">
			<div class="col-xs-12 col-sm-9">
				<div class="page-header">
        			<h3>Log de Operaciones</h3>
        		</div>
        		<div class="row">
        			<div class="col-lg-12 well">
        			    <h2 class="text-primary"><span class="glyphicon glyphicon-info-sign"></span> Log (registro) de Operaciones</h2>
        			    <p align="justify" class="text-info">
        			        Este es el sitio donde se irán registrando los cambios a las tablas críticas de la base de datos. Se muestra la información más relevante sobre los movimientos más importantes en la base de datos, como las inserciones, actualizaciones o eliminaciones de datos.
        			    </p>
        			</div>
        			<hr>
        			<div class="container">
        				<table class="table table-hover table-condensed table-striped table-bordered">
        					<thead>
        						<tr>
        							<th>ID</th>
        							<th>FECHA</th>
        							<th>EVENTO</th>
        							<th>USUARIO</th>
        							<th>IP</th>
        						</tr>
        					</thead>
        					<tbody>
        						<?php
        						if(!isset($conexion)){ include("conexion.php");}
        						$sql = "SELECT * FROM security_log";
        						$ejecutar = $conexion->query($sql);
        						while($reg = $ejecutar->fetch_assoc()){
        							echo "<tr>";
        							echo "<td>".$reg["id_evento"]."</td>";
        							echo "<td>".$reg["fecha"]."</td>";
        							echo "<td>".utf8_encode($reg["evento"])."</td>";
        							echo "<td>".utf8_encode($reg["user"])."</td>";
        							echo "<td>".$reg["ip"]."</td>";
        							echo "</tr>";
        						}
        						?>
        					</tbody>
        				</table>
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