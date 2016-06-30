<?php
		session_start();
        $login   = $_GET['login']; 
        $senha   = $_GET['senha'];
		require_once("ControladorGeral.php");
		$controlador=new ControladorGeral();
		//$_SESSION["idnome"] = $usuario;
        $senha = preg_replace('/[^a-z0-9]/i', '', $senha);
		$host= "localhost";
		$username="root";
		$password="";
		sleep(1);
		try{
			$dbh = new PDO("mysql:host=$host;dbname=provatecnica",$username,$password);
			$resultado='conectei';
			$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // <== add this line
			
			$qry="SELECT COUNT(*) FROM login where login='$login' and senha=md5('$senha');";
			$consulta=$dbh->query($qry);
			$result = $consulta->fetchColumn();
			if($result>0)
			{
				//$consulta=$dbh->prepare("SELECT nome FROM login where login=':login' and senha=md5(':senha');");
				//$consulta->bindParam(':login', $login, PDO::PARAM_STR);
				//$consulta->bindParam(':senha', $senha, PDO::PARAM_STR);			
				//$consulta->execute();
				$qry="SELECT nome FROM login where login='$login' and senha=md5('$senha');";
				foreach ($dbh->query($qry) as $row) {
					//$controlador->setNomeUser($row['nome']);
					$_SESSION['nome']=$row['nome'];
				}
				echo "Login Autorizado";
			}else {echo "Login nao encontrado";}
			$dbh = null;
		}catch(PDOException $e)
			{
				echo $e->getMessage();
			}

		
?>
