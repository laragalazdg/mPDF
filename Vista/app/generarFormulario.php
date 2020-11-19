<?php
include_once('../../configuracion.php');
//cargo el archivo de composer
require_once('../../vendor/autoload.php');
require_once('plantilla/reporte/estructuraFormulario.php');
//recupero los datos del formulario
$datos = data_submitted();
//print_r($datos);
//generar formulario
$pdf = generarFormulario($datos);


//importar estilos
$css = file_get_contents('plantilla/reporte/styles.css');



//creo instancia de mpdf
$mpdf = new \Mpdf\Mpdf([]);

//plantilla y estilos
$mpdf->writeHtml($css, \Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->writeHtml($pdf, \Mpdf\HTMLParserMode::HTML_BODY);

//salida
//"I" visualiza y permite decidir y bajarlo
$mpdf->Output("formulario.pdf", "I");
?>