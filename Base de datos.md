-- Crear la nueva base de datos con un nombre diferente
CREATE DATABASE IF NOT EXISTS inscripciones_itech CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE inscripciones_itech;

-- Tabla de países
CREATE TABLE IF NOT EXISTS paises (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    UNIQUE KEY (nombre)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insertar países comunes
INSERT INTO paises (nombre) VALUES 
('Panamá'),
('Colombia'),
('Costa Rica'),
('México'),
('Estados Unidos'),
('España'),
('Argentina'),
('Chile'),
('Perú'),
('Venezuela');

-- Tabla de áreas de interés tecnológico
CREATE TABLE IF NOT EXISTS areas_interes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    UNIQUE KEY (nombre)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insertar áreas de interés
INSERT INTO areas_interes (nombre) VALUES 
('Desarrollo Web'),
('Inteligencia Artificial'),
('Ciberseguridad'),
('Desarrollo Móvil'),
('Cloud Computing'),
('Big Data'),
('IoT (Internet de las Cosas)'),
('Blockchain'),
('DevOps'),
('Machine Learning');

-- Tabla principal de inscriptores
CREATE TABLE IF NOT EXISTS inscriptores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    identificacion VARCHAR(50) NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    apellido VARCHAR(100) NOT NULL,
    edad INT NOT NULL,
    sexo ENUM('Masculino', 'Femenino', 'Otro') NOT NULL,
    pais_residencia_id INT NOT NULL,
    nacionalidad_id INT NOT NULL,
    correo VARCHAR(150) NOT NULL,
    celular VARCHAR(20) NOT NULL,
    observaciones TEXT,
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    firma TEXT NOT NULL,
    CONSTRAINT fk_pais_residencia FOREIGN KEY (pais_residencia_id) REFERENCES paises(id) ON DELETE RESTRICT ON UPDATE CASCADE,
    CONSTRAINT fk_nacionalidad FOREIGN KEY (nacionalidad_id) REFERENCES paises(id) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabla intermedia para temas tecnológicos (relación muchos a muchos)
CREATE TABLE IF NOT EXISTS inscriptor_temas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    inscriptor_id INT NOT NULL,
    area_interes_id INT NOT NULL,
    CONSTRAINT fk_inscriptor FOREIGN KEY (inscriptor_id) REFERENCES inscriptores(id) ON DELETE RESTRICT ON UPDATE CASCADE,
    CONSTRAINT fk_area_interes FOREIGN KEY (area_interes_id) REFERENCES areas_interes(id) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
