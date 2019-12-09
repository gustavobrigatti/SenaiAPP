<?php
    include("../cab_menu.php");
    include_once ("../configuracao/config.php");
    session_start();

   $_id = $_POST['id'];

    
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
           $_status_adm = $_line['status_adm'];
           $_excluido = $_line['lixeira'];
           $_favoritar = $_line['favoritar'];
           $_data_enviada = $_line['dia_hora'];
           $_data_visualizada = $_line['data_visualizada'];
            
        }


    $_sql2 = "SELECT * FROM usuario WHERE id_usuario = '$_id_de'";


    $_query2 = mysqli_query( $_conexao , $_sql2 ) or die ( mysqli_error( ) );
   
    while( $_line = mysqli_fetch_array( $_query2 ) )
        { 
           $_nome_de = $_line['nome'];
           $_avatar = $_line['avatar'];
            
        }




    $_sql3 = "UPDATE mensagem SET status_adm = true WHERE id_mensagem = '$_id'";
    $_query3 = mysqli_query( $_conexao , $_sql3 ) or die ( mysqli_error( ) );


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
                                <b><?php echo $_nome_de; ?></b> <?php echo " enviou esta mensagem para ";?><b> <?php echo $_nome_para; ?> </b>
                            </h2>
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
                                    <li><a>
                                        <form method="post" action="excluir_mensagem_adm.php" name="formatualizar">
                                     
                                          <input type="hidden" name="id_mensagem_adm" value="<?php echo $_id; ?>">
                                                
                                         <button style="
                                                                 
                                              width: 100%;                  
                                                      border: 0px solid;
                                                      background: #00000000 !important;                     
                                                                 
                                                                 
                                                                 " name="confirma" type="submit" value="Favoritar">
                                             Excluir mensagem
                                             
                                                </button>
                                            
                                            </form> 
                                            </a></li>
                                        <?php
                                        if($_status_adm==true){
                                        ?>
                                        
                                        <li><a href="javascript:void(0);">
                                            
                                            
                                            <form method="post" action="naolido_adm.php" name="formatualizar">
                                     
                                          <input type="hidden" name="id" value="<?php echo $_id; ?>">
                                                
                                         <button style="
                                                                 
                                              width: 100%;                  
                                              border: 0px solid #fff;
                                              border-radius: 8px;
                                              background-color: #00000000;                       
                                                                 
                                                                 
                                                                 " name="confirma" type="submit" value="Favoritar">
                                             Marcar como nao lido
                                             
                                                </button>
                                                
                                            </form> 
                                            
                                            
                                            </a></li>
                                        
                                        <?php
                                             
                                            }else{
                                            
                                        ?>
                                        
                                        <li><a href="javascript:void(0);">
                                            
                                            
                                            <form method="post" action="lido_adm.php" name="formatualizar">
                                     
                                          <input type="hidden" name="id" value="<?php echo $_id; ?>">
                                                
                                         <button style="
                                                                 
                                              width: 100%;                  
                                              border: 0px solid #fff;
                                              border-radius: 8px;
                                              background-color: #fff !important;                       
                                                                 
                                                                 
                                                                 " name="confirma" type="submit" value="Favoritar">
                                             Marcar como lido
                                             
                                                </button>
                                                
                                            </form> 
                                            
                                            
                                            </a></li>
                                        
                                        <?php
                                             
                                            }
                                           
                                        ?>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <p class="lead">
                               <?php
                                    echo $_assunto;
                                ?>
                            </p>
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
                        <hr>
                        <div class="body">
                          
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="card">
                                        <div class="header">
                                            <h2>
                                                Informações da mensagem
                                                <small>Todas as informações obtidas nessa mensagem em tempo real.</small>
                                            </h2>
                                           
                                        </div>
                                        <div class="body table-responsive">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">Remetente</th>
                                                        <td><?php echo $_nome_de; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Destinatário</th>
                                                        <td><?php echo $_nome_para; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Hora de envio</th>
                                                        <td><?php echo $_data_enviada; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Visualizada pelo destinatário</th>
                                                        <?php if($_status==true){ ?>
                                                        <td>
                                                        Sim
                                                        </td>
                                                        <?php }else{ ?>
                                                        <td>
                                                        Não
                                                        </td>
                                                        <?php } ?>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Data|Hora de visualização</th>
                                                        <?php if($_status==false){ ?>
                                                        <td>A mensagem ainda não foi visualizada</td>
                                                        <?php }else{ ?>
                                                        <td><?php echo $_data_visualizada; ?></td>
                                                        <?php } ?>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Visualizada pelo admin</th>
                                                        <?php if($_status_adm==true){ ?>
                                                        <td>
                                                        Sim
                                                        </td>
                                                        <?php }else{ ?>
                                                        <td>
                                                        Não
                                                        </td>
                                                        <?php } ?>
                                                    </tr>
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