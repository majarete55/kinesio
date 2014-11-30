<a href=javascript:buscaprof();><span id='glysearch' class='glyphicon glyphicon-search'></span></a><input id='buscaprof' style='float: right; height: 20px; margin-right: 10px; margin-bottom:10px; width: 150px;' type='text' name='buscaprof' size='10' maxlength='30'>


<h3 style='margin-top: 40px;'>Profesores 
<a data-toggle="modal" data-target="#nprof"><span id='glyplus' class='glyphicon glyphicon-plus'></span></a>
 <a href="pdfprofesores.php" target="_blank"><span id='glyplus' class='glyphicon glyphicon-print'></span></a>
</h3> 
    

<form action="" method="POST" >
    <ul class="list-group">
        <?php 

            $id=$_GET['id'];
            include("conexion.php");
            
            if($id!=""){
                $buscar=mysql_query("SELECT cedula, nombre, descripcion, correo, idimg FROM profesor WHERE nombre LIKE '%".$id."%'") or die(mysql_error());
                $busca=mysql_fetch_array($buscar); 
                        
            }
            else{
                $buscar=mysql_query("SELECT cedula, nombre, descripcion, correo, idimg FROM profesor") or die(mysql_error());
                $busca=mysql_fetch_array($buscar);  
            }

            do {        
                if($busca[0]!=""){
                    echo "<li class='list-group-item'>".$busca['nombre']."<a href='dprof.php?id=".$busca['cedula']."'><span id='gly' class='glyphicon glyphicon-remove'></span></a><a rel='abrir' class='enlace'  data-toggle='modal' data-target='#eprof' onclick='return prof(this.id);' id='".$busca['cedula']."' ><span id='gly' class='glyphicon glyphicon-pencil'></span></a></li>";
                    echo "<input type='hidden' name='nombre' id='".$busca['cedula']."' value='".$busca['nombre']."'/>";
                    echo "<input type='hidden' name='desc' id='".$busca['cedula']."' value='".$busca['descripcion']."'/>";
                    echo "<input type='hidden' name='correo' id='".$busca['cedula']."' value='".$busca['correo']."'/>";
                    echo "<input type='hidden' name='img' id='".$busca['cedula']."' value='".$busca['idimg']."'/>";
                }
            }while ($busca=mysql_fetch_array($buscar));
        ?>   

    </ul>
<!--    <input class='btn btn-default' type='submit' value='Editar'>-->
</form>

<div class="modal fade" id="nprof" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Nuevo Profesor</h4>
      </div>
      <div id="modal" class="modal-body">
        <form action="sprof.php" method="POST" enctype="multipart/form-data" >
            <h5>Cedula</h5> 
            <input type="text" class="form-control" name="cedula" size="25" maxlength="50">
            <h5>Nombre</h5> 
            <input type="text" class="form-control" name="nombre" size="25" maxlength="50">
            <h5>Descripcion</h5> 
            <TEXTAREA name="info" class="form-control" rows="10" cols="35">
            </TEXTAREA>
            <h5>Correo</h5> 
            <input type="text" class="form-control" name="correo" size="25" maxlength="50">
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


<div class="modal fade" id="eprof" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Editar Profesor</h4>
      </div>
      <div id="modal" class="modal-body">
        <form action="eprof.php" method="POST" enctype="multipart/form-data" >
            <input type="hidden" class="form-control" id="modalcedula" name="cedula" size="25" maxlength="50">
            <h5>Nombre</h5> 
            <input type="text" class="form-control" id="modalnombre" name="nombre" size="25" maxlength="50">
            <h5>Descripcion</h5> 
            <TEXTAREA id="modaldesc" name="desc" class="form-control" rows="10" cols="35">
            </TEXTAREA>
            <h5>Correo</h5> 
            <input type="text" class="form-control" id="modalcorreo" name="correo" size="25" maxlength="50">
            <h5>Imagen</h5>
            <img class='img-responsive img-border img-thumbnail' name="img" id=modalimg style='width: 100px; height: 100px;'>
            <input type="file" class="form-control" name="imagen" id="imagen" />
            <input type="hidden" name="id" id="id"/>
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