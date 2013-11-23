function validacion(){
	var user = document.getElementById("user").value;
	var pass = document.getElementById("password").value;
	

	if(user == null || user.length == 0 || /^\s+$/.test(user)){
		alert("El campo 'Usuario' es requerido.");
		document.getElementById("user").focus();
		return false;
	}

	if(pass == null || pass.length == 0 || /^\s+$/.test(pass)){
		alert("El campo 'Contraseña' es requerido.");
		document.getElementById("password").focus();
		return false;
	}

	return true;
}

function validarIva(){
	var iva = document.getElementById("n_iva").value;
	if(isNaN(iva))
	{
	    alert("El campo IVA solo acepta números.");
	    document.getElementById("n_iva").focus();
	    return false;
	}

	return true;
}

function validarAnioContable(){
	var indice = document.getElementById("anio").selectedIndex;
	if(indice == null || indice == 0){
		alert("Debe seleccionar un año de la lista.");
		document.getElementById("anio").focus();
		return false;
	}

	return true;
}