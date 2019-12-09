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
            <div class="row" style="margin-left: 30%;">
                <?php
                include("../cab_menu.php");
                include_once ("../configuracao/config.php");
                session_start();


                $_sql = "SELECT * FROM albuns";
                $_quantidade_albuns = 0;
                $_quantidade_fotos = 0;
                $_query = mysqli_query( $_conexao , $_sql ) or die ( mysqli_error( $_conexao ) );

                while( $_line = mysqli_fetch_array( $_query ) ){
                    $_id_album = $_line['id_album'];
                    $_quantidade_albuns++;
                    $_sql2 = "SELECT * FROM foto_album WHERE id_album = '$_id_album'";
                    $_query2 = mysqli_query( $_conexao , $_sql2 ) or die ( mysqli_error( $_conexao ) );
                    while( $_line2 = mysqli_fetch_array( $_query2 ) ){
                        $_quantidade_fotos++;
                    }
                }

                ?>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-4">
                        <div class="icon">
                            <i class="material-icons col-red">photo_album</i>
                        </div>
                        <div class="content">
                            <div class="text">Total de álbuns</div>
                            <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20"><?php echo $_quantidade_albuns; ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-4">
                        <div class="icon">
                            <i class="material-icons col-red">photo_size_select_actual</i>
                        </div>
                        <div class="content">
                            <div class="text">Total de fotos</div>
                            <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20"><?php echo $_quantidade_fotos; ?></div>
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
                            TABELA DE ÁLBUNS
                        </h2>
                    </div>



                    <div class="body">
                        <div class="table-responsive" style="max-width: 100%; overflow-x: hidden;">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">


                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Criador</th>
                                        <th>Data de Criação</th>
                                        <th>Qnt. Fotos</th>
                                        <th>Público</th>
                                        <th>Excluido</th>
                                        <th>Opção</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Criador</th>
                                        <th>Data de Criação</th>
                                        <th>Qnt. Fotos</th>
                                        <th>Público</th>
                                        <th>Excluido</th>
                                        <th>Opção</th>
                                    </tr>
                                </tfoot>
                                <tbody>

                                    <?php
                                    $_sql = "SELECT * FROM albuns";
                                    $_foto_album = 0;
                                    $_query = mysqli_query( $_conexao , $_sql ) or die ( mysqli_error( $_conexao ) );
                                    while( $_line = mysqli_fetch_array( $_query ) ){
                                        $_foto_album = 0;
                                        $_id_album = $_line['id_album'];
                                        $_nome_album = $_line['nome_album'];
                                        $_data_criacao = $_line['data_criacao'];
                                        $_id_criador = $_line['id_criador'];
                                        $_publico = $_line['publico'];
                                        $_excluido = $_line['excluido'];
                                        $_sql2 = "SELECT * FROM usuario WHERE id_usuario = '$_id_criador'";
                                        $_query2 = mysqli_query( $_conexao , $_sql2 ) or die ( mysqli_error( $_conexao ) );
                                        while( $_line2 = mysqli_fetch_array( $_query2 ) ){
                                            $_nome_criador = $_line2['nome'];
                                        }
                                        $_sql3 = "SELECT * FROM foto_album WHERE id_album = '$_id_album'"; 
                                        $_query3 = mysqli_query( $_conexao , $_sql3 ) or die ( mysqli_error( $_conexao ) );
                                        while( $_line3 = mysqli_fetch_array( $_query3 ) ){
                                            $_id_album_foto = $_line3['id_album'];
                                            if($_id_album_foto == $_id_album){
                                                $_foto_album++;
                                            }
                                        }
                                    ?>

                                    <tr>
                                        <td><?php echo $_nome_album; ?></td>
                                        <td><?php echo $_nome_criador; ?></td>
                                        <td><?php echo $_data_criacao; ?></td>
                                        <td><?php echo $_foto_album; ?></td>
                                        <?php if($_publico == true){ ?>
                                        <td>Sim</td>
                                        <?php }else{ ?>
                                        <td>Não</td>
                                        <?php }if($_excluido == true){ ?>
                                        <td>Sim</td>
                                        <?php }else{ ?>
                                        <td>Não</td>
                                        <?php } ?>
                                        <td> 
                                            <form method="post" action="fotos_album.php" name="formatualizar">

                                                <input type="hidden" name="id_album" value="<?php echo $_id_album; ?>">

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
    </body>

</html>