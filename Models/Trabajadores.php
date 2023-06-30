<?php

class Trabajadores extends Conexion
{
    // Obtenertrabajador
    public function getData()
    {
        $conexion = $this->conectar();
        $sql = "SELECT * FROM trabajadores";
        $result = $conexion->query($sql);
        return $result;
    }

    // Insertar trabajador
    public function insertarTrabajador($trabajador_id, $nombre, $apellido, $edad, $genero, $direccion, $telefono, $correo, $fecha_contratacion, $puesto_id)
    {

        $conexion = $this->conectar();
        $sql = "INSERT INTO trabajadores (trabajador_id, nombre, apellido, edad, genero, direccion, telefono, correo, fecha_contratacion, puesto_id) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $sql = $conexion->prepare($sql);
        $sql->bindValue(1, $trabajador_id);
        $sql->bindValue(2, $nombre);
        $sql->bindValue(3, $apellido);
        $sql->bindValue(4, $edad);
        $sql->bindValue(5, $genero);
        $sql->bindValue(6, $direccion);
        $sql->bindValue(7, $telefono);
        $sql->bindValue(8, $correo);
        $sql->bindValue(9, $fecha_contratacion);
        $sql->bindValue(10, $puesto_id);
        $sql->execute();
    }

    // Actualizar trabajador
    public function updateTrabajador($nombre, $apellido, $edad, $genero, $direccion, $telefono, $correo, $fecha_contratacion, $puesto_id, $trabajador_id)
    {

        $conexion = $this->conectar();
        $sqlVerificar = "SELECT COUNT(*) FROM puestos WHERE puesto_id = ?";
        $verificar = $conexion->prepare($sqlVerificar);
        $verificar->bindValue(1, $puesto_id);
        $verificar->execute();

        if ($verificar->fetchColumn() > 0) {
            $sql = "UPDATE trabajadores SET nombre = ?, apellido = ?, edad = ?, genero = ?, direccion = ?, telefono = ?, correo = ?, fecha_contratacion = ?, puesto_id = ? WHERE trabajador_id = ?";
            $sql = $conexion->prepare($sql);
            $sql->bindValue(1, $nombre);
            $sql->bindValue(2, $apellido);
            $sql->bindValue(3, $edad);
            $sql->bindValue(4, $genero);
            $sql->bindValue(5, $direccion);
            $sql->bindValue(6, $telefono);
            $sql->bindValue(7, $correo);
            $sql->bindValue(8, $fecha_contratacion);
            $sql->bindValue(9, $puesto_id);
            $sql->bindValue(10, $trabajador_id);
            $sql->execute();
        } else {
            die ("Foreign Key no disponible");
        }
        
    }

    // Eliminar trabajador
    public function deleteData($trabajador_id)
    {
        $conexion = $this->conectar();
        $sql = "DELETE FROM trabajadores WHERE trabajador_id = ?";
        $sql = $conexion->prepare($sql);
        $sql->bindValue(1, $trabajador_id);
        $sql->execute();
    }

}

?>