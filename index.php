<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="resourcesdata/css/bootstrap.min.css">
    <title>Buscador con CURP</title>
</head>
<body>
    <h1>Buscador con CURP</h1>

    <label for="curpInput">Ingrese el CURP:</label>
    <input type="text" id="curpInput" placeholder="Ej. ABCD123456EFGHIJKL">
    
    <button onclick="buscarPorCURP()">Buscar</button>
    
    <div id="resultados">
        <!-- Aquí se mostrarán los resultados en una tabla -->
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="resourcesdata/js/scripts.js"></script>
    <script src="resourcesdata/js/bootstrap.js"></script>
</body>
</html>
