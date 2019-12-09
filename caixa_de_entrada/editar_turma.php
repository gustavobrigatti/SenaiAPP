<!DOCTYPE html>
<?php
    include("../cab_menu.php");
    include_once ("../configuracao/config.php");
    session_start();

    $_id_turma = $_POST['id'];
    $_sql = "SELECT * FROM turma WHERE id_turma = '$_id_turma' ";
    $_query = mysqli_query( $_conexao , $_sql ) or die ( mysqli_error( ) );
   
    while( $_line = mysqli_fetch_array( $_query ) ){
    
           $_nome_turma = $_line['nome_turma'];
           $_sigla_turma = $_line['sigla_turma'];
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
</head>

<body class="theme-red">
    
    <section class="content">
        <div class="container-fluid">
           
            <!-- Advanced Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2><?php echo $_nome_turma." - ".$_sigla_turma; ?> </h2>
                        </div>
                        <div class="body">
                            <form id="form_advanced_validation" method="POST" action="gravar_edita_turma.php">
                                <input name="id_turma" value="<?php echo $_id_turma; ?>" style="display:none;">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="curso" value="<?php echo $_nome_turma; ?>" required> 
                                        <label class="form-label">Curso</label>
                                    </div>
                                    <div class="help-info">Insira o nome do curso</div>
                                </div>
                                
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="sigla" maxlength="3" minlength="3" value="<?php echo $_sigla_turma; ?>" required>
                                        <label class="form-label">Sigla</label>
                                    </div>
                                    <div class="help-info">Insira a sigla da turma</div>
                                </div>
                                
                                 <div class="form-group form-float">
                                    <div class="form-line">
                                        <label class="form-label">Professores</label><br>
                                        <select name="professores[]" class="form-control show-tick" data-live-search="true" data-actions-box="true" multiple>
                                            
                                                <?php 
                                                    $_sql = "SELECT * FROM usuario WHERE id_tipo = '2' AND excluido = '0'";
                                                    $_query = mysqli_query( $_conexao , $_sql ) or die ( mysqli_error( ) );
                                                    while( $_line = mysqli_fetch_array( $_query ) ){
                                                        $_iContador = 0;
                                                        $_nome = $_line['nome'];
                                                        $_id_usuario = $_line['id_usuario'];
                                                        $_sql2 = "SELECT id_professor FROM professor_turma WHERE id_turma = '$_id_turma'";
                                                        $_query2 = mysqli_query( $_conexao , $_sql2 ) or die ( mysqli_error( ) );
                                                        while( $_line2 = mysqli_fetch_array( $_query2 ) ){
                                                            $_id_professor = $_line2['id_professor'];
                                                            if($_id_usuario == $_id_professor){
                                                                $_iContador++;
                                                            }
                                                        }
                                                        if($_iContador > 0){
                                                ?>
                                                 <option value="<?php echo $_id_usuario; ?>" selected><?php echo $_nome; ?></option>
                                                <?php
                                                        }else{
                                                ?>
                                                <option value="<?php echo $_id_usuario; ?>"><?php echo $_nome; ?></option>
                                                <?php
                                                        }
                                                    }
                                                ?>
                                        </select>
                                     </div>
                                    <div class="help-info">Insira os professores da turma</div>
                                </div>
                                
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <label class="form-label">Alunos</label><br>
                                        <select name="alunos[]" class="form-control show-tick" data-live-search="true" data-actions-box="true" multiple>
                                                 <?php 
                                                    $_sql = "SELECT * FROM usuario WHERE id_tipo = '3' AND excluido = '0'";
                                                    $_query = mysqli_query( $_conexao , $_sql ) or die ( mysqli_error( ) );
                                                    while( $_line = mysqli_fetch_array( $_query ) ){
                                                        $_iContador = 0;
                                                        $_nome = $_line['nome'];
                                                        $_id_usuario = $_line['id_usuario'];
                                                        $_sql2 = "SELECT id_aluno FROM aluno_turma WHERE id_turma = '$_id_turma'";
                                                        $_query2 = mysqli_query( $_conexao , $_sql2 ) or die ( mysqli_error( ) );
                                                        while( $_line2 = mysqli_fetch_array( $_query2 ) ){
                                                            $_id_aluno = $_line2['id_aluno'];
                                                            if($_id_usuario == $_id_aluno){
                                                                $_iContador++;
                                                            }
                                                        }
                                                        if($_iContador > 0){
                                                ?>
                                                 <option value="<?php echo $_id_usuario; ?>" selected><?php echo $_nome; ?></option>
                                                <?php
                                                        }else{
                                                ?>
                                                <option value="<?php echo $_id_usuario; ?>"><?php echo $_nome; ?></option>
                                                <?php
                                                        }
                                                    }
                                                ?>
                                        </select>
                                     </div>
                                    <div class="help-info">Insira os alunos da turma</div>
                                </div>
                                
                                <br>
                                
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