<h3>Galeria <a data-toggle="modal" data-target="#nimg"><span id='glyplus' class='glyphicon glyphicon-plus'></span></a></h3> 
<br>
<div class="col-lg-12 ">
    <ul class="list-group">
        <?php
            include("conexion.php");
            $verificar3=mysql_query("SELECT  imagen.id, imagen.img FROM `galeria-img` AS gal, imagen WHERE gal.idimg = imagen.id") or die(mysql_error());
//            $ver3=mysql_fetch_array($verificar3);
            while ($ver3=mysql_fetch_array($verificar3)) {		
            echo "<li class='list-group-item'><img src='mimagen.php?id=".$ver3[0]."' width='100' height='100'><a href='dgaleria.php?id=".$ver3[0]."'><span id='gly' class='glyphicon glyphicon-remove'></span></a><a rel='abrir' class='enlace'  data-toggle='modal' data-target='#eimg' onclick='return img(this.id);' id='".$ver3[0]."' ><span id='gly' class='glyphicon glyphicon-pencil'></span></a></li>";
            echo "<input type='hidden' name='id_img' id='".$ver3[0]."' value='".$ver3[0]."'/>";
            echo "<tr> \n";		
            echo "<td><img src='mimagen.php?id=".$ver3[0]."' width='200' height='85'></td>";
            echo '<td>'.'<a href='.'cambiarimg.php?ID='.$ver3[0].'>'.'Cambiar'.'</a>'.'</td>'; 
            echo '<td>'.'<a href='.'eliminarimg.php?ID='.$ver3[0].'>'.'Eliminar'.'</a>'.'</td>';  
            echo "</tr>";	
        } ?>
    </ul>      
</div>

<div class="modal fade" id="nimg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Nueva Imagen</h4>
        <?php echo $_SESSION['tipo'];?>
      </div>
      <div id="modal" class="modal-body">
        <form action="sgaleria.php" method="POST" enctype="multipart/form-data" >
            <h5>Imagen</h5>
            <input type="file" class="form-control" name="imagen" id="imagen" />
            <br>
            <input style="float:right;" class="btn btn-primary" type="submit" value="Guardar">
        </form>
      </div>
<!--
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary">Guardar</button>
      </div>
-->
    </div>
  </div>
</div>

<div class="modal fade" id="eimg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Editar Articulo</h4>
      </div>
      <div id="modal" class="modal-body">
        <form action="egaleria.php" method="POST" enctype="multipart/form-data" >
            <input type="hidden" class="form-control" id="modalid" name="id" size="25" maxlength="50">
            <h5>Imagen</h5>
            <img class='img-responsive img-border img-thumbnail' id=modalimg style='width: 100px; height: 100px;'>
            <input type="file" class="form-control" name="imagen" id="imagen" />
            <br>
            <input style="float:right;" class="btn btn-primary" type="submit" value="Guardar">
        </form>
      </div>
<!--
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary">Guardar</button>
      </div>
-->
    </div>
  </div>
</div>