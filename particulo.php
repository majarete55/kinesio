<div class="row">
    <div class="box">
  
         <div class="col-lg-12 text-center">
        <?php 
                include("conexion.php");
                $id=$_GET["id"];
                $buscar=mysql_query("SELECT * FROM articulo where id=$id") or die(mysql_error());
                    $busca=mysql_fetch_array($buscar); 

                do {        
                    if($busca[0]!=""){
                        echo "<img class='img-responsive img-border img-thumbnail' style='width: 400px; height: 400px;' src='mimagen.php?id=".$busca['idimg']."' >";
                        echo "<h2>".$busca["titulo"];
                        echo "<br>";
                        echo "<small>".date('M d, Y', strtotime($busca["fecha"]))."</small>";
                        echo "</h2>";
                        echo "<p>".$busca["contenido"]."</p>";}

                }while ($busca=mysql_fetch_array($buscar));
                 ?>

        </div>

    </div>
</div>
        
<div class="row">
    <div class="box">
        <div class="col-lg-12">
            <div class="col-md-8">
                <h2 class="intro-text text-center">Comentarios</h2>
                <hr style='max-width: 100%;'>
                <?php
                    
                    $verificar3=mysql_query("SELECT nombreresp, contenido from comentario where idart=$id") or die(mysql_error());
                    $ver3=mysql_fetch_array($verificar3);
                    $i=1;
                        do {	
                            if($ver3[1]!=""){
                             echo "<h4>".$i." ".$ver3[0]."</h4>";
                             echo "<p>".$ver3[1]."</p>";
                                echo "<hr style='max-width: 100%;'>";
                             $i++;}
                            else{
                            echo "<p>No hay comentarios para este artículo, sea el primero en comentar.</p>";
                            }
                          }while ($ver3=mysql_fetch_array($verificar3)); 
                ?>    
            </div>
            <div class="col-md-4">
                <h2 class="intro-text text-center">Haga sus comentarios</h2>
                <hr>
                <form action="cod_articulo.php" method="post">
                    <div class="row">
                        <div class="form-group col-lg-4">
                            <label>Nombre</label>
                            <input id="nombre" name="nombre" style="width: 340px;" type="text" class="form-control">
                        </div>
                        <div class="clearfix"></div>
                        <div class="form-group col-lg-12">
                            <label>Comentario</label>
                            <textarea id="comentario" name="comentario" class="form-control" rows="6"></textarea>
                        </div>
                        <div class="form-group col-lg-12">
                            <input type="hidden" name="id" id="id" value='<?php echo $id;?>'>
                            <button type="submit" class="btn btn-default">Publicar</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>