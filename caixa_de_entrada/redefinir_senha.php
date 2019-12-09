<?php
    session_start();
    header("Content-Type: text/html; charset=UTF-8",true);
    //<!--OCULTA NOTIFICAÇÕES DE ERRO-->
    ini_set("display_error", 0 );

    error_reporting( 0 );
    $_SESSION['notificacao'] = 13;
    
    include_once ("../configuracao/config.php");
    
    $_id_usuario = $_POST['id_usuario'];
    $_sql = "SELECT * FROM usuario WHERE id_usuario = '$_id_usuario'";
    $_query = mysqli_query( $_conexao , $_sql ) or die ( mysqli_error( ) );
   
    while( $_line = mysqli_fetch_array( $_query ) ){
        $_nome = $_line['nome'];
        $_cpf = $_line['cpf'];
    }

    // assume $str esteja em UTF-8
    $from = "áàãâéêíóôõúüçÁÀÃÂÉÊÍÓÔÕÚÜÇ";
    $to = "aaaaeeiooouucAAAAEEIOOOUUC";
    
    $_nome = utf8_strtr($_nome, $from, $to);

    $_senha = "";
    $_nome2 = strtolower($_nome);

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
    echo $_senha;
    $_senha = md5($_senha);
    $_sql = "UPDATE usuario SET senha = '$_senha' WHERE id_usuario = '$_id_usuario'";
    $_query = mysqli_query( $_conexao , $_sql ) or die ( mysqli_error( ) );

     //header( "location:visitar_turma.php" );

?>
    <form action="visitar_perfil.php" method="post" name="voltar_pagina"><input type="hidden" name="id" value="<?php echo $_id_usuario; ?>"></form>
    <script type="text/javascript">document.voltar_pagina.submit();</script>