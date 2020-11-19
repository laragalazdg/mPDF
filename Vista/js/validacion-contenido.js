var form  = document.getElementsByTagName('form')[0];
var nuevo = document.getElementById('name');
var nuevo_error = document.getElementById('carpeta_mensaje_error');
var carpeta = document.getElementsByClassName('carpeta');

for (var i=0; i< carpeta.length; i++) {
	carpeta[i].addEventListener("click",function() {
		anterior = document.getElementsByClassName('table-primary');
		if(anterior.length!=0){
			anterior[0].className='carpeta';
		}
		this.className='carpeta table-primary';

	});
}

nuevo.addEventListener('input', function (event) {
	if (nuevo.validity.valid) {
		nuevo_error.innerHTML = '';
		nuevo_error.className = 'sin_error';
	} else {
		showErrorNuevo();
		nuevo_error.className ='error';
	}
});

form.addEventListener('submit', function (event) {
	console.log("estoy dentro formmm");
	if(nuevo.validity.valueMissing) {
		showErrorNuevo();
	}

});

function showErrorNuevo() {
	let patron= /[a-zA-Z0-9]/;
	if(nuevo.validity.valueMissing) {
		nuevo_error.textContent = 'Debe ingresar su nombre';
	} else if(!patron.test(nuevo.value)){
		nuevo_error.textContent ='el nombre ingresado es invalido';
	}
	nombre_error.className = 'error active';
}


