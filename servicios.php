<div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Clases
                        <strong>Ofertadas</strong>
                    </h2>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-condensed">
                        <tr>
                            <td >
                                <p align="center" >Hora</p>
                            </td>
                            <td>
                                <p align="center">Lunes</p>
                            </td>
                            <td>
                                <p align="center">Martes</p>
                            </td>
                            <td>
                                <p align="center">Miercoles</p>
                            </td>
                            <td>
                                <p align="center">Jueves</p>
                            </td>
                            <td>
                                <p align="center">Viernes</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p align="center">8:00-9:00</p>
                            </td>
                            <td>
                                <p align="center">Circuito Funcional</p>
                            </td>
                            <td>
                                
                            </td>
                            <td>
                                <p align="center">Circuito Funcional</p>
                            </td>
                            <td>
                                
                            </td>
                            <td>
                                <p align="center">Circuito Funcional</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p align="center">5:00-6:00</p>
                            </td>
                            <td>
                                <p align="center">Circuito Funcional</p>
                            </td>
                            <td>
                                <p align="center">Yoga</p>
                            </td>
                            <td>
                                <p align="center">Circuito Funcional</p>
                            </td>
                            <td>
                                <p align="center">Yoga</p>
                            </td>
                            <td>
                                <p align="center">Circuito Funcional</p>
                            </td>
                            
                        </tr>
                        <tr>
                            <td>
                                <p align="center">6:00-7:00</p>
                            </td>
                            <td>
                                <p align="center">Pilates</p>
                            </td>
                            <td>
                                <p align="center">Bailoterapia</p>
                            </td>
                            <td>
                                <p align="center">Pilates</p>
                            </td>
                            <td>
                                <p align="center">Bailoterapia</p>
                            </td>
                            <td>
                                <p align="center">Pilates</p>
                            </td>
                            
                        </tr>
                    </table>
                    </div>
                    <br>
                    <p>**Para mayor informacion referente a nuestras clases, comunicate con nosotros</p>
                    
                </div>
            </div>
        </div>

<div class="row">
    <div class="box">
        <div class="col-lg-12">
            <hr>
            <h2 class="intro-text text-center">Planes</h2>
            <hr>
            <div class="table-responsive">
                <table class="table table-condensed">
                    <?php 
                        include("conexion.php");
                        $buscar=mysql_query("SELECT * FROM plan") or die(mysql_error());
                        $busca=mysql_fetch_array($buscar); 
                        do {		
                            if($busca[0]!=""){
                                echo "<tr>";
                                echo "<td>";
                                echo "<p align='center'>". $busca["nombre"]."</p>";
                                echo "</td>";
                                echo "<td>";
                                echo "<p align='center'>". $busca["descripcion"]."</p>";
                                echo "</td>";
                                echo "</tr>";
                            }


                        }while ($busca=mysql_fetch_array($buscar)); 
                    ?>	
                </table>
            </div>
            <br>
            <p>**Para mayor informacion referente a nuestros planes y tarifas, comunicate con nosotros</p>

        </div>
    </div>
</div>