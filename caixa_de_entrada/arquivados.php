<!DOCTYPE html>

<?php
    include("../cab_menu.php");
    include_once ("../configuracao/config.php");
    session_start();
    $_notificacao = $_SESSION['notificacao'];
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
<body style="max-width: 100%; overflow-x: hidden;">
<section class="content">
<!-- Contextual Classes With Linked Items -->
            <div  class="row clearfix" >
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
                    <div class="card">
                        <div class="header">
                            <h2>
                                 Caixa de Entrada | Arquivadas
                            </h2>
                           <br>
                        </div>
                        <div class="body" ><br>
                            
                            
                            
                            
<?php
    session_start();
    include_once( "configuracao/conecta.php" );
    include_once( "configuracao/css_js.php" );
                    
    $_nome = $_SESSION['usuarioNome']; 
    $_iContador = 0;
    $_sql = "SELECT * FROM mensagem ORDER BY id_mensagem desc";

    $_query = mysqli_query( $_conexao , $_sql ) or die ( mysqli_error( $_conexao ) );
                        
        while( $_line = mysqli_fetch_array( $_query ) )
        { 
            $_pegapara = $_line['id_para'];
            $_pegade = $_line['id_de'];
            $_data_hora = $_line['dia_hora'];
            $_status = $_line['status'];
            $_favoritar = $_line['favoritar'];
            $_excluir = $_line['lixeira'];
            $_assunto = $_line['assunto'];
            $_texto = $_line['texto'];
            $_arquivar = $_line['arquivar'];
            $_id_mensagem = $_line['id_mensagem'];
            
            
            $_sql2 = "SELECT * FROM usuario WHERE id_usuario = '$_pegade'";
            $_query2 = mysqli_query( $_conexao , $_sql2 ) or die ( mysqli_error( $_conexao ) );
            
        while( $_line = mysqli_fetch_array( $_query2 ) )
        { 
           $_nome = $_line['nome'];
           $_avatar = $_line['avatar'];
            
        }
            
             
           if($_pegade == $_SESSION['usuarioId']){
              
           }else{
                
                    if($_pegapara == $_SESSION['usuarioId']){
                        if($_arquivar== false){
                            
                        }else{
                            $_iContador++;
?>                      
                    <div class="list-group" style="margin-top:-21px;">     
                        <form method="post" action="ver_mensagem.php" name="formatualizar">
                               <button style="                  
                                              width: 100%;                  
                                              border: 0px solid #fff;
                                              border-radius: 8px;
                                              background-color: #fff !important;                       
                                                                 
                                                                 
                                                                 "> 
                                   
                         <?php
                        
                                if($_status == true){
                                      
                        ?>          
                                   
                                   
                                <a class="list-group-item" style="
                                                   background: #ededed;
                                                   ">
                                    
                                  
                          <?php
                                }else{
                          ?>
                              
                              
                                 <a class="list-group-item">
                              
                              
                           <?php
                                }
                            ?>
                                      
                                          <input type="hidden" name="id" value="<?php echo $_id_mensagem; ?>">
                                    
                                    
                                    
                                     <?php
                                
                                            if($_avatar == null){
                                                      
                                
                                     ?>
                                     
                                     <div style="position: absolute; 
                                                margin-top: 20px;
                                                margin-left: 12px;
                                                border-radius: 50%;
                                                overflow: hidden;
                                                box-shadow: 3px 3px 5px #555;
                                                width: 60px;
                                                height: 60px;
                                                " class="foto"><img width="60px" height="60px" src="../images/icone_aluno.png"></div>
                                    
                                    
                                    <?php
                                                
                                            }else{
                                    ?>
                                     
                                     <div style="position: absolute; 
                                                margin-top: 20px;
                                                margin-left: 12px;
                                                border-radius: 50%;
                                                overflow: hidden;
                                                box-shadow: 3px 3px 5px #555;
                                                width: 60px;
                                                height: 60px;
                                                " class="foto"><img width="60px" height="60px" src="data:image/png;base64, <?php echo $_avatar; ?>"></div>
                                     
                                    <?php
                                            }
                                    ?>
                                        
                                        <?php
                        
                                                if($_status == true){
                                        
                                    
                                         ?>     
                                     <table width="100%">   
                                         <td>
                                            <p style="margin: 0px 0px 0px 100px;
                                                width: 50%;
                                                align: left;
                                                font-size: 17px;">
                                                     <?php echo $_nome;?>


                                            </p>
                                            
                                        </td>
                                         <td width="20%">
                                                    <div class="test" >

                                                           <?php echo $_data_hora; ?>

                                                    </div>
                                            </td>
                                         <td  width="3%">
                                             
                                             <?php
                                                if($_favoritar==true){       
                                             ?>
                                             
                                            <div>
                                                             
                                                        <i class="material-icons" style="color: #FBC02D;">star</i>
                                             </div>
                                             <?php
                                                }else{
                                              ?>
                                             <div>
                                                
                                                
                                                     <i class="material-icons">star_border</i>
                                                    
                                            </div>
                                             
                                             
                                             <?php
                                                }
                                             ?>
                                             
                                         </td>
                                            
                                     </table>
                                    
                                        <?php
                                                }else{
                                        ?>
                                                
                                                
                                            <table width="100%">   
                                         <td>
                                            <p style="margin: 0px 0px 0px 100px;
                                                width: 100%;
                                                align: left;
                                                font-size: 17px;">
                                                
                                                     <?php echo $_nome;?>


                                            </p>
                                            
                                        </td>
                                         <td width="20%">
                                                    <div class="test" >

                                                           <?php echo $_data_hora; ?>

                                                    </div>
                                            </td>
                                         <td  width="3%">
                                             
                                             <?php
                                                if($_favoritar==true){       
                                             ?>
                                             
                                            <div>
                                                                    <i class="material-icons" style="color: #FBC02D;">star</i>
                                                                
                                            </div>
                                             <?php
                                                }else{
                                              ?>
                                             <div>
                                                              <i class="material-icons">star_border</i>
                                            </div>
                                             
                                             
                                             <?php
                                                }
                                             ?>
                                         </td>
                                            
                                     </table>
                                    
                                    
                                                
                                        <?php
                                                }
                                        ?>
                                            
                                            
                                    
                                    <p style="margin: 0px 100px 0px 90px;
                                                width: 100%;
                                                align: left;
                                                padding: 10px;
                                                font: 12px;
                                                align: left;">
                                    
                                    
                                    <?php echo $_assunto; ?>
                                    
                                    </p>
                                    
                                    <p style="margin: 0px 0px 0px 90px;
                                                width: 85%;
                                                align: left;
                                                padding: 10px;
                                                font: 12px;
                                                align: left;">
                                        
                                         <?php echo mb_strimwidth( $_texto , 0, 40, "..."); ?>
                                        
                                    </p>
                                </a>
                                   </button>
                            </form>
                        
                                <!--
                                <a href="javascript:void(0);" class="list-group-item active">
                                    <h4 class="list-group-item-heading">List group item heading</h4>
                                    <p class="list-group-item-text">
                                        Lorem ipsum dolor sit amet, ut duo atqui exerci dicunt, ius impedit mediocritatem an. Pri ut tation electram moderatius.
                                        Per te suavitate democritum. Duis nemore probatus ne quo, ad liber essent aliquid
                                        pro. Et eos nusquam accumsan, vide mentitum fabellas ne est, eu munere gubergren
                                        sadipscing mel.
                                    </p>
                                </a> -->
                               
                            </div>
                             <?php
                        }
                        }
                
        }
        
    }

        ?>
                        <?php if($_iContador <=0){ ?>
                           <center><h4> Não há mensagens para exibir. </h4></center>
                        <?php } ?>
                        </div>
                    </div>
                </div>
                    <div class="body" style="position: relative; display:none;">
        <div class="row clearfix jsdemo-notification-button">
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-2">
                <button name="notificacao" id="notificacao" type="button" class="btn bg-red btn-block waves-effect" data-placement-from="bottom" data-placement-align="right"
                        data-animate-enter="" data-animate-exit="" data-color-name="bg-red">
                </button>
            </div>
        </div>
    </div>
                    </selection>
            <!-- #END# Contextual Classes With Linked Items -->
    </div>
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
    <script src="../js/pages/ui/notifications_desarquivar.js"></script>
    <?php }else if($_notificacao ==18){
    ?>
    <script src="../js/pages/ui/notifications_arquivar.js"></script>
    <?php } unset($_SESSION['notificacao']);?>
    <script type="text/javascript">
        $(document).ready(function(){ // ao término do carregamento do arquivo
              $('#notificacao').click(); // disparar o click de determinado elemento
              $(this).scrollTop(); // scroll para o topo, pode ser necessário adequar o seletor, ou seja, em vez de $(this), $(window)... ou outro...
            });
    </script>
</body>

</html>