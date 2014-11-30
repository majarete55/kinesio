<?php 
require("conexion.php");
$id=$_POST["id"];
$nombre=$_POST['nombre'];
$comentario=$_POST['comentario'];
$fecha=date("d,m,Y");

$consulta = mysql_query("INSERT INTO comentario
                       (contenido,
                       nombreresp,
                       fecha,
                       idart)
                       VALUES
                       ('$comentario',
                       '$nombre',
                       '$fecha',
                       '$id')") or die(mysql_error());

header("location:index.php"); 
//javascript:articulo.php?id=".$id
?>