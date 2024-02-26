function buscarPorCURP() {
    var curp = document.getElementById('curpInput').value;

    // Validar que el campo no esté vacío
    if (curp.trim() === '') {
        alert('Ingrese un CURP válido');
        return;
    }

    // Realizar la solicitud AJAX a PHP
    $.ajax({
        type: 'POST',
        url: 'resourcesdata/core/buscador.php',
        data: { curp: curp },
        success: function(response) {
            // Mostrar los resultados en la tabla
            $('#resultados').html(response);
        },
        error: function(error) {
            console.error('Error en la solicitud AJAX:', error);
        }
    });
}
