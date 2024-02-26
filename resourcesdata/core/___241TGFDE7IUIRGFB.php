<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

function cargar_archivo_excel($archivo, $inicioFila, $inicioColumna, $hoja) {
    require_once 'vendor/autoload.php';
    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
    $spreadsheet = $reader->load($archivo);
    $worksheet = $spreadsheet->getSheetByName($hoja);
    $rows = $worksheet->rangeToArray('B' . $inicioFila . ':' . $worksheet->getHighestColumn() . $worksheet->getHighestRow());
    return $rows;
}

function insertar_datos_mysql($data) {
    /*$Suconec = new mysqli('localhost', 'username', 'password', 'myDB');
    if ($Suconec->Suconecect_error) {
        die("Suconecection failed: " . $Suconec->Suconecect_error);
    }*/

    require_once("server/_db.php");

    $query = "INSERT INTO wp_dataFertiliuser 
    (fer_estado, fer_municipio, fer_localidad, fer_app, fer_apm, fer_name, fer_curp, fer_date, fer_timer) VALUES ";
    $values = [];
    foreach ($data as $row) {
        // Comenzar a insertar datos desde la fila 2 y columna B
        /*if ($row[0] == 'First Name' || $row[1] == '') {
            continue;
        }*/
        $values[] = "('" . $row[0] . "', '" . $row[1] . "', '" . $row[2] . "', '" . $row[3] . "', '" . $row[4] . "', '" . $row[5] . "', '" . $row[6] . "', '" . $row[7] . "', '" . $row[8] . "')";
    }
    $query .= implode(',', $values);
    if ($Suconec->query($query) === TRUE) {
        echo "New records created successfully";
    } else {
        echo "Error: " . $query . "<br>" . $Suconec->error;
    }
    $Suconec->close();
}

$archivo = 'files/filedata.xlsx'; // Ruta al archivo de Excel
$data = cargar_archivo_excel($archivo, 16, 2, '26-02-2024');
insertar_datos_mysql($data);



/*require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\IOFactory;

require_once("server/_db.php");

$excelFilePath = "/var/www/html/fertilizante_search/resourcesdata/core/files/filedata.xlsx";

$sheetName = '26-02-2024';

$objPHPExcel = IOFactory::load($excelFilePath);
$sheet = $objPHPExcel->getActiveSheet();

$startRow = 16;
$endRow = 111;
$startColumn = 'B';
$endColumn = 'J';

for ($row = $startRow; $row <= $endRow; $row++) {
    $values = [];

    // Recorrer todas las columnas de 'B' a 'J'
    for ($col = $startColumn; $col <= $endColumn; $col++) {
        $cell = $sheet->getCell($col . $row);

        // Forzar el formato de texto
        $value = $cell->getFormattedValue();

        // Verificar si la celda está vacía o nula
        $calculatedValue = $cell->getCalculatedValue();
        $values[] = $calculatedValue !== null ? $value : '';

        // Mostrar valores para verificar
        echo "Fila: $row, Columna: $col, Valor Formateado: $value, Valor Calculado: $calculatedValue<br>";
    }

    // Verificar si todas las celdas están vacías
    if (!array_filter($values)) {
        echo "Fila $row: Todas las celdas están vacías. No se insertará en la base de datos.<br>";
        continue; // Saltar al siguiente ciclo si todas las celdas están vacías
    }

    // Realizar la inserción en la base de datos
    /*$sql = "INSERT INTO wp_dataFertiliuser (fer_app, fer_apm, fer_name, fer_curp, fer_estado, fer_municipio, fer_localidad, fer_date, fer_timer) 
            VALUES ('$values[0]', '$values[1]', '$values[2]', '$values[3]', '$values[4]', '$values[5]', '$values[6]', '$values[7]', '$values[8]')";

    if ($Suconec->query($sql) === TRUE) {
        echo "Fila $row insertada con éxito.<br>";
    } else {
        echo "Error en la inserción de la fila $row: " . $Suconec->error . "<br>";
        echo "Consulta: $sql<br>";
    }
}

//$Suconec->close();*/
?>
