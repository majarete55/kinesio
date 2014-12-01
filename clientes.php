<a href=javascript:buscacli();><span id='glysearch' class='glyphicon glyphicon-search'></span></a><input id='buscacli' style='float: right; height: 20px; margin-right: 10px; margin-bottom:10px; width: 150px;' type='text' name='buscacli' size='10' maxlength='30'>

<h3 style='margin-top: 40px;'>Clientes
<a data-toggle="modal" data-target="#ncli"><span id='glyplus' class='glyphicon glyphicon-plus'></span></a>
<a href="pdfclientes.php" target="_blank"><span id='glyplus' class='glyphicon glyphicon-print'></span></a>
</h3> 
    

<form action="" method="POST" >
    <ul class="list-group">
        <?php 
            $id=$_GET['id'];
            include("conexion.php");
            
            if($id!=""){
                $buscar=mysql_query("SELECT cedula, nombre, tlf, correo, idplan, fechains FROM cliente WHERE nombre LIKE '%".$id."%'") or die(mysql_error());
                $busca=mysql_fetch_array($buscar); 
                        
            }
            else{
                $buscar=mysql_query("SELECT cedula, nombre, tlf, correo, idplan, fechains FROM cliente") or die(mysql_error());
                $busca=mysql_fetch_array($buscar); 
            }

            do {        
                if($busca[0]!=""){
                    echo "<li class='list-group-item'>".$busca['cedula']." ".$busca['nombre']."<a href='dcliente.php?id=".$busca['cedula']."'><span id='gly' class='glyphicon glyphicon-remove'></span></a><a rel='abrir' class='enlace'  data-toggle='modal' data-target='#ecli' onclick='return cli(this.id);' id='".$busca['cedula']."' ><span id='gly' class='glyphicon glyphicon-pencil'></span></a></li>";
//                    echo "<input type='hidden' name='cedula' id='".$busca['cedula']."' value='".$busca['cedula']."'/>";
                    echo "<input type='hidden' name='nombre' id='".$busca['cedula']."' value='".$busca['nombre']."'/>";
                    echo "<input type='hidden' name='telefono' id='".$busca['cedula']."' value='".$busca['tlf']."'/>";
                    echo "<input type='hidden' name='correo' id='".$busca['cedula']."' value='".$busca['correo']."'/>";
                    echo "<input type='hidden' name='plan' id='".$busca['cedula']."' value='".$busca['idplan']."'/>";
                    echo "<input type='hidden' name='fecha' id='".$busca['cedula']."' value='".$busca['fecha']."'/>";
                }
            }while ($busca=mysql_fetch_array($buscar));
        ?>   

    </ul>
<!--    <input class='btn btn-default' type='submit' value='Editar'>-->
</form>


<div class="modal fade" id="ncli" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Nuevo Cliente</h4>
      </div>
      <div id="modal" class="modal-body">
        <form action="scliente.php" method="POST" enctype="multipart/form-data" >
            <h5>Cedula</h5> 
            <input type="text" class="form-control" name="cedula" size="25" maxlength="50">
            <h5>Nombre</h5> 
            <input type="text" class="form-control" name="nombre" size="25" maxlength="50">
            <h5>Telefono</h5> 
            <input type="text" class="form-control" name="telefono" size="25" maxlength="50">
            <h5>Correo</h5> 
            <input type="text" class="form-control" name="correo" size="25" maxlength="50">
            <h5>Plan</h5> 
            <SELECT class="form-control"  NAME="idplan" SIZE=1> 
            <?php 
                $buscar=mysql_query("SELECT id, nombre FROM plan") or die(mysql_error());
                $busca=mysql_fetch_array($buscar); 
                do {        
                    if($busca[0]!=""){
                        echo "<option value=".$busca['id'].">".$busca['nombre']."</option>";
                    }
                }while ($busca=mysql_fetch_array($buscar));
            ?>
            </SELECT>
            <h5>Fecha</h5>
            <input type="date" class="form-control" name="fecha" >
            <br>
            <br>
            <input style="float:right;" class="btn btn-primary" type="submit"  value="Guardar">
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


<div class="modal fade" id="ecli" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Editar Cliente</h4>
      </div>
      <div id="modal" class="modal-body">
        <form action="ecliente.php" method="POST" enctype="multipart/form-data" >
            <input type="hidden" class="form-control" id="modalcedula" name="cedula" size="25" maxlength="50">
            <h5>Nombre</h5> 
            <input type="text" class="form-control" id="modalnombre" name="nombre" size="25" maxlength="50">
            <h5>Telefono</h5> 
            <input type="text" class="form-control" id="modaltelefono" name="telefono" size="25" maxlength="50">
            <h5>Correo</h5> 
            <input type="text" class="form-control" id="modalcorreo" name="correo" size="25" maxlength="50">
            <h5>Plan</h5> 
            <SELECT class="form-control"  id="modalplan" name="idplan" SIZE=1> 
            <?php 
                $buscar=mysql_query("SELECT id, nombre FROM plan") or die(mysql_error());
                $busca=mysql_fetch_array($buscar); 
                do {        
                    if($busca[0]!=""){
                        echo "<option value=".$busca['id'].">".$busca['nombre']."</option>";
                    }
                }while ($busca=mysql_fetch_array($buscar));
            ?>
            </SELECT>
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
