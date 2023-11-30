<?php
require_once 'dompdf/autoload.inc.php';
require_once 'conexionfactura.php';

use Dompdf\Dompdf;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM `facturas` WHERE numero = $id";
    $result = mysqli_query($conn, $sql);
}

if (isset($result) && mysqli_num_rows($result) > 0) {
    $html = '<h1>Facturas</h1>';
    $html .= '<table border="1">
                <tr>
                    <th>Fecha</th>
                    <th>Número</th>
                    <th>Cliente</th>
                    <th>Cobro</th>
                    <th>CIF</th>
                    <th>Vencimiento</th>
                    <th>Importe</th>
                </tr>';

    while ($row = mysqli_fetch_assoc($result)) {
        $html .= '<tr>
                    <td>' . $row['fecha'] . '</td>
                    <td>' . $row['numero'] . '</td>
                    <td>' . $row['cliente'] . '</td>
                    <td>' . $row['cobro'] . '</td>
                    <td>' . $row['cif'] . '</td>
                    <td>' . $row['vencimiento'] . '</td>
                    <td>' . $row['importe'] . '</td>
                  </tr>';
    }

    $html .= '</table>';

    $dompdf = new Dompdf();
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait'); // Opcional: tamaño de papel y orientación
    $dompdf->render();
    $dompdf->stream('facturas.pdf', array('Attachment' => 0)); // Descargar el PDF sin guardar
} else {
    echo 'No se encontraron facturas.';
}
?>