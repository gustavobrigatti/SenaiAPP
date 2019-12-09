<!DOCTYPE html>
<?php
session_start();
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

    <!-- Custom Css -->
    <link href="../css/style.css" rel="stylesheet">
    
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

<body class="login-page" style="background: #E53925;">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">Senai<b>APP</b></a>
            <small>A facilidade em suas mãos</small>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_in" method="POST" action="../valida.php">
                    <div class="msg">Acesse usando suas informações</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="cpf" placeholder="CPF" onkeypress="mascara(this, '###.###.###-##')" maxlength="14" minlength="14" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="senha" placeholder="Senha" required>
                        </div>
                    </div>
                    <div class="row m-t-15 m-b--20">
                        <div class="col-xs-6">
                            <a style="color: #E53935;">
                            
                                <?php
                                    if(isset($_SESSION['loginErro'])){
                                        echo $_SESSION['loginErro'];
                                        unset($_SESSION['loginErro']);
                                    }
                                    if(isset($_SESSION['logindeslogado'])){
                                        echo $_SESSION['logindeslogado'];
                                        unset($_SESSION['logindeslogado']);
                                    }
                                ?>
                            </a>
                        </div>
                        <div class="col-xs-6 align-right">
                            <div class="demo js-modal-buttons">
                                <a data-color="red" class="btn" style="color: #E53935; background: #00000000;  margin-top: -15px; box-shadow: 0px 0px 0px #00000000;"><u><i><font size="3px">Esqueceu a senha ?</font></i></u></a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5" style="background: #00000000; color: #00000000;">
                            <input type="hidden" name="rememberme" id="rememberme" class="filled-in chk-col-pink">
                            <label for="rememberme"></label>
                        </div>
                        <div class="col-xs-4">
                            <br>
                            <button class="btn btn-block waves-effect" type="submit" style="background: #E53935; color: #fff;">ENTRAR</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
        <div class="modal fade" id="mdModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header"><center>
                        <h4 class="modal-title" id="defaultModalLabel">
                            Esqueceu a senha ?
                        </h4></center>
                    </div>
                    <div class="modal-body">
                       <center>Se a senha ainda não foi alterada, ela será as 4 primeiras letras do seu nome (todas minúsculas), junto com os 4 primeiros dígitos do seu CPF, exemplo: gust1234.<br><br>Para redefinir sua senha, vá até a biblioteca da escola.</center>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">OK</button>
                    </div>
                </div>
            </div>
        </div>

    <!-- Jquery Core Js -->
    <script src="../plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="../plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="../plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="../plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="../js/admin.js"></script>
    <script src="../js/pages/examples/sign-in.js"></script>
    
    <script type="text/javascript" src="../entrar/assets/js/jquery.backstretch.min.js"></script>


    <script src="../js/pages/ui/modals.js"></script>

</body>

</html>