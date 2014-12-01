<?php 
    
    //recibo datos
    $cedula = $_POST["cedula"];  
    $nombre = $_POST["nombre"];
    $tlf = $_POST["telefono"];  
    $correo = $_POST["correo"];
    $idplan = $_POST["idplan"];
    $fecha = $_POST["fecha"];
    $trozo = explode("-", $fecha);
    //conecto con la bd
   $tipo=$_SESSION['tipo'];
    $aux=$tipo+4;
    include("conexion.php");
    //insertar cliente
    $resul = "INSERT INTO cliente (cedula, nombre, tlf, correo, fechains, idplan) VALUES ('$cedula', '$nombre', '$tlf', '$correo', '$fecha', '$idplan')"; 
    $var=mysql_query($resul);


    //me traigo el monto
    $buscar2=mysql_query("SELECT monto FROM plan WHERE id='$idplan'") or die(mysql_error());
    $busca2=mysql_fetch_array($buscar2); 
    
    //primera mensualidad
    $fecha1 = str_replace("/","-",$fecha);
    $resul = "INSERT INTO mensualidad (mes, ano, cedcli, monto, fecha, estado, descuento) VALUES ('$trozo[1]', '$trozo[0]','$cedula','$busca2[0]','$fecha','1','0')"; 
    $var=mysql_query($resul);
 $_SESSION['tipo']=$aux-4;
    header("location:admin.php?p=clientes");
//    echo $resul;
//    echo $var;

//    $trozo = explode("/", $fecha);
?>