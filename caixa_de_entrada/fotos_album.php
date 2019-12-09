<!DOCTYPE html>
<?php
    include("../cab_menu.php");
    include_once ("../configuracao/config.php");
    session_start();
    $_id_album = $_POST['id_album'];
    $_notificacao = $_SESSION['notificacao'];
    $_SESSION['id_album'] = $_id_album;
?>
<html class="no-js">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="../plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="../plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="../plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Light Gallery Plugin Css -->
    <link href="../plugins/light-gallery/css/lightgallery.css" rel="stylesheet">

    <!-- Custom Css -->
    <link href="../css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../css/themes/all-themes.css" rel="stylesheet" />
    
    <!-- Animation Css -->
    <link href="../plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Sweetalert Css -->
    <link href="../plugins/sweetalert/sweetalert.css" rel="stylesheet" />
    
    <link rel="stylesheet" type="text/css" href="../css/normalize.css" />
    <link rel="stylesheet" type="text/css" href="../css/demo.css" />
    <link rel="stylesheet" type="text/css" href="../css/component.css" />
    <!-- remove this if you use Modernizr -->
		<script>(function(e,t,n){var r=e.querySelectorAll("html")[0];r.className=r.className.replace(/(^|\s)no-js(\s|$)/,"$1js$2")})(document,window,0);</script>
</head>

<body class="theme-red">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <?php
                                    $_sql = "SELECT * FROM albuns WHERE id_album = '$_id_album'";
                                    $_query = mysqli_query( $_conexao , $_sql ) or die ( mysqli_error( $_conexao ) );
                                    while( $_line = mysqli_fetch_array($_query)){
                                        $_nome_album = $_line['nome_album']; 
                                        $_excluido = $_line['excluido'];
                                    }
                                    echo $_nome_album; 
                                    if($_SESSION['usuarioNiveisAcessoId'] == 1 || $_SESSION['usuarioNiveisAcessoId'] == 2 || $_SESSION['usuarioNiveisAcessoId'] == 5){
                                ?>
                                <form action="grava_fotos_album.php" method="post" enctype="multipart/form-data" style="float: right; width: 22%">
                                    <input style="display: none;" type="text" value="<?php echo $_id_album;?>" name="id_album"/>
                                    <input type="file" name="fileToUpload[]" id="file-3" class="inputfile inputfile-3"  accept=".jpg, .png" data-multiple-caption="{count} fotos selecionadas" multiple required/>
                                    <label for="file-3"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span style="color: #E53935;">Adicionar fotos&hellip;</span></label>
                                    <button  value="Convert Image to Data" name="submit" style="margin-top: -10%;" type="submit" class="btn btn-default btn-circle waves-effect waves-circle waves-float" ><i class="material-icons" style="color: #E53935;">send</i></button>
                                </form>
                                <?php
                                    }
                                ?>
                            </h2>
                            <?php
                                $_id_tipo = $_SESSION['usuarioNiveisAcessoId'];
                                if($_id_tipo == 1 || $_id_tipo == 2 || $_id_tipo == 5){
                            ?>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    
                                    <ul class="dropdown-menu pull-right">
                                        <?php if($_excluido == false){ ?>
                                        <li><a>
                                            <form method="post" action="editar_album.php" name="formatualizar">

                                             <input type="hidden" name="id" value="<?php echo $_id_album; ?>">
                                        
                                             <button style="

                                                  width: 100%;                  
                                                  border: 0px solid #fff;
                                                  border-radius: 8px;
                                                  background-color: #00000000;                       


                                                                     " name="confirma" type="submit" value="Favoritar">
                                                 Editar Álbum

                                                    </button>

                                                </form>
                                        </a></li>
                                        <?php } ?>
                                        
                                        <li><a>
                                            <div class="row clearfix js-sweetalert">
                                                    <button class="btn waves-effect" data-type="cancel" style="margin-left:25px; background: 00000000; box-shadow: 0px 0px 0px #00000000;">
                                                        <font color="#000;">Excluir Álbum</font>
                                                    </button>
                                            </div>
                                        </a></li>
                                    </ul>
                                </li>
                            </ul>
                           <?php
                                }
                            ?>
                        </div>
                        <div class="body">
                            <?php if($_excluido == true){ ?>
                            <div class="alert alert-danger">
                                <form method="post" action="recuperar_album.php" name="recuperar" id="recuperar">
                                    <input type="hidden" name="id_album" value="<?php echo $_id_album; ?>">
                                <strong>Álbum excluido!</strong> <a href="javascript:{}" onclick="document.getElementById('recuperar').submit();" class="alert-link">Clique aqui</a> para recupera-lo.
                                </form>
                            </div>
                            <?php } ?>
                            <div id="aniimated-thumbnials" class="list-unstyled row clearfix">
                                <?php
                                    $_iContador = 0;
                                    $_sql = "SELECT foto FROM foto_album WHERE id_album = '$_id_album' AND excluido = false ORDER BY id_foto desc";
                                    $_query = mysqli_query( $_conexao , $_sql ) or die ( mysqli_error( $_conexao ) );
                                    while( $_line = mysqli_fetch_array($_query)){
                                        $_foto = $_line['foto'];
                                        $_iContador++;
                                ?>
                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12" style="height: 150px; position: relative; overflow: hidden;">
                                    <a href="data:image/png;base64, <?php echo $_foto; ?>">
                                        <img style="position:absolute; left: -100%; right: -100%; top:-100%; bottom: -100%; margin: auto; height: auto; width: auto;" class="img-responsive thumbnail" src="data:image/png;base64, <?php echo $_foto; ?>">
                                    </a>
                                </div>
                            <?php
                                }
                            ?>
                            </div>
                            <?php
                                if($_iContador == 0 ){
                             ?>
                                <div>
                                    <center><h4>Não há fotos para exibir.</h4></center>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
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

    <!-- Bootstrap Notify Plugin Js -->
    <script src="../plugins/bootstrap-notify/bootstrap-notify.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="../plugins/node-waves/waves.js"></script>

    <!-- SweetAlert Plugin Js -->
    <script src="../plugins/sweetalert/sweetalert.min.js"></script>

    <script src="../js/pages/ui/dialogs.js"></script>
    
    <script src="../js/custom-file-input.js"></script>

    <!-- Light Gallery Plugin Js -->
    <script src="../plugins/light-gallery/js/lightgallery-all.js"></script>

    <!-- Custom Js -->
    <script src="../js/pages/medias/image-gallery.js"></script>
    <script src="../js/admin.js"></script>

    <!-- Demo Js -->
    <script src="../js/demo.js"></script>
    <!-- Bootstrap Notify Plugin Js -->
    <script src="../plugins/bootstrap-notify/bootstrap-notify.js"></script>
    <?php
      if($_notificacao == 10){
    ?>
    <script src="../js/pages/ui/notifications_adicionar_foto_singular.js"></script>
    <?php }else if($_notificacao ==20){
    ?>
    <script src="../js/pages/ui/notifications_adicionar_foto.js"></script>
    <?php }else if($_notificacao ==30){
    ?>
    <script src="../js/pages/ui/notifications_album_editado.js"></script>
    <?php } unset($_SESSION['notificacao']);?>
    <script type="text/javascript">
        $(document).ready(function(){ // ao término do carregamento do arquivo
              $('#notificacao').click(); // disparar o click de determinado elemento
              $(this).scrollTop(); // scroll para o topo, pode ser necessário adequar o seletor, ou seja, em vez de $(this), $(window)... ou outro...
            });
    </script>


</body>

</html>