<?php
    include("../cab_menu.php");
    include_once ("../configuracao/config.php");
    session_start();
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

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-red">
    <section class="content">
        <!-- Advanced Form Example With Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <?php
                        if($_SESSION['status_senha'] == 2){
                    ?>
                    <div class="body">
                            <div class="alert alert-success">
                                <strong>Parabéns!</strong> Sua senha foi alterada com sucesso!.
                            </div>
                    </div>
                    <?php
                        }
                    ?>
                    <div class="card">
                        <div class="header">
                            <h2>Alterar senha</h2>
                        </div>
                        <div class="body">
                            <form name="alterar_senha" method="POST" action="gravar_altera_senha.php">
                                <fieldset>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="password" class="form-control" name="senha_atual" required>
                                            <label class="form-label">Senha atual</label>
                                        </div>
                                        <?php
                                            if($_SESSION['status_senha'] == 1){
                                        ?>
                                        <div class="help-info" style="color: #E53935;">SENHA ATUAL INCORRETA</div>
                                        <?php
                                            }
                                            unset($_SESSION['status_senha']);
                                        ?>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="password" class="form-control" name="password" id="password" required>
                                            <label class="form-label">Nova senha</label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="password" class="form-control" name="confirm" id="confirm" required>
                                            <label class="form-label">Confirmar nova senha</label>
                                        </div>
                                    </div>
                                    <script>
                                        var password = document.getElementById("password"),
                                            confirm_password = document.getElementById("confirm");
                                        function validatePassword(){
                                            if(password.value != confirm_password.value){
                                                confirm_password.setCustomValidity("As senhas não correspondem");
                                            }else{
                                                confirm_password.setCustomValidity('');
                                            }
                                        }
                                        password.onchange = validatePassword;
                                        confirm_password.onkeyup = validatePassword;
                                    </script>
                                    <button name="enviar_mensagem" style="width: 100%;" type="submit" class="btn bg-red waves-effect">
                                    <i class="material-icons">save</i>
                                    <span>Alterar senha</span>
                                    </button>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Advanced Form Example With Validation -->
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

    <!-- Custom Js -->
    <script src="../js/admin.js"></script>
    <script src="../js/pages/forms/form-wizard.js"></script>

    <!-- Demo Js -->
    <script src="../js/demo.js"></script>
</body>

</html>