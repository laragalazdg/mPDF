<?php
include_once("../configuracion.php");
include_once("estructura/cabecera.php");

$objAbmAuto = new AbmAuto();
$listaAuto = $objAbmAuto->buscar(null);
//print_r($listaAuto);
?>
<div class="container">
	<div class="contenido" style="width: 70%;">
		<div class="card shadow">
			<h5 class="card-header" style="text-align: left; color:#452FA8">
				DONACIONES
			</h5>
			<div class="card-body">
				<form class="form-signin" id="donacion" name="donacion" method="POST" action="app/generarFormulario.php" data-toggle="validator">
					<div class="row">
						<div class="form-group col-md-6">
							<label for="titulo"><h6>Nombre: </h6></label>
							<input type="text" class="form-control" id="nombre" name="nombre" >
						</div>
						<div class="form-group col-md-6">
							<label for="titulo"><h6>Apellido: </h6></label>
							<input type="text" class="form-control" id="apellido" name="apellido" >
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-6">
							<label for="titulo"><h6>Direccion: </h6></label>
							<input type="text" class="form-control" id="direccion" name="direccion" >
						</div>
						<div class="form-group col-md-6">
							<label for="titulo"><h6>Codigo Postal: </h6></label>
							<input type="number" class="form-control" id="cp" name="cp" >
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-3">
							<label for="titulo"><h6>Monto a donar: $ </h6></label>
						</div>
						<div class="form-group col-md-9">
							<input type="number" class="form-control" id="monto" name="monto">
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-6">
							<label for="titulo"><h6>Me gustaría que mi donacion se utilizara para: </h6></label>
						</div>
						<div class="form-group col-md-6">
							<select class="form-group" name="donacion">
								<option value="greenpeace">greenpeace</option>
								<option value="unicef">unicef</option>
								<option value="medicos sin fronteras">medicos sin fronteras</option>
								<option value="brigada de paz">brigada de paz</option>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-3">
							<label for="titulo"><h6>Descripcion: </h6></label>
						</div>
						<div class="form-group col-md-9">
							<textarea class="form-control" id="descripcion" name="descripcion"></textarea>
						</div>
					</div>

					<div class="row" style="float: right;">
						<button type="submit" class="btn btn-primary mb-2" style="margin: 15px;">DONAR</button>
					</div>

				</form>
			</div>
		</div>
	</div>
</div>
</body>

<!--jquery-->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<!--jquery validation-->
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.12.0/jquery.validate.min.js"></script>
<?php

include_once("estructura/pie.php");
?>