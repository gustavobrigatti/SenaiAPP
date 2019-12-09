<?php
    include("../cab_menu.php");
    include_once ("../configuracao/config.php");
    session_start();

    $_id = $_POST['id'];
    $_SESSION['id_mensagem'] = $_id;
    
    $_sql = "SELECT * FROM mensagem WHERE id_mensagem = '$_id'";


    $_query = mysqli_query( $_conexao , $_sql ) or die ( mysqli_error( ) );
   
    while( $_line = mysqli_fetch_array( $_query ) )
        { 
           $_id_para = $_line['id_para'];
           $_id_de = $_line['id_de'];
           $_assunto = $_line['assunto'];
           $_texto = $_line['texto'];
           $_texto = nl2br($_texto);
           $_status = $_line['status'];
           $_excluido = $_line['lixeira'];
           $_favoritar = $_line['favoritar'];
           $_dia_hora = $_line['dia_hora'];
           $_arquivado = $_line['arquivar'];
            
        }


    $_sql2 = "SELECT * FROM usuario WHERE id_usuario = '$_id_de'";


    $_query2 = mysqli_query( $_conexao , $_sql2 ) or die ( mysqli_error( ) );
   
    while( $_line = mysqli_fetch_array( $_query2 ) )
        { 
           $_nome_de = $_line['nome'];
           $_avatar = $_line['avatar'];
            
        }


    if($_id_de==$_SESSION['usuarioId']){
    }else{
        $_sql3 = "UPDATE mensagem SET status = true WHERE id_mensagem = '$_id'";
        $_query3 = mysqli_query( $_conexao , $_sql3 ) or die ( mysqli_error( ) );
        
        //PEGA DATA E HORA
        date_default_timezone_set('America/Sao_Paulo');
        $date = date('d/m/Y');
        $hour = date('H:i');
        $_dia_hora = $date." ás ".$hour;
        
        $_sql5 = "UPDATE mensagem SET data_visualizada = '$_dia_hora' WHERE id_mensagem = '$_id' AND data_visualizada IS NULL";
        $_query5 = mysqli_query( $_conexao , $_sql5 ) or die ( mysqli_error( ) );
    }

     $_sql4 = "SELECT * FROM usuario WHERE id_usuario = '$_id_para'";


    $_query4 = mysqli_query( $_conexao , $_sql4 ) or die ( mysqli_error( ) );
   
    while( $_line = mysqli_fetch_array( $_query4 ) )
        { 
           $_nome_para = $_line['nome'];
           $_avatar_para = $_line['avatar'];
            
        }

    
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
    <!-- Sweetalert Css -->
    <link href="../plugins/sweetalert/sweetalert.css" rel="stylesheet" />

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../css/themes/all-themes.css" rel="stylesheet" />
    
    <!-- Animation Css -->
    <link href="../plugins/animate-css/animate.css" rel="stylesheet" />
</head>
    
    
<body class="theme-red ls-opened">
<section class="content">
        <div class="container-fluid">
            <!-- Body Copy -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card" style="width: 100%; min-height: 80%;">
                         
                        <div class="header"><h2 class="card-inside-title"><?php echo $_assunto; ?></h2>
                       
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    
                                    
                                    <?php
                                    
                                        if($_id_de==$_SESSION['usuarioId']){
                                        }else{
                                    ?>
                                    
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    
                                    
                                    <?php
                                        }
                                    ?>
                                    
                                    
                                    
                                    <ul class="dropdown-menu pull-right">
                                        
                                        <?php
                                        if($_arquivado == true){
                                        
                                        ?>
                                        
                                     <li><a>   
                                        
                                        <form method="post" action="desarquivar.php" name="formatualizar">
                                     
                                            <input type="hidden" name="id" value="<?php echo $_id; ?>">
                                                
                                                 <button style="

                                                      width: 100%;                  
                                                      border: 0px solid;
                                                      background: #00000000 !important;                         


                                                                         " name="confirma" type="submit" value="Favoritar">
                                                            Desarquivar
                                                        </button>
                                                
                                            </form> 
                                        
                                         </a></li>
                                        <?php
                                        }else{
                                        ?>                    
                                       <li><a>    
                                         <form method="post" action="arquivar.php" name="formatualizar">
                                     
                                            <input type="hidden" name="id" value="<?php echo $_id; ?>">
                                                
                                                 <button style="
                                                      width: 100%;                  
                                                      border: 0px solid;
                                                      background: #00000000 !important;" name="confirma" type="submit" value="Favoritar">
                                                            Arquivar
                                                        </button>
                                                
                                            </form>    
                                            
                                           </a></li>
                                        <?php
                                        }
                                        if($_excluido==true){
                                            
                                        ?>
                                            
                                        <li><a>
                                        
                                        <form method="post" action="recuperar.php" name="formatualizar">
                                     
                                            <input type="hidden" name="id" value="<?php echo $_id; ?>">
                                                
                                                 <button style="

                                                      width: 100%;                  
                                                      border: 0px solid;
                                                      background: #00000000 !important;                         


                                                                         " name="confirma" type="submit" value="Favoritar">
                                                            Remover da lixeira
                                                        </button>
                                                
                                            </form> 
                                        
                                        
                                        
                                        
                                            </a></li> 
                                        <li><a>
                                        
                                        <form method="post" action="excluir_permanente.php" name="formatualizar">
                                     
                                            <input type="hidden" name="id" value="<?php echo $_id; ?>">
                                                
                                                 <button style="width: 100%;                  
                                                      border: 0px solid;
                                                      background: #00000000 !important;" name="confirma" type="submit" value="Favoritar">
                                                            Excluir permanente
                                                        </button>
                                                
                                            </form> 
                                            </a></li> 
                                            
                                        <?php   
                                            
                                        }else if($_excluido==false){
                                            if($_id_de==$_SESSION['usuarioId']){
                                                
                                            }else{
                                            
                                        ?>
                                            <li><a>
                                                <div class="row clearfix js-sweetalert">
                                                        <button class="btn waves-effect" data-type="cancel" style="margin-left:25px; background: 00000000; box-shadow: 0px 0px 0px #00000000;">
                                                            Excluir mensagem
                                                        </button>
                                                </div>
                                            </a></li>
                                        <?php   
                                            }
                                        }
                                            if($_favoritar==false){
                                        ?>
                                        
                                        <li><a>
                                            
                                            
                                            <form method="post" action="favoritar.php" name="formatualizar">
                                     
                                            <input type="hidden" name="id" value="<?php echo $_id; ?>">
                                                
                                                 <button style="

                                                      width: 100%;                  
                                                      border: 0px solid;
                                                      background: #00000000 !important;                      


                                                                         " name="confirma" type="submit" value="Favoritar">
                                                            Favoritar
                                                        </button>
                                        
                                                
                                            </form> 
                                            
                                        </a></li>
                                        
                                        <?php
                                            
                                            }else if($_favoritar==true){
                                        ?>
                                        
                                        <li><a>
                                            
                                            
                                            <form method="post" action="desfavoritar.php" name="formatualizar">
                                     
                                            <input type="hidden" name="id" value="<?php echo $_id; ?>">
                                                
                                                 <button style="

                                                      width: 100%;                  
                                                      border: 0px solid #fff;
                                                      border-radius: 8px;
                                                      background: #00000000 !important;                        


                                                                         " name="confirma" type="submit" value="Favoritar">
                                                            Desfavoritar
                                                        </button>
                                                
                                            </form> 
                                            
                                        </a></li>
                                        
                                        
                                        <?php
                                                 
                                            }
                                        
                                        if($_status==true){
                                             if($_excluido==true){
                                                    
                                                }else{
                                                 if($_id_de==$_line['usuarioId']){
                                                 }else{
                                        ?>
                                        
                                        <li><a href="javascript:void(0);">
                                            
                                            
                                            <form method="post" action="naolido.php" name="formatualizar">
                                     
                                          <input type="hidden" name="id" value="<?php echo $_id; ?>">
                                                
                                         <button style="
                                                                 
                                              width: 100%;                  
                                              border: 0px solid #fff;
                                              border-radius: 8px;
                                              background: #00000000 !important;                        
                                                                 
                                                                 
                                                                 " name="confirma" type="submit" value="Favoritar">
                                             Marcar como não lido
                                             
                                                </button>
                                                
                                            </form> 
                                            
                                            
                                            </a></li>
                                
                                        <?php
                                                 }
                                             }
                                            }else{
                                             if($_excluido==true){
                                                    
                                                }else{
                                                if(!$_id_de==$_line['usuarioId']){
                                                    
                                                }else{
                                        ?>
                                        
                                        <li><a href="javascript:void(0);">
                                            
                                            
                                            <form method="post" action="lido.php" name="formatualizar">
                                     
                                          <input type="hidden" name="id" value="<?php echo $_id; ?>">
                                                
                                         <button style="
                                                                 
                                              width: 100%;                  
                                              border: 0px solid #fff;
                                              border-radius: 8px;
                                              background: #00000000 !important;                       
                                                                 
                                                                 
                                                                 " name="confirma" type="submit" value="Favoritar">
                                             Marcar como lido
                                             
                                                </button>
                                                
                                            </form> 
                                            
                                            
                                            </a></li>
                                        
                                        <?php
                                                }
                                             }
                                            }
                                           
                                        ?>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        
                            <div class="body">
                                
                                
                                
                                <form name="enviar_id" action="visitar_perfil_mensagem.php" method="post">
                                    <button style=" width: 100%; border: 0px solid #fff; border-radius: 8px; background-color: #fff !important;" name="confirma" type="submit" value="Favoritar">
                                       <input name="id_de" value="<?php echo $_id_de; ?>" style="display: none;">
                                       <div style="position: absolute;
                                                        border-radius: 50%;
                                                        overflow: hidden;
                                                        box-shadow: 3px 3px 5px #555;
                                                        ">
                                            <?php
                                                if($_avatar==null){
                                            ?>

                                            <img src="../images/icone_aluno.png" width="50" height="50"/>

                                            <?php
                                                }else{
                                            ?>

                                            <img src="data:image/png;base64, <?php echo $_avatar; ?>" width="50" height="50"/>

                                            <?php
                                                }
                                            ?>
                                        </div></button>
                                </form>
                                 
                                <?php
                                    
                                        if($_id_de==$_SESSION['usuarioId']){
            
                                ?>
                                <h2 style="margin-left: 70px; margin-top: -5px;" class="card-inside-title">

                                    <b><?php echo $_SESSION['usuarioNome']; ?></b>

                                </h2>
                                <?php
                                        }else{

                                ?>
                                <h2 style="margin-left: 70px; margin-top: -5px;" class="card-inside-title">

                                    <?php echo $_nome_de; ?>

                                </h2>
                                
                                <?php
                                        }
                                ?>
                            <div style="margin-left: 70px; margin-top: -5px;" >

                                    <?php echo $_dia_hora; ?>

                            </div>
                            
                        
                            <br><br>
                            <p>
                                
                                <?php
                                    // The Regular Expression filter
                                    $reg_exUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";

                                    // Check if there is a url in the text
                                    if(preg_match($reg_exUrl, $_texto, $url)) {

                                           // make the urls hyper links
                                           echo preg_replace($reg_exUrl, '<a style="color:#E53935;" target="_blank" href="'.$url[0].'" rel="nofollow">'.$url[0].'</a>', $_texto);

                                    } else {

                                           // if no urls in the text just return the text
                                            echo $_texto;
                                    }
                                ?>
                            </p>
                            
                        </div>
                       
                        
                        
                        
                        <?php
                        if($_id_de==$_SESSION['usuarioId']){
                            
                        }else{
                        ?>
                        
                        <div class="body" style="width: 100%;">
                            <form id="form_validation" method="POST" action="responder_mensagem.php">
                               <input name="id" value="<?php echo $_id_de;?>" style="display:none;">
                               <input name="assunto" value="<?php echo $_assunto; ?>" style="display:none;">
                                
                                <div class="form-group form-float">
                                    <div class="form-line"  style="background:#ff6347">
                                        <textarea name="mensagem" cols="30" rows="3" class="form-control no-resize" required ></textarea>
                                        <label class="form-label">Responder...</label>
                                    </div>
                                </div>
                               
                               
                                <button style="width:100%;" type="submit" class="btn bg-red waves-effect">Enviar resposta</button>
                            </form>
                        </div>
                        
                        <?php
                            }
                        ?>
                         
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

    <!-- Jquery Core Js -->
    <script src="../plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="../plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="../plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="../plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Bootstrap Notify Plugin Js -->
    <script src="../plugins/bootstrap-notify/bootstrap-notify.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="../plugins/node-waves/waves.js"></script>

    <!-- SweetAlert Plugin Js -->
    <script src="../plugins/sweetalert/sweetalert.min.js"></script>

    <script src="../js/pages/ui/dialogs.js"></script>
    
    <script src="../js/custom-file-input.js"></script>

    <!-- Light Gallery Plugin Js -->
    <script src="../plugins/light-gallery/js/lightgallery-all.js"></script>

    <!-- Custom Js -->
    <script src="../js/pages/medias/image-gallery.js"></script>
    <script src="../js/admin.js"></script>

    <!-- Demo Js -->
    <script src="../js/demo.js"></script>
    <!-- Custom Js -->
    <script src="../js/pages/ui/dialogs_mensagem.js"></script>
    
</html>