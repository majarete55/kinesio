<?php 
include("permisos.php");
include("conexion.php");
   $tipo=$_SESSION['tipo'];
    $aux=$tipo+4;
    include("simagen.php");

 $_SESSION['tipo']=$aux-4;
    //traigo idimagen
    
    $rs = mysql_query("SELECT MAX(id) AS id FROM imagen") or die(mysql_error()) ;
    if ($row = mysql_fetch_row($rs)) {
        $idimg = trim($row[0]);
    }
    $resul = "INSERT INTO  `galeria-img` (idgaleria, idimg) VALUES ('1','$idimg')"; 
    $var=mysql_query($resul); 
//    echo $var;
    if ($_SESSION['tipo']==1){
        header("location:admin.php");
    }
    else{
        header("location:prof.php");
    }
?>