<?php
	session_start();
	$_SESSION['logou']='s';
	require_once "../Controller/ControladorGeral.php";
	$controlador=new ControladorGeral();
	$nome = $_SESSION['nome'];
	//echo("<script>alert('".$_SESSION['nome']."');</script>");
	//$_SESSION['nome']=$nome;
	$controlador->abrearq("../View/menuPinc.php",array('n'=>$nome));
?>