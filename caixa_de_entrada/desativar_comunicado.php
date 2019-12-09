<?php
    include_once( "../configuracao/conecta.php" );
	
	$result_usuario = "UPDATE aviso SET status = false WHERE id_aviso = 1";
	$resultado_usuario = mysqli_query($_conexao, $result_usuario);

     header( "location:comunicado.php" );
?>