<?php

require_once "../Config/Conexion.php";
require_once "../Models/Categoria.php";

$conexion = new Conexion();
$categoria = new Categoria();
$result = $categoria->getData();

$data = [];

if ($result) {
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $data[] = $row;
    }
}

if (isset($_POST["create"])) {
    $categoria_id = $_POST["categoria_id"];
    $categoria->insertarId($categoria_id);
    header("location: categoria.php");
}

if (isset($_POST["delete"])) {
    $categoria_id = $_POST["categoria_id"];
    $categoria->deleteData($categoria_id);
    header("location: categoria.php");
}

require_once "../Views/categoria.php";
exit();
?>