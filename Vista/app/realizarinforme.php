<?php
//cargo el archivo de composer
require_once('../../vendor/autoload.php');
//importar estilos
$css = file_get_contents('plantilla/reporte/estilos.css');
//importar contenido de la plantilla pdf
ob_start();
include('plantilla/reporte/estructurapdf.php');
$pdf = ob_get_contents();
ob_end_clean();

//creo instancia de mpdf
$mpdf = new \Mpdf\Mpdf([]);

//plantilla y estilos
$mpdf->writeHtml($css, \Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->writeHtml($pdf, \Mpdf\HTMLParserMode::HTML_BODY);

//salida
//"I" visualiza y permite decidir y bajarlo
$mpdf->Output("informe.pdf", "I");
?>