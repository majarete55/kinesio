<?php 
    //conecto con la bd
    include("conexion.php");
    //comprobamos si ha ocurrido un error.
   $id=$_POST['id'];
    if ( !isset($_FILES["imagen"]) || $_FILES["imagen"]["error"] > 0){
        echo "ha ocurrido un error";
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
            
            
            if ($resultado){
                if ($_SESSION['tipo']==1){
                    header("location:admin.php");
                }
                else{
                    header("location:prof.php");
                }
            } else {
                echo "ocurrio un error al copiar el archivo.";
            }
        } else {
            echo "archivo no permitido, es tipo de archivo prohibido o excede el tamano de $limite_kb Kilobytes";
        }
    }

?>