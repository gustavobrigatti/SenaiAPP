<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
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

        <!-- JQuery DataTable Css -->
        <link href="../plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

        <!-- Custom Css -->
        <link href="../css/style.css" rel="stylesheet">

        <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
        <link href="../css/themes/all-themes.css" rel="stylesheet" />
    </head>

    <body class="theme-red">
        <section class="content">
            <div class="row">
                <?php
                include("../cab_menu.php");
                include_once ("../configuracao/config.php");
                session_start();


                $_notificacao = $_SESSION['notificacao'];
                $_sql = "SELECT * FROM usuario";
                $_quantidade_usuario_total = 0;
                $_quantidade_alunos = 0;
                $_quantidade_professores = 0;
                $_quantidade_responsaveis = 0;

                $_query = mysqli_query( $_conexao , $_sql ) or die ( mysqli_error( $_conexao ) );


                while( $_line = mysqli_fetch_array( $_query ) ){


                    $_id = $_line['id_usuario'];
                    $_id_tipo = $_line['id_tipo'];
                    $_quantidade_usuario_total++;

                    if($_id_tipo==3){ 
                        $_quantidade_alunos++;
                    }else if($_id_tipo==2){
                        $_quantidade_professores++;  
                    }
                    $_id_ultimo = $_id;
                }
                $_total = $_quantidade_alunos + $_quantidade_professores;

                $_sql2 = "SELECT * FROM turma";

                $_query2 = mysqli_query( $_conexao , $_sql2 ) or die ( mysqli_error( $_conexao ) );

                $_quantidade_turmas = 0;
                while( $_line2 = mysqli_fetch_array( $_query2 ) ){
                    $_quantidade_turmas++;
                }
                ?>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-4">
                        <div class="icon">
                            <i class="material-icons col-blue">book</i>
                        </div>
                        <div class="content">
                            <div class="text">Total de turmas</div>
                            <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20"><?php echo $_quantidade_turmas; ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-4">
                        <div class="icon">
                            <i class="material-icons col-green">face</i>
                        </div>
                        <div class="content">
                            <div class="text">Alunos</div>
                            <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20"><?php echo $_quantidade_alunos; ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-4">
                        <div class="icon">
                            <i class="material-icons col-red">face</i>
                        </div>
                        <div class="content">
                            <div class="text">Professores</div>
                            <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20"><?php echo $_quantidade_professores; ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-4">
                        <div class="icon">
                            <i class="material-icons col-indigo">face</i>
                        </div>
                        <div class="content">
                            <div class="text">Total de usuários</div>
                            <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20"><?php echo $_total; ?></div>
                        </div>
                    </div>
                </div>
                </ul>
            </div>
        <!-- Exportable Table -->
        <a><div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            TABELA DE TURMAS<?php echo $_notificacao; ?>
                        </h2>
                    </div>



                    <div class="body">
                        <div class="table-responsive" style="max-width: 100%; overflow-x: hidden;">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">


                                <thead>
                                    <tr>
                                        <th>Curso</th>
                                        <th>Sigla</th>
                                        <th>Qnt. Prof</th>
                                        <th>Qnt. Alunos</th>
                                        <th>Opção</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Curso</th>
                                        <th>Sigla</th>
                                        <th>Qnt. Prof</th>
                                        <th>Qnt. Alunos</th>
                                        <th>Opção</th>
                                    </tr>
                                </tfoot>
                                <tbody>

                                    <?php
                                    $_sql = "SELECT * FROM turma";

                                    $_query = mysqli_query( $_conexao , $_sql ) or die ( mysqli_error( $_conexao ) );


                                    while( $_line = mysqli_fetch_array( $_query ) )
                                    { 
                                        $_curso = $_line['nome_turma'];
                                        $_sigla = $_line['sigla_turma'];
                                        $_id = $_line['id_turma'];
                                        $_qnt_alunos = 0;
                                        $_sql2 = "SELECT * FROM aluno_turma WHERE id_turma = '$_id'";
                                        $_query2 = mysqli_query( $_conexao , $_sql2 ) or die ( mysqli_error( $_conexao ) );
                                        while( $_line2 = mysqli_fetch_array( $_query2 ) ){
                                            $_id_aluno = $_line2['id_aluno'];
                                            $_sql5 = "SELECT * FROM usuario WHERE id_usuario = '$_id_aluno' AND excluido = '0'";
                                            $_query5 = mysqli_query( $_conexao , $_sql5 ) or die ( mysqli_error( $_conexao ) );
                                            while( $_line5 = mysqli_fetch_array( $_query5 ) ){
                                                $_qnt_alunos++;
                                            }

                                        }
                                        $_qnt_professores = 0;
                                        $_sql3 = "SELECT * FROM professor_turma WHERE id_turma = '$_id'";
                                        $_query3 = mysqli_query( $_conexao , $_sql3 ) or die ( mysqli_error( $_conexao ) );
                                        while( $_line3 = mysqli_fetch_array( $_query3 ) ){
                                            $_id_professor = $_line3['id_professor'];
                                            $_sql5 = "SELECT * FROM usuario WHERE id_usuario = '$_id_professor' AND excluido = '0'";
                                            $_query5 = mysqli_query( $_conexao , $_sql5 ) or die ( mysqli_error( $_conexao ) );
                                            while( $_line5 = mysqli_fetch_array( $_query5 ) ){
                                                $_qnt_professores++;
                                            }
                                        }
                                    ?>

                                    <tr>
                                        <td><?php echo $_curso; ?></td>
                                        <td><?php echo $_sigla; ?></td>
                                        <td><?php echo $_qnt_professores; ?></td>
                                        <td><?php echo $_qnt_alunos; ?></td>
                                        <td> 
                                            <form method="post" action="visitar_turma.php" name="formatualizar">

                                                <input type="hidden" name="id" value="<?php echo $_id; ?>">

                                                <button style="

                                                               width: 100%;                  
                                                               border: 0px solid #fff;
                                                               background-color: #00000000 !important;                       


                                                               " name="confirma" type="submit" value="Favoritar">
                                                    Visitar

                                                </button>

                                            </form> 
                                        </td>
                                    </tr>

                                    <?php
                                    }
                                    ?>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <!-- #END# Exportable Table -->
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

    <!-- Custom Js -->
    <script src="../js/admin.js"></script>
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
    </body>

</html>