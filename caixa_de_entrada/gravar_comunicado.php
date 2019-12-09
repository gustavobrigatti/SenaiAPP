<?php
    session_start();
    header('Content-Type: text/html; charset=utf-8');
    //<!--OCULTA NOTIFICAÇÕES DE ERRO-->
    ini_set("display_error", 0 );
    
    error_reporting( 0 );
	$_titulo = $_POST['titulo'];
    $_texto  = $_POST['texto'];
    $_id = $_POST['id'];
	
    include_once( "../configuracao/config.php" );

    mysqli_set_charset($_conexao,"utf8");
    mysqli_query("SET NAMES 'utf8'");
    mysqli_query('SET character_set_connection=utf8');
    mysqli_query('SET character_set_client=utf8');
    mysqli_query('SET character_set_results=utf8');

    //PEGA DATA E HORA
    date_default_timezone_set('America/Sao_Paulo');
    $date = date('d/m/Y');
    $hour = date('H:i');
    $_dia_hora = $date." ás ".$hour;
	
	//$nome_usuario = "Kelly";
	
	$_sql = "UPDATE aviso SET titulo = '$_titulo', texto = '$_texto', dia_hora = '$_dia_hora' WHERE id_aviso = '$_id'";
	$_query = mysqli_query($_conexao, $_sql) or die (mysqli_error($_conexao));
    header( "location:comunicado.php" );
?>