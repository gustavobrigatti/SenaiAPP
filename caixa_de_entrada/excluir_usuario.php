<?php
    include_once( "../configuracao/conecta.php" );
    session_start();
    $_id = $_POST['id'];
    
    $_sql = "UPDATE usuario SET excluido = '1' WHERE id_usuario = '$_id'";
    $_query = mysqli_query( $_conexao , $_sql ) or die ( mysqli_error( ) );
?>
<form action="visitar_perfil.php" method="post" name="voltar_pagina"><input type="hidden" name="id" value="<?php echo $_id; ?>"></form>
<script type="text/javascript">document.voltar_pagina.submit();</script>