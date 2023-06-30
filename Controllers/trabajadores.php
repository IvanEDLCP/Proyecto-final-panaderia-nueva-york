<?php

require_once "../Config/Conexion.php";
require_once "../Models/Trabajadores.php";

$conexion = new Conexion();
$trabajador = new Trabajadores();
$result = $trabajador->getData();

$data = [];

if ($result) {
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $data[] = $row;
    }
}

if (isset($_POST["create"])) {
    $trabajador_id = $_POST["trabajador_id"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $edad = $_POST["edad"];
    $genero = $_POST["genero"];
    $direccion = $_POST["direccion"];
    $telefono = $_POST["telefono"];
    $correo = $_POST["correo"];
    $fecha_contratacion = $_POST["fecha_contratacion"];
    $puesto_id = $_POST["puesto_id"];
    $trabajador->insertarTrabajador($trabajador_id, $nombre, $apellido, $edad, $genero, $direccion, $telefono, $correo, $fecha_contratacion, $puesto_id);
    header("location: trabajadores.php");
}


if (isset($_POST["edit"])) {
    $trabajador_id = $_POST["trabajador_id"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $edad = $_POST["edad"];
    $genero = $_POST["genero"];
    $direccion = $_POST["direccion"];
    $telefono = $_POST["telefono"];
    $correo = $_POST["correo"];
    $fecha_contratacion = $_POST["fecha_contratacion"];
    $puesto_id = $_POST["puesto_id"];
    $trabajador->updateTrabajador($nombre, $apellido, $edad, $genero, $direccion, $telefono, $correo, $fecha_contratacion, $puesto_id, $trabajador_id);
    header("location: trabajadores.php");
}

if (isset($_POST["delete"])) {
    $trabajador_id = $_POST["trabajador_id"];
    $trabajador->deleteData($trabajador_id);
    header("location: trabajadores.php");
}

require_once "../Views/trabajadores.php";
exit();
?>