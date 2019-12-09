<!DOCTYPE html>
<?php
    include("../cab_menu.php");
    include_once ("../configuracao/config.php");
    session_start();
    $_notificacao = $_SESSION['notificacao'];
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Favicon-->
    <link rel="icon" href="../favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="../plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="../plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="../plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="../css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-red">
   

    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
             <?php
                $_id_tipo = $_SESSION['usuarioNiveisAcessoId'];
                $_id_usuario = $_SESSION['usuarioId'];
                if($_id_tipo == 1 || $_id_tipo == 5){
                    $_sql = "SELECT * FROM albuns WHERE excluido = false ORDER BY id_album desc";
                    $_query = mysqli_query( $_conexao , $_sql ) or die ( mysqli_error( $_conexao ) );
                    while( $_line = mysqli_fetch_array( $_query ) ){
                        $_id_album = $_line['id_album'];
                        $_nome_album = $_line['nome_album'];
                        $_iContador = 0;
                        $_sql2 = "SELECT foto FROM foto_album WHERE id_album = '$_id_album' AND excluido = false";
                        $_query2 = mysqli_query( $_conexao , $_sql2 ) or die ( mysqli_error( $_conexao ) );
                        while( $_line2 = mysqli_fetch_array( $_query2 ) ){
                            $_foto_recente = $_line2['foto'];
                            $_iContador++;
                        }
             ?>
                <!-- Basic Example -->
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <form method="post" action="fotos_album.php" name="formatualizar">
                        <button style="width: 100%; border: 0px solid #fff; background-color: #00000000; !important; "> 
                            <input name="id_album" style="display: none;" value="<?php echo $_id_album; ?>">
                            <div class="card">
                                <div class="header">
                                    <h2><?php echo $_nome_album; ?></h2>
                                </div>
                                <div class="body">
                                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                        <!-- Wrapper for slides -->
                                        <div class="carousel-inner" role="listbox">
                                            <div class="item active" style="height: 400px; position: relative; overflow: hidden;">
                                                <?php
                                                    if($_iContador == 0){
                                                ?>
                                                <img style="position:absolute; left: -100%; right: -100%; top:-100%; bottom: -100%; margin: auto; height: auto; width: auto;" src="../images/foto_album.png">
                                                <?php
                                                    }else{
                                                ?>
                                                <img style="position:absolute; left: -100%; right: -100%; top:-100%; bottom: -100%; margin: auto; height: auto; width: auto;" src="data:image/png;base64, <?php echo $_foto_recente; ?>" />
                                                <?php
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                         </button>
                    </form>
                </div>
                <!-- #END# Basic Example -->
                <?php
                        }
                    }else if($_id_tipo == 2){
                    $_sql = "SELECT * FROM albuns WHERE excluido = false ORDER BY id_album desc";
                    $_query = mysqli_query( $_conexao , $_sql ) or die ( mysqli_error( $_conexao ) );
                    while( $_line = mysqli_fetch_array( $_query ) ){
                        $_id_album = $_line['id_album'];
                        $_nome_album = $_line['nome_album'];
                        $_publico = $_line['publico'];
                        if($_publico == true){
                            $_iContador = 0;
                            $_sql2 = "SELECT * FROM foto_album WHERE id_album = '$_id_album' AND excluido = false";
                            $_query2 = mysqli_query( $_conexao , $_sql2 ) or die ( mysqli_error( $_conexao ) );
                            while( $_line2 = mysqli_fetch_array( $_query2 ) ){
                                $_foto_recente = $_line2['foto'];
                                $_iContador++;
                            }
             ?>
                <!-- Basic Example -->
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <form method="post" action="fotos_album.php" name="formatualizar">
                        <button style="width: 100%; border: 0px solid #fff; background-color: #00000000; !important; "> 
                            <input name="id_album" style="display: none;" value="<?php echo $_id_album; ?>">
                            <div class="card">
                                <div class="header">
                                    <h2><?php echo $_nome_album; ?></h2>
                                    <ul class="header-dropdown m-r--5">
                                        <li class="dropdown">
                                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                                <i class="material-icons">more_vert</i>
                                            </a>
                                            <ul class="dropdown-menu pull-right">
                                                <li><a href="javascript:void(0);">Excluir</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                <div class="body">
                                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                        <!-- Wrapper for slides -->
                                        <div class="carousel-inner" role="listbox">
                                            <div class="item active" style="height: 400px; position: relative; overflow: hidden;">
                                                <?php
                                                    if($_iContador == 0){
                                                ?>
                                                <img style="position:absolute; left: -100%; right: -100%; top:-100%; bottom: -100%; margin: auto; height: auto; width: auto;" src="../images/foto_album.png">
                                                <?php
                                                    }else{
                                                ?>
                                                <img style="position:absolute; left: -100%; right: -100%; top:-100%; bottom: -100%; margin: auto; height: auto; width: auto;" src="data:image/png;base64, <?php echo $_foto_recente; ?>" />
                                                <?php
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                         </button>
                    </form>
                </div>
                <!-- #END# Basic Example -->
                <?php
                        }else{
                            $_contador = 0;
                            $_sql2 = "SELECT id_turma FROM professor_turma WHERE id_professor = '$_id_usuario' ";
                            $_query2 = mysqli_query( $_conexao , $_sql2 ) or die ( mysqli_error( $_conexao ) );
                            while( $_line2 = mysqli_fetch_array( $_query2 ) ){
                                $_id_turma = $_line2['id_turma'];
                                $_sql3 = "SELECT id_turma FROM album_turma WHERE id_turma = '$_id_turma'";
                                $_query3 = mysqli_query( $_conexao , $_sql3 ) or die ( mysqli_error( $_conexao ) );
                                while( $_line3 = mysqli_fetch_array($_query3)){
                                    $_contador++;
                                }
                            }
                            if($_contador>0){
                                $_iContador = 0;
                                $_sql4 = "SELECT foto FROM foto_album WHERE id_album = '$_id_album' AND excluido = false";
                                $_query4 = mysqli_query( $_conexao , $_sql4 ) or die ( mysqli_error( $_conexao ) );
                                while( $_line4 = mysqli_fetch_array($_query4)){
                                    $_foto_recente = $_line4['foto'];
                                    $_iContador++;
                                }
                ?>
                 <!-- Basic Example -->
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <form method="post" action="fotos_album.php" name="formatualizar">
                        <button style="width: 100%; border: 0px solid #fff; background-color: #00000000; !important; "> 
                            <input name="id_album" style="display: none;" value="<?php echo $_id_album; ?>">
                            <div class="card">
                                <div class="header">
                                    <h2><?php echo $_nome_album; ?></h2>
                                    <ul class="header-dropdown m-r--5">
                                        <li class="dropdown">
                                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                                <i class="material-icons">more_vert</i>
                                            </a>
                                            <ul class="dropdown-menu pull-right">
                                                <li><a href="javascript:void(0);">Excluir</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                <div class="body">
                                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                        <!-- Wrapper for slides -->
                                        <div class="carousel-inner" role="listbox">
                                            <div class="item active" style="height: 400px; position: relative; overflow: hidden;">
                                                <?php
                                                    if($_iContador == 0){
                                                ?>
                                                <img style="position:absolute; left: -100%; right: -100%; top:-100%; bottom: -100%; margin: auto; height: auto; width: auto;" src="../images/foto_album.png">
                                                <?php
                                                    }else{
                                                ?>
                                                <img style="position:absolute; left: -100%; right: -100%; top:-100%; bottom: -100%; margin: auto; height: auto; width: auto;" src="data:image/png;base64, <?php echo $_foto_recente; ?>" />
                                                <?php
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                         </button>
                    </form>
                </div>
                <!-- #END# Basic Example -->
                <?php
                            }
                        }
                    }
                }else if($_id_tipo == 3){
                    $_sql = "SELECT * FROM albuns WHERE excluido = false ORDER BY id_album desc";
                    $_query = mysqli_query( $_conexao , $_sql ) or die ( mysqli_error( $_conexao ) );
                    while( $_line = mysqli_fetch_array( $_query ) ){
                        $_id_album = $_line['id_album'];
                        $_nome_album = $_line['nome_album'];
                        $_publico = $_line['publico'];
                        if($_publico == true){
                            $_iContador = 0;
                            $_sql2 = "SELECT * FROM foto_album WHERE id_album = '$_id_album' AND excluido = false";
                            $_query2 = mysqli_query( $_conexao , $_sql2 ) or die ( mysqli_error( $_conexao ) );
                            while( $_line2 = mysqli_fetch_array( $_query2 ) ){
                                $_foto_recente = $_line2['foto'];
                                $_iContador++;
                            }
             ?>
                <!-- Basic Example -->
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <form method="post" action="fotos_album.php" name="formatualizar">
                        <button style="width: 100%; border: 0px solid #fff; background-color: #00000000; !important; "> 
                            <input name="id_album" style="display: none;" value="<?php echo $_id_album; ?>">
                            <div class="card">
                                <div class="header">
                                    <h2><?php echo $_nome_album; ?></h2>
                                </div>
                                <div class="body">
                                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                        <!-- Wrapper for slides -->
                                        <div class="carousel-inner" role="listbox">
                                            <div class="item active" style="height: 400px; position: relative; overflow: hidden;">
                                                <?php
                                                    if($_iContador == 0){
                                                ?>
                                                <img style="position:absolute; left: -100%; right: -100%; top:-100%; bottom: -100%; margin: auto; height: auto; width: auto;" src="../images/foto_album.png">
                                                <?php
                                                    }else{
                                                ?>
                                                <img style="position:absolute; left: -100%; right: -100%; top:-100%; bottom: -100%; margin: auto; height: auto; width: auto;" src="data:image/png;base64, <?php echo $_foto_recente; ?>" />
                                                <?php
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                         </button>
                    </form>
                </div>
                <!-- #END# Basic Example -->
                <?php
                        }else{
                            $_contador = 0;
                            $_sql2 = "SELECT id_turma FROM aluno_turma WHERE id_aluno = '$_id_usuario' ";
                            $_query2 = mysqli_query( $_conexao , $_sql2 ) or die ( mysqli_error( $_conexao ) );
                            while( $_line2 = mysqli_fetch_array( $_query2 ) ){
                                $_id_turma = $_line2['id_turma'];
                                $_sql3 = "SELECT id_turma FROM album_turma WHERE id_album = '$_id_album'";
                                $_query3 = mysqli_query( $_conexao , $_sql3 ) or die ( mysqli_error( $_conexao ) );
                                while( $_line3 = mysqli_fetch_array($_query3)){
                                    $_id_turma_album = $_line3['id_turma'];
                                    if($_id_turma_album == $_id_turma){
                                        $_contador++;
                                    }
                                }
                            }
                            if($_contador>0){
                                $_iContador = 0;
                                $_sql4 = "SELECT foto FROM foto_album WHERE id_album = '$_id_album' AND excluido = false";
                                $_query4 = mysqli_query( $_conexao , $_sql4 ) or die ( mysqli_error( $_conexao ) );
                                while( $_line4 = mysqli_fetch_array($_query4)){
                                    $_foto_recente = $_line4['foto'];
                                    $_iContador++;
                                }
                ?>
                 <!-- Basic Example -->
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <form method="post" action="fotos_album.php" name="formatualizar">
                        <button style="width: 100%; border: 0px solid #fff; background-color: #00000000; !important; "> 
                            <input name="id_album" style="display: none;" value="<?php echo $_id_album; ?>">
                            <div class="card">
                                <div class="header">
                                    <h2><?php echo $_nome_album; ?></h2>
                                </div>
                                <div class="body">
                                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                        <!-- Wrapper for slides -->
                                        <div class="carousel-inner" role="listbox">
                                            <div class="item active" style="height: 400px; position: relative; overflow: hidden;">
                                                <?php
                                                    if($_iContador == 0){
                                                ?>
                                                <img style="position:absolute; left: -100%; right: -100%; top:-100%; bottom: -100%; margin: auto; height: auto; width: auto;" src="../images/foto_album.png">
                                                <?php
                                                    }else{
                                                ?>
                                                <img style="position:absolute; left: -100%; right: -100%; top:-100%; bottom: -100%; margin: auto; height: auto; width: auto;" src="data:image/png;base64, <?php echo $_foto_recente; ?>" />
                                                <?php
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                         </button>
                    </form>
                </div>
                <!-- #END# Basic Example -->
                <?php
                            }
                        }
                    }
                }else if($_id_tipo == 4){
                    
                    $_sql = "SELECT * FROM albuns WHERE excluido = false ORDER BY id_album desc";
                    $_query = mysqli_query( $_conexao , $_sql ) or die ( mysqli_error( $_conexao ) );
                    while( $_line = mysqli_fetch_array( $_query ) ){
                        $_id_album = $_line['id_album'];
                        $_nome_album = $_line['nome_album'];
                        $_publico = $_line['publico'];
                        if($_publico == true){
                            $_iContador = 0;
                            $_sql2 = "SELECT * FROM foto_album WHERE id_album = '$_id_album' AND excluido = false";
                            $_query2 = mysqli_query( $_conexao , $_sql2 ) or die ( mysqli_error( $_conexao ) );
                            while( $_line2 = mysqli_fetch_array( $_query2 ) ){
                                $_foto_recente = $_line2['foto'];
                                $_iContador++;
                            }
             ?>
                <!-- Basic Example -->
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <form method="post" action="fotos_album.php" name="formatualizar">
                        <button style="width: 100%; border: 0px solid #fff; background-color: #00000000; !important; "> 
                            <input name="id_album" style="display: none;" value="<?php echo $_id_album; ?>">
                            <div class="card">
                                <div class="header">
                                    <h2><?php echo $_nome_album; ?></h2>
                                </div>
                                <div class="body">
                                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                        <!-- Wrapper for slides -->
                                        <div class="carousel-inner" role="listbox">
                                            <div class="item active" style="height: 400px; position: relative; overflow: hidden;">
                                                <?php
                                                    if($_iContador == 0){
                                                ?>
                                                <img style="position:absolute; left: -100%; right: -100%; top:-100%; bottom: -100%; margin: auto; height: auto; width: auto;" src="../images/foto_album.png">
                                                <?php
                                                    }else{
                                                ?>
                                                <img style="position:absolute; left: -100%; right: -100%; top:-100%; bottom: -100%; margin: auto; height: auto; width: auto;" src="data:image/png;base64, <?php echo $_foto_recente; ?>" />
                                                <?php
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                         </button>
                    </form>
                </div>
                <!-- #END# Basic Example -->
                <?php
                        }else{
                            $_contador = 0;
                            $_sql2 = "SELECT id_aluno FROM aluno_responsavel WHERE id_responsavel = '$_id_usuario' ";
                            $_query2 = mysqli_query( $_conexao , $_sql2 ) or die ( mysqli_error( $_conexao ) );
                            while( $_line2 = mysqli_fetch_array( $_query2 ) ){
                                $_id_aluno = $_line2['id_aluno'];
                                $_sql3 = "SELECT id_turma FROM aluno_turma WHERE id_aluno = '$_id_aluno'";
                                $_query3 = mysqli_query( $_conexao , $_sql3 ) or die ( mysqli_error( $_conexao ) );
                                while( $_line3 = mysqli_fetch_array($_query3)){
                                    $_id_turma = $_line3['id_turma'];
                                    $_sql4 = "SELECT id_turma FROM album_turma WHERE id_turma = '$_id_turma'";
                                    $_query4 = mysqli_query( $_conexao , $_sql4 ) or die ( mysqli_error( $_conexao ) );
                                    while( $_line4 = mysqli_fetch_array($_query4)){
                                        $_contador++;
                                    }
                                break;
                                }
                            }
                            if($_contador>0){
                                $_iContador = 0;
                                $_sql4 = "SELECT foto FROM foto_album WHERE id_album = '$_id_album' AND excluido = false";
                                $_query4 = mysqli_query( $_conexao , $_sql4 ) or die ( mysqli_error( $_conexao ) );
                                while( $_line4 = mysqli_fetch_array($_query4)){
                                    $_foto_recente = $_line4['foto'];
                                    $_iContador++;
                                }
                ?>
                 <!-- Basic Example -->
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <form method="post" action="fotos_album.php" name="formatualizar">
                        <button style="width: 100%; border: 0px solid #fff; background-color: #00000000; !important; "> 
                            <input name="id_album" style="display: none;" value="<?php echo $_id_album; ?>">
                            <div class="card">
                                <div class="header">
                                    <h2><?php echo $_nome_album; ?></h2>
                                </div>
                                <div class="body">
                                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                        <!-- Wrapper for slides -->
                                        <div class="carousel-inner" role="listbox">
                                            <div class="item active" style="height: 400px; position: relative; overflow: hidden;">
                                                <?php
                                                    if($_iContador == 0){
                                                ?>
                                                <img style="position:absolute; left: -100%; right: -100%; top:-100%; bottom: -100%; margin: auto; height: auto; width: auto;" src="../images/foto_album.png">
                                                <?php
                                                    }else{
                                                ?>
                                                <img style="position:absolute; left: -100%; right: -100%; top:-100%; bottom: -100%; margin: auto; height: auto; width: auto;" src="data:image/png;base64, <?php echo $_foto_recente; ?>" />
                                                <?php
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                         </button>
                    </form>
                </div>
                <!-- #END# Basic Example -->
                <?php
                            }
                        }
                    }
                }
                ?>
               
            </div>
        </div>
        <div class="body" style="position: relative; display:none;">
        <div class="row clearfix jsdemo-notification-button">
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-2">
                <button name="notificacao" id="notificacao" type="button" class="btn bg-red btn-block waves-effect" data-placement-from="bottom" data-placement-align="right"
                        data-animate-enter="" data-animate-exit="" data-color-name="bg-red">
                </button>
            </div>
        </div>
    </div>
    </section>

    <!-- Jquery Core Js -->
    <script src="../plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="../plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="../plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="../plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="../plugins/node-waves/waves.js"></script>

    <!-- Custom Js -->
    <script src="../js/admin.js"></script>

    <!-- Demo Js -->
    <script src="../js/demo.js"></script>
    <!-- Bootstrap Notify Plugin Js -->
    <script src="../plugins/bootstrap-notify/bootstrap-notify.js"></script>
    <?php
      if($_notificacao == 1){  
    ?>
    <script src="../js/pages/ui/notifications_mensagem_enviada.js"></script>
    <?php
      }else if($_notificacao == 2){
    ?>
    <script src="../js/pages/ui/notifications_mensagem_favoritada.js"></script>
    <?php }else if($_notificacao ==3){
    ?>
    <script src="../js/pages/ui/notifications_mensagem_desfavoritada.js"></script>
    <?php }else if($_notificacao ==4){
    ?>
    <script src="../js/pages/ui/notifications_mensagem_excluida.js"></script>
    <?php }else if($_notificacao ==5){
    ?>
    <script src="../js/pages/ui/notifications_mensagem_desarquivada.js"></script>
    <?php }else if($_notificacao ==6){
    ?>
    <script src="../js/pages/ui/notifications_mensagem_recuperada.js"></script>
    <?php }else if($_notificacao ==7){
    ?>
    <script src="../js/pages/ui/notifications_adicionar_turma.js"></script>
    <?php }else if($_notificacao ==8){
    ?>
    <script src="../js/pages/ui/notifications_adicionar_usuario.js"></script>
    <?php }else if($_notificacao ==9){
    ?>
    <script src="../js/pages/ui/notifications_adicionar_album.js"></script>
    <?php }else if($_notificacao ==10){
    ?>
    <script src="../js/pages/ui/notifications_album_editado.js"></script>
    <?php }else if($_notificacao ==11){
    ?>
    <script src="../js/pages/ui/notifications_album_excluido.js"></script>
    <?php }else if($_notificacao ==12){
    ?>
    <script src="../js/pages/ui/notifications_foto_alterada.js"></script>
    <?php }else if($_notificacao ==13){
    ?>
    <script src="../js/pages/ui/notifications_senha_redefinida.js"></script>
    <?php }else if($_notificacao ==14){
    ?>
    <script src="../js/pages/ui/notifications_turma_editada.js"></script>
    <?php }else if($_notificacao ==15){
    ?>
    <script src="../js/pages/ui/notifications_usuario_editado.js"></script>
    <?php } unset($_SESSION['notificacao']);?>
    <script type="text/javascript">
        $(document).ready(function(){ // ao término do carregamento do arquivo
              $('#notificacao').click(); // disparar o click de determinado elemento
              $(this).scrollTop(); // scroll para o topo, pode ser necessário adequar o seletor, ou seja, em vez de $(this), $(window)... ou outro...
            });
    </script>
</body>

</html>