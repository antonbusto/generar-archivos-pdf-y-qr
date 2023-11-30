<?php
// Incluye la biblioteca dompdf
require 'dompdf/autoload.inc.php';

// Usar el namespace de Dompdf (evitar conflictos de nombres con otras clases en POO)
use Dompdf\Dompdf;

// Crea una instancia de Dompdf
$dompdf = new Dompdf();

/* Leer el contenido del archivo php y procesa las variables. ob_start() permite capturar y manipular la salida generada por PHP antes de que se envíe al navegador */
ob_start();
include '6-archivo-php-con-imagen.php';
/* devuelve el contenido almacenado en el búfer de salida activo y vacía el búfer. Cualquier contenido posterior generado por PHP se enviará directamente al navegador como se hace normalmente.*/
$html = ob_get_clean();

// Carga el contenido HTML en Dompdf
$dompdf->loadHtml($html);

// Se podrían hacer ajustes en la configuración de dompdf

// Renderizar el HTML a PDF
$dompdf->render();

// Obtener el contenido del PDF en una variable
$output = $dompdf->output();

// Enviar el PDF al navegador con los encabezados adecuados para mostrarlo
// Encabezado de tipo de archivo
header('Content-type: application/pdf');
// Encabezado para mostrar el archivo en lugar de descargarlo
header('Content-Disposition: inline; filename="mi_pdf_generado.pdf"');

// Imprimir todo el contenido del PDF
echo $output;
?>
