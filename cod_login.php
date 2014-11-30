<?php
	session_start();
	require ("conexion.php");
	$usuario=$_POST['usr'];
	$pass=$_POST['pw'];

//Consulta
	$consulta=mysql_query("SELECT * FROM usuario WHERE login='$usuario' AND password='$pass'") or die(mysql_error());
	if ($resultado=mysql_fetch_array($consulta)){
		$_SESSION['login']=$usuario;
		$_SESSION['pass']=$resultado['pass'];
		$_SESSION['tipo']=$resultado['tipo'];
		
        if($_SESSION['tipo']==1){
		  header("location:admin.php"); //cuando le cambio el nombre me dirige a otro menu
        }
            else{
                if($_SESSION['tipo']==2){    
                    header("location:prof.php"); //cuando le cambio el nombre me dirige a otro menu
                }
        
            }
            exit();
	}else{
		
        header("location:index.php?msg=1"); //cuando le cambio el nombre me dirige a otro menu
		session_destroy(); exit();	
	}
 ?>