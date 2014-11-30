<?php 
//conecto con la bd
    include("permisos.php");
    include("conexion.php");
    //recibo datos
    $titulo = $_POST["titulo"];  
    $contenido = $_POST["contenido"];  
    $fecha = date("Y-m-d"); 
    
    
    //consulta
    $resul = "INSERT INTO noticia (titulo, contenido,fecha) VALUES ('$titulo','$contenido','$fecha')"; 
    $var=mysql_query($resul); 
    if ($_SESSION['tipo']==1){
        header("location:admin.php");
    }
    else{
        header("location:prof.php");
    }
?>