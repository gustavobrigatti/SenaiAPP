<?php
include_once ("configuracao/config.php");
session_start();
if($_SESSION['usuarioNiveisAcessoId'] == ""){
    header("Location: ../entrar/index.php");
}else{
    $_id = $_SESSION['usuarioId'];
    $_sql = "SELECT avatar FROM usuario WHERE id_usuario = '$_id'";
    $_query = mysqli_query( $_conexao , $_sql ) or die ( mysqli_error( ) );
    while( $_line = mysqli_fetch_array( $_query ) ){
        $_avatar = $_line['avatar'];
    }
}
?>
<body class="theme-red">
    <!-- CARREGANDO --
<div class="page-loader-wrapper">
<div class="loader">
<div class="preloader">
<div class="spinner-layer pl-red">
<div class="circle-clipper left">
<div class="circle"></div>
</div>
<div class="circle-clipper right">
<div class="circle"></div>
</div>
</div>
</div>
<p>Carregando</p>
</div>
</div>
<!-- CARREGANDO -- >

<?php
$_id_tipo = $_SESSION['usuarioNiveisAcessoId'];
$_titulo = "";
if($_id_tipo == 1){
    $_titulo = "Direção";
}else if($_id_tipo == 2){
    $_titulo = "Professor";
}else if($_id_tipo == 3){
    $_titulo = "Aluno";
}else if($_id_tipo == 4){
    $_titulo = "Responsável";
}else if($_id_tipo == 5){
    $_titulo = "Biblioteca/Secretaria";
} 

?>

<!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="index.php">
                    <!--titulo -->
                    <?php echo $_titulo; ?>
                    <!--titulo -->
                </a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="perfil.php"><i class="material-icons">person</i></a></li>
                    <li><a href="../sair.php"><i class="material-icons">input</i></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <?php
    $_url = "localhost".$_SERVER['REQUEST_URI'];
    if($_url == "localhost/SenaiAPP/caixa_de_entrada/index.php" || $_url == "localhost/SenaiAPP/caixa_de_entrada/enviados.php" || $_url == "localhost/SenaiAPP/caixa_de_entrada/arquivados.php" || $_url == "localhost/SenaiAPP/caixa_de_entrada/favoritos.php" || $_url == "localhost/SenaiAPP/caixa_de_entrada/excluidos.php"){
    ?>
    <div style='top: 90%; left: 93%; z-index: 14; width: 100%; position: absolute;'>
        <a href="enviar_mensagem.php">
            <button style="position: fixed;" type="button" class="btn bg-red btn-circle-lg waves-effect waves-circle waves-float">
                <i class="material-icons">create</i>
            </button>
        </a>
    </div>
    <?php
    }else if($_url == "localhost/SenaiAPP/caixa_de_entrada/exibir_galeria"){
        if($_SESSION['usuarioNiveisAcessoId'] == 1 || $_SESSION['usuarioNiveisAcessoId'] == 2 || $_SESSION['usuarioNiveisAcessoId'] == 5){
    ?>
    <div style='top: 90%; left: 93%; z-index: 14; width: 100%; position: absolute;'>
        <a href="criar_album.php">
            <button style="position: fixed;" type="button" class="btn bg-red btn-circle-lg waves-effect waves-circle waves-float">
                <i class="material-icons">photo_library</i>
            </button>
        </a>
    </div>
    <?php
        }
    }
    ?>

    <?php
    if($_SESSION['usuarioNiveisAcessoId'] == 1 || $_SESSION['usuarioNiveisAcessoId'] == 5){
    ?>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info">
            <div class="image">

                <?php
        if($_avatar==null){
                ?>
                <a href="perfil.php">
                    <img src="../images/icone_aluno.png" width="50" height="50" alt="User" />
                </a>
                <?php
        }else{
                ?>
                <a href="perfil.php">
                    <img src="data:image/png;base64, <?php echo $_avatar; ?>" width="50" height="50" alt="User" />
                </a>
                <?php
        }
                ?>
            </div>
            <div class="info-container" >
                <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo  $_SESSION['usuarioNome']; ?></div>
                <div class="email"><?php echo $_SESSION['email']; ?></div>
                <div class="btn-group user-helper-dropdown">
                    <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="perfil.php"><i class="material-icons">person</i>Perfil</a></li>
                        <li><a href="alterar_senha.php"><i class="material-icons">lock</i>Alterar senha</a></li>
                        <li role="seperator" class="divider"></li>
                        <li><a href="../sair.php"><i class="material-icons">input</i>Deslogar</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header">Menu de navegacao</li>
                <li  class="active">
                </li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">trending_down</i>
                    <span>Administração</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="painel_administrador.php">
                            <span>Painel admin</span>
                        </a>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <span>Configurações</span>
                        </a>
                        <ul class="ml-menu">

                            <li>
                                <a href="gerenciador_mensagem.php">
                                    Monitorar mensagens
                                </a>
                            </li>
                            <li>
                                <a href="comunicado.php">
                                    Comunicados
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>

                        <a href="javascript:void(0);" class="menu-toggle">
                            <span>Usuários</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="usuarios.php">Lista de usuários</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <span>Adicionar usuários</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="adicionar_usuario.php?id_tipo=1">Direção</a>
                                    </li>
                                    <li>
                                        <a href="adicionar_usuario.php?id_tipo=2">Professores</a>
                                    </li>
                                    <li>
                                        <a href="adicionar_usuario.php?id_tipo=3">Alunos</a>
                                    </li>
                                    <li>
                                        <a href="adicionar_usuario.php?id_tipo=4">Responsáveis</a>
                                    </li>
                                    <li>
                                        <a href="adicionar_usuario.php?id_tipo=5">Biblioteca/Secretaria</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <span>Turmas</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="turmas.php">Lista de turmas</a>
                            </li>
                            <li>
                                <a href="adicionar_turma.php">Adicionar turmas</a>
                            </li>

                            <li>
                                <a href="transferir_turma.php">Transferir turmas</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <span>Álbuns</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="albuns.php">Lista de álbuns</a>
                            </li>
                            <li>
                                <a href="criar_album.php">Adicionar álbum</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <li>
                    <a href="index.php">
                        <i class="material-icons">home</i>
                        <span>Inicio</span>
                    </a>
                </li>
                <li>
                    <a href="enviados.php">
                        <div class="demo-google-material-icon"> <i class="material-icons">send</i> </div> <span>Enviadas</span>
                    </a>
                </li>
                <li>
                    <a href="arquivados.php">
                        <div class="demo-google-material-icon"> <i class="material-icons">archive</i> </div> <span class="icon-name">Arquivadas</span> 
                    </a>
                </li>
                <li>
                    <a href="favoritos.php">
                        <div class="demo-google-material-icon"> <i class="material-icons">star</i> </div> <span class="icon-name">Favoritas</span> 
                    </a>
                </li>
                <li>
                    <a href="excluidos.php">
                        <div class="demo-google-material-icon"> <i class="material-icons">delete</i>  </div><span class="icon-name">Lixeira</span>
                    </a>
                </li>     
                <li>
                    <a href="exibir_galeria.php">
                        <i class="material-icons">perm_media</i>
                        <span>Galeria</span>
                    </a>
                    <ul class="ml-menu">

                        <li>
                            <a href="exibir_galeria">Todas imagens</a>
                        </li>

                    </ul>
                </li>
                <!--
<li>
<a href="Calendario.php">
<i class="material-icons">perm_contact_calendar</i> <span class="icon-name">Calendario | Eventos</span>
</a>
</li>
--
<li>
<a href="javascript:history.back()"><font size="3px">Back to page</font></a>
</li> -->
            </ul>
        </div>
        <!-- #Menu -->
    </aside>

    <?php
    }else if($_SESSION['usuarioNiveisAcessoId'] == 2){
    ?>

    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info">
            <div class="image">
                <?php
        if($_avatar==null){
                ?>
                <a href="perfil.php">
                    <img src="../images/icone_aluno.png" width="50" height="50" alt="User" />
                </a>
                <?php
        }else{
                ?>
                <a href="perfil.php">
                    <img src="data:image/png;base64, <?php echo $_avatar; ?>" width="50" height="50" alt="User" />
                </a>
                <?php
        }
                ?>
            </div>
            <div class="info-container">
                <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo  $_SESSION['usuarioNome']; ?></div>
                <div class="email"><?php echo $_SESSION['email']; ?></div>
                <div class="btn-group user-helper-dropdown">
                    <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="perfil.php"><i class="material-icons">person</i>Perfil</a></li>
                        <li><a href="alterar_senha.php"><i class="material-icons">lock</i>Alterar senha</a></li>
                        <li role="seperator" class="divider"></li>
                        <li><a href="../sair.php"><i class="material-icons">input</i>Deslogar</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header">Menu de navegacao</li>
                <li  class="active">
                </li>
                <li>
                    <a href="index.php">
                        <i class="material-icons">home</i>
                        <span>Inicio</span>
                    </a>
                </li>
                <li>
                    <a href="enviados.php">
                        <div class="demo-google-material-icon"> <i class="material-icons">send</i> </div> <span>Enviadas</span>
                    </a>
                </li>
                <li>
                    <a href="arquivados.php">
                        <div class="demo-google-material-icon"> <i class="material-icons">archive</i> </div> <span class="icon-name">Arquivadas</span> 
                    </a>
                </li>
                <li>
                    <a href="favoritos.php">
                        <div class="demo-google-material-icon"> <i class="material-icons">star</i> </div> <span class="icon-name">Favoritas</span> 
                    </a>
                </li>
                <li>
                    <a href="excluidos.php">
                        <div class="demo-google-material-icon"> <i class="material-icons">delete</i>  </div><span class="icon-name">Lixeira</span>
                    </a>
                </li>

                <li>
                    <a href="exibir_galeria">
                        <i class="material-icons">perm_media</i>
                        <span>Galeria</span>
                    </a>
                    <ul class="ml-menu">

                        <li>
                            <a href="exibir_galeria">Todas imagens</a>
                        </li>

                    </ul>
                </li>
                <!--
<li>
<a href="Calendario.php">
<i class="material-icons">perm_contact_calendar</i> <span class="icon-name">Calendario | Eventos</span>
</a>
</li>
-->
            </ul>
        </div>
        <!-- #Menu -->

    </aside>
    <!-- #END# Left Sidebar -->
    <?php 
    }else if($_SESSION['usuarioNiveisAcessoId'] == 3){
    ?>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info">
            <div class="image">
                <?php
        if($_avatar==null){
                ?>
                <a href="perfil.php">
                    <img src="../images/icone_aluno.png" width="50" height="50" alt="User" />
                </a>
                <?php
        }else{
                ?>
                <a href="perfil.php">
                    <img src="data:image/png;base64, <?php echo $_avatar; ?>" width="50" height="50" alt="User" />
                </a>
                <?php
        }
                ?>
            </div>
            <div class="info-container">
                <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo  $_SESSION['usuarioNome']; ?></div>
                <div class="email"><?php echo $_SESSION['email']; ?></div>
                <div class="btn-group user-helper-dropdown">
                    <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="perfil.php"><i class="material-icons">person</i>Perfil</a></li>
                        <li><a href="alterar_senha.php"><i class="material-icons">lock</i>Alterar senha</a></li>
                        <li role="seperator" class="divider"></li>
                        <li><a href="../sair.php"><i class="material-icons">input</i>Deslogar</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header">Menu de navegacao</li>
                <li>
                <li  class="active">
                </li>
                <a href="index.php">
                    <i class="material-icons">home</i>
                    <span>Inicio</span>
                </a>
                </li>
            <li>
                <a href="enviados.php">
                    <div class="demo-google-material-icon"> <i class="material-icons">send</i> </div> <span>Enviadas</span>
                </a>
            </li>
            <li>
                <a href="arquivados.php">
                    <div class="demo-google-material-icon"> <i class="material-icons">archive</i> </div> <span class="icon-name">Arquivadas</span> 
                </a>
            </li>
            <li>
                <a href="favoritos.php">
                    <div class="demo-google-material-icon"> <i class="material-icons">star</i> </div> <span class="icon-name">Favoritas</span> 
                </a>
            </li>
            <li>
                <a href="excluidos.php">
                    <div class="demo-google-material-icon"> <i class="material-icons">delete</i>  </div><span class="icon-name">Lixeira</span>
                </a>
            </li>

            <li>
                <a href="exibir_galeria">
                    <i class="material-icons">perm_media</i>
                    <span>Galeria</span>
                </a>
                <ul class="ml-menu">

                    <li>
                        <a href="exibir_galeria">Todas imagens</a>
                    </li>

                </ul>
            </li>
            <!--
<li>
<a href="Calendario.php">
<i class="material-icons">perm_contact_calendar</i> <span class="icon-name">Calendario | Eventos</span>
</a>
</li>
-->
            </ul>
        </div>
    <!-- #Menu -->

    </aside>
<!-- #END# Left Sidebar -->
<?php 
    }else if($_SESSION['usuarioNiveisAcessoId'] == 4){
?>
<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    <div class="user-info">
        <div class="image">
            <?php
        if($_SESSION['avatar']==null){
            ?>
            <a href="perfil.php">
                <img src="../images/icone_aluno.png" width="50" height="50" alt="User" />
            </a>
            <?php
        }else{
            ?>
            <a href="perfil.php">
                <img src="data:image/png;base64, <?php echo $_avatar; ?>" width="50" height="50" alt="User" />
            </a>
            <?php
        }
            ?>
        </div>
        <div class="info-container">
            <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo  $_SESSION['usuarioNome']; ?></div>
            <div class="email"><?php echo $_SESSION['email']; ?></div>
            <div class="btn-group user-helper-dropdown">
                <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                <ul class="dropdown-menu pull-right">
                    <li><a href="perfil.php"><i class="material-icons">person</i>Perfil</a></li>
                    <li><a href="alterar_senha.php"><i class="material-icons">lock</i>Alterar senha</a></li>
                    <li role="seperator" class="divider"></li>
                    <li><a href="../sair.php"><i class="material-icons">input</i>Deslogar</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- #User Info -->
    <!-- Menu -->
    <div class="menu">
        <ul class="list">
            <li class="header">Menu de navegacao</li>
            <li>
            <li  class="active">
            </li>
            <a href="index.php">
                <i class="material-icons">home</i>
                <span>Inicio</span>
            </a>
            </li>
        <li>
            <a href="enviados.php">
                <div class="demo-google-material-icon"> <i class="material-icons">send</i> </div> <span>Enviadas</span>
            </a>
        </li>
        <li>
            <a href="arquivados.php">
                <div class="demo-google-material-icon"> <i class="material-icons">archive</i> </div> <span class="icon-name">Arquivadas</span> 
            </a>
        </li>
        <li>
            <a href="favoritos.php">
                <div class="demo-google-material-icon"> <i class="material-icons">star</i> </div> <span class="icon-name">Favoritas</span> 
            </a>
        </li>
        <li>
            <a href="mensagens_do_aluno.php">
                <div class="demo-google-material-icon"> <i class="material-icons">email</i> </div> <span class="icon-name">Mensagens do aluno</span> 
            </a>
        </li>
        <li>
            <a href="excluidos.php">
                <div class="demo-google-material-icon"> <i class="material-icons">delete</i>  </div><span class="icon-name">Lixeira</span>
            </a>
        </li>

        <li>
            <a href="exibir_galeria">
                <i class="material-icons">perm_media</i>
                <span>Galeria</span>
            </a>
            <ul class="ml-menu">

                <li>
                    <a href="exibir_galeria">Todas imagens</a>
                </li>

            </ul>
        </li>
        <!--
<li>
<a href="Calendario.php">
<i class="material-icons">perm_contact_calendar</i> <span class="icon-name">Calendario | Eventos</span>
</a>
</li>
</ul>
</div>
<!-- #Menu -->

        </aside>
    <!-- #END# Left Sidebar -->
    <?php 
    }
    ?>
    </body>