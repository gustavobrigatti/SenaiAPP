<?php
    include_once( "../configuracao/conecta.php" );
    session_start();
    //PEGA DATA E HORA
    date_default_timezone_set('America/Sao_Paulo');
    $date = date('d/m/Y');
    $hour = date('H:i');

    $_SESSION['notificacao'] = 9;
    $_dia_hora = $date." ás ".$hour;
    $_id_usuario = $_SESSION['usuarioId'];
    $_nome_album = $_POST['nome_album'];
    $_publico = $_POST['publico'];

    $_sql = "INSERT INTO albuns (nome_album, data_criacao, publico, id_criador, excluido) VALUES ('$_nome_album', '$_dia_hora', '$_publico', '$_id_usuario', '0')";
    $_query = mysqli_query( $_conexao , $_sql ) or die ( mysqli_error( ) );
    $_sql = "SELECT id_album FROM albuns";
    $_query = mysqli_query( $_conexao , $_sql ) or die ( mysqli_error( ) );
    while( $_line = mysqli_fetch_array( $_query ) ){
        $_id_album = $_line['id_album'];
    }

    if($_publico == 0){
        $_array = $_POST['array'];
        for($_i=0;$_i<count($_array);$_i++){
            $_id_turma = $_array[$_i];
            $_sql = "INSERT INTO album_turma (id_album, id_turma) VALUES ('$_id_album', '$_id_turma')";
            $_query = mysqli_query( $_conexao , $_sql ) or die ( mysqli_error( ) );
        }
    }

    

?>
    <form action="fotos_album.php" method="post" name="voltar_pagina"><input type="hidden" name="id_album" value="<?php echo $_id_album; ?>"></form>
    <script type="text/javascript">document.voltar_pagina.submit();</script>