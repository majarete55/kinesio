
<h3>Horarios <a data-toggle="modal" data-target="#nhor" onclick='return nhor();'><span id='glyplus' class='glyphicon glyphicon-plus'></span></a></h3> 
<form action="" method="POST" >
    <ul class="list-group">
        <?php 
            $id = $_GET["id"]; 
            include("conexion.php");
            $buscar=mysql_query("SELECT horario.dia, DATE_FORMAT(horario.horaini,'%H:%i') AS horaini, DATE_FORMAT(horario.horafin,'%H:%i') AS horafin, cl.idhorario, cl.cedulaprof FROM `clase-horario` AS cl, horario WHERE horario.id=cl.idhorario AND cl.idclase='".$id."'") or die(mysql_error());
            $busca=mysql_fetch_array($buscar); 
            echo "<input type='hidden' name='clase' value='".$id."'/>";
            do {        
                if($busca[0]!=""){
                    echo "<li class='list-group-item'>".$busca['dia']." ".$busca['horaini']." ".$busca['horafin']."<a href='dhorario.php?idh=".$busca['idhorario']."&idc=".$id."&idp=".$busca['cedulaprof']."'><span id='gly' class='glyphicon glyphicon-remove'></span></a><a rel='abrir' class='enlace'  data-toggle='modal' data-target='#ehor' onclick='return hor(this.id);' id='".$busca['idhorario']."' ><span id='gly' class='glyphicon glyphicon-pencil'></span></a></li>";
                    echo "<input type='hidden' name='dia' id='".$busca['idhorario']."' value='".$busca['dia']."'/>";
                    echo "<input type='hidden' name='ini' id='".$busca['idhorario']."' value='".$busca['horaini']."'/>";
                    echo "<input type='hidden' name='fin' id='".$busca['idhorario']."' value='".$busca['horafin']."'/>";
                    echo "<input type='hidden' name='prof' id='".$busca['idhorario']."' value='".$busca['cedulaprof']."'/>";
                    
                }
            }while ($busca=mysql_fetch_array($buscar));
        ?>   

    </ul>
</form>

<div class="modal fade" id="nhor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Nuevo Horario</h4>
      </div>
      <div id="modal" class="modal-body">
        <form action="shorario.php" method="POST" enctype="multipart/form-data" >
            <input type="hidden" class="form-control" name="idclase" id="idclase" size="25" maxlength="50">
            
            <h5>Dia</h5> 
            <SELECT id="dia" class="form-control" NAME="dia" SIZE=1> 
                <?php 
                    
                    echo "<option value='LUNES'>LUNES</option>";
                    echo "<option value='MARTES'>MARTES</option>";
                    echo "<option value='MIERCOLES'>MIERCOLES</option>";
                    echo "<option value='JUEVES'>JUEVES</option>";    
                    echo "<option value='VIERNES'>VIERNES</option>";
                    echo "<option value='SABADO'>SABADO</option>";
                    echo "<option value='DOMINGO'>DOMINGO</option>";
                ?>
            </SELECT>
            <h5>Inicio</h5> 
            <input type="time" class="form-control" name="ini" size="25" maxlength="50">
            <h5>Fin</h5>
            <input type="time" class="form-control" name="fin" size="25" maxlength="50">
            <h5>Profesor</h5>
            <SELECT id="prof" name="prof" class="form-control" NAME="prof" SIZE=1> 
                <?php 
                    $buscar3=mysql_query("SELECT cedula, nombre FROM profesor") or die(mysql_error());
                    $busca3=mysql_fetch_array($buscar3); 
                    do {        
                        if($busca3[0]!=""){
                            echo "<option value=".$busca3['cedula'].">".$busca3['nombre']."</option>";
                        }
                    }while ($busca3=mysql_fetch_array($buscar3));
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


<div class="modal fade" id="ehor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Editar Horario</h4>
      </div>
      <div id="modal" class="modal-body">
        <form action="ehorario.php" method="POST" enctype="multipart/form-data" >
            <input type="hidden" class="form-control" name="idclase" id="modalidclase" size="25" maxlength="50">
            <input type="hidden" class="form-control" name="idhor" id="modalidhor" size="25" maxlength="50">
            <h5>Dia</h5> 
            <SELECT id="modaldia" class="form-control" NAME="dia" SIZE=1> 
                <?php 
                    
                    echo "<option value='LUNES'>LUNES</option>";
                    echo "<option value='MARTES'>MARTES</option>";
                    echo "<option value='MIERCOLES'>MIERCOLES</option>";
                    echo "<option value='JUEVES'>JUEVES</option>";    
                    echo "<option value='VIERNES'>VIERNES</option>";
                    echo "<option value='SABADO'>SABADO</option>";
                    echo "<option value='DOMINGO'>DOMINGO</option>";
                ?>
            </SELECT>
            <h5>Inicio</h5> 
            <input type="time" class="form-control" name="ini" id="modalini" size="25" maxlength="50">
            <h5>Fin</h5>
            <input type="time" class="form-control" name="fin" id="modalfin" size="25" maxlength="50">
            <h5>Profesor</h5>
            <SELECT id="modalprof" name="prof" class="form-control" NAME="prof" SIZE=1> 
                <?php 
                    $buscar3=mysql_query("SELECT cedula, nombre FROM profesor") or die(mysql_error());
                    $busca3=mysql_fetch_array($buscar3); 
                    do {        
                        if($busca3[0]!=""){
                            echo "<option value=".$busca3['cedula'].">".$busca3['nombre']."</option>";
                        }
                    }while ($busca3=mysql_fetch_array($buscar3));
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