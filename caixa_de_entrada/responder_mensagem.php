<?php
    session_start();
    header('Content-Type: text/html; charset=utf-8');
    //<!--OCULTA NOTIFICAÇÕES DE ERRO-->
    ini_set("display_error", 0 );

    error_reporting( 0 );
    $_usuario_id = $_SESSION['usuarioId'];
	$_destinatario_id = $_POST['id'];
    $_assunto = $_POST['assunto'];
    $_mensagem  = $_POST['mensagem'];
	
    include_once( "../configuracao/conecta.php" );
	
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

    $_assunto_final = "RE: ".$_assunto;
        
        $_sql = "INSERT INTO mensagem (id_de, id_para, assunto, texto, dia_hora, status, favoritar, arquivar, lixeira, excluida_permanente, status_adm, data_visualizada, anexo) VALUES ('$_usuario_id','$_destinatario_id', '$_assunto_final', '$_mensagem','$_dia_hora','0','0','0','0','0','0','null','null');";
        
        
        $_query = mysqli_query($_conexao, $_sql) or die (mysqli_error($_conexao));
        
     header( "location:index.php" );
?>