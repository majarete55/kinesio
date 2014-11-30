<?php
    include("conexion.php");
    $mes = date("m");
    $ano =date("Y");
    $buscar=mysql_query("SELECT t1.cedula, t1.fechains, MAX(t2.fecha) FROM cliente AS t1, mensualidad AS t2 WHERE t2.cedcli=t1.cedula GROUP BY t1.cedula") or die(mysql_error());
    $busca=mysql_fetch_array($buscar); 
    do {   
        
        $buscar2=mysql_query("SELECT monto FROM cliente AS t1, plan AS t2 WHERE t1.cedula='$busca[0]' AND t2.id=t1.idplan") or die(mysql_error());
        $busca2=mysql_fetch_array($buscar2); 
        if($busca[0]!=""){
            $fechi = explode('-',$busca[2]);
            $dia =explode('-',$busca[1]);
            $fechi[1]=$fechi[1]+1;
            
            while ($fechi[0]<=$ano){
                while ($fechi[1]<=$mes){
                    $fecha = $fechi[0]."-".$fechi[1]."-".$dia[2];
                    $resul='';
                    $resul = "INSERT INTO mensualidad (monto, mes, ano, fecha, estado, cedcli) VALUES ('$busca2[0]','$fechi[1]','$fechi[0]','$fecha','0','$busca[0]')"; 
                    $var=mysql_query($resul);
//                    echo $resul;
//                    echo $var;
                    $fechi[1]=$fechi[1]+1;
                }   
                $fechi[0]=$fechi[0]+1;
            }   
        }
        
//        $resul = "INSERT INTO mensualidad (monto, mes, ano, fecha, estado) VALUES ('$busca2[0]','$mes','$ano','$fecha','sin pagar')"; 
//        $var=mysql_query($resul);
//        echo 'ya vaaaa';
//        echo $resul;
    }while ($busca=mysql_fetch_array($buscar));

?>