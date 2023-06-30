<?php

require_once "../Config/Conexion.php";
require_once "../Models/Puestos.php";

$conexion = new Conexion();
$puesto = new Puestos();
$result = $puesto->getData();

$data = [];

if ($result) {
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $data[] = $row;
    }
}

if (isset($_POST["create"])) {
    $puesto_id = $_POST["puesto_id"];
    $nombre = $_POST["nombre"];
    $salario = $_POST["salario"];
    $puesto->insertarPuesto($puesto_id, $nombre, $salario);
    header("location: puestos.php");
}


if (isset($_POST["edit"])) {
    $puesto_id = $_POST["puesto_id"];
    $nombre = $_POST["nombre"];
    $salario = $_POST["salario"];
    $puesto->updatePuesto($nombre, $salario, $puesto_id);
    header("location: puestos.php");
}

if (isset($_POST["delete"])) {
    $puesto_id = $_POST["puesto_id"];
    $puesto->deleteData($puesto_id);
    header("location: puestos.php");
}

require_once "../Views/puestos.php";
exit();
?>