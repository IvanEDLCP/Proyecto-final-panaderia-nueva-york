<?php

class Ventas extends Conexion
{
    // Obtener datos
    public function getData()
    {
        $conexion = $this->conectar();
        $sql = "SELECT * FROM ventas";
        $result = $conexion->query($sql);
        return $result;
    }

    // Insertar venta
    public function insertarVenta($venta_id, $fecha_hora, $cliente_id, $producto_id, $cantidad, $valor_total, $estado)
    {
        $conexion = $this->conectar();
        $sqlVerificar = "SELECT
        (SELECT COUNT(*) FROM clientes WHERE cliente_id = ?) AS cliente_id,
        (SELECT COUNT(*) FROM productos WHERE producto_id = ?) AS producto_id";
        $verificar = $conexion->prepare($sqlVerificar);
        $verificar->bindValue(1, $cliente_id);
        $verificar->bindValue(2, $producto_id);
        $verificar->execute();

        if ($verificar->fetchColumn() > 0) {
            $sql = "INSERT INTO ventas (venta_id, fecha_hora, cliente_id, producto_id, cantidad, valor_total, estado) VALUES(?, ?, ?, ?, ?, ?, ?)";
            $sql = $conexion->prepare($sql);
            $sql->bindValue(1, $venta_id);
            $sql->bindValue(2, $fecha_hora);
            $sql->bindValue(3, $cliente_id);
            $sql->bindValue(4, $producto_id);
            $sql->bindValue(5, $cantidad);
            $sql->bindValue(6, $valor_total);
            $sql->bindValue(7, $estado);
            $sql->execute();
        } else {
            die("Foreign Key no disponible");
        }
    }

    // Actualizar venta
    public function updateVenta($fecha_hora, $cliente_id, $producto_id, $cantidad, $valor_total, $estado, $venta_id)
    {

        $conexion = $this->conectar();
        $sql = "UPDATE ventas SET fecha_hora = ?, cliente_id = ?, producto_id = ?, cantidad = ?, valor_total = ?, estado = ? WHERE venta_id = ?";
        $sql = $conexion->prepare($sql);
        $sql->bindValue(1, $fecha_hora);
        $sql->bindValue(2, $cliente_id);
        $sql->bindValue(3, $producto_id);
        $sql->bindValue(4, $cantidad);
        $sql->bindValue(5, $valor_total);
        $sql->bindValue(6, $estado);
        $sql->bindValue(7, $venta_id);
        $sql->execute();
    }

    // Eliminar venta
    public function deleteData($venta_id)
    {
        $conexion = $this->conectar();
        $sql = "DELETE FROM ventas WHERE venta_id = ?";
        $sql = $conexion->prepare($sql);
        $sql->bindValue(1, $venta_id);
        $sql->execute();
    }

}

?>