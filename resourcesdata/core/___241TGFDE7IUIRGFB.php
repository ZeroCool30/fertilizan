<?php
/*error_reporting(E_ALL);
ini_set('display_errors', 1);*/

function cargar_archivo_excel($archivo, $inicioFila, $inicioColumna, $hoja) {
    require_once 'vendor/autoload.php';
    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
    $spreadsheet = $reader->load($archivo);
    $worksheet = $spreadsheet->getSheetByName($hoja);
    $rows = $worksheet->rangeToArray('B' . $inicioFila . ':' . $worksheet->getHighestColumn() . $worksheet->getHighestRow());
    return $rows;
}

function insertar_datos_mysql($data) {

    require_once("server/_db.php");

    $query = "INSERT INTO wp_dataFertiliuser (fer_estado, fer_municipio, fer_localidad, fer_app, fer_apm, fer_name, fer_curp, fer_date, fer_timer) VALUES ";
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
$data = cargar_archivo_excel($archivo, 16, 2, '27-02-2024');
insertar_datos_mysql($data);

?>