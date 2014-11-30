<?php
include("permisos.php");
include("conexion.php");

    //recibo datos
    $titulo = $_POST["titulo"];  
    $contenido = $_POST["contenido"];  
    $fecha = date("Y-m-d");  
    $login=$_POST['login'];
    //conecto con la bd
      $tipo=$_SESSION['tipo'];
    $aux=$tipo+4;
    include("simagen.php");


 $_SESSION['tipo']=$aux-4;

    //consulta
    $rs = mysql_query("SELECT MAX(id) AS id FROM imagen");
    if ($row = mysql_fetch_row($rs)) {
        $idimg = trim($row[0]);
    }
    $resul = "INSERT INTO articulo (titulo, contenido, fecha,idimg, login) VALUES ('$titulo','$contenido','$fecha','$idimg','$login')"; 
//    echo $resul;
    $var=mysql_query($resul) or die(mysql_error()) ;
//    echo $var;


   if ($_SESSION['tipo']==1){
        header("location:admin.php?p=articulos");
    }
    else{
        header("location:prof.php?p=articulos");
    }
    
?>