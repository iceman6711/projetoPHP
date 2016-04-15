<?php
 class ControladorGeral{
	private $nomeuser;
	public function setNomeUser($nome){
		$this->nomeuser=$nome;
	}
	public function getNomeUser(){
		return $this->nomeuser;
	}
}
?>