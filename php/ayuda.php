<?php
/*~ Archivo ayuda.php
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
	<title>C.A.S | Ayuda</title>
</head>

<body>
	<!-- Barra de navegación -->
	<?php include("nav.php"); ?>

	<!-- Contenido de la página -->
	<div class="container" id="contenido">
		<div class="row row-offcanvas row-offcanvas-right">
			<div class="col-xs-12 col-sm-9">
				<div class="page-header">
        			<h3>Ayuda del sistema.</h3>
        		</div>
        		<div class="col-md-12 well">
        			<h5><strong>Panel de Administración</strong></h5>
					<p><em class="text-primary">Listado de usuarios:</em> Aqui se visualizan los usuarios registrados del sistema.</p> 
					<p><em class="text-primary">Crear nuevo usuario:</em> Ingrese aquí si necesita dar de alta nuevos usuarios (sólo si es administrador).</p>
					<p><em class="text-primary">Eliminar usuario:</em> Dar de baja a un usuario (sólo administradores).</p>
					<p><em class="text-primary">IVA: </em> Aquí se puede cambiar el valor del IVA.</p>
					<p><em class="text-primary">Ver log:</em> Es un registro de todas las operaciones realizadas en el sistema. Existe para tener un control de todos los movimientos que se realizan en el sistema.</p>

				<h5>ASIENTOS</h5>
        			<p>General: Al hacer un asiento general es importante rellenar cada uno de los espacios correspondientes, la fecha se coloca en formato de año-mes-dia,
				   hay una opción de justificante el cual es para subir una factura, resivo, etc que justifique dicha transacción</p>
				<p>Simple: al igual que el asiento general la fecha se introduce año-mes-dia, al ser simple se debe cumplir con partida doble y tiene los respectivos
				   campos para als cuentas y el valor de la transacción y su justificante</p>
				<p>Diario: Aqui se reflejan en forma detallada, los asientos hechos hasta la fecha.</p>
				<p>Buscar/Editar: si nesecitas buscar una asiento o editar una partida, solo tienes que poner el numero de asiento</p>

				<h5>CUENTAS</h5>
				<p>Crear cuentas: si se necesitan otro tipo de cuentas que no se encuentren en el catalogo, se puede crean segun el grupo, subgrupo
				   cuenta y subcuentas</p>
				<p>Al crear un grupo su formato de codigo es #.# ejemplo 1.5, 1 quiere decir que es parte del activo y 5 que es su codigo, si ese codigo ya existe
				   el sistema lo dara a conocer</p>
				<p>para crear un subgrupo su formato es #.#.# ejemplo 1.1.1 que es efectivo</p>
				<p>para crear una cuenta su formato es #.#.#.# ejemplo 1.2.1.1 que es materiales directos</p>
				<p>para crear una subcuenta su formato es #.#.#.#.# ejemplo 1.2.1.1.1 que es Naranja</p>
				<p>Buscar subgrupo, cuenta y subcuenta a traves del codigo asignado a la cuenta o por su nombre.</p>
				<p>Catalogo de cuentas general: muestra el listado de todas las cuentas que utiliza el sistema contable.</p>
				<p>Listado de subgrupos, cuentas y subcuentas: muestra el listado especifico segun su clasificacion subgrupo, cuenta y subcuenta</p>
				<p>Editar: si se requiere modificar una cuenta solo hay que buscarla por el codigo o nombre</p>
				<p>Borrar cuenta: si una cuenta ya no se utilizara en el proceso contable</p>

				<h5>OTROS</h5>
				<p>Balance: muestra el resultado de los diferentes balances general, comprobacion, etc</p>
				<p>Busquedas: si se quiere obtener balances anteriores solo se buscan por la fecha</p>
				<p>Listados: muestra el listado de los balances hechos a la fecha</p>

				<h5>GESTION COMERCIAL</h5>
				<p>Proveedores: se muestra el listado de los proveedores de la empresa</p>
				<p>Clientes: se muestra el listado de los clientes de la empresa</p>
				<p>Inventario: se muestra el inventario de la empresa</p>
				<p>Facturas recibidas: aqui se encuentran las facturas recibidas de cada transaccion hecha por compras</p>
				<p>Pedidos: los pedidos generales se muestran en un listado</p>
				<p>Pedidos de clientes: se detallan los pedidos hechos por los clientes</p>
				<p>facturas emitidas: se muestran las facturas emitidas por las centas hechas</p>
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