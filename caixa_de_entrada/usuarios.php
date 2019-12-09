<!DOCTYPE html>

<?php
include("../cab_menu.php");
include_once ("../configuracao/config.php");
session_start();
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
    }else if($_id_tipo==4){
        $_quantidade_responsaveis++;
    }
    $_id_ultimo = $_id;
}
?>

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
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-4">
                        <div class="icon">
                            <i class="material-icons col-blue">face</i>
                        </div>
                        <div class="content">
                            <div class="text">Total de membros</div>
                            <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20"><?php echo $_quantidade_usuario_total; ?></div>
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
                            <div class="text">Responsáveis</div>
                            <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20"><?php echo $_quantidade_responsaveis; ?></div>
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
                            TABELA DE USUARIOS
                        </h2>
                    </div>



                    <div class="body">
                        <div class="table-responsive" style="max-width: 100%; overflow-x: hidden;">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">


                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>E-mail</th>
                                        <th>C.P.F</th>
                                        <th>Tipo</th>
                                        <th>Excluído</th>
                                        <th>Opção</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Nome</th>
                                        <th>E-mail</th>
                                        <th>C.P.F</th>
                                        <th>Tipo</th>
                                        <th>Excluído</th>
                                        <th>Opção</th>
                                    </tr>
                                </tfoot>
                                <tbody>

                                    <?php
                                    $_sql = "SELECT * FROM usuario";

                                    $_query = mysqli_query( $_conexao , $_sql ) or die ( mysqli_error( $_conexao ) );


                                    while( $_line = mysqli_fetch_array( $_query ) )
                                    { 
                                        $_nome = $_line['nome'];
                                        $_email = $_line['email'];
                                        $_cpf = $_line['cpf'];
                                        $_id = $_line['id_usuario'];
                                        $_id_tipo = $_line['id_tipo'];
                                        $_excluido = $_line['excluido'];

                                    ?>

                                    <tr>
                                        <td><?php echo $_nome; ?></td>
                                        <td><?php echo $_email; ?></td>
                                        <td><?php echo $_cpf; ?></td>

                                        <?php if($_id_tipo==1){ ?>
                                        <td>Direção</td>
                                        <?php }else if($_id_tipo==2){ ?>
                                        <td>Professor</td>
                                        <?php }else if($_id_tipo==3){ ?>
                                        <td>Aluno</td>
                                        <?php }else if($_id_tipo==4){ ?>
                                        <td>Responsável</td>
                                        <?php }else if($_id_tipo==5){ ?>
                                        <td>Secretaria/Biblioteca</td>
                                        <?php } ?>

                                        <?php if($_excluido == true){?>
                                        <td><center>Sim</center></td>
                                        <?php }else{ ?>
                                        <td><center>Não</center></td>
                                        <?php } ?>
                                        <td>


                                            <form method="post" action="visitar_perfil.php" name="formatualizar">

                                                <input type="hidden" name="id" value="<?php echo $_id; ?>">

                                                <button style="width: 100%; border: 0px solid #fff; background-color: #00000000 !important;" name="confirma" type="submit" value="Favoritar">
                                                    Visitar perfil

                                                </button>

                                                <!--<center>
<form method="post" action="visitar_perfil.php" name="formatualizar">

<input type="hidden" name="id" value="<?php //  echo $_id; ?>">

<button style="background: #E53935; color:#fff;" type="submit" class="btn waves-effect" name="confirma" type="submit" value="Favoritar">
Visitar perfil

</button>

</form>
</center>-->

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