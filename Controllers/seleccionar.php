<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $tabla = $_POST["tabla"];

    switch ($tabla) {
        case "puestos":
            header("Location: puestos.php");
            break;
        case "categoria":
            header("Location: categoria.php");
            break;
        case "proveedores":
            header("Location: proveedores.php");
            break;
        case "trabajadores":
            header("Location: trabajadores.php");
            break;
        case "clientes":
            header("Location: clientes.php");
            break;
        case "insumos":
            header("Location: insumos.php");
            break;
        case "rutas":
            header("Location: rutas.php");
            break;
        case "transportes":
            header("Location: transportes.php");
            break;
        case "maquinarias":
            header("Location: maquinarias.php");
            break;
        case "productos":
            header("Location: productos.php");
            break;
        case "historial":
            header("Location: historial.php");
            break;
        case "ventas":
            header("Location: ventas.php");
            break;
        default:
            header("Location: ../index.php");
            break;
    }
}

require "index.php";

?>