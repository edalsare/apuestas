<?php

function connectionDB(){
    define('DB_SERVER','localhost');
    define('DB_NAME','apuestas');
    define('DB_USER','root');
    define('DB_PASS','Jorge1990');
    
    $enlace = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
    if(!$enlace){
    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    $enlace=null;
    exit;
    }
    return $enlace;
}
function connectionClose($enlace){
    mysqli_close($enlace);
}

function verificarLogin($user,$enl,$pass){
    $sql = "SELECT CONTRASENA,TIPO from persona where USUARIO='".$user."'";
    $result = $enl -> query($sql) or die("error al crear conexíon con DB");
    connectionClose($enl);
    if($row=$result->fetch_assoc()){
    
        if($row['CONTRASENA']==$pass){
            session_start();
            $_SESSION['usuario']=$user;
            $_SESSION['tipo']=$row[TIPO];
        
            echo("<script>alert('hola');</script>");
            if($_SESSION['tipo']=='ADMINISTRADOR'){
                echo("<script>alert('admin');</script>");
                header("location: administrador.php");
            }elseif($_SESSION['tipo']=='ASESOR'){
                echo("<script>alert('asesor');</script>");
            header("location: asesor.php");
            }
        
        }else{
            header("Location: index.html");
            exit();
        }
    }else{
        header("location: index.html");
        exit();
    }
}

function ingresarPersona($nombre,$apellido,$cedula,$telefono,$email,$usuario,$password,$enl){
    
   
    $contrasena = password_hash($password, PASSWORD_DEFAULT);
    
    $sql = "INSERT INTO persona VALUES('".$cedula."','".$nombre."','".$apellido."','".$telefono."','".$email."','ASESOR','".$contrasena."','".$usuario."',NULL);";
    $enl->query($sql) or die("error al ingresar datos en DB");
    connectionClose($enl);
}

?>