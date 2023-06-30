<?php

require_once "../Config/Conexion.php";
require_once "../Models/Rutas.php";

$conexion = new Conexion();
$ruta = new Rutas();
$result = $ruta->getData();

$data = [];

if ($result) {
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $data[] = $row;
    }
}

if (isset($_POST["create"])) {
    $ruta_id = $_POST["ruta_id"];
    $distancia = $_POST["distancia"];
    $zona_ubicacion = $_POST["zona_ubicacion"];
    $transporte_id = $_POST["transporte_id"];
    $ruta->insertarRuta($ruta_id, $distancia, $zona_ubicacion, $transporte_id);
    header("location: rutas.php");
}


if (isset($_POST["edit"])) {
    $ruta_id = $_POST["ruta_id"];
    $distancia = $_POST["distancia"];
    $zona_ubicacion = $_POST["zona_ubicacion"];
    $transporte_id = $_POST["transporte_id"];
    $ruta->updateRuta($distancia, $zona_ubicacion, $transporte_id, $ruta_id);
    header("location: rutas.php");
}

if (isset($_POST["delete"])) {
    $ruta_id = $_POST["ruta_id"];
    $ruta->deleteData($ruta_id);
    header("location: rutas.php");
}

require_once "../Views/rutas.php";
exit();
?>