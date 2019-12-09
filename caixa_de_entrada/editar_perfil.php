<?php
    include("../cab_menu.php");
    include_once ("../configuracao/config.php");
    session_start();

    $_id = $_POST['id'];
    $_sql = "SELECT * FROM usuario WHERE id_usuario = '$_id'";


    $_query = mysqli_query( $_conexao , $_sql ) or die ( mysqli_error( ) );
   
    while( $_line = mysqli_fetch_array( $_query ) ){
           $_nome = $_line['nome'];
           $_cpf = $_line['cpf'];
           $_email = $_line['email'];
           $_avatar = $_line['avatar'];
           $_id_tipo = $_line['id_tipo'];
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
                        <div style="position: absolute; 
                                                margin-top: 5px;
                                                margin-left: 15px;
                                                border-radius: 50%;
                                                overflow: hidden;
                                                box-shadow: 3px 3px 5px #555;
                                                
                                                
                                                " class="foto">
                             <?php
                                if($_avatar==null){
                             ?>

                            <img src="../images/icone_aluno.png" width="50" height="50" alt="User" />

                            <?php
                                }else{
                            ?>

                             <img src="data:image/png;base64, <?php echo $_avatar; ?>" width="50" height="50" alt="User" />

                            <?php
                                }
                            ?>
                             
                        </div> 
                        <div class="header">
                            <h2 style="margin-left: 60px; margin-top: 5px;">
                                <b><?php echo $_nome; ?></b>
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <form name="redefinir_senha" action="redefinir_senha.php" method="post">
                                            <input name="id_usuario" value="<?php echo $_id; ?>" style="display: none;">
                                            <button style="
                                                                 
                                              width: 100%;                  
                                              border: 0px solid #fff;
                                              border-radius: 8px;
                                              background: #00000000 !important;                        
                                                                 
                                                                 
                                                                 " name="confirma" type="submit" value="Favoritar">
                                                Redefinir senha
                                             
                                                </button>
                                        </form>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <form id="form_advanced_validation" method="POST" action="gravar_edita_perfil.php">
                                <input name="id" value="<?php echo $_id; ?>" style="display:none;">
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
                                        <input type="text" class="form-control" name="cpf" placeholder="CPF" onkeypress="mascara(this, '###.###.###-##')" maxlength="14" minlength="14" value="<?php echo $_cpf; ?>" required>
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

                                                        $_sql2 = "SELECT id_turma FROM professor_turma WHERE id_professor = '$_id'";
                                                        $_query2 = mysqli_query( $_conexao , $_sql2 ) or die ( mysqli_error( ) );
                                                        while( $_line2 = mysqli_fetch_array( $_query2 ) ){
                                                            $_id_turma_professor = $_line2['id_turma'];
                                                            if($_id_turma == $_id_turma_professor){
                                                                $_iContador++;
                                                            }
                                                        }
                                                        if($_iContador > 0){
                                                ?>
                                                 <option value="<?php echo $_id_turma; ?>" selected><?php echo $_nome_turma." - ".$_sigla_turma; ?></option>
                                                <?php
                                                        }else{
                                                ?>
                                                <option value="<?php echo $_id_turma; ?>"><?php echo $_nome_turma." - ".$_sigla_turma; ?></option>
                                                <?php
                                                        }
                                                    }
                                                ?>
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

                                                        $_sql2 = "SELECT id_turma FROM aluno_turma WHERE id_aluno = '$_id' ";
                                                        $_query2 = mysqli_query( $_conexao , $_sql2 ) or die ( mysqli_error( ) );
                                                        while( $_line2 = mysqli_fetch_array( $_query2 ) ){
                                                            $_id_turma_aluno = $_line2['id_turma'];
                                                            if($_id_turma == $_id_turma_aluno){
                                                                $_iContador++;
                                                            }
                                                        }
                                                        if($_iContador > 0){
                                                ?>
                                                 <option value="<?php echo $_id_turma; ?>" selected><?php echo $_nome_turma." - ".$_sigla_turma; ?></option>
                                                <?php
                                                        }else{
                                                ?>
                                                <option value="<?php echo $_id_turma; ?>"><?php echo $_nome_turma." - ".$_sigla_turma; ?></option>
                                                <?php
                                                        }
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
                                                    $_sql = "SELECT * FROM usuario WHERE id_tipo = '3'";
                                                    $_query = mysqli_query( $_conexao , $_sql ) or die ( mysqli_error( ) );
                                                    while( $_line = mysqli_fetch_array( $_query ) ){
                                                        $_iContador = 0;
                                                        $_nome = $_line['nome'];
                                                        $_id_aluno = $_line['id_usuario'];

                                                        $_sql2 = "SELECT id_aluno FROM aluno_responsavel WHERE id_responsavel = '$_id'";
                                                        $_query2 = mysqli_query( $_conexao , $_sql2 ) or die ( mysqli_error( ) );
                                                        while( $_line2 = mysqli_fetch_array( $_query2 ) ){
                                                            $_id_aluno2 = $_line2['id_aluno'];
                                                            if($_id_aluno == $_id_aluno2){
                                                                $_iContador++;
                                                            }
                                                        }
                                                        if($_iContador > 0){
                                                ?>
                                                 <option value="<?php echo $_id_aluno; ?>" selected><?php echo $_nome; ?></option>
                                                <?php
                                                        }else{
                                                ?>
                                                <option value="<?php echo $_id_aluno; ?>"><?php echo $_nome; ?></option>
                                                <?php
                                                        }
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
    
    <script type="text/javascript" src="../entrar/assets/js/jquery.backstretch.min.js"></script>
    

    <!-- Demo Js -->
    <script src="../js/demo.js"></script>
</body>

</html>