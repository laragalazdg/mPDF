//console.log("hola");
var form  = document.getElementsByTagName('form')[0];
var nombre = document.getElementById('nombre');
var nombre_error = document.getElementById('nombre_mensaje_error');
var elemento = document.getElementById("content");
var check = document.getElementById("sicheck");
var clave = document.getElementById('clave');
var clave_error = document.getElementById('clave_mensaje_error');
var cantDescargas = document.getElementById('cantDescargas');
var cantDias = document.getElementById('dias');

nombre.addEventListener('input', function (event) {
	if (nombre.validity.valid) {
		nombre_error.innerHTML = '';
		nombre_error.className = 'sin_error';
	} else {
		showErrorNombre();
		nombre_error.className ='error';
	}
});

form.addEventListener('submit', function (event) {
	console.log("estoy dentro formmm");
	if(nombre.valueMissing) {
		showErrorNombre();
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

function showContent(){
	//console.log("ENTRA EN MOSTRAR CONTENIDO");
	if (check.checked) {
		elemento.style.display='';
	} else {
		elemento.style.display='none';
	}
}

function verificarContrasena(){
	console.log("ENTRA EN VERIFICAR");

	clave.addEventListener('input', function (event) {
		clave_error.className ='tipo_clave_debil';
		if(!clave.validity.valueMissing){
			clave.setCustomValidity("funciona");
			clave_error.textContent = 'OKEY';
		} else {
			clave.setCustomValidity("XXXXXXXXXXXXXXXXXX");
			clave_error.textContent='MIERDA';
		}
	});
}

function funcion_hash(){
	var numero = Math.floor(Math.random() * (45 - 10)) + 10;
	var contenido = "9007199254740991";

	var cadena="";
	var hash="";

	if(cantDescargas.value!=null && cantDias.value!=null) {
		cadena += numero+cantDescargas+cantDias;
	} else {
		cadena +=numero+contenido;
	}

	console.log(cadena);

	for(i=0; i < cadena.length; i++){
		hash += cadena.charCodeAt(i).toString();
	}
	document.getElementById("link").value=hash;
}
