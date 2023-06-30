<?php

class Clientes extends Conexion
{
    // Obtener datos
    public function getData()
    {
        $conexion = $this->conectar();
        $sql = "SELECT * FROM clientes";
        $result = $conexion->query($sql);
        return $result;
    }

    // Insertar cliente
    public function insertarCliente($cliente_id, $nombre, $direccion, $ubicacion, $telefono, $correo, $tipo_cliente, $ruta_id)
    {

        $conexion = $this->conectar();
        $sql = "INSERT INTO clientes (cliente_id, nombre, direccion, ubicacion, telefono, correo, tipo_cliente, ruta_id) VALUES(?, ?, ?, ?, ?, ?, ?, ?)";
        $sql = $conexion->prepare($sql);
        $sql->bindValue(1, $cliente_id);
        $sql->bindValue(2, $nombre);
        $sql->bindValue(3, $direccion);
        $sql->bindValue(4, $ubicacion);
        $sql->bindValue(5, $telefono);
        $sql->bindValue(6, $correo);
        $sql->bindValue(7, $tipo_cliente);
        $sql->bindValue(8, $ruta_id);
        $sql->execute();
    }

    // Actualizar cliente
    public function updateCliente($nombre, $direccion, $ubicacion, $telefono, $correo, $tipo_cliente, $ruta_id, $cliente_id)
    {
        $conexion = $this->conectar();
        $sqlVerificar = "SELECT COUNT(*) FROM rutas WHERE ruta_id = ?";
        $verificar = $conexion->prepare($sqlVerificar);
        $verificar->bindValue(1, $ruta_id);
        $verificar->execute();

        if ($verificar->fetchColumn() > 0) {
            $conexion = $this->conectar();
            $sql = "UPDATE clientes SET nombre = ?, direccion = ?, ubicacion = ?, telefono = ?, correo = ?, tipo_cliente = ?, ruta_id = ? WHERE cliente_id = ?";
            $sql = $conexion->prepare($sql);
            $sql->bindValue(1, $nombre);
            $sql->bindValue(2, $direccion);
            $sql->bindValue(3, $ubicacion);
            $sql->bindValue(4, $telefono);
            $sql->bindValue(5, $correo);
            $sql->bindValue(6, $tipo_cliente);
            $sql->bindValue(7, $ruta_id);
            $sql->bindValue(8, $cliente_id);
            $sql->execute();
        } else {
            die("Foreign Key no disponible");
        }
    }

    // Eliminar cliente
    public function deleteData($cliente_id)
    {
        $conexion = $this->conectar();
        $sql = "DELETE FROM clientes WHERE cliente_id = ?";
        $sql = $conexion->prepare($sql);
        $sql->bindValue(1, $cliente_id);
        $sql->execute();
    }

}

?>