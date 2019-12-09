<!DOCTYPE html>

<?php
session_start();
include("../cab_menu.php");
include_once ("../configuracao/config.php");
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

        <!-- Sweet Alert Css -->
        <link href="../plugins/sweetalert/sweetalert.css" rel="stylesheet" />

        <!-- Custom Css -->
        <link href="../css/style.css" rel="stylesheet">

        <!-- Multi Select Css -->
        <link href="../plugins/multi-select/css/multi-select.css" rel="stylesheet">


        <!-- Bootstrap Select Css -->
        <link href="../plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

        <!-- noUISlider Css -->
        <link href="../plugins/nouislider/nouislider.min.css" rel="stylesheet" />

        <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
        <link href="../css/themes/all-themes.css" rel="stylesheet" />
    </head>

    <body class="theme-red">
        <section class="content">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header"><h2 class="card-inside-title">Enviar mensagem</h2></div>
                        <!-- Tags Input -->
                        <div class="body">
                            <form method="post" id="form_advanced_validation" action="gravar_mensagem.php">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <label class="form-label">Para</label><br>
                                        <select name="destinatario[]" class="form-control show-tick" data-live-search="true" data-actions-box="true" multiple required>
                                            <?php     
                                            if($_SESSION['usuarioNiveisAcessoId']==1 || $_SESSION['usuarioNiveisAcessoId']==5){
                                                $_id_de = $_SESSION['usuarioId'];
                                                $_sql = "SELECT * FROM usuario WHERE NOT id_usuario = '$_id_de' AND excluido = '0'";
                                                $_query = mysqli_query( $_conexao , $_sql ) or die ( mysqli_error( $_conexao ) );
                                                while( $_line = mysqli_fetch_array( $_query ) ){
                                                    $_id = $_line['id_usuario'];
                                                    $_destinatario = $_line['nome'];
                                            ?>

                                            <option value="<?php echo $_id; ?>"><?php echo $_destinatario; ?></option>

                                            <?php
                                                }
                                            }else if($_SESSION['usuarioNiveisAcessoId']==2){

                                                $_id_de = $_SESSION['usuarioId'];

                                                $_sql = "SELECT id_turma FROM professor_turma WHERE id_professor = '$_id_de'";
                                                $_query = mysqli_query( $_conexao , $_sql ) or die ( mysqli_error( $_conexao ) );
                                                while( $_line = mysqli_fetch_array( $_query ) ){
                                                    $_id_turma = $_line['id_turma'];

                                                    $_sql2 = "SELECT id_aluno FROM aluno_turma WHERE id_turma = '$_id_turma'";

                                                    $_query2 = mysqli_query( $_conexao , $_sql2 ) or die ( mysqli_error( $_conexao ) );
                                                    while( $_line2 = mysqli_fetch_array( $_query2 ) ){

                                                        $_id_aluno = $_line2['id_aluno'];

                                                        $_sql3 = "SELECT * FROM usuario WHERE id_usuario = '$_id_aluno' AND NOT id_usuario = '$_id_de' AND excluido = '0'";
                                                        $_query3 = mysqli_query( $_conexao , $_sql3 ) or die ( mysqli_error( $_conexao ) );
                                                        while( $_line3 = mysqli_fetch_array( $_query3 ) ){

                                                            $_id = $_line3['id_usuario'];
                                                            $_destinatario = $_line3['nome'];



                                            ?>
                                            <option value="<?php echo $_id; ?>"><?php echo $_destinatario; ?></option>
                                            <?php
                                                        }
                                                    }
                                                }
                                                $_sql = "SELECT status_direcionamento FROM direcionamento_de_mensagem WHERE id_direcionamento = '1'";
                                                $_query = mysqli_query( $_conexao , $_sql ) or die ( mysqli_error( $_conexao ) );
                                                while( $_line = mysqli_fetch_array( $_query ) ){
                                                    $_status = $_line['status_direcionamento'];
                                                    if($_status==true){
                                                        $_sql2 = "SELECT id_turma FROM professor_turma WHERE id_professor = '$_id_de'";
                                                        $_query2 = mysqli_query( $_conexao , $_sql2 ) or die ( mysqli_error( $_conexao ) );
                                                        while( $_line2 = mysqli_fetch_array( $_query2 ) ){
                                                            $_id_turma = $_line2['id_turma'];

                                                            $_sql3 = "SELECT id_aluno FROM aluno_turma WHERE id_turma = '$_id_turma'";

                                                            $_query3 = mysqli_query( $_conexao , $_sql3 ) or die ( mysqli_error( $_conexao ) );
                                                            while( $_line3 = mysqli_fetch_array( $_query3 ) ){

                                                                $_id_aluno = $_line3['id_aluno'];
                                                                $_sql4 = "SELECT * FROM usuario WHERE id_usuario = '$_id_aluno' AND excluido = '0'";
                                                                $_query4 = mysqli_query( $_conexao , $_sql4 ) or die ( mysqli_error( $_conexao ) );
                                                                while( $_line4 = mysqli_fetch_array( $_query4 ) ){
                                                                    $_id_usuario = $_line4['id_usuario'];
                                                                    $_nome = $_line4['nome'];
                                                                    $_sql5 = "SELECT id_responsavel FROM aluno_responsavel WHERE id_aluno = '$_id_usuario'";
                                                                    $_query5 = mysqli_query( $_conexao , $_sql5 ) or die ( mysqli_error( $_conexao ) );
                                                                    while( $_line5 = mysqli_fetch_array( $_query5 ) ){
                                                                        $_id_de = $_SESSION['usuarioId'];
                                                                        $_id_responsavel = $_line5['id_responsavel'];
                                                                        $_sql6 = "SELECT * FROM usuario WHERE id_usuario = '$_id_responsavel' AND NOT id_usuario = '$_id_de' AND excluido = '0'";
                                                                        $_query6 = mysqli_query( $_conexao , $_sql6 ) or die ( mysqli_error( $_conexao ) );
                                                                        while( $_line6 = mysqli_fetch_array( $_query6 ) ){
                                                                            $_id = $_line6['id_usuario'];
                                            ?>
                                            <option value="<?php echo $_id; ?>"><?php echo $_nome."(Responsável)"; ?></option>
                                            <?php
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                                $_id_de = $_SESSION['usuarioId']; 
                                                $_sql = "SELECT * FROM usuario WHERE id_tipo = '1' OR id_tipo = '5' OR id_tipo = '2' AND NOT id_usuario = '$_id_de' AND excluido = '0'";
                                                $_query = mysqli_query( $_conexao , $_sql ) or die ( mysqli_error( $_conexao ) );
                                                while( $_line = mysqli_fetch_array( $_query ) ){
                                                    $_id = $_line['id_usuario'];
                                                    $_nome = $_line['nome'];
                                            ?>
                                            <option value="<?php echo $_id; ?>"><?php echo $_nome; ?></option>
                                            <?php
                                                }
                                            ?>
                                            <?php
                                            }else if($_SESSION['usuarioNiveisAcessoId']==3){
                                                $_id = $_SESSION['usuarioId'];
                                                $_sql = "SELECT id_turma FROM aluno_turma WHERE id_aluno = '$_id'";
                                                $_query = mysqli_query( $_conexao , $_sql ) or die ( mysqli_error( $_conexao ) );
                                                while( $_line = mysqli_fetch_array( $_query ) ){
                                                    $_id_turma = $_line['id_turma'];
                                                    $_sql2 = "SELECT id_professor FROM professor_turma WHERE id_turma ='$_id_turma'";
                                                    $_query2 = mysqli_query( $_conexao , $_sql2 ) or die ( mysqli_error( $_conexao ) );
                                                    while( $_line2 = mysqli_fetch_array( $_query2 ) ){
                                                        $_id_professor = $_line2['id_professor'];
                                                        $_sql3 = "SELECT * FROM usuario WHERE id_usuario = '$_id_professor' AND excluido = '0'";
                                                        $_query3 = mysqli_query( $_conexao , $_sql3 ) or die ( mysqli_error( $_conexao ) );
                                                        while( $_line3 = mysqli_fetch_array( $_query3 ) ){
                                                            $_nome = $_line3['nome'];
                                            ?>
                                            <option value="<?php echo $_id_professor; ?>"><?php echo $_nome; ?></option>
                                            <?php
                                                        }
                                                    }
                                                }
                                            ?>
                                            <?php
                                                $_id_de = $_SESSION['usuarioId']; 
                                                $_sql = "SELECT * FROM usuario WHERE id_tipo = '1' OR id_tipo = '5' AND NOT id_usuario = '$_id_de' AND excluido = '0'";
                                                $_query = mysqli_query( $_conexao , $_sql ) or die ( mysqli_error( $_conexao ) );
                                                while( $_line = mysqli_fetch_array( $_query ) ){
                                                    $_id = $_line['id_usuario'];
                                                    $_nome = $_line['nome'];
                                            ?>
                                            <option value="<?php echo $_id; ?>"><?php echo $_nome; ?></option>
                                            <?php
                                                }
                                            }else if($_SESSION['usuarioNiveisAcessoId']==4){
                                                $_sql = "SELECT status_direcionamento FROM direcionamento_de_mensagem WHERE id_direcionamento = '2'";
                                                $_query = mysqli_query( $_conexao , $_sql ) or die ( mysqli_error( $_conexao ) );
                                                while( $_line = mysqli_fetch_array( $_query ) ){
                                                    $_direcionamento = $_line['status_direcionamento'];
                                                    $_id_responsavel = $_SESSION['usuarioId'];
                                                    if($_direcionamento == true){
                                                        $_sql2 = "SELECT id_aluno FROM aluno_responsavel WHERE id_responsavel = '$_id_responsavel'";
                                                        $_query2 = mysqli_query( $_conexao , $_sql2 ) or die ( mysqli_error( $_conexao ) );
                                                        while( $_line2 = mysqli_fetch_array( $_query2 ) ){
                                                            $_id = $_line2['id_aluno'];
                                                            $_sql3 = "SELECT * FROM aluno_turma WHERE id_aluno = '$_id'";
                                                            $_query3 = mysqli_query( $_conexao , $_sql3 ) or die ( mysqli_error( $_conexao ) );
                                                            while( $_line3 = mysqli_fetch_array( $_query3 ) ){
                                                                $_id_turma = $_line3['id_turma'];
                                                                $_sql4 = "SELECT id_professor FROM professor_turma WHERE id_turma ='$_id_turma'";
                                                                $_query4 = mysqli_query( $_conexao , $_sql4 ) or die ( mysqli_error( $_conexao ) );
                                                                while( $_line4 = mysqli_fetch_array( $_query4 ) ){
                                                                    $_id_professor = $_line4['id_professor'];
                                                                    $_sql5 = "SELECT * FROM usuario WHERE id_usuario = '$_id_professor' GROUP BY nome AND excluido = '0'";
                                                                    $_query5 = mysqli_query( $_conexao , $_sql5 ) or die ( mysqli_error( $_conexao ) );
                                                                    while( $_line5 = mysqli_fetch_array( $_query5 ) ){
                                                                        $_nome = $_line5['nome'];
                                                                        $_sql6 = "SELECT sigla_turma FROM turma WHERE id_turma = '$_id_turma'";
                                                                        $_query6 = mysqli_query( $_conexao , $_sql6 ) or die ( mysqli_error( $_conexao ) );
                                                                        while( $_line6 = mysqli_fetch_array( $_query6 ) ){
                                                                            $_sigla_turma = $_line6['sigla_turma'];
                                            ?>
                                            <option value="<?php echo $_id; ?>"><?php echo $_nome." - (".$_sigla_turma.")"; ?></option>
                                            <?php
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                                $_id_de = $_SESSION['usuarioId']; 
                                                $_sql = "SELECT * FROM usuario WHERE id_tipo = '1' OR id_tipo = '5' AND NOT id_usuario = '$_id_de' AND excluido = '0'";
                                                $_query = mysqli_query( $_conexao , $_sql ) or die ( mysqli_error( $_conexao ) );
                                                while( $_line = mysqli_fetch_array( $_query ) ){
                                                    $_id = $_line['id_usuario'];
                                                    $_nome = $_line['nome'];
                                            ?>
                                            <option value="<?php echo $_id; ?>"><?php echo $_nome; ?></option>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="help-info">Selecione para quem a mensagem será enviada</div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input class="form-control" name="assunto" required>
                                        <label class="form-label">Assunto</label>
                                    </div>
                                    <div class="help-info">Escreva o assunto da mensagem</div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <textarea name="mensagem" cols="30" rows="15"  class="form-control no-resize" required></textarea>
                                        <label class="form-label">Mensagem</label>
                                    </div>
                                    <div class="help-info">Escreva a mensagem</div>
                                </div>
                                <br>
                                <button name="enviar_mensagem" style="width: 100%;" type="submit" class="btn bg-red waves-effect">
                                    <i class="material-icons">email</i>
                                    <span>Enviar mensagem</span>
                                </button>
                            </form>
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

        <!-- Jquery Validation Plugin Css -->
        <script src="../plugins/jquery-validation/jquery.validate.js"></script>

        <!-- JQuery Steps Plugin Js -->
        <script src="../plugins/jquery-steps/jquery.steps.js"></script>

        <!-- Sweet Alert Plugin Js -->
        <script src="../plugins/sweetalert/sweetalert.min.js"></script>

        <!-- Waves Effect Plugin Js -->
        <script src="../plugins/node-waves/waves.js"></script>

        <!-- Multi Select Plugin Js -->
        <script src="../plugins/multi-select/js/jquery.multi-select.js"></script>

        <!-- Jquery Spinner Plugin Js -->
        <script src="../plugins/jquery-spinner/js/jquery.spinner.js"></script>

        <!-- noUISlider Plugin Js -->
        <script src="../plugins/nouislider/nouislider.js"></script>

        <!-- Custom Js -->
        <script src="../js/admin.js"></script>
        <script src="../js/pages/forms/form-validation.js"></script>
        <script src="../js/pages/forms/advanced-form-elements.js"></script>


        <!-- Demo Js -->
        <script src="../js/demo.js"></script>
    </body>

</html>