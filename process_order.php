<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar datos del formulario
    $name = $_POST["name"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $paymentMethod = $_POST["payment"];

    // Aquí puedes procesar la información del pedido según tus necesidades

    // En este ejemplo, simplemente imprimimos los datos de confirmación
    echo "<h2>¡Pedido Confirmado!</h2>";
    echo "<p>Nombre: $name</p>";
    echo "<p>Correo Electrónico: $email</p>";
    echo "<p>Dirección de Envío: $address</p>";
    echo "<p>Método de Pago: $paymentMethod</p>";
} else {
    // Redirigir a la página de inicio si se intenta acceder directamente a este script
    header("Location: index.html");
    exit();
}
?>
