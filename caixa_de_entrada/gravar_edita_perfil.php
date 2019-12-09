<?php
    session_start();
    header('Content-Type: text/html; charset=utf-8');
    //<!--OCULTA NOTIFICAÇÕES DE ERRO-->
    ini_set("display_error", 0 );

    error_reporting( 0 );
    $_SESSION['notificacao'] = 16;
    $_nome = $_POST['nome'];
    $_email = $_POST['email'];
    $_cpf = $_POST['cpf'];
    $_id_usuario = $_POST['id'];
    $_id_tipo = $_POST['id_tipo'];
    if($_id_tipo == 2 || $_id_tipo == 3 || $_id_tipo == 4){
        $_array = $_POST['array'];
    }
	
    include_once( "../configuracao/conecta.php" );
	
	mysqli_set_charset($_conexao,"utf8");
    mysqli_query("SET NAMES 'utf8'");
    mysqli_query('SET character_set_connection=utf8');
    mysqli_query('SET character_set_client=utf8');
    mysqli_query('SET character_set_results=utf8');

    $_sql = "UPDATE usuario SET nome = '$_nome', email = '$_email', cpf = '$_cpf' WHERE id_usuario = '$_id_usuario'";
    $_query = mysqli_query($_conexao, $_sql) or die (mysqli_error($_conexao));


    if($_id_tipo == 2){
        $_sql_dell_prof = "DELETE FROM professor_turma WHERE id_professor = '$_id_usuario'";
        $_query_dell_prof = mysqli_query($_conexao, $_sql_dell_prof) or die (mysqli_error($_conexao));
         for($_i=0;$_i<count($_array);$_i++){
            $_id_turma = $_array[$_i];
            $_sql3 = "INSERT INTO professor_turma (id_turma, id_professor) VALUES ('$_id_turma','$_id_usuario');";
            $_query3 = mysqli_query($_conexao, $_sql3) or die (mysqli_error($_conexao));
        }
    }else if($_id_tipo == 3){
        $_sql_dell_prof = "DELETE FROM aluno_turma WHERE id_aluno = '$_id_usuario'";
        $_query_dell_prof = mysqli_query($_conexao, $_sql_dell_prof) or die (mysqli_error($_conexao));
         for($_i=0;$_i<count($_array);$_i++){
            $_id_turma = $_array[$_i];
            $_sql3 = "INSERT INTO aluno_turma (id_turma, id_aluno) VALUES ('$_id_turma','$_id_usuario');";
            $_query3 = mysqli_query($_conexao, $_sql3) or die (mysqli_error($_conexao));
        }
    }else if($_id_tipo == 4){
         $_sql_dell_prof = "DELETE FROM aluno_responsavel WHERE id_responsavel = '$_id_usuario'";
        $_query_dell_prof = mysqli_query($_conexao, $_sql_dell_prof) or die (mysqli_error($_conexao));
         for($_i=0;$_i<count($_array);$_i++){
            $_id_aluno = $_array[$_i];
            $_sql3 = "INSERT INTO aluno_responsavel (id_responsavel, id_aluno) VALUES ('$_id_usuario','$_id_aluno');";
            $_query3 = mysqli_query($_conexao, $_sql3) or die (mysqli_error($_conexao));
        }
    }
    

     //header( "location:visitar_turma.php" );

?>
    <form action="visitar_perfil.php" method="post" name="voltar_pagina"><input type="hidden" name="id" value="<?php echo $_id_usuario; ?>"></form>
    <script type="text/javascript">document.voltar_pagina.submit();</script>