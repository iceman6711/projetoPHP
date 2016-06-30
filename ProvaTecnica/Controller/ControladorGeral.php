<?php
 class ControladorGeral{
	private $nomeuser;
	public function setNomeUser($nome){
		$this->nomeuser=$nome;
	}
	public function getNomeUser(){
		return $this->nomeuser;
	}
	public function abrearq($file,$var){
		extract($var);
		include($file);
	}
	public function cadastra($tabela,$values){
		$host= "localhost";
		$username="root";
		$password="";
		try{
			$dbh = new PDO("mysql:host=$host;dbname=provatecnica",$username,$password);
			$resultado='conectei';
			$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // <== add this line
			$consulta=$dbh->prepare("INSERT INTO $tabela $values");		
			$consulta->execute();
			$result= $consulta->rowCount();
			if($result<>0)
			{
				return true;
			}else { return false;}
			$dbh = null;
		}catch(PDOException $e)
			{
				return $e->getMessage();
			}
	}
}
?>
