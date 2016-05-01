
$(document).ready(function() {
    $().ajaxStart(function() {
        $('#loading').show();
        $('#result').hide();
    }).ajaxStop(function() {
        $('#loading').hide();
        $('#result').fadeIn('slow');
    });
    
    function cargarpartidosnulos(){
                $.ajax({
            type: 'POST',
            url:'consultas.php',
            data:$('#formularioApuesta').serialize(),
            success: function(data){
                
                $('#partidos').html(data);
            }
        })
                $('#equipoApostado').html("<option value='seleccion'>selecione equipo</option>");
        $('#saldo').val(sal);
    }
    
    cargarpartidosnulos();
    
    
    //detecta el cambio ed comobox partidos y asigna valor a input o habilita el ingreso de nuevo partido
    $('select#partidos').on('change',function(){
        var val = $(this).val();
        if(val == '--otro--'){
            $('#divPartidos').addClass('visible');
            $('#partidoselecionado').val('--otro--');
        }else{
            $('#divPartidos').removeClass('visible');
            //alert($('select[id=partidos]').val());
            $('#partidoselecionado').val($(this).val());
        }
    })
    //detecta el valor del equipo por el que se apuesta y asigna al input
    $('#equipoApostado').change(function(){
        //alert($('select[id=equipoApostado]').val());
        $('#equipoapuesta').val($(this).val());
    })
    
    $('#fecha').change(function(){
                $.ajax({
            type: 'POST',
            url:'consultas.php',
            data:$('#formularioApuesta').serialize(),
            success: function(data){
                
                $('#partidos').html(data);
            }
        })
    })
    $('#partidos').change(function(){
        var idP=$(this).val();
        $("#equipoApostado").load("../pags/lib/llenarcomboapuesta.php",{idpartido:idP});
    })
    $('#otroequipo1').change(function(){
           var rival = $('#otroequipo2').val();                 
        $('#equipoApostado').html("<option value='seleccion'>selecione equipo</option><option>"+$(this).val()+"</option><option>"+rival+"</option>");
                            })
    $('#otroequipo2').change(function(){
             var rival = $('#otroequipo1').val();        
        $('#equipoApostado').html("<option value='seleccion'>selecione equipo</option><option>"+rival+"</option><option>"+$(this).val()+"</option>");
                            })
});
function confirmar(){
    var nombre=$('#nombre').val();
    var cc=$('#CC').val();
    var equipo = $('#equipoApostado').val();
    var valor=parseFloat($('#valor').val());
    var partido=$('#partidos').val();
    var saldo = $('#saldo').val();
    if(partido=='seleccion'){
        alert("seleccione partido");
        return false;
    }else if(partido=='--otro--'){
        var A=$('otroequipo1').val();
        var B=$('otroequipo2').val();
        var H=$('#hora').val();
        if(A==""||B==""||H==""){
            alert("verifique que todos los campos esten llenos")
            return false;
        }
    }
    if(equipo=='seleccion'){
        alert('Seleccione equipo a apostar');
        return false;
    }if(saldo<valor){
        alert('Usted no dispone de saldo suficiente para esta apuesta');
        return false;
    }
    if (confirm("desea hacer apuesta por "+valor+" del cliente "+nombre)){
        return true;
    }return false;
}