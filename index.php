<?php
require_once 'vendor/autoload.php';
require_once 'controllers/InscriptorController.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$controller = new InscriptoresController();
$action = $_GET['action'] ?? 'formulario';

if ($action == 'registrar' && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $controller->registrar($_POST);
    header("Location: index.php?action=reporte");
    exit;
}

if ($action == 'reporte') {
    $registros = $controller->obtenerReporte();
    include 'views/reporte.php';
}

if ($action == 'formulario') {
    include 'views/formulario.php';
}

if ($action == 'excel') {
    $documento = new Spreadsheet();
    $documento->getProperties()->setCreator("Luis Alberto")->setTitle('Reporte iTECH');
    
    $hoja = $documento->getActiveSheet();
    $hoja->setTitle("Inscritos");
    
    $encabezado = ["ID", "Nombre", "Apellido", "Correo", "Temas"];
    $hoja->fromArray($encabezado, null, 'A1');
    
    $registros = $controller->obtenerReporte();
    $fila = 2;
    foreach ($registros as $reg) {
        $hoja->setCellValue('A'.$fila, $reg->id);
        $hoja->setCellValue('B'.$fila, $reg->nombre);
        $hoja->setCellValue('C'.$fila, $reg->apellido);
        $hoja->setCellValue('D'.$fila, $reg->correo);
        $hoja->setCellValue('E'.$fila, $reg->temas_concatenados);
        $fila++;
    }
    
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="Reporte_iTECH.xlsx"');
    header('Cache-Control: max-age=0');
    
    $writer = new Xlsx($documento);
    $writer->save('php://output');
    exit;
}
?>