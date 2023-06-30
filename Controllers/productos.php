<?php

require_once "../Config/Conexion.php";
require_once "../Models/Productos.php";

$conexion = new Conexion();
$producto = new Productos();
$result = $producto->getData();

$data = [];

if ($result) {
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $data[] = $row;
    }
}

if (isset($_POST["create"])) {
    $producto_id = $_POST["producto_id"];
    $nombre = $_POST["nombre"];
    $categoria_id = $_POST["categoria_id"];
    $peso_gr = $_POST["peso_gr"];
    $valor_unitario = $_POST["valor_unitario"];
    $insumo_id = $_POST["insumo_id"];
    $stock = $_POST["stock"];
    $fecha_exp = $_POST["fecha_exp"];
    $fecha_ven = $_POST["fecha_ven"];
    $maquinaria_id = $_POST["maquinaria_id"];
    $producto->insertarProducto($producto_id, $nombre, $categoria_id, $peso_gr, $valor_unitario, $insumo_id, $stock, $fecha_exp, $fecha_ven, $maquinaria_id);
    header("location: productos.php");
}


if (isset($_POST["edit"])) {
    $producto_id = $_POST["producto_id"];
    $nombre = $_POST["nombre"];
    $categoria_id = $_POST["categoria_id"];
    $peso_gr = $_POST["peso_gr"];
    $valor_unitario = $_POST["valor_unitario"];
    $insumo_id = $_POST["insumo_id"];
    $stock = $_POST["stock"];
    $fecha_exp = $_POST["fecha_exp"];
    $fecha_ven = $_POST["fecha_ven"];
    $maquinaria_id = $_POST["maquinaria_id"];
    $producto->updateProducto($nombre, $categoria_id, $peso_gr, $valor_unitario, $insumo_id, $stock, $fecha_exp, $fecha_ven, $maquinaria_id, $producto_id);
    header("location: productos.php");
}

if (isset($_POST["delete"])) {
    $producto_id = $_POST["producto_id"];
    $producto->deleteData($producto_id);
    header("location: productos.php");
}

require_once "../Views/productos.php";
exit();
?>