<?php

class Maquinarias extends Conexion
{
    // Obtenertrabajador
    public function getData()
    {
        $conexion = $this->conectar();
        $sql = "SELECT maquinaria_id, maquinarias.nombre, marca, modelo, estado, fecha_adquisicion, trabajadores.trabajador_id AS trabajador_id, CONCAT(trabajadores.nombre, ' ' ,trabajadores.apellido) AS trabajador_asignado FROM maquinarias JOIN trabajadores ON maquinarias.trabajador_id = trabajadores.trabajador_id";
        
        $result = $conexion->query($sql);
        return $result;
    }

    // Insertar maquinaria
    public function insertarMaquinaria($maquinaria_id, $nombre, $marca, $modelo, $estado, $fecha_adquisicion, $trabajador_id)
    {
        $conexion = $this->conectar();
        $sqlVerificar = "SELECT COUNT(*) FROM trabajadores WHERE trabajador_id = ?";
        $verificar = $conexion->prepare($sqlVerificar);
        $verificar->bindValue(1, $trabajador_id);
        $verificar->execute();

        if ($verificar->fetchColumn() > 0) {
            $sql = "INSERT INTO maquinarias (maquinaria_id, nombre, marca, modelo, estado, fecha_adquisicion, trabajador_id) VALUES(?, ?, ?, ?, ?, ?, ?)";
            $sql = $conexion->prepare($sql);
            $sql->bindValue(1, $maquinaria_id);
            $sql->bindValue(2, $nombre);
            $sql->bindValue(3, $marca);
            $sql->bindValue(4, $modelo);
            $sql->bindValue(5, $estado);
            $sql->bindValue(6, $fecha_adquisicion);
            $sql->bindValue(7, $trabajador_id);
            $sql->execute();
        } else {
            die("Foreign Key no disponible");
        }
        
    }

    // Actualizar maquinaria
    public function updateMaquinaria($nombre, $marca, $modelo, $estado, $fecha_adquisicion, $trabajador_id, $maquinaria_id)
    {
        $conexion = $this->conectar();
        $sqlVerificar = "SELECT COUNT(*) FROM trabajadores WHERE trabajador_id = ?";
        $verificar = $conexion->prepare($sqlVerificar);
        $verificar->bindValue(1, $trabajador_id);
        $verificar->execute();

        if ($verificar->fetchColumn() > 0) {
            $sql = "UPDATE maquinarias SET nombre = ?, marca = ?, modelo = ?, estado = ?, fecha_adquisicion = ?, trabajador_id = ? WHERE maquinaria_id = ?";
            $sql = $conexion->prepare($sql);
            $sql->bindValue(1, $nombre);
            $sql->bindValue(2, $marca);
            $sql->bindValue(3, $modelo);
            $sql->bindValue(4, $estado);
            $sql->bindValue(5, $fecha_adquisicion);
            $sql->bindValue(6, $trabajador_id);
            $sql->bindValue(7, $maquinaria_id);
            $sql->execute();
        } else {
            die("Foreign Key no disponible");
        }

    }

    // Eliminar maquinaria
    public function deleteData($maquinaria_id)
    {
        $conexion = $this->conectar();
        $sql = "DELETE FROM maquinarias WHERE maquinaria_id = ?";
        $sql = $conexion->prepare($sql);
        $sql->bindValue(1, $maquinaria_id);
        $sql->execute();
    }

}

?>