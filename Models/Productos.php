<?php

class Productos extends Conexion
{
    // Obtenertrabajador
    public function getData()
    {
        $conexion = $this->conectar();
        $sql = "SELECT * FROM productos";
        $result = $conexion->query($sql);
        return $result;
    }

    // Insertar producto
    public function insertarProducto($producto_id, $nombre, $categoria_id, $peso_gr, $valor_unitario, $insumo_id, $stock, $fecha_exp, $fecha_ven, $maquinaria_id)
    {
        $conexion = $this->conectar();
        $sqlVerificar = "SELECT
        (SELECT COUNT(*) FROM categoria WHERE categoria_id = ?) AS categoria_id,
        (SELECT COUNT(*) FROM insumos WHERE insumo_id = ?) AS insumo_id,
        (SELECT COUNT(*) FROM maquinarias WHERE maquinaria_id = ?) AS maquinaria_id;";
        $verificar = $conexion->prepare($sqlVerificar);
        $verificar->bindValue(1, $categoria_id);
        $verificar->bindValue(2, $insumo_id);
        $verificar->bindValue(3, $maquinaria_id);
        $verificar->execute();

        if ($verificar->fetchColumn() > 0) {
            $conexion = $this->conectar();
            $sql = "INSERT INTO productos (producto_id, nombre, categoria_id, peso_gr, valor_unitario, insumo_id, stock, fecha_exp, fecha_ven, maquinaria_id) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $sql = $conexion->prepare($sql);
            $sql->bindValue(1, $producto_id);
            $sql->bindValue(2, $nombre);
            $sql->bindValue(3, $categoria_id);
            $sql->bindValue(4, $peso_gr);
            $sql->bindValue(5, $valor_unitario);
            $sql->bindValue(6, $insumo_id);
            $sql->bindValue(7, $stock);
            $sql->bindValue(8, $fecha_exp);
            $sql->bindValue(9, $fecha_ven);
            $sql->bindValue(10, $maquinaria_id);
            $sql->execute();
        } else {
            die("Foreign Key no disponible");
        }
    }

    // Actualizar producto
    public function updateProducto($nombre, $categoria_id, $peso_gr, $valor_unitario, $insumo_id, $stock, $fecha_exp, $fecha_ven, $maquinaria_id, $producto_id)
    {

        $conexion = $this->conectar();
        $sqlVerificar = "SELECT
        (SELECT COUNT(*) FROM categoria WHERE categoria_id = ?) AS categoria_id,
        (SELECT COUNT(*) FROM insumos WHERE insumo_id = ?) AS insumo_id,
        (SELECT COUNT(*) FROM maquinarias WHERE maquinaria_id = ?) AS maquinaria_id;";
        $verificar = $conexion->prepare($sqlVerificar);
        $verificar->bindValue(1, $categoria_id);
        $verificar->bindValue(2, $insumo_id);
        $verificar->bindValue(3, $maquinaria_id);
        $verificar->execute();

        if ($verificar->fetchColumn() > 0) {
            $sql = "UPDATE productos SET nombre = ?, categoria_id = ?, peso_gr = ?, valor_unitario = ?, insumo_id = ?, stock = ?, fecha_exp = ?, fecha_ven = ?, maquinaria_id = ? WHERE producto_id = ?";
            $sql = $conexion->prepare($sql);
            $sql->bindValue(1, $nombre);
            $sql->bindValue(2, $categoria_id);
            $sql->bindValue(3, $peso_gr);
            $sql->bindValue(4, $valor_unitario);
            $sql->bindValue(5, $insumo_id);
            $sql->bindValue(6, $stock);
            $sql->bindValue(7, $fecha_exp);
            $sql->bindValue(8, $fecha_ven);
            $sql->bindValue(9, $maquinaria_id);
            $sql->bindValue(10, $producto_id);
            $sql->execute();
        } else {
            die("Foreign Key no disponible");
        }

    }

    // Eliminar producto
    public function deleteData($producto_id)
    {
        $conexion = $this->conectar();
        $sql = "DELETE FROM productos WHERE producto_id = ?";
        $sql = $conexion->prepare($sql);
        $sql->bindValue(1, $producto_id);
        $sql->execute();
    }

}

?>