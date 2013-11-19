<?php
/*~ Archivo footer.php
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

<div class="navbar navbar-inverse navbar-fixed-bottom" id="footer">
	<div class="container">
		<p class="navbar-text pull-left">
			Computerized Accountancy System | Todos los derechos reservados &copy; 2013.
		</p>
		<p class="navbar-text pull-right">
			Logueado como <em><strong style="text-transform:capitalize"><?php echo $_SESSION["usuario"]; ?></strong></em>&nbsp;&nbsp;
			<a href="#" class="navbar-link" title="Volver arriba"><span class="glyphicon glyphicon-circle-arrow-up"></span></a>
		</p>
	</div>
</div>