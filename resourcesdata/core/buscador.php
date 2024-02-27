<?php
// Recibir el CURP enviado por AJAX
if (isset($_POST['curp'])) {

    if(empty($_POST['curp']) && $_POST['curp'] == ''){
        echo "Ingresa algún valor";
    }

    require_once("server/_db.php");

    $curp = strtoupper($_POST['curp']); // Convertir a mayúsculas

    $curp = addslashes($curp);

    // Consulta SQL para buscar en la base de datos
    $sql = "SELECT id_fer, fer_estado, fer_municipio, fer_localidad, fer_app, fer_apm, fer_name, fer_curp, fer_date, fer_timer 
    FROM wp_dataFertiliuser WHERE fer_curp like '%$curp%' OR fer_app like '%$curp%' OR fer_apm like '%$curp%' OR fer_name like '%$curp%'";
    $result = $Suconec->query($sql);

    if ($result->num_rows > 0) {
        // Mostrar los resultados en una tabla
        echo '<div class="table-responsive"><table class="table table-bordered">';
        echo '<tr><th scope="col">ESTADO</th><th scope="col">MUNICIPIO</th><th scope="col">LOCALIDAD</th><th scope="col">A. PATERNO</th><th scope="col">A. MATERNO</th><th scope="col">NOMBRE</th><th scope="col">CURP</th><th scope="col">FECHA ENTREGA</th><th scope="col">HORARIO</th></tr>';
        
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td class="table-success">' . $row['fer_estado'] . '</td>';
            echo '<td class="table-success">' . $row['fer_municipio'] . '</td>';
            echo '<td class="table-success">' . $row['fer_localidad'] . '</td>';
            echo '<td class="table-success">' . $row['fer_app'] . '</td>';
            echo '<td class="table-success">' . $row['fer_apm'] . '</td>';
            echo '<td class="table-success">' . $row['fer_name'] . '</td>';
            echo '<td class="table-success">' . $row['fer_curp'] . '</td>';
            echo '<td class="table-success">' . $row['fer_date'] . '</td>';
            echo '<td class="table-success">' . $row['fer_timer'] . '</td>';
            echo '</tr>';
        }
        
        echo '</div></table>';
        //echo '<button onclick="imprimir()">Imprimir</button>';
    } else {
        echo '<center>No se encontraron resultados para: ' . $curp . '</center>';
    }
} else {
    echo 'Error: No se proporcionó el CURP';
}

// Cerrar la conexión a la base de datos
$Suconec->close();
?>