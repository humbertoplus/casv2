<?php
/*~ Archivo usuarios.php
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
	<title>C.A.S | Listado de usuarios</title>
</head>

<body>
	<!-- Barra de navegación -->
	<?php include("nav.php") ?>

	<!-- Contenido de la página -->
	<div class="container" id="contenido">
		<div class="row row-offcanvas row-offcanvas-right">
			<div class="col-xs-12 col-sm-9">
				<div class="page-header">
        			<h3>Administrar Usuarios - Lista de usuarios</h3>
        		</div>
        		<div class="row">
        			<div class="col-lg-12 well">
        			    <h2 class="text-primary"><span class="glyphicon glyphicon-info-sign"></span> Listado de Usuarios</h2>
        			    <p align="justify" class="text-info">
        			        Este apartado está reservado para los administradores del sistema. Podrán consultar los usuarios del sistema que se encuentran registrados y así podrán llevar el control de las personas que pueden iniciar sesión en C.A.S.
        			    </p>
        			</div>
        			<hr>
        			<?php
        				include("conexion.php");

        				$consulta = "SELECT usuario, DATE_FORMAT(fecha, '%d-%m-%Y') fecha, tipo FROM usuario";
        				$ejecutar_consulta = $conexion->query($consulta);
        				
        				echo "<div>";
						echo "<table class='table table-hover  table-condensed'>";
						echo "<thead>";
						echo "<tr>";
						echo "<th>Usuario</th>";
						echo "<th>Contraseña</th>";
						echo "<th>Fecha</th>";
						echo "<th>Tipo</th>";
						echo "</tr>";
						echo "</thead>";
						echo "<tbody>";

						while($registro=$ejecutar_consulta->fetch_assoc()) 
						{
							echo "<tr>";
							echo "<td>".$registro['usuario']."</td>";
							echo "<td>**********</td>";
							echo "<td>".$registro['fecha']."</td>";
							echo "<td>".$registro['tipo']."</td>";
							echo "</tr>";
						}

						echo "</tbody>";
						echo "</table>";
						echo "</div>";									
        			?>
        			<div class="container well">
        				<p>
        					La tabla anterior muestra el listado de los usuarios que están registrados en el sistema. Se muestra el nombre de usuario, que es necesario para el inicio de sesión; la contraseña no se muestra por cuestiones de seguridad. La fecha mostrada es la fecha de creación del usuario y luego se muestra el tipo de usuario, este puede ser administrador o usuario estándar.
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