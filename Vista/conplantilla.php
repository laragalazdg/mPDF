<?php
//cargo el archivo de composer
require_once('../vendor/autoload.php');
//cargo los estilos
$css = file_get_contents('app/plantilla/reporte/style.css');
//importar contenido de la plantilla pdf
ob_start();
include('app/plantilla/reporte/ejemplo2.php');
$pdf = ob_get_contents();
ob_end_clean();

//creo instancia de mpdf
$mpdf = new \Mpdf\Mpdf([]);

//plantilla y estilos
$mpdf->writeHtml($css, \Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->writeHtml($pdf, \Mpdf\HTMLParserMode::HTML_BODY);

//salida
//"I" visualiza y permite decidir y bajarlo
$mpdf->Output("nombreArchivo.pdf", "I");
?>