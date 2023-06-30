<?php

require_once "../Config/Conexion.php";
require_once "../Models/Maquinarias.php";

$conexion = new Conexion();
$maquinaria = new Maquinarias();
$result = $maquinaria->getData();

$data = [];

if ($result) {
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $data[] = $row;
    }
}

if (isset($_POST["create"])) {
    $maquinaria_id = $_POST["maquinaria_id"];
    $nombre = $_POST["nombre"];
    $marca = $_POST["marca"];
    $modelo = $_POST["modelo"];
    $estado = $_POST["estado"];
    $fecha_adquisicion = $_POST["fecha_adquisicion"];
    $trabajador_id = $_POST["trabajador_id"];
    $maquinaria->insertarMaquinaria($maquinaria_id, $nombre, $marca, $modelo, $estado, $fecha_adquisicion, $trabajador_id);
    header("location: maquinarias.php");
}


if (isset($_POST["edit"])) {
    $maquinaria_id = $_POST["maquinaria_id"];
    $nombre = $_POST["nombre"];
    $marca = $_POST["marca"];
    $modelo = $_POST["modelo"];
    $estado = $_POST["estado"];
    $fecha_adquisicion = $_POST["fecha_adquisicion"];
    $trabajador_id = $_POST["trabajador_id"];
    $maquinaria->updateMaquinaria($nombre, $marca, $modelo, $estado, $fecha_adquisicion, $trabajador_id, $maquinaria_id);
    header("location: maquinarias.php");
}

if (isset($_POST["delete"])) {
    $maquinaria_id = $_POST["maquinaria_id"];
    $maquinaria->deleteData($maquinaria_id);
    header("location: maquinarias.php");
}

require_once "../Views/maquinarias.php";
exit();
?>