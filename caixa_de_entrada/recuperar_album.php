<?php
include_once( "../configuracao/conecta.php" );

$_id_album  = $_POST['id_album'];
$_sql = "UPDATE albuns SET excluido = false WHERE id_album = '$_id_album'";

$_query = mysqli_query( $_conexao , $_sql ) or die ( mysqli_error( $_conexao ) );
$_line = mysqli_fetch_array( $_query );
?>
    <form action="fotos_album.php" method="post" name="voltar_pagina"><input type="hidden" name="id_album" value="<?php echo $_id_album; ?>"></form>
    <script type="text/javascript">document.voltar_pagina.submit();</script>