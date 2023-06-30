<?php

class Historial extends Conexion
{
    // Obtener datos
    public function getData()
    {
        $conexion = $this->conectar();
        $sql = "SELECT * FROM historial";
        $result = $conexion->query($sql);
        return $result;
    }

    // Insertar historial
    public function insertarHistorial($historial_id, $venta_id, $cliente_id)
    {
        $conexion = $this->conectar();
        $sqlVerificar = "SELECT
        (SELECT COUNT(*) FROM ventas WHERE venta_id = ?) AS venta_id,
        (SELECT COUNT(*) FROM clientes WHERE cliente_id = ?) AS cliente_id";
        $verificar = $conexion->prepare($sqlVerificar);
        $verificar->bindValue(1, $venta_id);
        $verificar->bindValue(2, $cliente_id);
        $verificar->execute();

        if ($verificar->fetchColumn() > 0) {
            $sql = "INSERT INTO historial (historial_id, venta_id, cliente_id) VALUES(?, ?, ?)";
            $sql = $conexion->prepare($sql);
            $sql->bindValue(1, $historial_id);
            $sql->bindValue(2, $venta_id);
            $sql->bindValue(3, $cliente_id);
            $sql->execute();
        } else {
            die("Foreign Key no disponible");
        }
    }

    // Actualizar historial
    public function updateHistorial($venta_id, $cliente_id, $historial_id)
    {
        $conexion = $this->conectar();
        $sqlVerificar = "SELECT
        (SELECT COUNT(*) FROM ventas WHERE venta_id = ?) AS venta_id,
        (SELECT COUNT(*) FROM clientes WHERE cliente_id = ?) AS cliente_id";
        $verificar = $conexion->prepare($sqlVerificar);
        $verificar->bindValue(1, $venta_id);
        $verificar->bindValue(2, $cliente_id);
        $verificar->execute();

        if ($verificar->fetchColumn() > 0) {
            $sql = "UPDATE historial SET venta_id = ?, cliente_id = ? WHERE historial_id = ?";
            $sql = $conexion->prepare($sql);
            $sql->bindValue(1, $venta_id);
            $sql->bindValue(2, $cliente_id);
            $sql->bindValue(3, $historial_id);
            $sql->execute();
        } else {
            die("Foreign Key no disponible");
        }
    }

    // Eliminar historial
    public function deleteData($historial_id)
    {
        $conexion = $this->conectar();
        $sql = "DELETE FROM historial WHERE historial_id = ?";
        $sql = $conexion->prepare($sql);
        $sql->bindValue(1, $historial_id);
        $sql->execute();
    }

}

?>