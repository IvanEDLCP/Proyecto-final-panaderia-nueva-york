<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorias</title>
    <link rel="stylesheet" href="../Public/Assets/Bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Public/Assets/DataTables/datatables.min.css">
    <link rel="stylesheet" href="../Public/Assets/Icons/font-awasome/all.min.css">
</head>

<body>
    <nav class="navbar bg-light">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center" href="../index.php">
                <img src="../Public/Assets/images/logo.png" alt="Logo" width="70" class="d-inline-block">
                <p class="m-0 ms-2 fs-4">Centro de datos</p>
            </a>
        </div>
    </nav>

    <main>

        <form action="../Controllers/seleccionar.php" method="post" class="d-flex mt-2 mb-2" style="width: 360px">
            <select class="form-select me-1" name="tabla" aria-label="Default select example">
                <option selected>Seleccione la tabla que desea ver</option>
                <option value="puestos">Tabla Puestos</option>
                <option value="categoria">Tabla Categoria</option>
                <option value="proveedores">Tabla Proveedores</option>
                <option value="trabajadores">Tabla Trabajadores</option>
                <option value="clientes">Tabla Clientes</option>
                <option value="insumos">Tabla Insumos</option>
                <option value="rutas">Tabla Rutas</option>
                <option value="transportes">Tabla Transportes</option>
                <option value="maquinarias">Tabla Maquinarias</option>
                <option value="productos">Tabla Productos</option>
                <option value="ventas">Tabla Ventas</option>
                <option value="historial">Tabla Historial</option>
            </select>
            <button type="submit" class="btn btn-outline-success">Buscar</button>
        </form>

        <h1>TABLA CATEGORIAS</h1>
        <table id="example" class="table table-striped table-bordered" style="width: 100%">
            <thead>
                <tr>
                    <th>Categoria</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($data as $row): ?>
                    <?php $categoria_id = $row["categoria_id"]; ?>
                    <tr>
                        <td>
                            <?php echo $categoria_id ?>
                        </td>
                        <td>
                            <form method="post">
                                <input type="hidden" name="categoria_id" value="<?php echo $categoria_id ?>">
                                <button type="submit" class="btn btn-danger" name="delete"><i
                                        class="fa-solid fa-trash me-1"></i>Eliminar</button>
                            </form>

                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <form class="mt-3 mb-3" style="width: 400px" method="post">
            <h3>Agregar categoria</h3>
            <div class="mb-3">
                <label for="ruta" class="form-label">Nombre de la categoria:</label>
                <input type="text" class="form-control" id="categoria_id" name="categoria_id" required>
            </div>
            <button type="submit" class="btn btn-primary" name="create"><i class="fa-solid fa-plus me-1"></i>Agregar
                categoria</button>
        </form>


        <?php $connection = null; ?>

    </main>


    <footer>
        <div class="container-fluid bg-secondary sticky-bottom text-center text-white">
            Copyright © 2023 PANADERÍA NUEVA YORK
        </div>
    </footer>

    <script src="../Public/Assets/js/jquery-3.7.0.min.js"></script>
    <script src="../Public/Assets/Bootstrap/js/bootstrap.min.js"></script>
    <script src="../Public/Assets/DataTables/datatables.min.js"></script>
    <script src="../Public/Assets/js/script.js"></script>
</body>

</html>