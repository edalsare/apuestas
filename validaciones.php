<?php
    function validarAdmin(){
        session_start();
    if ($_SESSION['tipo']!='ADMINISTRADOR') { 
        header('location: dennyAcces.html');
        exit;
    }
    }

    function validarAsesor(){
        session_start();
    if (!$_SESSION['tipo']) { 
        header('location: dennyAcces.html');
        exit;
    }
    }
?>