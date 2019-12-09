<?php
    include("../cab_menu.php");
    include_once ("../configuracao/config.php");
    session_start();

    $_id = $_SESSION['usuarioId'];
    $_sql = "SELECT * FROM usuario WHERE id_usuario = '$_id'";
    $_notificacao = $_SESSION['notificacao'];
    $_query = mysqli_query( $_conexao , $_sql ) or die ( mysqli_error( ) );
   
    while( $_line = mysqli_fetch_array( $_query ) ){ 
           $_nome = $_line['nome'];
           $_cpf = $_line['cpf'];
           $_email = $_line['email'];
           $_avatar = $_line['avatar'];
           $_id_tipo = $_line['id_tipo'];
?>

<html class="no-js">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
    
    <link rel="stylesheet" type="text/css" href="../css/normalize.css" />
    <link rel="stylesheet" type="text/css" href="../css/demo.css" />
    <link rel="stylesheet" type="text/css" href="../css/component.css" />
    <script>(function(e,t,n){var r=e.querySelectorAll("html")[0];r.className=r.className.replace(/(^|\s)no-js(\s|$)/,"$1js$2")})(document,window,0);</script>
</head>
    
    

<section class="content">
        <div class="container-fluid">
            <!-- Body Copy -->
            <div class="row clearfix">
                
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card" style="padding: 60px;">
                    
                         <div style="           width: 150px;
                                                height: 150px;
                                                margin-left:42%;
                                                margin-top:5px;
                                                border-radius: 50%;
                                                overflow: hidden;
                                                box-shadow: 3px 3px 5px #555;
                                                " class="foto">
                             <?php
                                if($_avatar==null){
                             ?>

                            <img src="../images/icone_aluno.png" width="150" height="150" alt="User" />

                            <?php
                                }else{
                            ?>

                             <img src="data:image/png;base64, <?php echo $_avatar; ?>" width="150px;" height="150" alt="User" />

                            <?php
                                }
                            ?>
                                 <div style="position: absolute; margin-top: -70px; margin-left: 70px;">
                                    <form action="mudafotoperfil.php" method="post" enctype="multipart/form-data">
                                        <input type="file" name="fileToUpload" id="file-5" class="inputfile inputfile-4" accept=".jpg, .png" size="2"/>
                                        <label for="file-5" style="width: 120px;"><figure ><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg></figure> <span style="color: #E53935; position: absolute;">Escolha uma foto&hellip;</span></label>
                                        <div style='top: 330px; left: 500px; z-index: 14; width: 100%; position: relative;'>
                                            <button style="position: fixed;" type="submit" class="btn bg-red btn-circle-lg waves-effect waves-circle waves-float" value="Convert Image to Data" name="submit">
                                                <i style="margin-top: -10px;" class="material-icons">save</i>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <br>
                            <div class="card" style="width: 50%; left:25%">
                                <h3 style="padding:10px; text-align:center;">
                                        <?php echo $_SESSION['usuarioNome'] ?>
                                </h3>
                            </div>
                        <div class="body">
                          
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="body table-responsive">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">Nome completo</th>
                                                        <td><?php echo $_nome; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">CPF</th>
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
                                                        <th scope="row">Turma - Curso</th>
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
                                                        <th scope="row">Turma - Curso</th>
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
    <?php
            }
         
    ?>
    <div class="body" style="position: relative; display:none;">
        <div class="row clearfix jsdemo-notification-button">
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-2">
                <button name="notificacao" id="notificacao" type="button" class="btn bg-red btn-block waves-effect" data-placement-from="bottom" data-placement-align="right"
                        data-animate-enter="" data-animate-exit="" data-color-name="bg-red">
                </button>
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

    <!-- Custom Js -->
    <script src="../js/admin.js"></script>

    <!-- Demo Js -->
    <script src="../js/demo.js"></script>

    <script src="../js/custom-file-input.js"></script>
    
    <!-- Bootstrap Notify Plugin Js -->
    <script src="../plugins/bootstrap-notify/bootstrap-notify.js"></script>
    <?php
      if($_notificacao == 1){  
    ?>
    <script src="../js/pages/ui/notifications_mensagem_enviada.js"></script>
    <?php
      }else if($_notificacao == 2){
    ?>
    <script src="../js/pages/ui/notifications_mensagem_favoritada.js"></script>
    <?php }else if($_notificacao ==3){
    ?>
    <script src="../js/pages/ui/notifications_mensagem_desfavoritada.js"></script>
    <?php }else if($_notificacao ==4){
    ?>
    <script src="../js/pages/ui/notifications_mensagem_excluida.js"></script>
    <?php }else if($_notificacao ==5){
    ?>
    <script src="../js/pages/ui/notifications_mensagem_desarquivada.js"></script>
    <?php }else if($_notificacao ==6){
    ?>
    <script src="../js/pages/ui/notifications_mensagem_recuperada.js"></script>
    <?php }else if($_notificacao ==7){
    ?>
    <script src="../js/pages/ui/notifications_adicionar_turma.js"></script>
    <?php }else if($_notificacao ==8){
    ?>
    <script src="../js/pages/ui/notifications_adicionar_usuario.js"></script>
    <?php }else if($_notificacao ==9){
    ?>
    <script src="../js/pages/ui/notifications_adicionar_album.js"></script>
    <?php }else if($_notificacao ==10){
    ?>
    <script src="../js/pages/ui/notifications_album_editado.js"></script>
    <?php }else if($_notificacao ==11){
    ?>
    <script src="../js/pages/ui/notifications_album_excluido.js"></script>
    <?php }else if($_notificacao ==12){
    ?>
    <script src="../js/pages/ui/notifications_foto_alterada.js"></script>
    <?php }else if($_notificacao ==13){
    ?>
    <script src="../js/pages/ui/notifications_senha_redefinida.js"></script>
    <?php }else if($_notificacao ==14){
    ?>
    <script src="../js/pages/ui/notifications_turma_editada.js"></script>
    <?php }else if($_notificacao ==15){
    ?>
    <script src="../js/pages/ui/notifications_usuario_editado.js"></script>
    <?php } unset($_SESSION['notificacao']);?>
    <script type="text/javascript">
        $(document).ready(function(){ // ao término do carregamento do arquivo
              $('#notificacao').click(); // disparar o click de determinado elemento
              $(this).scrollTop(); // scroll para o topo, pode ser necessário adequar o seletor, ou seja, em vez de $(this), $(window)... ou outro...
            });
    </script>
    
</html>