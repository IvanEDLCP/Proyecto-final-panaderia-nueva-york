<?php

require_once "../Config/Conexion.php";
require_once "../Models/Transportes.php";

$conexion = new Conexion();
$transporte = new Transportes();
$result = $transporte->getData();

$data = [];

if ($result) {
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $data[] = $row;
    }
}

if (isset($_POST["create"])) {
    $transporte_id = $_POST["transporte_id"];
    $tipo_transporte = $_POST["tipo_transporte"];
    $capacidad_maxima = $_POST["capacidad_maxima"];
    $estado = $_POST["estado"];
    $fecha_adquisicion = $_POST["fecha_adquisicion"];
    $ruta_id = $_POST["ruta_id"];
    $transporte->insertarTransporte($transporte_id, $tipo_transporte, $capacidad_maxima, $estado, $fecha_adquisicion, $ruta_id);
    header("location: transportes.php");
}


if (isset($_POST["edit"])) {
    $transporte_id = $_POST["transporte_id"];
    $tipo_transporte = $_POST["tipo_transporte"];
    $capacidad_maxima = $_POST["capacidad_maxima"];
    $estado = $_POST["estado"];
    $fecha_adquisicion = $_POST["fecha_adquisicion"];
    $ruta_id = $_POST["ruta_id"];
    $transporte->updateTransporte($tipo_transporte, $capacidad_maxima, $estado, $fecha_adquisicion, $ruta_id,$transporte_id);
    header("location: transportes.php");
}

if (isset($_POST["delete"])) {
    $transporte_id = $_POST["transporte_id"];
    $transporte->deleteData($transporte_id);
    header("location: transportes.php");
}

require_once "../Views/transportes.php";
exit();
?>