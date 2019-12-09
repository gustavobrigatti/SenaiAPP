<?php
    include_once( "../configuracao/conecta.php" );
    session_start();
    $_turma1 = $_POST['turma1'];
    $_turma2 = $_POST['turma2'];
    
    $_sql = "SELECT id_aluno FROM aluno_turma WHERE id_turma = '$_turma1'";
    $_query = mysqli_query( $_conexao , $_sql ) or die ( mysqli_error( ) );
    while( $_line = mysqli_fetch_array( $_query ) ){
        $_id_aluno = $_line['id_aluno'];
        $_id = $_line['id'];
        $_sql2 = "INSERT INTO aluno_turma (id_aluno, id_turma) VALUES ('$_id_aluno', '$_turma2')";
        $_query2 = mysqli_query( $_conexao , $_sql2 ) or die ( mysqli_error( ) );
    }
    $_sql3 = "DELETE FROM aluno_turma WHERE id_turma = '$_turma1'";
    $_query3 = mysqli_query( $_conexao , $_sql3 ) or die ( mysqli_error( ) );
    
    $_sql = "SELECT id_professor FROM professor_turma WHERE id_turma = '$_turma1'";
    $_query = mysqli_query( $_conexao , $_sql ) or die ( mysqli_error( ) );
    while( $_line = mysqli_fetch_array( $_query ) ){
        $_id_professor = $_line['id_professor'];
        $_id = $_line['id'];
        $_sql2 = "INSERT INTO professor_turma (id_professor, id_turma) VALUES ('$_id_professor', '$_turma2')";
        $_query2 = mysqli_query( $_conexao , $_sql2 ) or die ( mysqli_error( ) );
    }
    $_sql3 = "DELETE FROM professor_turma WHERE id_turma = '$_turma1'";
    $_query3 = mysqli_query( $_conexao , $_sql3 ) or die ( mysqli_error( ) );
?>
<form action="visitar_turma.php" method="post" name="voltar_pagina"><input type="hidden" name="id" value="<?php echo $_turma2; ?>"></form>
<script type="text/javascript">document.voltar_pagina.submit();</script>