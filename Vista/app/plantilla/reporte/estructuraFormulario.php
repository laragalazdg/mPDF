<?php
function generarFormulario($datos){
	//print_r($datos);
	$plantilla = '<body>
	<header class="clearfix">
	<div id="logo">
	<img src="img/fai.png">
	</div>
	<h1>COMPROBANTE DONACIÓN REALIZADA</h1>
	<div id="company" class="clearfix">
	<div>Brotsky&Galaz ONG</div>
	<div>Buenos Aires 1400 (8300) Neuquén Capital, Patagonia Argentina</div>
	<div>+54-299-4490300</div>
	<div><a href="https://www.uncoma.edu.ar/">hola@uncoma.edu.ar</a></div>
	</div>
	<div id="project">';

	$plantilla.='<div><span>DONACIÓN REALIZADA A: </span>'.$datos['donacion'].'</div>
	<div><span>DIRECCION</span> '.$datos['direccion'].'<span>   CODIGO POSTAL: </span> '.$datos['cp'].'<div>
	<div><span>FECHA DE EMISION</span> '.date("d-m-Y").'</div></div>';


	$plantilla.= '<table>
	<thead>
	<tr>
	<th class="service">DONACIÓN</th>
	<th class="desc">DESCRIPCIÓN</th>
	<th>VALOR</th>
	<th>TOTAL</th>
	</tr>
	</thead>
	<tbody>';

	$plantilla.='<tr>
	<td class="service">'. $datos["donacion"].'</td>
	<td class="desc">'. $datos["descripcion"].'</td>
	<td class="unit">$'. $datos["monto"].'</td>
	<td class="total">$'. $datos["monto"].'</td>
	</tr>';

	$plantilla.='</tbody>
	</table>
	<div id="notices">
	<div>IMPORTANTE:</div>
	<div class="notice">COMPROBANTE VALIDO HASTA NOVIEMBRE 2021.</div>
	</div>
	</main>
	</body>';
	return $plantilla;
}
?>