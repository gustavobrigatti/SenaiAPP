<?php
    session_start();
    header('Content-Type: text/html; charset=utf-8');
    //<!--OCULTA NOTIFICAÇÕES DE ERRO-->
    ini_set("display_error", 0 );

    error_reporting( 0 );
    $_SESSION['notificacao'] = 14;
    $_nome = $_POST['curso'];
    $_sigla = $_POST['sigla'];
    $_id_turma = $_POST['id_turma'];
    $_professores = $_POST['professores'];
    $_aluno = $_POST['alunos']; 
	
    include_once( "../configuracao/conecta.php" );
	
	mysqli_set_charset($_conexao,"utf8");
    mysqli_query("SET NAMES 'utf8'");
    mysqli_query('SET character_set_connection=utf8');
    mysqli_query('SET character_set_client=utf8');
    mysqli_query('SET character_set_results=utf8');

    $_sql = "UPDATE turma SET nome_turma = '$_nome', sigla_turma = '$_sigla' WHERE id_turma = '$_id_turma'";
    $_query = mysqli_query($_conexao, $_sql) or die (mysqli_error($_conexao));
    
     $_sql_dell_prof = "DELETE FROM professor_turma WHERE id_turma = '$_id_turma'";
     $_query_dell_prof = mysqli_query($_conexao, $_sql_dell_prof) or die (mysqli_error($_conexao));

     $_sql_dell_prof = "DELETE FROM aluno_turma WHERE id_turma = '$_id_turma'";
     $_query_dell_prof = mysqli_query($_conexao, $_sql_dell_prof) or die (mysqli_error($_conexao));

     for($_i=0;$_i<count($_professores);$_i++){
        $_id_professor = $_professores[$_i];
        $_sql3 = "INSERT INTO professor_turma (id_turma, id_professor) VALUES ('$_id_turma','$_id_professor');";
        $_query3 = mysqli_query($_conexao, $_sql3) or die (mysqli_error($_conexao));
    }

     for($_i=0;$_i<count($_aluno);$_i++){
        $_id_aluno = $_aluno[$_i];
        $_sql3 = "INSERT INTO aluno_turma (id_turma, id_aluno) VALUES ('$_id_turma','$_id_aluno');";
        $_query3 = mysqli_query($_conexao, $_sql3) or die (mysqli_error($_conexao));
    }
    

     //header( "location:visitar_turma.php" );

?>
    <form action="visitar_turma.php" method="post" name="voltar_pagina"><input type="hidden" name="id" value="<?php echo $_id_turma; ?>"></form>
    <script type="text/javascript">document.voltar_pagina.submit();</script>