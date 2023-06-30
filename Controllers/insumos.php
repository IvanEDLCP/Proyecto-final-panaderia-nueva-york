<?php

require_once "../Config/Conexion.php";
require_once "../Models/Insumos.php";

$conexion = new Conexion();
$insumo = new Insumos();
$result = $insumo->getData();

$data = [];

if ($result) {
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $data[] = $row;
    }
}

if (isset($_POST["create"])) {
    $insumo_id = $_POST["insumo_id"];
    $nombre = $_POST["nombre"];
    $lote = $_POST["lote"];
    $cantidad_kg = $_POST["cantidad_kg"];
    $precio_kg = $_POST["precio_kg"];
    $proveedor_nit = $_POST["proveedor_nit"];
    $insumo->insertarInsumo($insumo_id, $nombre, $lote, $cantidad_kg, $precio_kg, $proveedor_nit);
    header("location: insumos.php");
}


if (isset($_POST["edit"])) {
    $insumo_id = $_POST["insumo_id"];
    $nombre = $_POST["nombre"];
    $lote = $_POST["lote"];
    $cantidad_kg = $_POST["cantidad_kg"];
    $precio_kg = $_POST["precio_kg"];
    $proveedor_nit = $_POST["proveedor_nit"];
    $insumo->updateInsumo($nombre, $lote, $cantidad_kg, $precio_kg, $proveedor_nit, $insumo_id);
    header("location: insumos.php");
}

if (isset($_POST["delete"])) {
    $insumo_id = $_POST["insumo_id"];
    $insumo->deleteData($insumo_id);
    header("location: insumos.php");
}

require_once "../Views/insumos.php";
exit();
?>