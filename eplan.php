<?php 
    //recibo datos
    $nombre = $_POST["nombre"];  
    $descripcion = $_POST["desc"];  
    $monto = $_POST["monto"];  
    $id = $_POST["id"];  
    
    //conecto con la bd
    include("conexion.php");
    //consulta
    $resul = "UPDATE plan SET nombre='$nombre', descripcion='$desc', monto='$monto' WHERE id='$id'"; 
//    echo $resul;
    $var=mysql_query($resul); 
    header("location:admin.php");
//    echo $var;
?>