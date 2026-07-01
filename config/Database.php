<?php
class DatabaseConnection {
    private $conexion;
    
    public function __construct() {
        // La rúbrica pide usar esta IP específica
        $sql_host = "127.1.1.1"; 
        $sql_name = "parcial_itech";
        $sql_user = "root"; 
        $sql_pass = "07280408luis"; 

        $dsn = "mysql:host=$sql_host;dbname=$sql_name;charset=utf8mb4";
        try {
            $this->conexion = new PDO($dsn, $sql_user, $sql_pass);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }

    public function getConexion (){
        return $this->conexion;
    }
}
?>