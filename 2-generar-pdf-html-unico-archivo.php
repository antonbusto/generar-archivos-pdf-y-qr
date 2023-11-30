<?php
// Incluye la biblioteca dompdf
require 'dompdf/autoload.inc.php';

// Usa el namespace de Dompdf (para evitar conflictos de clases personalizadas en POO)
use Dompdf\Dompdf;

// Crea una instancia de Dompdf
$dompdf = new Dompdf();

// Escribier el archivo html
$html = "<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'>
    <title>O carro</title>
</head>
<body>
	<header>
	<h1>Fuxan Os Ventos</h1>
	<h2>O carro</h2>
    <p>Non canta na chá ninguén<br>
	Por eso, meu carro canta<br>
	Canta o seu eixo tan ben<br>
	Que a señardade me espanta</p>
	</header>
</body>
</html>";

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
$dompdf->stream('carro.pdf', array('Attachment' => 0));
?>
