<?php

class Categoria extends Conexion
{
    // Obtener datos
    public function getData()
    {
        $conexion = $this->conectar();
        $sql = "SELECT * FROM categoria";
        $result = $conexion->query($sql);
        return $result;
    }

    // Insertar categoria
    public function insertarId($categoria_id)
    {

        $conexion = $this->conectar();
        $sql = "INSERT INTO categoria (categoria_id) 
        VALUES(?)";
        $sql = $conexion->prepare($sql);
        $sql->bindValue(1, $categoria_id);
        $sql->execute();
    }

    // Eliminar categoria
    public function deleteData($categoria_id)
    {
        $conexion = $this->conectar();
        $sql = "DELETE FROM categoria WHERE categoria_id = ?";
        $sql = $conexion->prepare($sql);
        $sql->bindValue(1, $categoria_id);
        $sql->execute();
    }

}

?>