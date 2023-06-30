<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insumos</title>
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
                <option value="productos">Tabla Productos</option>
                <option value="ventas">Tabla Ventas</option>
                <option value="historial">Tabla Historial</option>
            </select>
            <button type="submit" class="btn btn-outline-success">Buscar</button>
        </form>


        <h1>TABLA INSUMOS</h1>
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Id Insumo</th>
                    <th>Nombre</th>
                    <th>Lote</th>
                    <th>Cantidad (Kg)</th>
                    <th>Precio (KG)</th>
                    <th>Proveedor</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $row): ?>

                    <tr>

                        <td>
                            <?php echo $row["insumo_id"] ?>
                        </td>
                        <td>
                            <?php echo $row["nombre"] ?>
                        </td>
                        <td>
                            <?php echo $row["lote"] ?>
                        </td>
                        <td>
                            <?php echo $row["cantidad_kg"] ?>
                        </td>
                        <td>$
                            <?php echo $row["precio_kg"] ?>
                        </td>
                        <td>
                            <?php echo $row["nombre_proveedor"] ?>
                        </td>
                        <td>
                            <form action="" method="post">
                                <input type="hidden" name="insumo_id" value="<?php echo $row["insumo_id"] ?>">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop<?php echo $row["insumo_id"] ?>" name="edit"><i
                                        class="fa-solid fa-pen-to-square me-1"></i>Editar</button>
                                <button type="submit" class="btn btn-danger" name="delete"><i
                                        class="fa-solid fa-trash me-1"></i>Eliminar</button>
                            </form>

                        </td>
                    </tr>

                    <div class="modal fade" id="staticBackdrop<?php echo $row["insumo_id"] ?>" data-bs-backdrop="static"
                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <form method="post">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Editar información del insumo
                                        </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="insumo_id"
                                            value="<?php echo $row["insumo_id"] ?>">
                                        <div class="mb-3">
                                            <label for="nombre" class="form-label">Nombre:</label>
                                            <input type="text" class="form-control" id="nombre" name="nombre"
                                                value="<?php echo $row["nombre"] ?>" required>
                                            <label for="lote" class="form-label">Lote:</label>
                                            <input type="text" class="form-control" id="lote" name="lote"
                                                value="<?php echo $row["lote"] ?>" required>
                                            <label for="cantidad_kg" class="form-label">Cantidad (Kg):</label>
                                            <input type="text" class="form-control" id="cantidad_kg" name="cantidad_kg"
                                                value="<?php echo $row["cantidad_kg"] ?>" required>
                                            <label for="precio_kg" class="form-label">Precio (Kg):</label>
                                            <input type="number" class="form-control" id="precio_kg" name="precio_kg"
                                                value="<?php echo $row["precio_kg"] ?>" required>
                                            <label for="proveedor_nit" class="form-label">Proveedor:</label>
                                            <input type="number" class="form-control" id="proveedor_nit" name="proveedor_nit"
                                                value="<?php echo $row["proveedor_nit"] ?>" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success" name="edit"><i
                                                class="fa-solid fa-cloud-arrow-up me-1"></i>Guardar
                                            cambios</button>
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cancelar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                <?php endforeach; ?>
            </tbody>
        </table>

        <form class="mt-3" style="width: 400px" method="post">
            <h3>Agregar insumo</h3>
            <div class="mb-3">
                <label for="insumo_id" class="form-label">Id Insumo:</label>
                <input type="text" class="form-control" id="insumo_id" name="insumo_id" required>
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
                <label for="lote" class="form-label">Lote:</label>
                <input type="text" class="form-control" id="lote" name="lote" required>
                <label for="cantidad_kg" class="form-label">Cantidad (Kg):</label>
                <input type="number" class="form-control" id="cantidad_kg" name="cantidad_kg" required>
                <label for="precio_kg" class="form-label">Precio (Kg):</label>
                <input type="number" class="form-control" id="precio_kg" name="precio_kg" required>
                <label for="proveedor_nit" class="form-label">Proveedor:</label>
                <input type="number" class="form-control" id="proveedor_nit" name="proveedor_nit" required>
            </div>
            <button type="submit" class="btn btn-primary" name="create"><i class="fa-solid fa-plus me-1"></i>Agregar
                insumo</button>
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