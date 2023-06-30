<?php

class Puestos extends Conexion
{
    // Obtener datos
    public function getData()
    {
        $conexion = $this->conectar();
        $sql = "SELECT * FROM puestos";
        $result = $conexion->query($sql);
        return $result;
    }

    // Insertar puesto
    public function insertarPuesto($puesto_id, $nombre, $salario)
    {

        $conexion = $this->conectar();
        $sql = "INSERT INTO puestos (puesto_id, nombre, salario) VALUES(?, ?, ?)";
        $sql = $conexion->prepare($sql);
        $sql->bindValue(1, $puesto_id);
        $sql->bindValue(2, $nombre);
        $sql->bindValue(3, $salario);
        $sql->execute();
    }

    // Actualizar puesto
    public function updatePuesto($nombre, $salario, $puesto_id)
    {

        $conexion = $this->conectar();
        $sql = "UPDATE puestos SET nombre = ?, salario = ? WHERE puesto_id = ?";
        $sql = $conexion->prepare($sql);
        $sql->bindValue(1, $nombre);
        $sql->bindValue(2, $salario);
        $sql->bindValue(3, $puesto_id);
        $sql->execute();
    }

    // Eliminar puesto
    public function deleteData($puesto_id)
    {
        $conexion = $this->conectar();
        $sql = "DELETE FROM puestos WHERE puesto_id = ?";
        $sql = $conexion->prepare($sql);
        $sql->bindValue(1, $puesto_id);
        $sql->execute();
    }

}

?>