<?php
// Recibir el CURP enviado por AJAX
if (isset($_POST['curp'])) {

    require_once("server/_db.php");

    $curp = strtoupper($_POST['curp']); // Convertir a mayúsculas

    // Consulta SQL para buscar en la base de datos
    $sql = "SELECT id_fer, fer_estado, fer_municipio, fer_localidad, fer_app, fer_apm, fer_name, fer_curp, fer_date, fer_timer 
    FROM wp_dataFertiliuser WHERE fer_curp = '$curp'";
    $result = $Suconec->query($sql);

    if ($result->num_rows > 0) {
        // Mostrar los resultados en una tabla
        echo '<table class="table table-bordered">';
        echo '<tr><th>Nombre</th><th>Apellido</th><th>Edad</th></tr>';
        
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row['fer_name'] . '</td>';
            echo '<td>' . $row['fer_app'] . '</td>';
            echo '<td>' . $row['fer_apm'] . '</td>';
            echo '</tr>';
        }
        
        echo '</table>';
    } else {
        echo 'No se encontraron resultados para el CURP: ' . $curp;
    }
} else {
    echo 'Error: No se proporcionó el CURP';
}

// Cerrar la conexión a la base de datos
$Suconec->close();
?>