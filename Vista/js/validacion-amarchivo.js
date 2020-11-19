var form  = document.getElementsByTagName('form')[0];
var nombre = document.getElementById('nombre');
var nombre_error = document.getElementById('nombre_mensaje_error');
var usuario = document.getElementById('usuario');
var usuario_error = document.getElementById('usuario_mensaje_error');
var archivo = document.getElementById('archivo');
var doc = document.getElementById('doc');
var pdf = document.getElementById('pdf');
var zip = document.getElementById('zip');
var img = document.getElementById('img');

nombre.addEventListener('input', function (event) {
	if (nombre.validity.valid) {
		nombre_error.innerHTML = '';
		nombre_error.className = 'sin_error';
	} else {
		showErrorNombre();
		nombre_error.className ='error';
	}
});

usuario.addEventListener('change', function (event){
	if(usuario.validity.valid){
		usuario_error.innerHTML = '';
		usuario_error.className = 'sin_error';
	} else {
		usuario_error.textContent ='debe elegir un usuario';
		usuario_error.className ='error';
	}
});

form.addEventListener('submit', function (event) {
	if(nombre.validity.valueMissing) {
		showErrorNombre();
		event.preventDefault();
	}
	if(usuario.validity.valueMissing){
		usuario_error.textContent ='debe elegir un usuario';
		event.preventDefault();
	}

});



function showErrorNombre() {
	if(nombre.validity.valueMissing) {
		nombre_error.textContent = 'Debe ingresar su nombre';
	} else if(nombre.validity.patternMismatch) {
		nombre_error.textContent = 'la cadena ingresada no es valida';
	} else if(nombre.validity.tooShort) {
		nombre_error.textContent = `El nombre debe tener como minimo ${ nombre.minLength } caracteres; se ingreso ${ nombre.value.length }.`;
	}else if(nombre.validity.tooLong) {
		nombre_error.textContent = `El nombre debe tener como maximo ${ nombre.maxLength } caracteres; se ingreso ${ nombre.value.length }.`;
	}
	nombre_error.className = 'error active';
}

archivo.addEventListener('change', function(){
	var extension = archivo.value.toLowerCase();
	var pos = extension.lastIndexOf('.');
	extension = extension.substring(pos+1);
	var sugerencia;
	switch(extension){
		case "doc": doc.checked = 'true';
			sugerencia = ".doc";
		break;
		case "docx": doc.checked = 'true';
			sugerencia = ".doc";
		break;
		case "pdf": pdf.checked = 'true';
			sugerencia = ".pdf";
		break;
		case "img": img.checked = 'true';
			sugerencia = ".img";
		break;
		case "jpg": img.checked = 'true';
			sugerencia = ".img";
		break;
		case "jpeg": img.checked = 'true';
			sugerencia = ".img";
		break;
		case "png": img.checked = 'true';
			sugerencia = ".img";
		break;
		case "xls": img.checked = 'true';
			sugerencia = ".img";
		break;
		case "zip": zip.checked = 'true';
			sugerencia = ".zip";
		break;
	}
	window.alert('se sugiere seleccionar el icono '+sugerencia);
});


document.querySelector('.custom-file-input').addEventListener('change',function(e){
  var fileName = document.getElementById("archivo").files[0].name;
  var nextSibling = e.target.nextElementSibling
  nextSibling.innerText = fileName
})