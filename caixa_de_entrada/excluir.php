<?php
session_start();
include_once( "../configuracao/conecta.php" );

$_id      = $_SESSION['id_mensagem'];

$_sql = "UPDATE mensagem SET lixeira = true WHERE id_mensagem = '$_id'";
unset($_SESSION['id_mensagem']);
$_query = mysqli_query( $_conexao , $_sql ) or die ( mysqli_error( $_conexao ) );
$_line = mysqli_fetch_array( $_query );
$_SESSION['notificacao'] = 4;
?>
<form action="index.php" method="post" name="voltar_pagina"><input type="hidden" name="notificacao" value="<?php echo $_notificacao; ?>"></form>
<script type="text/javascript">document.voltar_pagina.submit();</script>