<!DOCTYPE html>

<?php
include("../cab_menu.php");
include_once ("../configuracao/config.php");
session_start();
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

        <!-- Custom Css -->
        <link href="../css/style.css" rel="stylesheet">

        <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
        <link href="../css/themes/all-themes.css" rel="stylesheet" />


    </head>

    <body class="theme-red">

        <?php
        $_sql = "SELECT * FROM aviso";

        $_query = mysqli_query( $_conexao , $_sql ) or die ( mysqli_error( $_conexao ) );


        while( $_line = mysqli_fetch_array( $_query ) )
        { 
            $_id = $_line['id_aviso'];
            $_titulo = $_line['titulo'];
            $_texto = $_line['texto'];

        ?>

        <section class="content">
            <div class="container-fluid">
                <!-- TinyMCE -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <!-- Textarea -->
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="card">

                                    <div class="body">
                                        <h2 class="card-inside-title">Comunicado</h2>
                                        <div class="row clearfix">
                                            <div class="col-sm-12">

                                                <form  name="aviso" method="post" action="gravar_comunicado.php"> 
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <!-- <textarea rows="1" class="form-control no-resize" placeholder="Titulo"></textarea>
<textarea rows="4" class="form-control no-resize" placeholder="insira o comunicado..."></textarea> -->
                                                            <input style="display:none;" type="text" name="id" class="form-control" value="<?php echo $_id; ?>">
                                                            <div class="form-line">
                                                                <input type="text" name="titulo" class="form-control" required value="<?php echo $_titulo; ?>">
                                                                <label class="form-label">Título</label>
                                                            </div><br>
                                                            <div class="form-line">
                                                                <input  type="text" name="texto" class="form-control"required style="height: 100px;" value="<?php echo $_texto; ?>">
                                                                <label class="form-label">Texto</label>
                                                            </div>

                                                        </div>



                                                    </div>
                                                    <button style="background: #E53935; color:#fff;" type="submit" class="btn waves-effect" value="enviar">Editar</button>
                                                </form>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="card">
                                            <div class="header">
                                                <h2>
                                                    Comunicado

                                                </h2>
                                                <ul class="header-dropdown m-r--5">
                                                    <li class="dropdown">
                                                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                                            <i class="material-icons">more_vert</i>
                                                        </a>
                                                        <ul class="dropdown-menu pull-right">
                                                            <?php 
            if($_line['status']==true){
                                                            ?>

                                                            <li><a href="desativar_comunicado.php">Desativar</a></li>

                                                            <?php
            }else{
                                                            ?>
                                                            <li><a href="ativar_comunicado.php">Ativar</a></li>
                                                            <?php
            }
                                                            ?>
                                                        </ul>

                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="body">
                                                <table id="mainTable" class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>Título</th>
                                                            <th>Texto</th>
                                                            <th>Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td><?php echo $_line['titulo']; ?></td>
                                                            <td><?php echo $_line['texto']; ?></td>
                                                            <?php

            if($_line['status']== true){

                                                            ?>

                                                            <td>Ativado&nbsp;</td>

                                                            <?php

            }else{

                                                            ?>

                                                            <td>Desativado</td>

                                                            <?php
            }
                                                            ?>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Editable Table Plugin Js -->
                            <script src="../plugins/editable-table/mindmup-editabletable.js"></script>

                            <!-- Custom Js -->
                            <script src="../js/admin.js"></script>
                            <script src="../js/pages/tables/editable-table.js"></script>

                            <?php
            break;}
                            ?>  
                        </div>
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

        <!-- Ckeditor -->
        <script src="../plugins/ckeditor/ckeditor.js"></script>

        <!-- TinyMCE -->
        <script src="../plugins/tinymce/tinymce.js"></script>

        <!-- Custom Js -->
        <script src="../js/admin.js"></script>
        <script src="../js/pages/forms/editors.js"></script>

        <!-- Demo Js -->
        <script src="../js/demo.js"></script>
    </body>

</html>