<?php // generar-pdf-desde-codigo-html-con-imagen-en-un-unico-archivo.php
// incluir la biblioteca
require_once 'dompdf/autoload.inc.php';
// usar el espacio de nombres
use Dompdf\Dompdf;
// crear una instancia
$dompdf = new Dompdf();

// variable para el nombre de la imagen
$imagen = 'provincias-antiguas.jpg';
// hay que obtener la ruta completa y absoluta de la imagen
$rutaImagen = dirname(__FILE__) . '/' . $imagen;
// para poder inscrustar la imagen en HTML hay que codificar en base64
$imagenCodificada = base64_encode(file_get_contents($rutaImagen));
// base64_encode: convierte la cadena de datos binarios representando en texto ASCII seguro y fiable
// file_get_contents: obtiene datos binarios de la imagen

// Creo la variable para el código HTML
$html = "
<!DOCTYPE html>
<html>
<head>
<title>Provincias antiguas</title>
<style>
.container {
width: 80%;
margin: 0 auto;
text-align: center;
}
/* responsive */
img {
max-width: 100%;
height: auto;
}
</style>
</head>
<body>
<div class='container'>
<h1>HTML a PDF</h1>
<h2>Provincias antiguo Reino de Galicia</h2>
<p>Santiago, A Coruña, Betanzos, Lugo, Mondoñedo, Ourense, y Tui</p>
<!-- La imagen se carga directamente en base64, hay que inscrustrarla en HTML -->
<img src='data:image/jpeg;base64,$imagenCodificada' alt='foto'>
</div>
</body>
</html>";

// carga el contenido HTML en Dompdf
$dompdf->loadHtml($html);

/* 
opciones de configuración
Tamaño y orientación del papel:
$dompdf->setPaper('A4', 'portrait'); // A4 vertical
$dompdf->setPaper('A4', 'landscape'); // A4 horizontal
$dompdf->setPaper('letter', 'landscape'); // Tamaño carta

Establecer los márgenes:
$dompdf->setMargins(20,40,20,40); // arriba, derecha, abajo, izquierda
*/

// renderizar el HTML a PDF
$dompdf->render();

header("Content-type:application/pdf");
header("Content-Disposition:inline;filename=mapa.pdf");

// mostrar el PDF en el navegador
$dompdf->stream('mapa.pdf', array('Attachment'=>0));
?>