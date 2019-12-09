<?php
    include("../cab_menu.php");
    include_once ("../configuracao/config.php");
    session_start();

    $_id_turma = $_POST['id'];
    $_notificacao = $_SESSION['notificacao'];
    $_sql = "SELECT * FROM turma WHERE id_turma = '$_id_turma'";


    $_query = mysqli_query( $_conexao , $_sql ) or die ( mysqli_error( ) );
   
    while( $_line = mysqli_fetch_array( $_query ) ){
    
           $_nome_turma = $_line['nome_turma'];
           $_sigla_turma = $_line['sigla_turma'];
    }
    
?>

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

    <!-- JQuery DataTable Css -->
    <link href="../plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
    
    <!-- Custom Css -->
    <link href="../css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../css/themes/all-themes.css" rel="stylesheet" />
</head>
    
    

<section class="content">
        <div class="container-fluid">
            <!-- Body Copy -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                             <h2>
                                <b><?php echo $_nome_turma." - ".$_sigla_turma; ?></b>
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">

                                        <form method="post" action="editar_turma.php" name="formatualizar">

                                          <input type="hidden" name="id" value="<?php echo $_id_turma; ?>">

                                         <button style="

                                              width: 100%;                  
                                              border: 0px solid #fff;
                                              border-radius: 8px;
                                              background-color: #fff !important;                       


                                                                 " name="confirma" type="submit" value="Favoritar">
                                             Editar turma

                                                </button>

                                            </form> 


                                    </ul>
                                </li>
                             </ul>
                        </div>
                        <div class="body">
                          
                           
                        <!-- Exportable Table -->
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="card">
                                    <div class="header">
                                        <h2>
                                            TABELA DE PROFESSORES
                                        </h2>
                                    </div>



                                    <div class="body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">


                                                <thead>
                                                    <tr>
                                                        <th>Nome</th>
                                                        <th>E-mail</th>
                                                        <th>C.P.F</th>
                                                        <th>Opção</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                       <th>Nome</th>
                                                        <th>E-mail</th>
                                                        <th>C.P.F</th>
                                                        <th>Opção</th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>

                                                <?php
                                                    $_sql = "SELECT id_professor FROM professor_turma WHERE id_turma = '$_id_turma'";
                                                    $_query = mysqli_query( $_conexao , $_sql ) or die ( mysqli_error( $_conexao ) );


                                                    while( $_line = mysqli_fetch_array( $_query ) ){
                                                        
                                                        $_id_usuario = $_line['id_professor'];
                                                        
                                                        $_sql2 = "SELECT * FROM usuario WHERE id_usuario = '$_id_usuario' AND excluido = '0'";

                                                        $_query2 = mysqli_query( $_conexao , $_sql2 ) or die ( mysqli_error( $_conexao ) );

                                                        while( $_line2 = mysqli_fetch_array( $_query2 ) ){
                                                          $_nome = $_line2['nome'];
                                                          $_email = $_line2['email'];
                                                          $_cpf = $_line2['cpf'];
                                                          $_id = $_line2['id_usuario'];
                                                ?>

                                                    <tr>
                                                        <td><?php echo $_nome; ?></td>
                                                        <td><?php echo $_email; ?></td>
                                                        <td><?php echo $_cpf; ?></td>
                                                        <td>


                                                        <form method="post" action="visitar_perfil.php" name="formatualizar">

                                                            <input type="hidden" name="id" value="<?php echo $_id; ?>">

                                                            <button style="

                                                              width: 100%;                  
                                                              border: 0px solid #fff;
                                                              background-color: #fff !important;                       


                                                                             " name="confirma" type="submit" value="Favoritar">
                                                         Visitar perfil

                                                            </button>

                                                        </form> 
                                                        </td>
                                                    </tr>

                                                <?php
                                                        }
                                                    }
                                                ?>


                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- #END# Exportable Table --><!-- Exportable Table -->
                         <!-- Exportable Table -->
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="card">
                                    <div class="header">
                                        <h2>
                                            TABELA DE ALUNOS
                                        </h2>
                                    </div>



                                    <div class="body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">


                                                <thead>
                                                    <tr>
                                                        <th>Nome</th>
                                                        <th>E-mail</th>
                                                        <th>C.P.F</th>
                                                        <th>Visitar</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                       <th>Nome</th>
                                                        <th>E-mail</th>
                                                        <th>C.P.F</th>
                                                        <th>Visitar</th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>

                                                <?php
                                                    $_sql = "SELECT * FROM aluno_turma WHERE id_turma = '$_id_turma'";
                                                    $_query = mysqli_query( $_conexao , $_sql ) or die ( mysqli_error( $_conexao ) );


                                                    while( $_line = mysqli_fetch_array( $_query ) ){
                                                        
                                                        $_id_usuario = $_line['id_aluno'];
                                                        
                                                        $_sql2 = "SELECT * FROM usuario WHERE id_usuario = '$_id_usuario' AND excluido = '0'";

                                                        $_query2 = mysqli_query( $_conexao , $_sql2 ) or die ( mysqli_error( $_conexao ) );

                                                        while( $_line2 = mysqli_fetch_array( $_query2 ) ){
                                                          $_nome = $_line2['nome'];
                                                          $_email = $_line2['email'];
                                                          $_cpf = $_line2['cpf'];
                                                          $_id = $_line2['id_usuario'];
                                                ?>

                                                    <tr>
                                                        <td><?php echo $_nome; ?></td>
                                                        <td><?php echo $_email; ?></td>
                                                        <td><?php echo $_cpf; ?></td>
                                                        <td>


                                                        <form method="post" action="visitar_perfil.php" name="formatualizar">

                                                            <input type="hidden" name="id" value="<?php echo $_id; ?>">

                                                            <button style="

                                                              width: 100%;                  
                                                              border: 0px solid #fff;
                                                              background-color: #fff !important;                       


                                                                             " name="confirma" type="submit" value="Favoritar">
                                                         Visitar perfil

                                                            </button>

                                                        </form> 
                                                        </td>
                                                    </tr>

                                                <?php
                                                        }
                                                    }
                                                ?>


                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- #END# Exportable Table --><!-- Exportable Table -->
                         
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

    <!-- Waves Effect Plugin Js -->
    <script src="../plugins/node-waves/waves.js"></script>

    <!-- Custom Js -->
    <script src="../js/admin.js"></script>
    
     <!-- Waves Effect Plugin Js -->
    <script src="../plugins/node-waves/waves.js"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="../plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="../plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

    <script src="../js/pages/tables/jquery-datatable.js"></script>

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
    
</html>


                                                        