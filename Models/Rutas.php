<?php

class Rutas extends Conexion
{
    // Obtener datos
    public function getData()
    {
        $conexion = $this->conectar();
        $sql = "SELECT * FROM rutas";
        $result = $conexion->query($sql);
        return $result;
    }

    // Insertar ruta
    public function insertarRuta($ruta_id, $distancia, $zona_ubicacion, $transporte_id)
    {
        $conexion = $this->conectar();
        $sqlVerificar = "SELECT COUNT(*) FROM transportes WHERE transporte_id = ?";
        $verificar = $conexion->prepare($sqlVerificar);
        $verificar->bindValue(1, $transporte_id);
        $verificar->execute();

        if ($verificar->fetchColumn() > 0) {
            $conexion = $this->conectar();
            $sql = "INSERT INTO rutas (ruta_id, distancia, zona_ubicacion, transporte_id) VALUES(?, ?, ?, ?)";
            $sql = $conexion->prepare($sql);
            $sql->bindValue(1, $ruta_id);
            $sql->bindValue(2, $distancia);
            $sql->bindValue(3, $zona_ubicacion);
            $sql->bindValue(4, $transporte_id);
            $sql->execute();
        } else {
            die("Foreign Key (Transporte) no encontrada");
        }
    }

    // Actualizar ruta
    public function updateRuta($distancia, $zona_ubicacion, $transporte_id, $ruta_id)
    {
        $conexion = $this->conectar();
        $sqlVerificar = "SELECT COUNT(*) FROM transportes WHERE transporte_id = ?";
        $verificar = $conexion->prepare($sqlVerificar);
        $verificar->bindValue(1, $transporte_id);
        $verificar->execute();

        if ($verificar->fetchColumn() > 0) {
            $conexion = $this->conectar();
            $sql = "UPDATE rutas SET distancia = ?, zona_ubicacion = ?, transporte_id = ? WHERE ruta_id = ?";
            $sql = $conexion->prepare($sql);
            $sql->bindValue(1, $distancia);
            $sql->bindValue(2, $zona_ubicacion);
            $sql->bindValue(3, $transporte_id);
            $sql->bindValue(4, $ruta_id);
            $sql->execute();
        } else {
            die("Foreign Key no disponible");
        }
    }

    // Eliminar ruta
    public function deleteData($ruta_id)
    {
        $conexion = $this->conectar();
        $sql = "DELETE FROM rutas WHERE ruta_id = ?";
        $sql = $conexion->prepare($sql);
        $sql->bindValue(1, $ruta_id);
        $sql->execute();
    }

}

?>