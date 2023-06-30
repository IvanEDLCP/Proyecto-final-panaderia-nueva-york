<?php

require_once "../Config/Conexion.php";
require_once "../Models/Clientes.php";

$conexion = new Conexion();
$cliente = new Clientes();
$result = $cliente->getData();

$data = [];

if ($result) {
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $data[] = $row;
    }
}

if (isset($_POST["create"])) {
    $cliente_id = $_POST["cliente_id"];
    $nombre = $_POST["nombre"];
    $direccion = $_POST["direccion"];
    $ubicacion = $_POST["ubicacion"];
    $telefono = $_POST["telefono"];
    $correo = $_POST["correo"];
    $tipo_cliente = $_POST["tipo_cliente"];
    $ruta_id = $_POST["ruta_id"];
    $cliente->insertarCliente($cliente_id, $nombre, $direccion, $ubicacion, $telefono, $correo, $tipo_cliente, $ruta_id);
    header("location: clientes.php");
}


if (isset($_POST["edit"])) {
    $cliente_id = $_POST["cliente_id"];
    $nombre = $_POST["nombre"];
    $direccion = $_POST["direccion"];
    $ubicacion = $_POST["ubicacion"];
    $telefono = $_POST["telefono"];
    $correo = $_POST["correo"];
    $tipo_cliente = $_POST["tipo_cliente"];
    $ruta_id = $_POST["ruta_id"];
    $cliente->updateCliente($nombre, $direccion, $ubicacion, $telefono, $correo, $tipo_cliente, $ruta_id, $cliente_id);
    header("location: clientes.php");
}

if (isset($_POST["delete"])) {
    $cliente_id = $_POST["cliente_id"];
    $cliente->deleteData($cliente_id);
    header("location: clientes.php");
}

require_once "../Views/clientes.php";
exit();
?>