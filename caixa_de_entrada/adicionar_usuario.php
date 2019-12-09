<?php
include("../cab_menu.php");
include_once ("../configuracao/config.php");
session_start();

$_id_tipo = $_GET['id_tipo'];
if($_id_tipo < 1 || $_id_tipo > 5){
    exit('<script>location.href = "index.php"</script>');
}
if($_id_tipo == 1){
    $_titulo = "Direção";
}else if($_id_tipo ==2){
    $_titulo = "Professor";
}else if($_id_tipo == 3){
    $_titulo = "Aluno";
}else if($_id_tipo == 4){
    $_titulo = "Responsável";
}else if($_id_tipo == 5){
    $_titulo = "Biblioteca/Secretaria";
}

?>
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

        <script type="text/javascript">
            function mascara(t, mask){
                var i = t.value.length;
                var saida = mask.substring(1,0);
                var texto = mask.substring(i)
                if (texto.substring(0,1) != saida){
                    t.value += texto.substring(0,1);
                }
            }
        </script>
    </head>

    <body class="theme-red">

        <section class="content">
            <div class="container-fluid">

                <!-- Advanced Validation -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    <b><?php echo "Adicionar ".$_titulo ?></b>
                                </h2>
                            </div>
                            <div class="body">
                                <form id="form_advanced_validation" method="POST" action="gravar_adicionar_usuario.php">
                                    <input name="id_tipo" value="<?php echo $_id_tipo; ?>" style="display:none;">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="nome" value="<?php echo $_nome; ?>" required> 
                                            <label class="form-label">Nome</label>
                                        </div>
                                        <div class="help-info">Insina o nome do usuário</div>
                                    </div>

                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="cpf" maxlength="14" minlength="14" value="<?php echo $_cpf; ?>" onkeypress="mascara(this, '###.###.###-##')" maxlength="14" minlength="14" required>
                                            <label class="form-label">CPF</label>
                                        </div>
                                        <div class="help-info">Insira o CPF</div>
                                    </div>

                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="email" class="form-control" name="email" value="<?php echo $_email; ?>" required>
                                            <label class="form-label">E-mail</label>
                                        </div>
                                        <div class="help-info">Insira o E-mail</div>
                                    </div>
                                    <?php if($_id_tipo == 2){ ?>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label class="form-label">Turmas</label><br>
                                            <select name="array[]" class="form-control show-tick" data-live-search="true" data-actions-box="true" multiple>

                                                <?php 
                                                    $_sql = "SELECT * FROM turma";
                                                    $_query = mysqli_query( $_conexao , $_sql ) or die ( mysqli_error( ) );
                                                    while( $_line = mysqli_fetch_array( $_query ) ){
                                                        $_iContador = 0;
                                                        $_nome_turma = $_line['nome_turma'];
                                                        $_sigla_turma = $_line['sigla_turma'];
                                                        $_id_turma = $_line['id_turma'];
                                                ?>
                                                <option value="<?php echo $_id_turma; ?>"><?php echo $_nome_turma." - ".$_sigla_turma; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="help-info">Insira as turmas que o professor dara aula</div>
                                    </div>
                                    <?php }else if($_id_tipo == 3){ ?>

                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label class="form-label">Turmas</label><br>
                                            <select name="array[]" class="form-control show-tick" data-live-search="true" data-actions-box="true" multiple>

                                                <?php 
                                                    $_sql = "SELECT * FROM turma";
                                                    $_query = mysqli_query( $_conexao , $_sql ) or die ( mysqli_error( ) );
                                                    while( $_line = mysqli_fetch_array( $_query ) ){
                                                        $_iContador = 0;
                                                        $_nome_turma = $_line['nome_turma'];
                                                        $_sigla_turma = $_line['sigla_turma'];
                                                        $_id_turma = $_line['id_turma'];
                                                ?>
                                                <option value="<?php echo $_id_turma; ?>"><?php echo $_nome_turma." - ".$_sigla_turma; ?></option>
                                                <?php
                                                    } 
                                                ?>
                                            </select>
                                        </div>
                                        <div class="help-info">Insira as turmas que o aluno pertence</div>
                                    </div>

                                    <?php }else if($_id_tipo == 4){ ?>

                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label class="form-label">Responsável por</label><br>
                                            <select name="array[]" class="form-control show-tick" data-live-search="true" data-actions-box="true" multiple>

                                                <?php 
                                                    $_sql = "SELECT * FROM usuario WHERE id_tipo = '3' AND excluido = '0'";
                                                    $_query = mysqli_query( $_conexao , $_sql ) or die ( mysqli_error( ) );
                                                    while( $_line = mysqli_fetch_array( $_query ) ){
                                                        $_iContador = 0;
                                                        $_nome = $_line['nome'];
                                                        $_id_aluno = $_line['id_usuario'];
                                                ?>
                                                <option value="<?php echo $_id_aluno; ?>" ><?php echo $_nome; ?></option>
                                                <?php
    }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="help-info">Insira os filhos do responsável</div>
                                    </div>

                                    <?php } ?><br>
                                    <button style="width: 100%;" class="btn btn-primary waves-effect" type="submit">Concluir</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Advanced Validation -->

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