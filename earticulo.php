<?php 
    //recibo datos
    $titulo = $_POST["titulo"];  
    $contenido = $_POST["contenido"];  
    $ida = $_POST["id"];  
    
    //conecto con la bd
    include("conexion.php");
    $resul = "UPDATE articulo SET titulo='$titulo', contenido='$contenido' WHERE id='$ida'"; 
    $var=mysql_query($resul); 
  $tipo=$_SESSION['tipo'];
    $aux=$tipo+4;
    $id=$_POST['idimg'];
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
                if ($_SESSION['tipo']==1){
                    header("location:admin.php?p=articulos");
                }
                else{
                    header("location:prof.php?p=articulos");
                }
            } else {
                echo "ocurrio un error al copiar el archivo.";
            }
        } else {
            echo "archivo no permitido, es tipo de archivo prohibido o excede el tamano de $limite_kb Kilobytes";
        }
    }
$_SESSION['tipo']=$aux-4;
    //consulta
    
?>