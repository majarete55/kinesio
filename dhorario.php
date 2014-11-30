<?php

    $prof = $_GET["idp"]; 
    $clase= $_GET["idc"];
    $hor= $_GET["idh"];
    include("conexion.php");
    $resul = "DELETE FROM `clase-horario` WHERE idhorario='$hor' AND idclase='$clase' AND cedulaprof='$prof'"; 
    $var=mysql_query($resul); 
    
    header("location:admin.php");
?>