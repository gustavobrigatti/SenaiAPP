<?php
session_start();
include_once( "../configuracao/conecta.php" );

$_id      = $_POST['id_mensagem_adm'];

$_sql = "DELETE FROM mensagem WHERE id_mensagem = '$_id'";
$_query = mysqli_query( $_conexao , $_sql ) or die ( mysqli_error( $_conexao ) );
$_line = mysqli_fetch_array( $_query );
?>
<form action="gerenciador_mensagem.php" method="post" name="voltar_pagina"><input type="hidden" name="notificacao" value="<?php echo $_notificacao; ?>"></form>
<script type="text/javascript">document.voltar_pagina.submit();</script>