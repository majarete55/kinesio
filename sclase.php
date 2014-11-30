<?php
include("permisos.php");
include("conexion.php");
    $nombre = $_POST["nombre"];  
    $descripcion = $_POST["desc"];  
    $aux=$tipo+4;

include("simagen.php");



    $rs = mysql_query("SELECT MAX(id) AS id FROM imagen");
    if ($row = mysql_fetch_row($rs)) {
        $idimg = trim($row[0]);
    }
    
    $_SESSION['tipo']=$aux-4;
     //guardo la clase
    $resul = "INSERT INTO clase (nombre, descripcion, idimg) VALUES ('$nombre','$descripcion','$idimg')"; 
//    echo $resul;
    $var=mysql_query($resul); 
//    echo $var;
    header("location:admin.php");
?>