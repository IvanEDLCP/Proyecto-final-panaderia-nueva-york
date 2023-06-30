<?php

require_once "../Config/Conexion.php";
require_once "../Models/Ventas.php";

$conexion = new Conexion();
$venta = new Ventas();
$result = $venta->getData();

$data = [];

if ($result) {
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $data[] = $row;
    }
}

if (isset($_POST["create"])) {
    $venta_id = $_POST["venta_id"];
    $fecha_hora = $_POST["fecha_hora"];
    $cliente_id = $_POST["cliente_id"];
    $producto_id = $_POST["producto_id"];
    $cantidad = $_POST["cantidad"];
    $valor_total = $_POST["valor_total"];
    $estado = $_POST["estado"];
    $venta->insertarVenta($venta_id, $fecha_hora, $cliente_id, $producto_id, $cantidad, $valor_total, $estado);
    header("location: ventas.php");
}


if (isset($_POST["edit"])) {
    $venta_id = $_POST["venta_id"];
    $fecha_hora = $_POST["fecha_hora"];
    $cliente_id = $_POST["cliente_id"];
    $producto_id = $_POST["producto_id"];
    $cantidad = $_POST["cantidad"];
    $valor_total = $_POST["valor_total"];
    $estado = $_POST["estado"];
    $venta->updateVenta($fecha_hora, $cliente_id, $producto_id, $cantidad, $valor_total, $estado, $venta_id);
    header("location: ventas.php");
}

if (isset($_POST["delete"])) {
    $venta_id = $_POST["venta_id"];
    $venta->deleteData($venta_id);
    header("location: ventas.php");
}

require_once "../Views/ventas.php";
exit();
?>