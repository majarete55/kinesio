<a href=javascript:buscaplan();><span id='glysearch' class='glyphicon glyphicon-search'></span></a><input id='buscaplan' style='float: right; height: 20px; margin-right: 10px; margin-bottom:10px; width: 150px;' type='text' name='buscaplan' size='10' maxlength='30'>


<h3 style='margin-top: 40px;'>Planes 
<a data-toggle="modal" data-target="#nplan"><span id='glyplus' class='glyphicon glyphicon-plus'></span></a>
<a href="pdfplanes.php" target="_blank"><span id='glyplus' class='glyphicon glyphicon-print'></span></a>
</h3> 
    

<form action="" method="POST" >
    <ul class="list-group">
        <?php 
            $id=$_GET['id'];
            include("conexion.php");
            
            if($id!=""){
                $buscar=mysql_query("SELECT id, nombre, descripcion, monto FROM plan WHERE nombre LIKE '%".$id."%'") or die(mysql_error());
                $busca=mysql_fetch_array($buscar); 
                        
            }
            else{
                $buscar=mysql_query("SELECT id, nombre, descripcion, monto FROM plan") or die(mysql_error());
                $busca=mysql_fetch_array($buscar);
            }

            do {        
                if($busca[0]!=""){
                    echo "<li class='list-group-item'>".$busca['nombre']."<a href='dplan.php?id=".$busca['id']."'><span id='gly' class='glyphicon glyphicon-remove'></span></a><a rel='abrir' class='enlace'  data-toggle='modal' data-target='#eplan' onclick='return plan(this.id);' id='".$busca['id']."' ><span id='gly' class='glyphicon glyphicon-pencil'></span></a></li>";
                    echo "<input type='hidden' name='nombre' id='".$busca['id']."' value='".$busca['nombre']."'/>";
                    echo "<input type='hidden' name='desc' id='".$busca['id']."' value='".$busca['descripcion']."'/>";
                    echo "<input type='hidden' name='monto' id='".$busca['id']."' value='".$busca['monto']."'/>";
                }
            }while ($busca=mysql_fetch_array($buscar));
        ?>   

    </ul>
<!--    <input class='btn btn-default' type='submit' value='Editar'>-->
</form>

<div class="modal fade" id="nplan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Nuevo Plan</h4>
      </div>
      <div id="modal" class="modal-body">
        <form action="splan.php" method="POST" enctype="multipart/form-data" >
            <h5>Nombre</h5> 
            <input type="text" class="form-control" name="nombre" size="25" maxlength="50">
            <h5>Descripcion</h5> 
            <TEXTAREA name="desc" class="form-control" rows="10" cols="35">
            </TEXTAREA>
            <h5>Monto</h5> 
            <input type="text" class="form-control" name="monto" size="25" maxlength="50">
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


<div class="modal fade" id="eplan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Editar Plan</h4>
      </div>
      <div id="modal" class="modal-body">
        <form action="eplan.php" method="POST" enctype="multipart/form-data" >
            <input type="hidden" class="form-control" id="modalid" name="id" size="25" maxlength="50">
            <h5>Nombre</h5> 
            <input type="text" class="form-control" id="modalnombre" name="nombre" size="25" maxlength="50">
            <h5>Descripcion</h5> 
            <TEXTAREA id="modaldesc" name="desc" class="form-control" rows="10" cols="35">
            </TEXTAREA>
            <h5>Monto</h5> 
            <input type="text" class="form-control" id="modalmonto" name="monto" size="25" maxlength="50">
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