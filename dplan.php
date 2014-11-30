<?php 
    //recibo datos
    $id = $_GET["id"];  
    
    //conecto con la bd
    include("conexion.php");
    //consulta
    $resul = "DELETE FROM plan WHERE id='$id'"; 
    $var=mysql_query($resul); 
    header("location:admin.php");
?>