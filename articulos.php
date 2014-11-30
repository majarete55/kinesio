<?php include("permisos.php")?>
<a href=javascript:buscaa();><span id='glysearch' class='glyphicon glyphicon-search'></span></a><input id='buscan' style='float: right; height: 20px; margin-right: 10px; margin-bottom:10px; width: 150px;' type='text' name='buscan' size='10' maxlength='30'>

<h3 style='margin-top: 40px;'>Articulos 
    <a data-toggle="modal" data-target="#narticulo"><span id='glyplus' class='glyphicon glyphicon-plus'></span></a>
     <a href="pdfarticulos.php" target="_blank"><span id='glyplus' class='glyphicon glyphicon-print'></span></a>
</h3> 


<form action="" method="POST" >
    <ul class="list-group">
        <?php 
            $id=$_GET['id'];
            include("conexion.php");
            
            if($id!=""){
                $buscar=mysql_query("SELECT id, titulo, contenido, idimg FROM articulo WHERE titulo LIKE '%".$id."%'") or die(mysql_error());
                $busca=mysql_fetch_array($buscar); 
                        
            }
            else{
                $buscar=mysql_query("SELECT id, titulo, contenido, idimg FROM articulo") or die(mysql_error());
                $busca=mysql_fetch_array($buscar); 
            }
            do {        
                if($busca[0]!=""){
                    echo "<li class='list-group-item'>".$busca['titulo']."<a href='darticulo.php?id=".$busca['id']."'><span id='gly' class='glyphicon glyphicon-remove'></span></a><a rel='abrir' class='enlace'  data-toggle='modal' data-target='#earticulo' onclick='return art(this.id);' id='".$busca['id']."' ><span id='gly' class='glyphicon glyphicon-pencil'></span></a></li>";
                    echo "<input type='hidden' name='titulo' id='".$busca['id']."' value='".$busca['titulo']."'/>";
                    echo "<input type='hidden' name='contenido' id='".$busca['id']."' value='".$busca['contenido']."'/>";
                    echo "<input type='hidden' name='idimg' id='".$busca['id']."' value='".$busca['idimg']."'/>";
                }
            }while ($busca=mysql_fetch_array($buscar));
        ?>   

    </ul>
    
<!--    <input class='btn btn-default' type='submit' value='Editar'>-->
</form>

<div class="modal fade" id="narticulo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Nuevo Articulo</h4>
      </div>
      <div id="modal" class="modal-body">
        <form action="sarticulo.php" method="POST" enctype="multipart/form-data" >
            <h5>Titulo</h5> 
            <input type="text" class="form-control" name="titulo" size="25" maxlength="50">
            <h5>Contenido</h5> 
            <TEXTAREA name="contenido" class="form-control" rows="10" cols="35">
            </TEXTAREA>
            <h5>Imagen</h5>
            <input type="file" class="form-control" name="imagen" id="imagen" />
            <br>
            <input type="hidden" name='login' id='login' value='<?php echo $_SESSION['login'];?>'/>
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


<div class="modal fade" id="earticulo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Editar Articulo</h4>
      </div>
      <div id="modal" class="modal-body">
        <form action="earticulo.php" method="POST" enctype="multipart/form-data" >
            <input type="hidden" class="form-control" id="modalid" name="id" size="25" maxlength="50">
            <h5>Titulo</h5> 
            <input type="text" class="form-control" id="modaltitulo" name="titulo" size="25" maxlength="50">
            <h5>Contenido</h5> 
            <TEXTAREA name="contenido" class="form-control" id="modalcontenido" rows="10" cols="35">
            </TEXTAREA>
            <h5>Imagen</h5>
            <img class='img-responsive img-border img-thumbnail' id=modalimg style='width: 100px; height: 100px;'>
            <input type="file" class="form-control" name="imagen" id="imagen" />
            <input type="hidden" class="form-control" id="idimg" name="idimg" size="25" maxlength="50">
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