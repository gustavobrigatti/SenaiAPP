<?php
include_once( "../configuracao/conecta.php" );
$_SESSION['notificacao'] = 3;
$_id      = $_POST['id'];

$_sql = "UPDATE mensagem SET favoritar = false WHERE id_mensagem = '$_id'";

$_query = mysqli_query( $_conexao , $_sql ) or die ( mysqli_error( $_conexao ) );
$_line = mysqli_fetch_array( $_query );

?>
<form action="index.php" method="post" name="voltar_pagina"><input type="hidden" name="notificacao" value="<?php echo $_notificacao; ?>"></form>
<script type="text/javascript">document.voltar_pagina.submit();</script>