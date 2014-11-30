<?php
//recibo datos
    $cedula = $_POST["cedula"];  
    $nombre = $_POST["nombre"];
    $tlf = $_POST["telefono"];  
    $correo = $_POST["correo"];
    $idplan = $_POST["idplan"];
    //conecto con la bd
    include("conexion.php");
    //actualizo cliente
    $resul = "UPDATE cliente SET nombre='$nombre', tlf='$tlf', correo='$correo', idplan='$idplan' WHERE  cedula='$cedula'"; 
    $var=mysql_query($resul);
//    echo $resul;
//    echo $var;
    header("location:admin.php");
?>