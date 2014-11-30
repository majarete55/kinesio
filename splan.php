<?php 
include("permisos.php");
    //recibo datos
    $nombre = $_POST["nombre"];  
    $descripcion = $_POST["desc"];  
    $monto =  $_POST["monto"];
    //conecto con la bd
    include("conexion.php");
    //consulta
    $resul = "INSERT INTO plan (nombre, descripcion, monto) VALUES ('$nombre','$desc','$monto')"; 
    $var=mysql_query($resul); 
//    echo $var;
if ($_SESSION['tipo']==1){
        header("location:admin.php");
    }
    else{
        header("location:prof.php");
    }
?>