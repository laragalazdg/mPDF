<?php
//cargo el archivo de composer
require_once('../vendor/autoload.php');

//creo instancia de mpdf
$mpdf = new \Mpdf\Mpdf([]);

//contenido
$mpdf->writeHtml('Hola Mundo', \Mpdf\HTMLParserMode::HTML_BODY);

//salida
//"I" visualiza y permite decidir y bajarlo
$mpdf->Output("nombreArchivo.pdf", "I");
?>
