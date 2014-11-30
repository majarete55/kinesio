<?php
    $dia = $_POST["dia"];  
    $ini = $_POST["ini"];  
    $fin = $_POST["fin"];  
    $prof = $_POST["prof"]; 
    $clase= $_POST["idclase"]; 
    include("conexion.php");
    //buscar si existe el horario
    $buscar3=mysql_query("SELECT id FROM horario WHERE dia='".$dia."' AND horaini='".$ini."' AND horafin='".$fin."'") or die(mysql_error());
    
    //sino existe, crearlo y recuperar el id
    if($busca3=mysql_fetch_array($buscar3)){
        $idhor= $busca3[0];
        
    }
    else{
        
        $resul = "INSERT INTO horario (dia, horaini, horafin) VALUES ('$dia','$ini','$fin')"; 
        
        $var=mysql_query($resul); 
        $rs = mysql_query("SELECT MAX(id) AS id FROM horario");
        if ($row = mysql_fetch_row($rs)) {
            $idhor = trim($row[0]);
        }
    }

    //insertar el horario para esa clase y ese profesor
    $resul = "INSERT INTO `clase-horario` (idhorario, idclase, cedulaprof) VALUES ('$idhor','$clase','$prof')"; 
    $var=mysql_query($resul);
//    echo $resul;
    header("location:admin.php");
?>