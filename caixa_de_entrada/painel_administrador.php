<!DOCTYPE html>
<?php
    include("../cab_menu.php");
    include_once ("../configuracao/config.php");
    session_start();
    $_nome = $_SESSION['usuarioNome']; 
    $_sql = "SELECT * FROM mensagem";

    $_query = mysqli_query( $_conexao , $_sql ) or die ( mysqli_error( $_conexao ) );
    $_conta_mensagem = 0;        
    $_conta_mensagem_false = 0;
    $_conta_mensagem_true = 0;
    $_conta_mensagem_usuarios_true = 0;
        
        while( $_line = mysqli_fetch_array( $_query ) )
        { 
            $_conta_mensagem++;
            $_status_adm = $_line['status_adm'];
            $_status = $_line['status'];
            if($_status_adm==false){
                $_conta_mensagem_false++;
            }else{
                $_conta_mensagem_true++;
            }
            if($_status==true){
                $_conta_mensagem_usuarios_true++;
            }
        }

     $_quantidade_usuario_total = 0;
     $_quantidade_alunos = 0;
     $_quantidade_professores = 0;
     $_quantidade_responsaveis = 0;

     $_sql2 = "SELECT * FROM usuario WHERE excluido = '0'";
     $_query2 = mysqli_query( $_conexao , $_sql2 ) or die ( mysqli_error( $_conexao ) );
     while( $_line = mysqli_fetch_array( $_query2 ) ){

            $_id = $_line['id_usuario'];
            $_id_tipo = $_line['id_tipo'];
            $_id_filho = $_line['id_filho'];
            $_quantidade_usuario_total++;
             if($_id_tipo==3){ 
                $_quantidade_alunos++;
                }else if($_id_tipo==2){
                $_quantidade_professores++;  
                }else if($_id_tipo==4){
                $_quantidade_responsaveis++;   
              }
    }
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

<body class="theme-red ls-opened">
   

    <section class="content">
        
        
      <div class="card">
          <div class="header">
            <h2>
                Estatísticas do sistema
            </h2>
        </div>
        <div class="container-fluid">
            <!-- Counter Examples --><br>
             <div class="block-header">
                <h2>Controle de membros</h2>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-red">
                        <div class="icon">
                            <i class="material-icons">face</i>
                        </div>
                        <div class="content">
                            <div class="text">Total de membros</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $_quantidade_usuario_total; ?>" data-speed="1000" data-fresh-interval="20"><?php echo $_quantidade_usuario_total; ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-indigo">
                        <div class="icon">
                            <i class="material-icons">face</i>
                        </div>
                        <div class="content">
                            <div class="text">Alunos</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $_quantidade_alunos; ?>" data-speed="1000" data-fresh-interval="20"><?php echo $_quantidade_alunos; ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-purple">
                        <div class="icon">
                            <i class="material-icons">face</i>
                        </div>
                        <div class="content">
                            <div class="text">Professores</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $_quantidade_professores; ?>" data-speed="1000" data-fresh-interval="20"><?php echo $_quantidade_professores; ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-deep-purple">
                        <div class="icon">
                            <i class="material-icons">face</i>
                        </div>
                        <div class="content">
                            <div class="text">Responsáveis</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $_quantidade_responsaveis; ?>" data-speed="1000" data-fresh-interval="20"><?php echo $_quantidade_responsaveis; ?></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Counter Examples -->
            <!-- Hover Zoom Effect -->
            <div class="block-header">
                <h2>Controle de mensagens</h2>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">email</i>
                        </div>
                        <div class="content">
                            <div class="text">Total de mensagens</div>
                            <div class="number"><?php echo $_conta_mensagem; ?></div>
                        </div>
                    </div>

                </div>
                 <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box  bg-blue hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">email</i>
                        </div>
                        <div class="content">
                            <div class="text">visualizadas pelo admin</div>
                            <div class="number"><?php echo $_conta_mensagem_true; ?></div>
                        </div>
                    </div>

                </div>
                 <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-blue hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">email</i>
                        </div>
                        <div class="content">
                            <div class="text">Não visualizadas pelo admin</div>
                            <div class="number"><?php echo $_conta_mensagem_false; ?></div>
                        </div>
                    </div>

                </div>
                 <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">email</i>
                        </div>
                        <div class="content">
                            <div class="text">Visualizas pelos membros</div>
                            <div class="number"><?php echo $_conta_mensagem_usuarios_true; ?></div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- #END# Hover Zoom Effect -->
            <!-- Hover Expand Effect -->
            <div class="block-header">
                <h2>Controle de galeria</h2>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-teal hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">photo_album</i>
                        </div>
                        <div class="content">
                            <div class="text">Total de álbuns</div>
                            <div class="number">7</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-green hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">photo</i>
                        </div>
                        <div class="content">
                            <div class="text">Total de imagens</div>
                            <div class="number">55</div>
                        </div>
                    </div>
                </div>
                
            <!-- #END# Hover Expand Effect -->
            </div>
          </div>
        </div>
           <!-- Switch Button -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Direcionamento de mensagens
                            </h2>
                        </div>
                        <div class="body">
                            <div class="demo-switch">
                                <?php
                                    $_sql = "SELECT status_direcionamento FROM direcionamento_de_mensagem WHERE id_direcionamento = '1'";
                                    $_query = mysqli_query( $_conexao , $_sql ) or die ( mysqli_error( $_conexao ) );
                                    while( $_line = mysqli_fetch_array( $_query ) ){
                                        $_status_prof_resp = $_line['status_direcionamento'];
                                    }
                                    $_sql = "SELECT status_direcionamento FROM direcionamento_de_mensagem WHERE id_direcionamento = '2'";
                                    $_query = mysqli_query( $_conexao , $_sql ) or die ( mysqli_error( $_conexao ) );
                                    while( $_line = mysqli_fetch_array( $_query ) ){
                                        $_status_resp_prof = $_line['status_direcionamento'];
                                    }
                                ?>
                                <div class="row clearfix">
                                    <form name="direcionamento_de_mensagem" action="direcionamento.php" method="post">
                                        <div class="col-sm-3">
                                            <div class="demo-switch-title">Professor para responsável</div>
                                            <div class="switch">
                                                <input style="display:none;" name="direcionamento" value="1">
                                                <?php
                                                    if($_status_prof_resp == 1){
                                                ?>
                                                <label><input onchange="this.form.submit();" name="direcionamento_1" type="checkbox" checked><span class="lever switch-col-red"></span></label>
                                                <?php
                                                    }else{
                                                ?>
                                                <label><input onchange="this.form.submit();" name="direcionamento_1" type="checkbox"><span class="lever switch-col-red"></span></label>
                                                <?php
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </form>
                                    <form name="direcionamento_de_mensagem" action="direcionamento.php" method="post">
                                        <div class="col-sm-3">
                                            <div class="demo-switch-title">Responsável para professor</div>
                                            <div class="switch">
                                                <input style="display:none;" name="direcionamento" value="2">
                                               <?php
                                                    if($_status_resp_prof == 1){
                                                ?>
                                                <label><input onchange="this.form.submit();" name="direcionamento_2" type="checkbox" checked><span class="lever switch-col-red"></span></label>
                                                <?php
                                                    }else{
                                                ?>
                                                <label><input onchange="this.form.submit();" name="direcionamento_2" type="checkbox"><span class="lever switch-col-red"></span></label>
                                                <?php
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--#END# Switch Button -->
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

    <!-- Jquery CountTo Plugin Js -->
    <script src="../plugins/jquery-countto/jquery.countTo.js"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="../plugins/jquery-sparkline/jquery.sparkline.js"></script>

    <!-- Custom Js -->
    <script src="../js/admin.js"></script>
    <script src="../js/pages/widgets/infobox/infobox-2.js"></script>

    <!-- Demo Js -->
    <script src="../js/demo.js"></script>
</body>
</html>