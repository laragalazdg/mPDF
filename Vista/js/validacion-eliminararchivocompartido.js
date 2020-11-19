var form  = document.getElementsByTagName('form')[0];
var descripcion = document.getElementById('descripcion');
var descripcion_error = document.getElementById('descripcion_mensaje_error');
var usuario = document.getElementById('usuario');
var usuario_error = document.getElementById('usuario_mensaje_error');

usuario.addEventListener('change', function(event){

 	if(usuario.validity.valueMissing){
 		usuario_error.textContent = 'Debe elegir un usuario';
		usuario_error.className = 'error active';
 	} else{
 		usuario_error.className = 'sin_error';
 	}
});



descripcion.addEventListener('change', function(event){

	if(!descripcion.value){
		descripcion_error.textContent = 'Debe ingresar una descripcion';
		descripcion_error.className = 'error active';
	} else {
		descripcion_error.className = 'sin_error';
	}
});

form.addEventListener('submit', function (event) {

	if(usuario.validity.valueMissing){
		usuario_error.textContent ='debe elegir un usuario';
		event.preventDefault();
	}

});