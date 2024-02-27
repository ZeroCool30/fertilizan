function buscarPorCURP() {
    var curp = document.getElementById('curpInput').value;

    // Validar que el campo no esté vacío
    if (curp.trim() === '') {
        var toastElement = document.getElementById('liveToast');
        // Activa el toast de Bootstrap
        var toast = new bootstrap.Toast(toastElement);
        toast.show();
        return;
    }

    // Realizar la solicitud AJAX a PHP
    $.ajax({
        type: 'POST',
        url: 'resourcesdata/core/buscador.php',
        data: { curp: curp },
        success: function(response) {
            if (response.length > 0) {
                $('#resultados').html(response);
            } else {
                //$('#resultados').html(response);
            }

            
        },
        error: function(error) {
            console.error('Error en la solicitud AJAX:', error);
        }
    });
}
