<?php
// Incluye la biblioteca dompdf
require 'dompdf/autoload.inc.php';

// Usa el namespace de Dompdf (para evitar conflictos de clases personalizadas en POO)
use Dompdf\Dompdf;

// Crea una instancia de Dompdf
$dompdf = new Dompdf();

// Lee el contenido del archivo HTML sementeira.html
$html = file_get_contents('sementeira.html');

// Carga el contenido HTML en Dompdf
$dompdf->loadHtml($html);

// (Opcional) Puedes ajustar opciones de configuración aquí si lo deseas
/* 
Tamaño y orientación del papel:
$dompdf->setPaper('A4', 'portrait'); // Tamaño A4, orientación vertical
$dompdf->setPaper('letter', 'landscape'); // Tamaño carta, orientación horizontal

Establecer márgenes:
$dompdf->setMargins(20, 40, 20, 40); // Márgenes: arriba, derecha, abajo, izquierda

Cambiar la fuente predeterminada:
$dompdf->set_option('defaultFont', 'MiFuentePersonalizada');
*/

// Renderiza el HTML a PDF
$dompdf->render();

// Muestra el PDF en el navegador
$dompdf->stream('documento.pdf', array('Attachment' => 0));
?>
