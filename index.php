<?php
/*~ Archivo index.php
.---------------------------------------------------------------------------.
|    Software: CAS - Computerized Accountancy System                        |
|     Versión: 2.0                                                          |
|   Lenguajes: PHP, HTML, CSS3 y Javascript                                 |
| ------------------------------------------------------------------------- |
|   Autor: Ricardo Vigil (alexcontreras@outlook.com)                        |
| Copyright (C) 2013, FIA-UES. Todos los derechos reservados.               |
'---------------------------------------------------------------------------'
*/
?>
<?php 
	error_reporting(E_ALL ^ E_NOTICE);

	if($_COOKIE["sesion"])
	{
	    header("Location: php/home.php");
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<meta name="description" content="Este es un sistema de contabilidad basado en la web, para administrar los procesos contables de la Propuesta para el desarrollo de la actividad vinícola en la microregión de los nonualcos a través de la gestión de la cadena de suministro."/>

	<!-- Estilos del sitio -->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/estilos.css"/>
	<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />

	<script>
	    !window.jQuery && document.write("<script src='js/jquery.min.js'><\/script>");
	</script>

	<script>
		var nav = navigator.appName;
		if(nav=="Microsoft Internet Explorer"){
			alert("Está usando "+nav+". Puede que el sistema no funcione correctamente.");
		};
	</script>

	<title>C.A.S | SIC115</title>
</head>

<body>
	<div class="container">
		<br>
		<?php
			error_reporting(E_ALL ^ E_NOTICE);
			
			if ($_GET["error"]=="si")
			{
				echo "<div class='alert alert-danger alert-dismissable'>";
				echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
				echo "Nombre de usuario o contraseña inválidos. Por favor, verifique sus datos.";
				echo "</div>";
			}
		?>

		<div class="jumbotron text-center">
			<h1>Bienvenido a C.A.S</h1>
			<p>
				Para utilizar todas las funciones del sistema, usted deberá iniciar sesión previamente. Ingrese sus datos de inicio de sesión y luego pulse el botón "Iniciar sesión" para acceder al sistema.
			</p>
		</div>
		
		<form class="form-signin col-lg-12 text-center" id="login" name="login_frm" method="post" action="php/control.php" enctype="application/x-www-form-urlencoded" role="form" onSubmit="return validacion()">
			<h2 class="form-signin-heading">Por favor, inicie sesión</h2>
			<input type="text" class="form-control" id="user" name="user_txt" placeholder="Usuario" required />
			<input type="password" class="form-control" id="password" name="password_txt" placeholder="Contraseña" required />
			<button class="btn btn-lg btn-primary btn-block" type="submit"><span class="glyphicon glyphicon-log-in"></span> &nbsp;Iniciar sesión</button>
		</form>	
	</div>
	
	<div class="navbar navbar-inverse navbar-fixed-bottom">
		<div class="container">
			<p class="navbar-text pull-left">
				Computerized Accountancy System | Todos los derechos reservados &copy; 2013.
			</p>

			<p class="navbar-text pull-right">
				SIC115 FIA-UES
			</p>
		</div>
	</div>
	<script src="js/validaciones.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.min.js"></script>
</body>
</html>