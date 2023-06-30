<?php

class Conexion
{

    public function conectar()
    {
        $dbs = 'mysql:host=localhost;dbname=nueva_york';
        $user = 'root';
        $password = '';

        try {
            $conexion = new PDO($dbs, $user, $password);
            return $conexion;

        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }

    }
}

?>