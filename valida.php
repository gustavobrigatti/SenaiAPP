<?php
	session_start();	
	//Incluindo a conexão com banco de dados
	include_once("configuracao/conecta.php");	
	//O campo usuário e senha preenchido entra no if para validar
	if((isset($_POST['cpf'])) && (isset($_POST['senha']))){
		$usuario = mysqli_real_escape_string($_conexao, $_POST['cpf']); //Escapar de caracteres especiais, como aspas, prevenindo SQL injection
		$senha = mysqli_real_escape_string($_conexao, $_POST['senha']);
		$senha = md5($senha);
			
		//Buscar na tabela usuario o usuário que corresponde com os dados digitado no formulário
		$result_usuario = "SELECT * FROM usuario WHERE cpf = '$usuario' && senha = '$senha' AND excluido = '0' LIMIT 1";
		$resultado_usuario = mysqli_query($_conexao, $result_usuario);
		$resultado = mysqli_fetch_assoc($resultado_usuario);
        
		
		//Encontrado um usuario na tabela usuário com os mesmos dados digitado no formulário
		if(isset($resultado)){
			$_SESSION['usuarioId'] = $resultado['id_usuario'];
			$_SESSION['usuarioNome'] = $resultado['nome'];
			$_SESSION['usuarioNiveisAcessoId'] = $resultado['id_tipo'];
			$_SESSION['email'] = $resultado['email'];
            $_SESSION['cpf'] = $resultado['cpf'];
            $_SESSION['avatar'] =$resultado['avatar'];
            
			if($_SESSION['usuarioNiveisAcessoId'] == "1"){
				header("Location: caixa_de_entrada/index.php");
			}elseif($_SESSION['usuarioNiveisAcessoId'] == "2"){
				header("Location: caixa_de_entrada/index.php");
			}elseif($_SESSION['usuarioNiveisAcessoId'] == "3"){
				header("Location: caixa_de_entrada/index.php");
			}elseif($_SESSION['usuarioNiveisAcessoId'] == "4"){
				header("Location: caixa_de_entrada/index.php");
			}elseif($_SESSION['usuarioNiveisAcessoId'] == "5"){
				header("Location: caixa_de_entrada/index.php");
			}
            
		//Não foi encontrado um usuario na tabela usuário com os mesmos dados digitado no formulário
		//redireciona o usuario para a página de login
		}else{	
			//Váriavel global recebendo a mensagem de erro
			$_SESSION['loginErro'] = "Usuário ou senha Inválido";
			header("Location: index.php");
		}
	//O campo usuário e senha não preenchido entra no else e redireciona o usuário para a página de login
	}else{
		$_SESSION['loginErro'] = "Usuário ou senha inválido";
		header("Location: index2.php");
	}
?>