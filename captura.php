<?php 
require "config/config.php";
require "config/database.php";

$db = new Database();
$con = $db->conectar();

$json = file_get_contents('php://input');
$datos = json_decode($json, true);

echo '<pre>';
print_r($datos);
echo '<pre>';

$id_transaccion = $datos['details']['id'];
$total = $datos['details']['purchase_units'][0]['amount']['value'];
$status = $datos['details']['status'];
$fecha_obj = DateTime::createFromFormat('Y-m-d\TH:i:s\Z', $datos['details']['update_time']);
$fecha_nueva = $fecha_obj->format('Y-m-d H:i:s');
$email = $datos['details']['payer']['email_address'];
$id_cliente = $datos['details']['payer']['payer_id'];

$sql = $con->prepare("INSERT INTO compra (id_transaccion, fecha, status, email, id_cliente, total) VALUES (?, ?, ?, ?, ?, ?)");
$sql->execute([$id_transaccion, $fecha_nueva, $status, $email, $id_cliente, $total]);
$id = $con->lastInsertId();
?>
