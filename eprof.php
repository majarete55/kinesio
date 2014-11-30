<?php 
    //recibo datos
    $cedula = $_POST["cedula"]; 
    $nombre = $_POST["nombre"];  
    $info = $_POST["desc"];  
    $correo =  $_POST["correo"];    
    
    //conecto con la bd
    include("conexion.php");
    $resul = "UPDATE profesor SET nombre='$nombre', descripcion='$info', correo='$correo' WHERE cedula='$cedula'"; 
    $var=mysql_query($resul); 
$tipo=$_SESSION['tipo'];
    $aux=$tipo+4;
    $id=$_POST['id'];
    if ( !isset($_FILES["imagen"]) || $_FILES["imagen"]["error"] > 0){
        header("location:admin.php");
        //echo "ha ocurrido un error";
    } else {
        //ahora vamos a verificar si el tipo de archivo es un tipo de imagen permitido.
        //y que el tamano del archivo no exceda los 16MB
        $permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
        $limite_kb = 16384;

        if (in_array($_FILES['imagen']['type'], $permitidos) && $_FILES['imagen']['size'] <= $limite_kb * 1024){

            //este es el archivo temporal
            $imagen_temporal  = $_FILES['imagen']['tmp_name'];
            //este es el tipo de archivo
            $tipo = $_FILES['imagen']['type'];
            //leer el archivo temporal en binario
                    $fp     = fopen($imagen_temporal, 'r+b');
                    $data = fread($fp, filesize($imagen_temporal));
                    fclose($fp);

                    //escapar los caracteres
                    $data = mysql_escape_string($data);

            $resultado = @mysql_query("UPDATE imagen set img='$data', tipo='$tipo' WHERE id='$id'") ;
             $_SESSION['tipo']=$aux-4;
            
            if ($resultado){
                header("location:admin.php?p=profesores");
            } else {
                echo "ocurrio un error al copiar el archivo.";
            }
        } else {
            echo "archivo no permitido, es tipo de archivo prohibido o excede el tamano de $limite_kb Kilobytes";
        }
    }

    //consulta
      header("location:admin.php?p=profesores");
?>