<?php
    include_once( "../configuracao/conecta.php" );
    $_id = $_POST['id'];
	$_nome = $_POST['nome'];
    $_cpf  = $_POST['cpf'];
    $_email = $_POST['email'];
    $_telefone = $_POST['telefone'];;
	
	$result_usuario = "UPDATE usuario SET nome = '$_nome', cpf = '$_cpf', email = '$_email', telefone = '$_telefone' WHERE id = 3";

	$resultado_usuario = mysqli_query($_conexao, $result_usuario);
    echo $_id.$_nome.$_cpf.$_email.$_telefone;
     //header( "location:usuarios.php" );
?>