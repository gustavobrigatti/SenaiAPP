<?php
    session_start();
    $_url = "localhost".$_SERVER['REQUEST_URI'];
    if($_url == "localhost/SenaiAPP/caixa_de_entrada/painel_administrador.php" || $_url == "localhost/SenaiAPP/caixa_de_entrada/gerenciador_mensagem.php" || $_url == "localhost/SenaiAPP/caixa_de_entrada/comunicado.php" || $_url == "localhost/SenaiAPP/caixa_de_entrada/turmas.php" || $_url == "localhost/SenaiAPP/caixa_de_entrada/adicionar_turma.php" || $_url == "localhost/SenaiAPP/caixa_de_entrada/usuarios.php" || $_url == "localhost/SenaiAPP/caixa_de_entrada/albuns.php" || $_url == "localhost/SenaiAPP/caixa_de_entrada/adicionar_usuario.php?id_tipo=1" || $_url == "localhost/SenaiAPP/caixa_de_entrada/adicionar_usuario.php?id_tipo=2" || $_url == "localhost/SenaiAPP/caixa_de_entrada/adicionar_usuario.php?id_tipo=3" || $_url == "localhost/SenaiAPP/caixa_de_entrada/adicionar_usuario.php?id_tipo=4" || $_url == "localhost/SenaiAPP/caixa_de_entrada/adicionar_usuario.php?id_tipo=5"){
        if($_SESSION['usuarioNiveisAcessoId'] == 1 || $_SESSION['usuarioNiveisAcessoId'] == 5){
            
        }else{
            header( "location:index.php" );
        }
    }else if($_url == "localhost/SenaiAPP/caixa_de_entrada/criar_album.php"){
        if($_SESSION['usuarioNiveisAcessoId'] == 1 || $_SESSION['usuarioNiveisAcessoId'] == 2 || $_SESSION['usuarioNiveisAcessoId'] == 5){
            
        }else{
            header( "location:index.php" );
        }
    }
?>
