<?php
include_once( "../configuracao/conecta.php" );
session_start();
$_id      = $_SESSION['id_album'];
$_SESSION['notificacao'] = 11;
$_sql = "UPDATE albuns SET excluido = true WHERE id_album = '$_id'";

$_query = mysqli_query( $_conexao , $_sql ) or die ( mysqli_error( $_conexao ) );
$_line = mysqli_fetch_array( $_query );
unset($_SESSION['id_album']);
    header( "location:exibir_galeria.php" );
?>