$(document).ready(function() {
alert('functions');
$('#ingresar').submit(function() {
        $.ajax({
            type: 'POST',
            url: 'lib/ingresoSaldo.php',
            data: $(this).serialize(),
            success: function(data) {
                $('#asesores').html(data);
            }
        })
        return false;
    }); 
    });