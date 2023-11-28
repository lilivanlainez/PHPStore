<?php
require_once "config/conexion.php";
require_once "config/config.php";
require_once "fpdf/fpdf.php"; // Asegúrate de tener la biblioteca FPDF

// Función para obtener detalles del pedido desde la base de datos
function obtenerDetallesPedido($pedidoID) {
    // Implementa tu lógica para obtener los detalles del pedido desde la base de datos
    // Puedes usar consultas preparadas para mayor seguridad
    $conexion = obtenerConexion(); // Implementa esta función para obtener la conexión a la base de datos
    $query = "SELECT * FROM detalles_pedido WHERE pedido_id = ?";
    $statement = $conexion->prepare($query);
    $statement->bind_param("i", $pedidoID);
    $statement->execute();
    $result = $statement->get_result();
    $detallesPedido = $result->fetch_all(MYSQLI_ASSOC);
    $statement->close();
    $conexion->close();
    return $detallesPedido;
}

// Asume que el pedidoID está disponible, ya sea a través de una sesión o parámetro de URL
$pedidoID = $_GET['pedidoID']; // Ajusta según sea necesario

// Obtén los detalles del pedido
$detallesPedido = obtenerDetallesPedido($pedidoID);

// Generar PDF con los detalles del pedido
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(40, 10, 'Orden de Compra - UFG Market');
$pdf->Ln(10);

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(40, 10, 'Detalles del Pedido:');
$pdf->Ln(10);

// Mostrar detalles del pedido en el PDF
foreach ($detallesPedido as $detalle) {
    $pdf->Cell(40, 10, 'Producto: ' . $detalle['producto_id'] . ', Cantidad: ' . $detalle['cantidad']);
    $pdf->Ln(8);
}

// Mostrar información adicional del pedido (puedes ajustar esto según tus necesidades)
$pdf->Cell(40, 10, 'Total a Pagar: $' . obtenerTotalPedido($pedidoID));
$pdf->Ln(10);
$pdf->Cell(40, 10, 'Gracias por tu compra en UFG Market.');

// Nombre del archivo PDF (puedes ajustar esto según tus necesidades)
$nombreArchivo = 'orden_compra_' . $pedidoID . '.pdf';

// Salida del PDF
$pdf->Output('D', $nombreArchivo);

// Función para obtener el total del pedido desde la base de datos
function obtenerTotalPedido($pedidoID) {
    // Implementa tu lógica para obtener el total del pedido desde la base de datos
    // Puedes usar consultas preparadas para mayor seguridad
    $conexion = obtenerConexion(); // Implementa esta función para obtener la conexión a la base de datos
    $query = "SELECT total FROM pedidos WHERE id = ?";
    $statement = $conexion->prepare($query);
    $statement->bind_param("i", $pedidoID);
    $statement->execute();
    $result = $statement->get_result();
    $total = $result->fetch_assoc()['total'];
    $statement->close();
    $conexion->close();
    return $total;
}
?>
<?php
require_once "config/conexion.php";
require_once "config/config.php";
require_once "fpdf/fpdf.php"; // Asegúrate de tener la biblioteca FPDF

// Función para obtener detalles del pedido desde la base de datos
function obtenerDetallesPedido($pedidoID) {
    // Implementa tu lógica para obtener los detalles del pedido desde la base de datos
    // Puedes usar consultas preparadas para mayor seguridad
    $conexion = obtenerConexion(); // Implementa esta función para obtener la conexión a la base de datos
    $query = "SELECT * FROM detalles_pedido WHERE pedido_id = ?";
    $statement = $conexion->prepare($query);
    $statement->bind_param("i", $pedidoID);
    $statement->execute();
    $result = $statement->get_result();
    $detallesPedido = $result->fetch_all(MYSQLI_ASSOC);
    $statement->close();
    $conexion->close();
    return $detallesPedido;
}

// Asume que el pedidoID está disponible, ya sea a través de una sesión o parámetro de URL
$pedidoID = $_GET['pedidoID']; // Ajusta según sea necesario

// Obtén los detalles del pedido
$detallesPedido = obtenerDetallesPedido($pedidoID);

// Generar PDF con los detalles del pedido
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(40, 10, 'Orden de Compra - UFG Market');
$pdf->Ln(10);

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(40, 10, 'Detalles del Pedido:');
$pdf->Ln(10);

// Mostrar detalles del pedido en el PDF
foreach ($detallesPedido as $detalle) {
    $pdf->Cell(40, 10, 'Producto: ' . $detalle['producto_id'] . ', Cantidad: ' . $detalle['cantidad']);
    $pdf->Ln(8);
}

// Mostrar información adicional del pedido (puedes ajustar esto según tus necesidades)
$pdf->Cell(40, 10, 'Total a Pagar: $' . obtenerTotalPedido($pedidoID));
$pdf->Ln(10);
$pdf->Cell(40, 10, 'Gracias por tu compra en UFG Market.');

// Nombre del archivo PDF (puedes ajustar esto según tus necesidades)
$nombreArchivo = 'orden_compra_' . $pedidoID . '.pdf';

// Salida del PDF
$pdf->Output('D', $nombreArchivo);

// Función para obtener el total del pedido desde la base de datos
function obtenerTotalPedido($pedidoID) {
    // Implementa tu lógica para obtener el total del pedido desde la base de datos
    // Puedes usar consultas preparadas para mayor seguridad
    $conexion = obtenerConexion(); // Implementa esta función para obtener la conexión a la base de datos
    $query = "SELECT total FROM pedidos WHERE id = ?";
    $statement = $conexion->prepare($query);
    $statement->bind_param("i", $pedidoID);
    $statement->execute();
    $result = $statement->get_result();
    $total = $result->fetch_assoc()['total'];
    $statement->close();
    $conexion->close();
    return $total;
}
?>
