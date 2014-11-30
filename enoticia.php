<?php 
    //recibo datos
    include("permisos.php");
    $titulo = $_POST["titulo"];  
    $contenido = $_POST["contenido"];  
    $id = $_POST["id"];  
    
    //conecto con la bd
    include("conexion.php");
    //consulta
    $resul = "UPDATE noticia SET titulo='$titulo', contenido='$contenido' WHERE id='$id'"; 
    $var=mysql_query($resul); 
    if ($_SESSION['tipo']==1){
        header("location:admin.php");
    }
    else{
        header("location:prof.php");
    }
?>