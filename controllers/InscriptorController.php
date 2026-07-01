<?php
require_once 'config/Database.php';
require_once 'models/Sanitization.php';
require_once 'models/Validation.php';

class InscriptoresController {
    private $db;
    private $claveSecreta = 'iTECH2025_SecureKey'; 
    private $metodoCifrado = 'AES-128-CBC';
    private $iv = '1234567890123456'; 

    public function __construct() {
        $database = new DatabaseConnection();
        $this->db = $database->getConexion();
    }

    // Crea la firma OpenSSL
    private function firmarDatos($identidad, $nombre, $correo, $celular, $sexo) {
        $cadena = $identidad . $nombre . $correo . $celular . $sexo;
        return openssl_encrypt($cadena, $this->metodoCifrado, $this->claveSecreta, 0, $this->iv);
    }

    // Verifica si alguien alteró la base de datos
    public function validarIntegridad($identidad, $nombre, $correo, $celular, $sexo, $firmaGuardada) {
        $cadena = $identidad . $nombre . $correo . $celular . $sexo;
        $firmaGenerada = openssl_encrypt($cadena, $this->metodoCifrado, $this->claveSecreta, 0, $this->iv);
        return $firmaGenerada === $firmaGuardada; 
    }

    public function registrar($_post) {
        $nombre = Sanitizer::titleCase($_post['nombre']);
        $apellido = Sanitizer::titleCase($_post['apellido']);
        $identidad = Sanitizer::cleanString($_post['identificacion']);
        $edad = $_post['edad'];
        $sexo = $_post['sexo'];
        $pais = $_post['pais_residencia'];
        $nacionalidad = $_post['nacionalidad'];
        $correo = $_post['correo'];
        $celular = Sanitization::cleanString($_post['celular']);
        $observaciones = Sanitization::cleanString($_post['observaciones']);
        
        $firma = $this->firmarDatos($identidad, $nombre, $correo, $celular, $sexo);

        $stmt = $this->db->prepare("INSERT INTO inscriptores (identificacion, nombre, apellido, edad, sexo, pais_residencia_id, nacionalidad_id, correo, celular, observaciones, firma) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$identidad, $nombre, $apellido, $edad, $sexo, $pais, $nacionalidad, $correo, $celular, $observaciones, $firma]);
        
        $inscriptor_id = $this->db->lastInsertId();

        if(!empty($_post['temas'])) {
            $stmtTema = $this->db->prepare("INSERT INTO inscriptor_temas (inscriptor_id, area_interes_id) VALUES (?, ?)");
            foreach($_post['temas'] as $tema_id) {
                $stmtTema->execute([$inscriptor_id, $tema_id]);
            }
        }
    }

    public function obtenerReporte() {
        // Agrupa los temas separados por comas
        $sql = "SELECT i.*, p1.nombre as pais, p2.nombre as nacionalidad,
                GROUP_CONCAT(a.nombre SEPARATOR ', ') as temas_concatenados
                FROM inscriptores i
                LEFT JOIN paises p1 ON i.pais_residencia_id = p1.id
                LEFT JOIN paises p2 ON i.nacionalidad_id = p2.id
                LEFT JOIN inscriptor_temas it ON i.id = it.inscriptor_id
                LEFT JOIN areas_interes a ON it.area_interes_id = a.id
                GROUP BY i.id";
        return $this->db->query($sql)->fetchAll(PDO::FETCH_OBJ);
    }
}
?>