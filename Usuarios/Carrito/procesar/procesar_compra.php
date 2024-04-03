<?php
session_start();
$_SESSION['usuario_id'] = 1 + 1;

$conexion = new mysqli("localhost", "root", "", "muebleria");
mysqli_set_charset($conexion, "utf8");
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$usuario_id = $_SESSION['usuario_id'];

$sql_usuario = "SELECT nombreu, correo FROM usuarios WHERE id = $usuario_id";
$resultado_usuario = $conexion->query($sql_usuario);
$usuario = $resultado_usuario->fetch_assoc();

$referencia_pago = 'xxxxxxxxxxxxxxxxxxx';
$fecha_limite = date('Y-m-d', strtotime('+1 week'));

require('fpdf.php');
$pdf = new FPDF('P', 'mm', 'Letter');
$pdf->SetFont('Arial', '', 12);
$pdf->SetAutoPageBreak(true, 10);
$pdf->AddPage();
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 10, 'Olivares Muebles', 0, 1, 'C');
$pdf->Cell(0, 10, 'Referencia de Pago', 0, 1, 'C');
$pdf->Cell(0, 10, 'Nombre del Usuario: ' . $usuario['nombreu'], 0, 1, 'C');
$pdf->Cell(0, 10, 'Correo del Usuario: ' . $usuario['correo'], 0, 1, 'C');
$pdf->Cell(0, 10, utf8_decode('Fecha Límite: ') . $fecha_limite, 0, 1, 'C');
$pdf->Cell(0, 10, 'Referencia: ' . $referencia_pago, 0, 1, 'C');
$pdf->Cell(0, 10, 'Detalles del Carrito:', 0, 1, 'C');

$sql_carrito = "SELECT productos.nombrep, productos.precio FROM productos INNER JOIN carrito ON productos.codigo = carrito.productos_id";
$resultado_carrito = $conexion->query($sql_carrito);

if ($resultado_carrito->num_rows > 0) {
    while ($row = $resultado_carrito->fetch_assoc()) {
        $pdf->Cell(0, 10, 'Nombre: ' . utf8_decode($row['nombrep']), 0, 1, 'C');
        $pdf->Cell(0, 10, 'Precio: $' . $row['precio'], 0, 1, 'C');
        $pdf->Ln();
    }
} else {
    $pdf->Cell(0, 10, 'El carrito esta vacio', 0, 1, 'C');
}

$sql_total = "SELECT SUM(productos.precio) AS total FROM productos INNER JOIN carrito ON productos.codigo = carrito.productos_id";
$resultado_total = $conexion->query($sql_total);
$total = $resultado_total->fetch_assoc()['total'];
$pdf->Cell(0, 10, 'Total: $' . $total, 0, 1, 'C');

$pdf->Output('I', 'ReferenciaPago.pdf');

$conexion->close();
?>