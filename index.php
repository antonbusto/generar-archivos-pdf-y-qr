<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Generar Archivo PDF con PHP</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <header>
	<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
	  <div class="container-fluid">
		<a class="navbar-brand" href="#">PHP a PDF</a>
	  </div>
	</nav>
    </header>
 <div class="container pt-1">
 <h1 class="mt-5">Generar Archivo PDF con PHP</h1>
 <hr>
<div class="btn btn-primary"><a href="generar-pdf.php" style="color:#FFF; text-decoration:none; " target="_blank">Visualizar en PDF</a></div>
<div class="btn btn-primary"><a href="descargar-pdf.php" style="color:#FFF; text-decoration:none; " target="_blank">Descargar PDF</a></div>
  <hr>
<div class="row">
  <div class="col">
<?php	

	include "conexion.php";
	echo '<table class="table"';	
	echo  '<thead>';
	echo  '<tr>';
	echo  '<th>ID</th>';
	echo  '<th>COD Transaccion</th>';
	echo  '<th>Nombres</th>';
	echo  '<th>Tipo de Pago</th>';
	echo  '<th>Estado Transaccion</th>';
	echo  '<th>E-mail</th>';
	echo  '</tr>';
	echo  '</thead>';
	echo  '<tbody>';
	
	$sql = "SELECT * FROM transacciones";
	$result = mysqli_query($conn, $sql);
	while($row = mysqli_fetch_assoc($result)){
		echo  '<tr><td>'.$row['id'] . "</td>";
		echo  '<td>'.$row['transaccion_cod'] . "</td>";
		echo  '<td>'.$row['nombres'] . "</td>";
		echo  '<td>'.$row['tipo_pago'] . "</td>";
		echo  '<td>'.$row['estado_transaccion'] . "</td>";
		echo  '<td>'.$row['email'] . "</td></tr>";		
	}
	
	echo  '</tbody>';
	echo  '</table>';
?>
</div>
</div><!-- Fin row -->
</div><!-- Fin container -->
    <footer class="footer">
      <div class="container">
        <span class="text-muted"><p class="text-center">PHP a PDF</p></span>
      </div>
    </footer>
    <!-- Bootstrap core JavaScript -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>