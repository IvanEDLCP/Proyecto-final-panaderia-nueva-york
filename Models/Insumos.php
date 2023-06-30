<?php

class Insumos extends Conexion
{
    // Obtener datos
    public function getData()
    {
        $conexion = $this->conectar();
        $sql = "SELECT insumo_id, insumos.nombre, lote, cantidad_kg, precio_kg, proveedores.proveedor_nit AS proveedor_nit, proveedores.nombre AS nombre_proveedor FROM insumos JOIN proveedores ON insumos.proveedor_nit = proveedores.proveedor_nit ";
        $result = $conexion->query($sql);
        return $result;
    }

    // Insertar insumo
    public function insertarInsumo($insumo_id, $nombre, $lote, $cantidad_kg, $precio_kg, $proveedor_nit)
    {

        $conexion = $this->conectar();
        $sql = "INSERT INTO insumos (insumo_id, nombre, lote, cantidad_kg, precio_kg, proveedor_nit) VALUES(?, ?, ?, ?, ?, ?)";
        $sql = $conexion->prepare($sql);
        $sql->bindValue(1, $insumo_id);
        $sql->bindValue(2, $nombre);
        $sql->bindValue(3, $lote);
        $sql->bindValue(4, $cantidad_kg);
        $sql->bindValue(5, $precio_kg);
        $sql->bindValue(6, $proveedor_nit);
        $sql->execute();
    }

    // Actualizar insumo
    public function updateInsumo($nombre, $lote, $cantidad_kg, $precio_kg, $proveedor_nit, $insumo_id)
    {

        $conexion = $this->conectar();
        $sql = "UPDATE insumos SET nombre = ?, lote = ?, cantidad_kg = ?, precio_kg = ?, proveedor_nit = ? WHERE insumo_id = ?";
        $sql = $conexion->prepare($sql);
        $sql->bindValue(1, $nombre);
        $sql->bindValue(2, $lote);
        $sql->bindValue(3, $cantidad_kg);
        $sql->bindValue(4, $precio_kg);
        $sql->bindValue(5, $proveedor_nit);
        $sql->bindValue(6, $insumo_id);
        $sql->execute();
    }

    // Eliminar insumo
    public function deleteData($insumo_id)
    {
        $conexion = $this->conectar();
        $sql = "DELETE FROM insumos WHERE insumo_id = ?";
        $sql = $conexion->prepare($sql);
        $sql->bindValue(1, $insumo_id);
        $sql->execute();
    }

}

?>