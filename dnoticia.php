<?php 
include("permisos.php");
    $id = $_GET["id"];  
    
    //conecto con la bd
    include("conexion.php");
    //consulta
    $resul = "DELETE FROM noticia WHERE id='$id'"; 
    $var=mysql_query($resul); 
    if ($_SESSION['tipo']==1){
        header("location:admin.php");
    }
    else{
        header("location:prof.php");
    }
?>