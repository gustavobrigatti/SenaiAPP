<?php
    include("../cab_menu.php");
    include_once ("../configuracao/config.php");
    session_start();

    $_id = $_POST['id_de'];

    $_sql = "SELECT * FROM usuario WHERE id_usuario = '$_id'";


    $_query = mysqli_query( $_conexao , $_sql ) or die ( mysqli_error( ) );
   
    while( $_line = mysqli_fetch_array( $_query ) )
        { 
           $_nome = $_line['nome'];
           $_cpf = $_line['cpf'];
           $_email = $_line['email'];
           $_avatar = $_line['avatar'];
           $_telefone = $_line['telefone'];
           $_id_tipo = $_line['id_tipo'];
    
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
</head>
    
    

<section class="content">
        <div class="container-fluid">
            <!-- Body Copy -->
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
                            
                        </div>
                       
                        <div class="body">
                          
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="card">
                                        <div class="header">
                                            <h2>
                                                Informações de perfil
                                            </h2>
                                            
                                            <?php if($_SESSION['usuarioNiveisAcessoId'] == "1"){ ?>
                                           <ul class="header-dropdown m-r--5">
                                                <li class="dropdown">
                                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                                        <i class="material-icons">more_vert</i>
                                                    </a>
                                                    <ul class="dropdown-menu pull-right">
                                                        
                                                        <form method="post" action="editar_perfil.php" name="formatualizar">
                                     
                                                          <input type="hidden" name="id" value="<?php echo $_id; ?>">

                                                         <button style="

                                                              width: 100%;                  
                                                              border: 0px solid #fff;
                                                              border-radius: 8px;
                                                              background-color: #fff !important;                       


                                                                                 " name="confirma" type="submit" value="Favoritar">
                                                             Editar usuario

                                                                </button>

                                                            </form> 
                                                        
                                                        
                                                    </ul>
                                                </li>
                                            </ul>
                                            <?php } ?>
                                        </div>
                                        <div class="body table-responsive">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">Nome completo</th>
                                                        <td><?php echo $_nome; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Cpf</th>
                                                        <td><?php echo $_cpf; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">E-mail</th>
                                                        <td><?php echo $_email; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Tipo</th>
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
                                                    </tr>
                                                    
                                                    <?php if($_id_tipo == 2){
                                                        $_iContador = 0;
                                                        $_sigla_turma = "";
                                                        $_sql2 = "SELECT id_turma FROM professor_turma WHERE id_professor = '$_id' ";
                                                        $_query2 = mysqli_query( $_conexao , $_sql2 ) or die ( mysqli_error( ) );
                                                        while( $_line2 = mysqli_fetch_array( $_query2 ) ){
                                                            $_id_turma = $_line2['id_turma'];
                                                            $_sql3 = "SELECT sigla_turma FROM turma WHERE id_turma = '$_id_turma' ";
                                                            $_query3 = mysqli_query( $_conexao , $_sql3 ) or die ( mysqli_error( ) );
                                                            while( $_line3 = mysqli_fetch_array( $_query3 ) ){
                                                                if($_iContador > 0){
                                                                    $_sigla_turma = $_sigla_turma.", ";
                                                                }
                                                                $_sigla_turma = $_sigla_turma.$_line3['sigla_turma'];
                                                                $_iContador++;
                                                            }
                                                        }
                                                    ?>
                                                    <tr>
                                                        <th scope="row">Turma</th>
                                                        <td><?php echo $_sigla_turma; ?></td>
                                                    </tr>
                                                    <?php }else if($_id_tipo == 3){
                                                        $_sql2 = "SELECT id_turma FROM aluno_turma WHERE id_aluno = '$_id' ";
                                                        $_query2 = mysqli_query( $_conexao , $_sql2 ) or die ( mysqli_error( ) );
                                                        while( $_line2 = mysqli_fetch_array( $_query2 ) ){
                                                            $_id_turma = $_line2['id_turma'];
                                                            $_sql3 = "SELECT sigla_turma FROM turma WHERE id_turma = '$_id_turma' ";
                                                            $_query3 = mysqli_query( $_conexao , $_sql3 ) or die ( mysqli_error( ) );
                                                            while( $_line3 = mysqli_fetch_array( $_query3 ) ){
                                                                $_sigla_turma = $_line3['sigla_turma'];
                                                            }
                                                        }
                                                    ?>
                                                    <tr>
                                                        <th scope="row">Turma</th>
                                                        <td><?php echo $_sigla_turma; ?></td>
                                                    </tr>
                                                    
                                                    <?php }else if($_id_tipo == 4){
                                                        $_iContador = 0;
                                                        $_sigla_turma = "";
                                                        $_sql2 = "SELECT id_aluno FROM aluno_responsavel WHERE id_responsavel = '$_id'";
                                                        $_query2 = mysqli_query( $_conexao , $_sql2 ) or die ( mysqli_error( ) );
                                                        while( $_line2 = mysqli_fetch_array( $_query2 ) ){
                                                            $_id_aluno = $_line2['id_aluno'];
                                                            $_sql3 = "SELECT id_turma FROM aluno_turma WHERE id_aluno = '$_id_aluno' ";
                                                            $_query3 = mysqli_query( $_conexao , $_sql3 ) or die ( mysqli_error( ) );
                                                            while( $_line3 = mysqli_fetch_array( $_query3 ) ){
                                                                $_id_turma = $_line3['id_turma'];
                                                                $_sql4 = "SELECT sigla_turma FROM turma WHERE id_turma = '$_id_turma' ";
                                                                $_query4 = mysqli_query( $_conexao , $_sql4 ) or die ( mysqli_error( ) );
                                                                while( $_line4 = mysqli_fetch_array( $_query4 ) ){
                                                                    $_sql5 = "SELECT nome FROM usuario WHERE id_usuario = '$_id_aluno'";
                                                                    $_query5 = mysqli_query( $_conexao , $_sql5 ) or die ( mysqli_error( ) );
                                                                    while( $_line5 = mysqli_fetch_array( $_query5 ) ){
                                                                        if($_iContador > 0){
                                                                            $_sigla_turma = $_sigla_turma.", ";
                                                                        }
                                                                        $_nome_turma = $_line5['nome']." - ".$_line4['sigla_turma'];
                                                                        $_sigla_turma = $_sigla_turma.$_nome_turma;
                                                                        $_iContador++;
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    ?>
                                                    <tr>
                                                        <th scope="row">Responsável por</th>
                                                        <td><?php echo $_sigla_turma; ?></td>
                                                    </tr>
                                                    <?php } ?>
                                                    
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- #END# Basic Table -->
                            
                        </div>
                        
                        <hr>
                        
                        
                         
                    </div>
                    
                    
                </div>
            </div>
    </div>
    <?php
            }   
    ?>
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

    <!-- Custom Js -->
    <script src="../js/admin.js"></script>

    <!-- Demo Js -->
    <script src="../js/demo.js"></script>
    
</html>


                                                        