<?php
    session_start();
    header('Content-Type: text/html; charset=utf-8');
    //<!--OCULTA NOTIFICAÇÕES DE ERRO-->
    ini_set("display_error", 0 );

    error_reporting( 0 );
    $_SESSION['notificacao'] = 8;
    $_nome = $_POST['nome'];
    $_email = $_POST['email'];
    $_cpf = $_POST['cpf'];
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
    
     // assume $str esteja em UTF-8
    $from = "áàãâéêíóôõúüçÁÀÃÂÉÊÍÓÔÕÚÜÇ";
    $to = "aaaaeeiooouucAAAAEEIOOOUUC";
    
    $_nome3 = utf8_strtr($_nome, $from, $to);

    $_senha = "";
    $_nome2 = strtolower($_nome3);

    function utf8_strtr($str, $from, $to) {
        $keys = array();
        $values = array();
        preg_match_all('/./u', $from, $keys);
        preg_match_all('/./u', $to, $values);
        $mapping = array_combine($keys[0], $values[0]);
        return strtr($str, $mapping);
    }

    $_array2 = str_split($_nome2);
    for($_i=0;$_i<=3;$_i++){
        $_senha = $_senha.$_array2[$_i];
    }
    $_array2 = str_split($_cpf);
    for($_i=0;$_i<=4;$_i++){
        if($_i != 3){
            $_senha = $_senha.$_array2[$_i];
        }
    }
    $_senha = md5($_senha);
    $_sql = "INSERT INTO usuario (nome, email, cpf, senha, id_tipo, excluido) VALUES ('$_nome','$_email','$_cpf','$_senha','$_id_tipo', '0')";
    $_query = mysqli_query($_conexao, $_sql) or die (mysqli_error($_conexao));

    $_sql = "SELECT id_usuario FROM usuario";
    $_query = mysqli_query( $_conexao , $_sql ) or die ( mysqli_error( ) );
    while( $_line = mysqli_fetch_array( $_query ) ){
        $_id_usuario = $_line['id_usuario'];
    }

    if($_id_tipo == 2){
         for($_i=0;$_i<count($_array);$_i++){
            $_id_turma = $_array[$_i];
            $_sql3 = "INSERT INTO professor_turma (id_turma, id_professor) VALUES ('$_id_turma','$_id_usuario');";
            $_query3 = mysqli_query($_conexao, $_sql3) or die (mysqli_error($_conexao));
        }
    }else if($_id_tipo == 3){
         for($_i=0;$_i<count($_array);$_i++){
            $_id_turma = $_array[$_i];
            $_sql3 = "INSERT INTO aluno_turma (id_turma, id_aluno) VALUES ('$_id_turma','$_id_usuario');";
            $_query3 = mysqli_query($_conexao, $_sql3) or die (mysqli_error($_conexao));
        }
    }else if($_id_tipo == 4){
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