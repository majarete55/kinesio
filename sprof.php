<?php 
    include("permisos.php");
include("enviarcorreo.php");
 $tipo=$_SESSION['tipo'];
    $aux=$tipo+4;
    $cedula = $_POST["cedula"]; 
    $nombre = $_POST["nombre"];  
    $info = $_POST["info"];  
    $correo =  $_POST["correo"];
    //conecto con la bd
    include("conexion.php");
    include("simagen.php");

     

    $rs = mysql_query("SELECT MAX(id) AS id FROM imagen");
    if ($row = mysql_fetch_row($rs)) {
        $idimg = trim($row[0]);
    }

   
    //crear el usuario
    $pass='1234';
  $resul = "INSERT INTO usuario (login, password, tipo) VALUES ('$cedula','$pass','2')"; 
    $var=mysql_query($resul);
   
//aqui deberiamos mandar el correo
    //consulta
    $resul = "INSERT INTO profesor (cedula, nombre, descripcion, correo, idimg, login) VALUES ('$cedula','$nombre','$info','$correo','$idimg', '$cedula')"; 
    $var=mysql_query($resul);


 $cuerpo='<html>
                <head></head>
                <body>
                <br>
                <br>
                <p> Estimado(a) Profesor(a), '.$nombre.' su usuario para ingresar al sistema es: '.$cedula.' y su password: '.$pass.'</p>
                </body>
                </html>
                ';

enviarcorreo($cuerpo, $correo, 'Bienvenidos a Kinesio');


 $_SESSION['tipo']=$aux-4;
die("<script>location.href = 'admin.php?p=profesores'</script>");

?>