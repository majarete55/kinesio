<?php 
    //recibo datos
    $id = $_GET["id"];  
    
    //conecto con la bd
    include("conexion.php");
    //consulta
    
    $buscar=mysql_query("SELECT idimg FROM clase WHERE id='".$id."'") or die(mysql_error());
    $busca=mysql_fetch_array($buscar); 
    
    $resul3 = "DELETE FROM imagen WHERE id='".$busca['idimg']."'"; 
    $var3=mysql_query($resul3); 
    
    $resul = "DELETE FROM clase WHERE id='$id'"; 
    $var=mysql_query($resul); 

    $resul2 = "DELETE FROM clase-horario WHERE idclase='$id'"; 
    $var2=mysql_query($resul2);
    
    header("location:admin.php");
?>