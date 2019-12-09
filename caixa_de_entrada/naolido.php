<?php
include_once( "../configuracao/conecta.php" );

$_id      = $_POST['id'];

$_sql = "UPDATE mensagem SET status = false WHERE id_mensagem = '$_id'";

$_query = mysqli_query( $_conexao , $_sql ) or die ( mysqli_error( $_conexao ) );
$_line = mysqli_fetch_array( $_query );

if( $_query )
{
    header( "location:index.php" );
}
else
{
    header( "location:index.php" );
}
?>