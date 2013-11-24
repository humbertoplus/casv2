<?php
/*~ Archivo modal.php
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
<div class="modal fade" id="acerca" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4>Acerca de C.A.S</h4>
				</div>

				<div class="modal-body">
					<p align="justify">
						C.A.S son las siglas de <em>"Computerized Accountancy System"</em> que traducido al español significa <em>"Sistema Contable Computarizado"</em>. Este sistema está diseñado en ambiente web, escrito en PHP y programado por los alumnos de la cátedra de Sistemas Contables de la Facultad de Ingeniería y Arquitectura de la Universidad de El Salvador. Este sistema es fácil de usar, tiene una interfaz amigable con el usuario y además es seguro, debido a que posee un nivel de seguridad orientado a usuarios, los cuales tienen su nombre de usuario y contraseña. Si una persona no está logueada en el sistema, no podrá acceder a ninguna de las funciones del mismo, ni podrá consultar ningún tipo de información contenida dentro del sistema.
					</p>

					<div class="modal-footer">
						<a href="info.php" class="btn btn-success"><span class="glyphicon glyphicon-info-sign"></span> &nbsp;Más información</a>
						<a href="#" class="btn btn-primary" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> &nbsp;Cerrar</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="creditos" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4>Sobre los programadores</h4>
				</div>

				<div class="modal-body">
					<p>
						Este sistema ha sido desarrollado por un equipo de 4 programadores. A continuación se detallan sus nombres:
						<br><br>
					</p>
					<ol>
						<li><b>Ingrid Elizabeth Aguilar Gonzalez</b></li>
						<li><b>Vanessa Elena Campos Garciaguirre</b></li>
						<li><b>Jhosseline Alicia Rodriguez Campos</b></li>
						<li><b>Ricardo Alexander Vigil Contreras</b></li>
					</ol>

					<div class="modal-footer">
						<a href="#" class="btn btn-primary" data-dismiss="modal">Aceptar</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="logout" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4>Cerrar sesión</h4>
				</div>

				<div class="modal-body">
					<p>
						<h4 class="text-center"><em>¿Está seguro que desea cerrar sesión?</em></h4>
						<br><br>
					</p>

					<div class="modal-footer">
						<a href="salir.php" class="btn btn-danger"><span class="glyphicon glyphicon-log-out"></span> &nbsp;Cerrar Sesión</a>
						<a href="#" class="btn btn-primary" data-dismiss="modal">Cancelar</a>
					</div>
				</div>
			</div>
		</div>
	</div>