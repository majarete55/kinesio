<?php 
    include("permisos.php");
    //recibo datos
    $id = $_GET["id"];  
    
    //conecto con la bd
    include("conexion.php");
    //consulta
    $resul = "DELETE FROM articulo WHERE id='$id'"; 
    $var=mysql_query($resul); 
    if ($_SESSION['tipo']==1){
        header("location:admin.php?p=articulos");
    }
    else{
        header("location:prof.php?p=articulos");
    }
?>