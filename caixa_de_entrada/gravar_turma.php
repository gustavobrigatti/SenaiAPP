<?php
    session_start();
    header('Content-Type: text/html; charset=utf-8');
    //<!--OCULTA NOTIFICAÇÕES DE ERRO-->
    ini_set("display_error", 0 );

    error_reporting( 0 );
    $_SESSION['notificacao'] = 7;
    $_curso = $_POST['curso'];
    $_sigla = $_POST['sigla'];
	$_professores_id = $_POST['professores'];
    $_alunos_id = $_POST['alunos'];
	
    include_once( "../configuracao/conecta.php" );
	
	mysqli_set_charset($_conexao,"utf8");
    mysqli_query("SET NAMES 'utf8'");
    mysqli_query('SET character_set_connection=utf8');
    mysqli_query('SET character_set_client=utf8');
    mysqli_query('SET character_set_results=utf8');

    $_sql = "INSERT INTO turma (nome_turma, sigla_turma) VALUES ('$_curso', '$_sigla')";
    $_query = mysqli_query($_conexao, $_sql) or die (mysqli_error($_conexao));

    $_sql2 = "SELECT id_turma FROM turma ";
    $_query2 = mysqli_query($_conexao, $_sql2) or die (mysqli_error($_conexao));
    while( $_line = mysqli_fetch_array( $_query2 ) ){
        $_id_turma = $_line['id_turma'];
    }
     
    for($_i=0;$_i<count($_professores_id);$_i++){
        $_id_professor = $_professores_id[$_i];
        
        
        $_sql3 = "INSERT INTO professor_turma (id_turma, id_professor) VALUES ('$_id_turma','$_id_professor');";
        
        
        $_query3 = mysqli_query($_conexao, $_sql3) or die (mysqli_error($_conexao));
        
        
    }

    for($_i=0;$_i<count($_alunos_id);$_i++){
        $_id_aluno = $_alunos_id[$_i];
        
        
        $_sql4 = "INSERT INTO aluno_turma (id_turma, id_aluno) VALUES ('$_id_turma','$_id_aluno');";
        
        
        $_query4 = mysqli_query($_conexao, $_sql4) or die (mysqli_error($_conexao));
        
        
    }


     header( "location:turmas.php" );
?>