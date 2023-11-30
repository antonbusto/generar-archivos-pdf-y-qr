<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
    <title>convertir-archivo-php-con-imagen.php</title>
    <style>
        /* responsive */
        img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
    <h1>Convertir a PDF desde archivo PHP con una imagen</h1>
    <p>Ejemplo de cómo generar un archivo PDF desde un archivo con extensión php que incluye una imagen.</p>
    <?php
        // Variables PHP (podrían obtenerse desde una Base de Datos)
        $nombre = "Alex";
        $imagen = "galicia.jpg";

        // Necesitamos obtener la ruta completa y absoluta de la imagen
        $rutaImagen = dirname(__FILE__) . '/' . $imagen;
        
        // Al tratarse de un archivo php se debe leer la imagen y conviértela a base64 ()
        $imagenCodificada = base64_encode(file_get_contents($rutaImagen));
		//  file_get_contents lee el contenido del archivo de imagen y lo devuelve como una cadena de bytes (datos binarios) .
		// base64_encode() convierte la cadena de bytes (datos binarios) en una cadena de caracteres en formato base64. Esto permite representar los datos binarios en texto ASCII seguro y legible,  lo que permite incrustarla directamente en el contenido HTML
		
    ?>
    <p>Hola, <?php echo $nombre; ?>. Bienvenido al PDF.</p>
	<!-- incunstrar la imagen -->
    <img src="data:image/jpeg;base64,<?php echo $imagenCodificada; ?>" alt="Foto">
	<!-- ejecutarlo para probarlo antes de continuar -->
</body>
</html>