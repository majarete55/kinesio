<?php 
session_start();

if(!isset($_SESSION['login'])){    //si no hubo login entonces se destruye la sesion y se redirecciona
	session_destroy();
	header("location:index.php?msg=2");
	 exit();
	
}else{
	if($_SESSION['tipo']!=1 && $_SESSION['tipo']!=2){ //si no es admin o profesor se destruye la sesion y se redirecciona
	session_destroy();
	header("location:index.php?msg=2");
	exit();}
}

?>