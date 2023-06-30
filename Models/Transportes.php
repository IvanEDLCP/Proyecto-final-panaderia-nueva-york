<?php

class Transportes extends Conexion
{
    // Obtener datos
    public function getData()
    {
        $conexion = $this->conectar();
        $sql = "SELECT * FROM transportes";
        $result = $conexion->query($sql);
        return $result;
    }

    // Insertar transporte
    public function insertarTransporte($transporte_id, $tipo_transporte, $capacidad_maxima, $estado, $fecha_adquisicion, $ruta_id)
    {
        $conexion = $this->conectar();
        $sqlVerificar = "SELECT COUNT(*) FROM rutas WHERE ruta_id = ?";
        $verificar = $conexion->prepare($sqlVerificar);
        $verificar->bindValue(1, $ruta_id);
        $verificar->execute();

        if ($verificar->fetchColumn() > 0) {
            $conexion = $this->conectar();
            $sql = "INSERT INTO transportes (transporte_id, tipo_transporte, capacidad_maxima, estado, fecha_adquisicion, ruta_id) VALUES(?, ?, ?, ?, ?, ?)";
            $sql = $conexion->prepare($sql);
            $sql->bindValue(1, $transporte_id);
            $sql->bindValue(2, $tipo_transporte);
            $sql->bindValue(3, $capacidad_maxima);
            $sql->bindValue(4, $estado);
            $sql->bindValue(5, $fecha_adquisicion);
            $sql->bindValue(6, $ruta_id);
            $sql->execute();
        } else {
            die("Foreign Key (Ruta) no encontrada");
        }
    }

    // Actualizar transporte
    public function updateTransporte($tipo_transporte, $capacidad_maxima, $estado, $fecha_adquisicion, $ruta_id,$transporte_id)
    {
        $conexion = $this->conectar();
        $sqlVerificar = "SELECT COUNT(*) FROM rutas WHERE ruta_id = ?";
        $verificar = $conexion->prepare($sqlVerificar);
        $verificar->bindValue(1, $ruta_id);
        $verificar->execute();

        if ($verificar->fetchColumn() > 0) {
            $conexion = $this->conectar();
            $sql = "UPDATE transportes SET tipo_transporte = ?, capacidad_maxima = ?, estado = ?, fecha_adquisicion = ?, ruta_id = ? WHERE transporte_id = ?";
            $sql = $conexion->prepare($sql);
            $sql->bindValue(1, $tipo_transporte);
            $sql->bindValue(2, $capacidad_maxima);
            $sql->bindValue(3, $estado);
            $sql->bindValue(4, $fecha_adquisicion);
            $sql->bindValue(5, $ruta_id);
            $sql->bindValue(6, $transporte_id);
            $sql->execute();
        } else {
            die("Foreign Key no disponible");
        }
    }

    // Eliminar transporte
    public function deleteData($transporte_id)
    {
        $conexion = $this->conectar();
        $sql = "DELETE FROM transportes WHERE transporte_id = ?";
        $sql = $conexion->prepare($sql);
        $sql->bindValue(1, $transporte_id);
        $sql->execute();
    }

}

?>