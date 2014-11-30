<h3 style='margin-top:40px;margin-bottom: 20px;'>Reporte Profesores mas articulos <a><span id='glyplus' class='glyphicon glyphicon-stats'></span></a><a><span id='glyplus' class='glyphicon glyphicon-list'></span></a></h3> 

<h6> Numero de comentarios <input id='num' style='height: 20px; margin-right: 10px; margin-bottom:10px; width: 150px;' type='text' name='num' size='10' maxlength='30'> <a onclick="reportenc();"><span id='glysearch' style="float: none;" class='glyphicon glyphicon-search'></span></a></h6>

<form action="" method="POST" >
    <ul class="list-group">
        <?php 
 $meses[0]="ENERO";$meses[1]="FEBRERO";$meses[2]="MARZO";$meses[3]="ABRIL";$meses[4]="MAYO";$meses[5]="JUNIO";$meses[6]="JULIO";$meses[7]="AGOSTO";$meses[8]="SEPTIEMBRE";$meses[9]="OCTUBRE";$meses[10]="NOVIEMBRE";$meses[11]="DICIEMBRE";
           $auxmes=-1;
            //muestra personas morosas de acuerdo a una cantidad de meses o mas de ella

            $num=$_GET['num'];
            if($num!=""){
                include("conexion.php");
                $buscar=mysql_query("SELECT A.titulo, P.nombre, COUNT( C.id ) AS cant
                                    FROM ARTICULO AS A
                                    LEFT JOIN COMENTARIO AS C ON A.ID = C.IDART
                                    LEFT JOIN PROFESOR AS P ON P.LOGIN = A.LOGIN
                                    GROUP BY A.titulo") or die(mysql_error()); 
                
                $busca=mysql_fetch_array($buscar); 
                
                do {        
                    if($busca[0]!=""){
                        if($busca['cant']>=$num){
                            $tot=$tot+$busca['cant'];
                        }
                    }
                }while ($busca=mysql_fetch_array($buscar));
                
                $buscar=mysql_query("SELECT A.titulo, P.nombre, COUNT( C.id ) AS cant
                                    FROM ARTICULO AS A
                                    LEFT JOIN COMENTARIO AS C ON A.ID = C.IDART
                                    LEFT JOIN PROFESOR AS P ON P.LOGIN = A.LOGIN
                                    GROUP BY A.titulo") or die(mysql_error()); 
                
                $busca=mysql_fetch_array($buscar);
                
                echo "<table class='table'> <tbody>";
                echo "<tr><td>Titulo Articulo</td><td>Nombre Profesor</td><td>Cantidad de Comentarios</td><td>%</td></tr>";
                do {        
                    if($busca[2]!=""){
                        if($busca['cant']>=$num){
                            $por=0;
                            if($tot>0){
                                $por=round(($busca['cant']*100/$tot),2);
                            }
                            
                            if($busca['nombre']!=NULL){
                                echo "<tr><td>".$busca['titulo']."</td><td>".$busca['nombre']."</td><td>".$busca['cant']."</td><td>".$por."</td></tr>";
                            }
                            else{
                                echo "<tr><td>".$busca['titulo']."</td><td>ADMINISTRADOR</td><td>".$busca['cant']."</td><td>".$por."</td></tr>";
                            }
                        }
                    }
                }while ($busca=mysql_fetch_array($buscar));
                echo "</tbody></table>";
            
            }
            
        ?>   

    </ul>
    
<!--    <input class='btn btn-default' type='submit' value='Editar'>-->
</form>