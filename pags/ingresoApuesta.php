<?php
require_once('gestionDB.php');
require_once 'validaciones.php';
    validarAsesor();

//funcion para ingresar una apuesta
function ingresarPartido($fechaPartido,$hora,$idequipoA,$idequipoB,$idliga){
    $enlace = connectionDB();
    ingresoPartido($fechaPartido,$hora,$idequipoA,$idequipoB,$idliga,$enlace);
    connectionClose($enlace);
}
//valida existencia o ingresa equipo retorna ID de equipo
function ingresarEquipo($equipo){
    $enlace = connectionDB();
    $id = equipo($equipo, $enlace);
    if($id==null){
        //ingresar equipo a DB
        ingresoEquipos($equipo,$enlace);
        $id= equipo($equipo, $enlace);
    }
    connectionClose($enlace);
    return $id;
}

function buscarLiga($liga){
    $enlace = connectionDB();
    $id = idliga($liga,$enlace);
    if($id==null){
        //ingresar Liga a DB
        ingresoLiga($liga,$enlace);
        $id = idliga($liga,$enlace);
    }
    connectionClose($enlace);
    return $id;
}
function buscarPartido($fechaPartido,$horaP,$idequipoA,$idequipoB,$idliga){
    
}
function ingresarApuesta(){
    $nombreA=strip_tags($_POST['nombre']);
    $cedulaA=strip_tags($_POST['cedula']);
    $valorA=strip_tags($_POST['valor']);
    $fechaPartido = strip_tags($_POST['fecha']);
    $ligaP = strip_tags($_POST['liga']);
    $partido = strip_tags($_POST['partido']);
    $equipoA = strip_tags($_POST['equipoA']);
    $equipoB = strip_tags($_POST['equipoB']);
    $horaP = strip_tags($_POST['hora']);
    $equipoApostado = strip_tags($_POST["equipoapuesta"]);
    //$saldo = strip_tags($_POST['saldo']);
    $idAsesor = $_SESSION['id'];
    
    //validar y agregar partido
    if($partido == '--otro--'){
        //validar equipos
        $idequipoA = ingresarEquipo($equipoA);
        $idequipoB = ingresarEquipo($equipoB);
        $idliga = buscarLiga($ligaP);
       //ingresar datos de partido
        ingresarPartido($fechaPartido,$horaP,$idequipoA,$idequipoB,$idliga);
        $partido = buscarPartido($fechaPartido,$horaP,$idequipoA,$idequipoB,$idliga);
    }else{
        //se recupera datos de partido existente
        // consulta SELECT ID,EQUIPOA,EQUIPOB,LIGA FROM partidos WHERE FECHA='2016-04-29'
        $enlace = connectionDB();
        $partidoData = equiposLigaPartido($enlace,$partido);
        if ($partidoData!=null){
            $A=$partidoData[0];
            $B=$partidoData[1];
            $horapartido=$partidoData[3];
        }
        connectionClose($enlace);
    }
    $enlace = connectionDB();
    $idEquipoApostado = equipo($equipoA,$enlace);
    $idligaApuesta = idliga($ligaP,$enlace);
    $saldo = saldo($enlace,$_SESSION['id']);
    // el id de partido debe sacarse desde aqui despues de ser ingresado
   if($saldo >= $valorA)
   {ingresoApuesta($enlace,$nombreA,$cedulaA,$valorA,$idAsesor,$partido,$idEquipoApostado,$idligaApuesta,$saldo);}else{
       echo('<script type="text/javascript">alert("saldo insuficiente")</script>');
   }
    connectionClose($enlace);
    header('location: asesor.php');
    //el id del partido sera el value de los datos del combo
    /*$saldodisp=$saldo;
    $saldodisp-=$valorA;
    echo("datos");
    echo('nombre: '.$nombreA.'<br>'.
     ' cedula: '.$cedulaA.'<br>'.
    ' valor: '.$valorA.'<br>'.
    ' fechaP: '.$fechaPartido.'<br>'.
    'liga: '.$ligaP.'<br>'.
    'partido: '.$partido.'<br>'.
    'equipoA: '.$equipoA.'<br>'.
    'equipoB: '.$equipoB.'<br>'.
    '$hora: '.$horaP.'<br>'.
    'equipo apostado: '.$equipoApostado.'<br>'.
        'saldo : '.$saldo.'<br>'.
        'resta: '.$saldodisp).'<br>'.
        'idequipoapuesta: '.$idEquipoApostado.'<br>'.
        'id liga apuesta: '.$idligaApuesta.'<br>'.
        'id asesor: '.$idAsesor;*/
}

ingresarApuesta();

?>