<?php

class Proveedores extends Conexion
{
    // Obtener datos
    public function getData()
    {
        $conexion = $this->conectar();
        $sql = "SELECT * FROM proveedores";
        $result = $conexion->query($sql);
        return $result;
    }

    // Insertar proveedor
    public function insertarProveedor($proveedor_nit, $nombre, $direccion, $ubicacion, $telefono, $correo)
    {

        $conexion = $this->conectar();
        $sql = "INSERT INTO proveedores (proveedor_nit, nombre, direccion, ubicacion, telefono, correo) VALUES(?, ?, ?, ?, ?, ?)";
        $sql = $conexion->prepare($sql);
        $sql->bindValue(1, $proveedor_nit);
        $sql->bindValue(2, $nombre);
        $sql->bindValue(3, $direccion);
        $sql->bindValue(4, $ubicacion);
        $sql->bindValue(5, $telefono);
        $sql->bindValue(6, $correo);
        $sql->execute();
    }

    // Actualizar proveedor
    public function updateProveedor($nombre, $direccion, $ubicacion, $telefono, $correo, $proveedor_nit)
    {

        $conexion = $this->conectar();
        $sql = "UPDATE proveedores SET nombre = ?, direccion = ?, ubicacion = ?, telefono = ?, correo = ? WHERE proveedor_nit = ?";
        $sql = $conexion->prepare($sql);
        $sql->bindValue(1, $nombre);
        $sql->bindValue(2, $direccion);
        $sql->bindValue(3, $ubicacion);
        $sql->bindValue(4, $telefono);
        $sql->bindValue(5, $correo);
        $sql->bindValue(6, $proveedor_nit);
        $sql->execute();
    }

    // Eliminar proveedor
    public function deleteData($proveedor_nit)
    {
        $conexion = $this->conectar();
        $sql = "DELETE FROM proveedores WHERE proveedor_nit = ?";
        $sql = $conexion->prepare($sql);
        $sql->bindValue(1, $proveedor_nit);
        $sql->execute();
    }

}

?>