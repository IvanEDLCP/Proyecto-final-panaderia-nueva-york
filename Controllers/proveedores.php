<?php

require_once "../Config/Conexion.php";
require_once "../Models/Proveedores.php";

$conexion = new Conexion();
$proveedor = new Proveedores();
$result = $proveedor->getData();

$data = [];

if ($result) {
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $data[] = $row;
    }
}

if (isset($_POST["create"])) {
    $proveedor_nit = $_POST["proveedor_nit"];
    $nombre = $_POST["nombre"];
    $direccion = $_POST["direccion"];
    $ubicacion = $_POST["ubicacion"];
    $telefono = $_POST["telefono"];
    $correo = $_POST["correo"];
    $proveedor->insertarProveedor($proveedor_nit, $nombre, $direccion, $ubicacion, $telefono, $correo);
    header("location: proveedores.php");
}


if (isset($_POST["edit"])) {
    $proveedor_nit = $_POST["proveedor_nit"];
    $nombre = $_POST["nombre"];
    $direccion = $_POST["direccion"];
    $ubicacion = $_POST["ubicacion"];
    $telefono = $_POST["telefono"];
    $correo = $_POST["correo"];
    $proveedor->updateProveedor($nombre, $direccion, $ubicacion, $telefono, $correo, $proveedor_nit);
    header("location: proveedores.php");
}

if (isset($_POST["delete"])) {
    $proveedor_nit = $_POST["proveedor_nit"];
    $proveedor->deleteData($proveedor_nit);
    header("location: proveedores.php");
}

require_once "../Views/proveedores.php";
exit();
?>