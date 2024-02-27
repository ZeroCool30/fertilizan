<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="resourcesdata/css/bootstrap.min.css">
    <link rel="stylesheet" href="resourcesdata/css/fontawesome-free-6.5.1-web/css/all.css">
    <title>Buscador | Fertilizantes </title>
</head>
<body>
    <?php 
        include_once("menu.php");
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <br /><br />
                <h1>Buscador</h1>
                <label for="curpInput">Puedes ingresar nombre o apellido paterno y apellido materno sin acentos o la CURP</label>
                <br /><br />
                <div class="input-group mb-3">
                    <input type="text" class="form-control" id="curpInput" maxlength="40" placeholder="Ej. ABCD123456EFGHIJKL" aria-label="Recipient's username" aria-describedby="button-addon2" oninput="buscarPorCURP()" required>
                    <button onclick="buscarPorCURP()" class="btn btn-success" type="button" id="button-addon2"> Buscar </button>
                </div>
                <br />
            </div>
            <div class="col-md-3"></div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div id="resultados">
                    <!-- Aquí se mostrarán los resultados en una tabla -->
                </div>
            </div>
            
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="resourcesdata/js/scripts.js"></script>
    <script src="resourcesdata/js/bootstrap.js"></script>
    <script> 
        //function imprimir() { window.print(); }
    </script>

    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <!--<img src="..." class="rounded me-2" alt="...">-->
            <strong class="me-auto"> Atención </strong>
            <small> Hace un segundo</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            Debes ingresar tu CURP, para poder mostrar la información.
        </div>
        </div>
    </div>
</body>
</html>
