<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trabajadores</title>
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


        <h1>TABLA TRABAJADORES</h1>
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Id Trabajador/a</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Edad</th>
                    <th>Genero</th>
                    <th>Direccion</th>
                    <th>Telefono</th>
                    <th>Email</th>
                    <th>Fecha de contratacion</th>
                    <th>Puesto</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $row): ?>

                    <tr>

                        <td>
                            <?php echo $row["trabajador_id"] ?>
                        </td>
                        <td>
                            <?php echo $row["nombre"] ?>
                        </td>
                        <td>
                            <?php echo $row["apellido"] ?>
                        </td>
                        <td>
                            <?php echo $row["edad"] ?>
                        </td>
                        <td>
                            <?php echo $row["genero"] ?>
                        </td>
                        <td>
                            <?php echo $row["direccion"] ?>
                        </td>
                        <td>
                            <?php echo $row["telefono"] ?>
                        </td>
                        <td>
                            <?php echo $row["correo"] ?>
                        </td>
                        <td>
                            <?php echo $row["fecha_contratacion"] ?>
                        </td>
                        <td>
                            <?php echo $row["puesto_id"] ?>
                        </td>
                        <td>
                            <form action="" method="post">
                                <input type="hidden" name="trabajador_id" value="<?php echo $row["trabajador_id"] ?>">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop<?php echo $row["trabajador_id"] ?>" name="edit"><i
                                        class="fa-solid fa-pen-to-square me-1"></i>Editar</button>
                                <button type="submit" class="btn btn-danger" name="delete"><i
                                        class="fa-solid fa-trash me-1"></i>Eliminar</button>
                            </form>

                        </td>
                    </tr>

                    <div class="modal fade" id="staticBackdrop<?php echo $row["trabajador_id"] ?>" data-bs-backdrop="static"
                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <form method="post">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Editar información del trabajador
                                        </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="trabajador_id"
                                            value="<?php echo $row["trabajador_id"] ?>">
                                        <div class="mb-3">
                                            <label for="nombre" class="form-label">Nombre:</label>
                                            <input type="text" class="form-control" id="nombre" name="nombre"
                                                value="<?php echo $row["nombre"] ?>" required>
                                            <label for="apellido" class="form-label">Apellido:</label>
                                            <input type="text" class="form-control" id="apellido" name="apellido"
                                                value="<?php echo $row["apellido"] ?>" required>
                                            <label for="edad" class="form-label">Edad:</label>
                                            <input type="number" class="form-control" id="edad" name="edad"
                                                value="<?php echo $row["edad"] ?>" required>
                                            <label for="genero" class="form-label">Genero:</label>
                                            <input type="text" class="form-control" id="genero" name="genero"
                                                value="<?php echo $row["genero"] ?>" required>
                                            <label for="direccion" class="form-label">Direccion:</label>
                                            <input type="text" class="form-control" id="direccion" name="direccion"
                                                value="<?php echo $row["direccion"] ?>" required>
                                            <label for="telefono" class="form-label">Telefono:</label>
                                            <input type="number" class="form-control" id="telefono" name="telefono"
                                                value="<?php echo $row["telefono"] ?>" required>
                                            <label for="correo" class="form-label">Email / Correo Electronico:</label>
                                            <input type="email" class="form-control" id="correo" name="correo"
                                                value="<?php echo $row["correo"] ?>" required>
                                            <label for="fecha_contratacion" class="form-label">Fecha de
                                                contratacion:</label>
                                            <input type="date" class="form-control" id="fecha_contratacion"
                                                name="fecha_contratacion" value="<?php echo $row["fecha_contratacion"] ?>"
                                                required>
                                            <label for="puesto_id" class="form-label">Puesto:</label>
                                            <input type="text" class="form-control" id="puesto_id" name="puesto_id"
                                                value="<?php echo $row["puesto_id"] ?>" required>
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
            <h3>Agregar trabajador</h3>
            <div class="mb-3">
                <label for="trabajador_id" class="form-label">Cedula del trabajador:</label>
                <input type="number" class="form-control" id="trabajador_id" name="trabajador_id" required>
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
                <label for="apellido" class="form-label">Apellido:</label>
                <input type="text" class="form-control" id="apellido" name="apellido" required>
                <label for="edad" class="form-label">Edad:</label>
                <input type="number" class="form-control" id="edad" name="edad" required>
                <label for="genero" class="form-label">Genero:</label>
                <input type="text" class="form-control" id="genero" name="genero" required>
                <label for="direccion" class="form-label">Direccion:</label>
                <input type="text" class="form-control" id="direccion" name="direccion" required>
                <label for="telefono" class="form-label">Telefono:</label>
                <input type="number" class="form-control" id="telefono" name="telefono" required>
                <label for="correo" class="form-label">Email / Correo Electronico:</label>
                <input type="email" class="form-control" id="correo" name="correo" required>
                <label for="fecha_contratacion" class="form-label">Fecha de contratacion:</label>
                <input type="date" class="form-control" id="fecha_contratacion" name="fecha_contratacion" required>
                <label for="puesto_id" class="form-label">Id del puesto:</label>
                <input type="text" class="form-control" id="puesto_id" name="puesto_id" required>
            </div>
            <button type="submit" class="btn btn-primary" name="create"><i class="fa-solid fa-plus me-1"></i>Agregar
                trabajador</button>
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