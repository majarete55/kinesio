<?php 
    //recibo datos
    $id = $_GET["id"];  
    
    //conecto con la bd
    include("conexion.php");
    //consulta
    $resul = "DELETE FROM cliente WHERE cedula='$id'"; 
    $var=mysql_query($resul); 
    header("location:admin.php?p=clientes");
?>