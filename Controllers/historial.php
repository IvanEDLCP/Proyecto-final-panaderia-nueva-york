<?php

require_once "../Config/Conexion.php";
require_once "../Models/Historial.php";

$conexion = new Conexion();
$historial = new Historial();
$result = $historial->getData();

$data = [];

if ($result) {
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $data[] = $row;
    }
}

if (isset($_POST["create"])) {
    $historial_id = $_POST["historial_id"];
    $venta_id = $_POST["venta_id"];
    $cliente_id = $_POST["cliente_id"];
    $historial->insertarHistorial($historial_id, $venta_id, $cliente_id);
    header("location: historial.php");
}


if (isset($_POST["edit"])) {
    $historial_id = $_POST["historial_id"];
    $venta_id = $_POST["venta_id"];
    $cliente_id = $_POST["cliente_id"];
    $historial->updateHistorial($venta_id, $cliente_id, $historial_id);
    header("location: historial.php");
}

if (isset($_POST["delete"])) {
    $historial_id = $_POST["historial_id"];
    $historial->deleteData($historial_id);
    header("location: historial.php");
}

require_once "../Views/historial.php";
exit();
?>