<?php
    session_start();
    header('Content-Type: text/html; charset=utf-8');
    //<!--OCULTA NOTIFICAÇÕES DE ERRO-->
    ini_set("display_error", 0 );

    error_reporting( 0 );
    $_SESSION['notificacao'] = 30;
    $_id_usuario = $_SESSION['usuarioId'];
    $_id_album = $_POST['id_album'];
    $_id_tipo = $_SESSION['usuarioNiveisAcessoId'];
    $_nome_album = $_POST['nome_album'];
    $_publico = $_POST['publico'];
	
    include_once( "../configuracao/conecta.php" );
	
	mysqli_set_charset($_conexao,"utf8");
    mysqli_query("SET NAMES 'utf8'");
    mysqli_query('SET character_set_connection=utf8');
    mysqli_query('SET character_set_client=utf8');
    mysqli_query('SET character_set_results=utf8');
    $_sql2 = "UPDATE albuns SET nome_album = '$_nome_album', publico = '$_publico' WHERE id_album = '$_id_album'";
    $_query2 = mysqli_query($_conexao, $_sql2) or die (mysqli_error($_conexao));
    if($_publico == true){
        $_sql = "DELETE FROM album_turma WHERE id_album = '$_id_album'";
        $_query = mysqli_query($_conexao, $_sql) or die (mysqli_error($_conexao));
    }else{
        
        $_array = $_POST['array'];
        if($_id_tipo == 1 || $_id_tipo == 5){
            $_sql = "DELETE FROM album_turma WHERE id_album = '$_id_album'";
            $_query = mysqli_query($_conexao, $_sql) or die (mysqli_error($_conexao));
            for($_i=0;$_i<count($_array);$_i++){
                $_id_turma = $_array[$_i];
                $_sql3 = "INSERT INTO album_turma (id_album, id_turma) VALUES ('$_id_album','$_id_turma');";
                $_query3 = mysqli_query($_conexao, $_sql3) or die (mysqli_error($_conexao));
            }
        }else if($_id_tipo == 2){
            $_sql = "SELECT id_turma FROM professor_turma WHERE id_professor = '$_id_usuario'";
            $_query = mysqli_query($_conexao, $_sql) or die (mysqli_error($_conexao));
            while( $_line = mysqli_fetch_array( $_query ) ){
                $_id_turma = $_line['id_turma'];
                $_sql2 = "DELETE FROM album_turma WHERE id_album = '$_id_album' AND id_turma = '$_id_turma'";
                $_query2 = mysqli_query($_conexao, $_sql2) or die (mysqli_error($_conexao));
            }
            for($_i=0;$_i<count($_array);$_i++){
                $_id_turma = $_array[$_i];
                $_sql3 = "INSERT INTO album_turma (id_album, id_turma) VALUES ('$_id_album','$_id_turma');";
                $_query3 = mysqli_query($_conexao, $_sql3) or die (mysqli_error($_conexao));
            }
        }
    }

?>
    <form action="fotos_album.php" method="post" name="voltar_pagina"><input type="hidden" name="id_album" value="<?php echo $_id_album; ?>"></form>
    <script type="text/javascript">document.voltar_pagina.submit();</script>