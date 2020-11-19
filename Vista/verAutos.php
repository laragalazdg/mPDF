<?php
include_once("../configuracion.php");
include_once("estructura/cabecera.php");

$objAbmAuto = new AbmAuto();
$listaAuto = $objAbmAuto->buscar(null);
//print_r($listaAuto);
?>

<div class="p-4">
	<div class="row">
		<div class="col"><h2>Vehiculos Ingresados</h2></div>
		<div class="col">
			<a href="app/realizarinforme.php" role="button" class="btn btn-info">Generar PDF</a>
		</div>
	</div>
</div>
<table class="table table-hover ">
	<thead>
		<tr>
			<th scope="col">Apellido</th>
			<th scope="col">Nombre</th>
			<th scope="col">Dni</th>
			<th scope="col">Patente</th>
			<th scope="col">Marca</th>
			<th scope="col">Modelo</th>
		</tr>
	</thead>
	<tbody>

		<?php foreach ($listaAuto as $auto): ?>
			<tr>
				<td><?= $auto->getDniDuenio()->getApellido()?></td>
				<td><?= $auto->getDniDuenio()->getNombre()?></td>
				<td><?= $auto->getDniDuenio()->getNrodoc()?></td>
				<td><?= $auto->getPatente()?></td>
				<td><?= $auto->getMarca()?></td>
				<td><?= $auto->getModelo()?></td>

			</tr>
		<?php endforeach; ?>

	</tbody>
</table>

</div>
<!--jquery-->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<!--jquery validation-->
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.12.0/jquery.validate.min.js"></script>
<?php

include_once("estructura/pie.php");
?>