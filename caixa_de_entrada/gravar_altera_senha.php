<?php
    session_start();
    header('Content-Type: text/html; charset=utf-8');
    //<!--OCULTA NOTIFICAÇÕES DE ERRO-->
    ini_set("display_error", 0 );

    error_reporting( 0 );

	include_once( "../configuracao/conecta.php" );
	
	mysqli_set_charset($_conexao,"utf8");
    mysqli_query("SET NAMES 'utf8'");
    mysqli_query('SET character_set_connection=utf8');
    mysqli_query('SET character_set_client=utf8');
    mysqli_query('SET character_set_results=utf8');
    
    $_id_usuario = $_SESSION['usuarioId'];
    $_senha_atual = $_POST['senha_atual'];
    $_senha_atual = md5($_senha_atual);
    $_nova_senha = $_POST['password'];
    $_nova_senha = md5($_nova_senha);
    $_iContador = 0;
    $_sql = "SELECT * FROM usuario WHERE id_usuario = '$_id_usuario' AND senha = '$_senha_atual'";
    $_query = mysqli_query($_conexao, $_sql) or die (mysqli_error($_conexao));
    while( $_line = mysqli_fetch_array( $_query ) ){ 
        $_iContador++;
    }
    if($_iContador == 0){
        $_SESSION['status_senha'] = 1;
        header( "location:alterar_senha.php" );
    }else{
        $_sql = "UPDATE usuario SET senha = '$_nova_senha' WHERE id_usuario = '$_id_usuario'";
        $_query = mysqli_query($_conexao, $_sql) or die (mysqli_error($_conexao));
        $_SESSION['status_senha'] = 2;
        header( "location:alterar_senha.php" );
    }


?>