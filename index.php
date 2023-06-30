<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="Public/Assets/Bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="Public/Assets/DataTables/datatables.min.css">
    <link rel="stylesheet" href="Public/Assets/Icons/font-awasome/all.min.css">
</head>

<body>
    <nav class="navbar bg-light">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="Public/Assets/images/logo.png" alt="Logo" width="70" class="d-inline-block">
                <p class="m-0 ms-2 fs-4">Centro de datos</p>
            </a>
        </div>
    </nav>

    <main class="d-flex justify-content-center">
        <form action="Controllers/seleccionar.php" method="post" class="d-flex mt-2 mb-2" style="width: 360px">
            <select class="form-select me-1" name="tabla" aria-label="Default select example">
                <option selected>Seleccione la tabla que desea ver</option>
                <option value="puestos">Tabla Puestos</option>
                <option value="categoria">Tabla Categoria</option>
                <option value="proveedores">Tabla Proveedores</option>
                <option value="trabajadores">Tabla Trabajadores</option>
                <option value="clientes">Tabla Clientes</option>
                <option value="insumos">Tabla Insumos</option>
                <option value="rutas">Tabla Rutas</option>
                <option value="maquinarias">Tabla Maquinarias</option>
                <option value="productos">Tabla Productos</option>
                <option value="ventas">Tabla Ventas</option>
                <option value="historial">Tabla Historial</option>
            </select>
            <button type="submit" class="btn btn-outline-success">Buscar</button>
        </form>

    </main>

    <footer>
        <div class="container-fluid bg-secondary sticky-bottom text-center text-white position-absolute bottom-0">
            Copyright © 2023 PANADERÍA NUEVA YORK
        </div>
    </footer>

    <script src="Public/Assets/js/jquery-3.7.0.min.js"></script>
    <script src="Public/Assets/Bootstrap/js/bootstrap.min.js"></script>
    <script src="Public/Assets/DataTables/datatables.min.js"></script>
    <script src="Public/Assets/js/script.js"></script>
</body>

</html>