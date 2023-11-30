<?php
// Utilizamos la librería phpqrcode
// https://sourceforge.net/projects/phpqrcode/

/* Es necesario tener habilitada la extensión GD, librería para creación de gráfica de PHP. En localhost tenemos que comprobar la configuración de php.ini para activarla si está desactivada (en Internet suele estar activada en el servidor, si no lo está la activamos en el Panel de Control). Buscamos extension=gd, estará aproximadamente la línea 925. Si está comentada con ; hay que decomentarla (sacar el ;). Después hay que guardar y reiniciar el servidor. */

// Incluir la biblioteca QR Code
require 'phpqrcode/qrlib.php';

// Especificar el texto que se convertirá en código QR
$url = "https://tabladeflandes.com/educages";

// Establecer la ruta y nombre del archivo de imagen del código QR (puede ser una ruta relativa o absoluta)
$rutaArchivo = 'codigo_qr.png';

// Tamaño del código QR (valores posibles: 1-10, donde 1 es el más pequeño y 10 es el más grande)
$tamano = 10;

/* Nivel de corrección de errores (valores posibles: L, M, Q, H). Se refiere a la cantidad de redundancia que se añade al código QR para permitir que este pueda ser decodificado correctamente incluso si parte del código QR está dañado o borroso. Para desarrollo web aconsejable: M, para imprimir en papel Q, para imprimir pegatinas o superficies rugosas H. */
$correccionErrores = 'M';

// Crear el código QR
QRcode::png($url, $rutaArchivo, $correccionErrores, $tamano);

// Generar el PDF con DOMPDF
ob_start(); // Iniciar el almacenamiento en búfer de salida
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Ejemplo de código QR</title>
    <style>
        /* Adaptar el tamaño del código a la maquetación */
        .codigo-qr {
            width: 250px;
            height: 250px;
        }
    </style>
</head>
<body>
    <img src="data:image/png;base64,<?php echo base64_encode(file_get_contents($rutaArchivo)); ?>" alt="Código QR" class="codigo-qr">
<!--
La codificación que se muestra en la etiqueta img es una forma de incrustar una imagen directamente en el código HTML utilizando el esquema de codificación base64. En lugar de proporcionar una URL tradicional en el atributo src, se codifica la imagen como una cadena base64 y se agrega directamente en el atributo src.

Veamos qué significa cada parte de la codificación:

data:image/png;base64,: Esto indica que el contenido siguiente es una imagen codificada en formato PNG utilizando base64. Puedes cambiar image/png por image/jpeg o el tipo de imagen correspondiente si la imagen es de otro formato (por ejemplo, JPEG, GIF, etc.).

 base64_encode(file_get_contents($rutaArchivo)); : Esta es la parte dinámica de la codificación. Aquí, PHP lee el contenido del archivo ubicado en la ruta especificada por $rutaArchivo, luego lo codifica en base64 usando la función base64_encode y finalmente se incrusta en el Data URI.

alt="Código QR": Es el atributo alt que proporciona un texto alternativo para la imagen en caso de que no se pueda cargar o visualizar.

class="codigo-qr": Esto es un atributo opcional de la clase CSS que se puede usar para aplicar estilos personalizados a la imagen.

La principal ventaja de esta técnica es que la imagen está directamente incorporada en el HTML, lo que significa que no es necesario realizar una solicitud adicional al servidor para obtener la imagen. Sin embargo, esto también puede aumentar el tamaño del HTML, lo que puede afectar el rendimiento en casos de imágenes grandes o numerosas.

Este enfoque suele ser útil cuando se desea incluir imágenes pequeñas, como iconos o imágenes de carga, directamente en el código HTML sin depender de archivos externos. Es importante tener en cuenta que, en general, esta técnica es más adecuada para imágenes pequeñas y de baja resolución, ya que las imágenes grandes o de alta resolución pueden aumentar significativamente el tamaño del HTML y afectar el tiempo de carga de la página.
-->
</body>
</html>
<?php
$html = ob_get_clean(); // Obtener el contenido del búfer de salida y limpiarlo

// Generar el PDF utilizando DOMPDF
require_once 'dompdf/autoload.inc.php';

use Dompdf\Dompdf;

$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait'); // Opcional: Configura el tamaño y orientación del papel
$dompdf->render();

// Mostrar el PDF en pantalla
$dompdf->stream('codigo_qr.pdf', array('Attachment' => 0));
