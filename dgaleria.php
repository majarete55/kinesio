<?php
    require("conexion.php");

    $id=$_GET['id'];

    $consulta = mysql_query("DELETE FROM imagen WHERE id='$id'") or die(mysql_error());

    if ($_SESSION['tipo']==1){
        header("location:admin.php");
    }
    else{
        header("location:prof.php");
    }


 ?>