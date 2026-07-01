<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte iTECH 2025</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
<div class="container">
    <h2>Reporte de Inscritos y Auditoría</h2>
    <a href="index.php?action=excel" class="btn">Exportar a Excel</a>
    <a href="index.php" class="btn">Volver</a>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Temas</th>
            <th>Auditoría Integridad</th>
        </tr>
        <?php foreach($registros as $reg): 
            $esValido = $controller->validarIntegridad($reg->identificacion, $reg->nombre, $reg->correo, $reg->celular, $reg->sexo, $reg->firma);
        ?>
        <tr>
            <td><?= $reg->nombre . " " . $reg->apellido ?></td>
            <td><?= $reg->temas_concatenados ?></td>
            <td>
                <?php if($esValido): ?>
                    <span class="badge-success">✔ Integridad completa</span>
                <?php else: ?>
                    <span class="badge-danger">✖ Registros corrompidos</span>
                <?php endif; ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
</body>
</html>