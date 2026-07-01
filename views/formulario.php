<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscripción Oficial - iTECH 2025</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
<div class="container">
    <h2>Formulario de Inscripción iTECH 2025</h2>
    
    <form action="index.php?action=registrar" method="POST">
        
        <div class="form-group">
            <label for="identificacion">Identidad (Documento de Identificación):</label>
            <input type="text" id="identificacion" name="identificacion" placeholder="Ej: 8-XXX-XXXX" required>
        </div>

        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" placeholder="Ingresa tu nombre" required>
        </div>

        <div class="form-group">
            <label for="apellido">Apellido:</label>
            <input type="text" id="apellido" name="apellido" placeholder="Ingresa tu apellido" required>
        </div>

        <div class="form-group">
            <label for="edad">Edad:</label>
            <input type="number" id="edad" name="edad" min="1" max="120" placeholder="Ej: 20" required>
        </div>

        <div class="form-group">
            <label for="sexo">Sexo:</label>
            <select id="sexo" name="sexo" required>
                <option value="" disabled selected>Selecciona una opción</option>
                <option value="Masculino">Masculino</option>
                <option value="Femenino">Femenino</option>
                <option value="Otro">Otro</option>
            </select>
        </div>

        <div class="form-group">
            <label for="pais_residencia">País de Residencia:</label>
            <select id="pais_residencia" name="pais_residencia" required>
                <option value="" disabled selected>Selecciona tu país de residencia</option>
                <option value="1">Panamá</option>
                <option value="2">Colombia</option>
                <option value="3">Costa Rica</option>
                <option value="4">México</option>
                <option value="5">Estados Unidos</option>
                <option value="6">España</option>
                <option value="7">Argentina</option>
                <option value="8">Chile</option>
                <option value="9">Perú</option>
                <option value="10">Venezuela</option>
            </select>
        </div>

        <div class="form-group">
            <label for="nacionalidad">Nacionalidad:</label>
            <select id="nacionalidad" name="nacionalidad" required>
                <option value="" disabled selected>Selecciona tu nacionalidad</option>
                <option value="1">Panameña</option>
                <option value="2">Colombiana</option>
                <option value="3">Costarricense</option>
                <option value="4">Mexicana</option>
                <option value="5">Estadounidense</option>
                <option value="6">Española</option>
                <option value="7">Argentina</option>
                <option value="8">Chilena</option>
                <option value="9">Peruana</option>
                <option value="10">Venezolana</option>
            </select>
        </div>

        <div class="form-group">
            <label for="correo">Correo Electrónico:</label>
            <input type="email" id="correo" name="correo" placeholder="ejemplo@correo.com" required>
        </div>

        <div class="form-group">
            <label for="celular">Celular:</label>
            <input type="text" id="celular" name="celular" placeholder="Ej: 6666-6666" required>
        </div>

        <div class="form-group">
            <label>Temas Tecnológicos que le gustaría aprender:</label>
            <div class="checkbox-group">
                <label><input type="checkbox" name="temas[]" value="5"> Cloud Computing</label>
                <label><input type="checkbox" name="temas[]" value="6"> Big Data</label>
                <label><input type="checkbox" name="temas[]" value="4"> Desarrollo Móvil</label>
                <label><input type="checkbox" name="temas[]" value="3"> Ciberseguridad</label>
                <label><input type="checkbox" name="temas[]" value="7"> IoT (Internet de las Cosas)</label>
                <label><input type="checkbox" name="temas[]" value="10"> Machine Learning</label>
                <label><input type="checkbox" name="temas[]" value="9"> DevOps</label>
                <label><input type="checkbox" name="temas[]" value="1"> Desarrollo Web (Python/Otros)</label>
            </div>
        </div>

        <div class="form-group">
            <label for="observaciones">Observaciones o Consulta sobre el evento:</label>
            <textarea id="observaciones" name="observaciones" rows="4" placeholder="Escribe tus comentarios aquí..."></textarea>
        </div>

        <button type="submit" class="btn">Registrar Participante</button>
    </form>
    
    <footer>
        <p>Contacto: soporte@itech.edu.pa | Campus Central</p>
        <p>© 2025 iTECH. All rights reserved.</p>
    </footer>
</div>
</body>
</html>