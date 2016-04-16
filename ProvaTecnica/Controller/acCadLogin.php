<?php
        $login   = $_GET['login']; 
        $senha   = $_GET['senha'];
		$nome 	 = $_GET['nome'];
		require_once("ControladorGeral.php");
		$controlador=new ControladorGeral();
		//$_SESSION["idnome"] = $usuario;
        $senha = preg_replace('/[^a-z0-9]/i', '', $senha);
		$host= "localhost";
		$username="root";
		$password="testepratico";
		sleep(1);
		try{
			$dbh = new PDO("mysql:host=$host;dbname=provatecnica",$username,$password);
			$resultado='conectei';
			$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // <== add this line
			$qry="SELECT COUNT(*) FROM login where login='$login';";
			$consulta=$dbh->query($qry);
			$result = $consulta->fetchColumn();
			if($result>0)
			{
				echo "Este Login já está em uso.";
			}else{
					$tabela="login(nome,login,senha)";
					$values= "values('$nome','$login',md5('$senha'))";
					$retorn=$controlador->cadastra($tabela,$values);
					if($controlador->cadastra($tabela,$values)){
						echo "Cadastrado";
					}else {echo "Erro ao cadastrar";};
			}
			$dbh = null;
		}catch(PDOException $e)
			{
				echo $e->getMessage();
			}
?>