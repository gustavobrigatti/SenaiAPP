<?php
include_once( "../configuracao/conecta.php" );
session_start();
$_id      = $_POST['id'];
$_SESSION['notificacao'] = 18;
$_sql = "UPDATE mensagem SET arquivar = true WHERE id_mensagem = '$_id'";

$_query = mysqli_query( $_conexao , $_sql ) or die ( mysqli_error( $_conexao ) );
$_line = mysqli_fetch_array( $_query );

    header( "location:arquivados.php" );

?>