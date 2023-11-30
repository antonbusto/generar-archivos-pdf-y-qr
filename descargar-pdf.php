<?php	

	include "conexion.php";
	$html= '<table border=1';	
	$html.= '<thead>';
	$html.= '<tr>';
	$html.= '<th>ID</th>';
	$html.= '<th>COD Transaccion</th>';
	$html.= '<th>Nombres</th>';
	$html.= '<th>Tipo de Pago</th>';
	$html.= '<th>Estado Transaccion</th>';
	$html.= '<th>E-mail</th>';
	$html.= '</tr>';
	$html.= '</thead>';
	$html.= '<tbody>';
	
	$sql = "SELECT * FROM transacciones";
	$result = mysqli_query($conn, $sql);
	while($row = mysqli_fetch_assoc($result)){
		$html.= '<tr><td>'.$row['id'] . "</td>";
		$html.= '<td>'.$row['transaccion_cod'] . "</td>";
		$html.= '<td>'.$row['nombres'] . "</td>";
		$html.= '<td>'.$row['tipo_pago'] . "</td>";
		$html.= '<td>'.$row['estado_transaccion'] . "</td>";
		$html.= '<td>'.$row['email'] . "</td></tr>";		
	}
	
	$html.= '</tbody>';
	$html.= '</table';

	
	//referencia
	use Dompdf\Dompdf;

	// incluye autoloader
	require_once("dompdf/autoload.inc.php");

	//Creando instancia para generar PDF
	$dompdf = new DOMPDF();
	
	// Cargar el HTML
	$dompdf->load_html('<h1 style="text-align: center;">Lista de Transacciones</h1>'. $html.'
		');

	//Renderizar o html
	$dompdf->render();

	//Exibibir nombre de archivo
	$dompdf->stream(
		"Lista_Transacciones", 
		array(
			"Attachment" => true //Para realizar la descarga
		)
	);
?>