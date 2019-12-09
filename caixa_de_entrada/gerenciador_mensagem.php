<!DOCTYPE html>
<?php
    include("../cab_menu.php");
    include_once ("../configuracao/config.php");
    session_start();
    $_nome = $_SESSION['usuarioNome']; 
    $_sql = "SELECT * FROM mensagem ORDER BY id_mensagem desc";

    $_query = mysqli_query( $_conexao , $_sql ) or die ( mysqli_error( $_conexao ) );
    $_conta_mensagem = 0;        
    $_conta_mensagem_false = 0;
    $_conta_mensagem_true = 0;
    $_conta_mensagem_usuarios_true = 0;
        
        while( $_line = mysqli_fetch_array( $_query ) )
        { 
            $_conta_mensagem++;
            $_status_adm = $_line['status_adm'];
            $_status = $_line['status'];
            if($_status_adm==false){
                $_conta_mensagem_false++;
            }else{
                $_conta_mensagem_true++;
            }
            if($_status==true){
                $_conta_mensagem_usuarios_true++;
            }
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
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box-4 hover-zoom-effect">
                                <div class="icon">
                                    <i class="material-icons col-blue">email</i>
                                </div>
                                <div class="content">
                                    <div class="text">TOTAL DE MENSSAGENS</div>
                                    <div class="number"><?php echo $_conta_mensagem; ?></div>
                                </div>
                            </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box-4 hover-zoom-effect">
                                <div class="icon">
                                    <i class="material-icons col-green">email</i>
                                </div>
                                <div class="content">
                                    <div class="text">VISUALIZADAS</div>
                                    <div class="number"><?php echo $_conta_mensagem_true; ?></div>
                                </div>
                            </div>   
                        </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box-4 hover-zoom-effect">
                                <div class="icon">
                                    <i class="material-icons col-red">email</i>
                                </div>
                                <div class="content">
                                    <div class="text">NÃO VISUALIZADAS</div>
                                    <div class="number"><?php echo $_conta_mensagem_false; ?></div>
                                </div>
                            </div>   
                        </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box-4 hover-zoom-effect">
                                <div class="icon">
                                    <i class="material-icons col-pink">email</i>
                                </div>
                                <div class="content">
                                    <div class="text">VISUALIZADAS POR USUÁRIOS</div>
                                    <div class="number"><?php echo $_conta_mensagem_usuarios_true; ?></div>
                                </div>
                            </div>   
                        </div>
                        </ul>
                    </div>
    
        <div class="container-fluid" >
            <!-- Basic Examples -->
            <div class="row clearfix" >
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
                    <div class="card">
                        <div class="body" >
                            <div class="table-responsive" style="max-width: 100%; overflow-x: hidden;">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                     <thead>
                                        <tr>
                                            <th>Remetente </th>
                                            <th>Destinatário</th>
                                            <th>Assunto</th>
                                            <th>Data | Hora</th>
                                            <th>Status</th>
                                            <th>Opção</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Remetente </th>
                                            <th>Destinatário</th>
                                            <th>Assunto</th>
                                            <th>Data | Hora</th>
                                            <th>Status</th>
                                            <th>Opção</th>
                                        </tr>
                                    </tfoot>        
                                    <tbody>
                                        <?php
                                    
                                            $_nome = $_SESSION['usuarioNome']; 
                                            $_sql = "SELECT * FROM mensagem ORDER BY id_mensagem desc";

                                            $_query = mysqli_query( $_conexao , $_sql ) or die ( mysqli_error( $_conexao ) );
                                            $_conta_mensagem = 0;        


                                                while( $_line = mysqli_fetch_array( $_query ) )
                                                { 
                                                    $_conta_mensagem++;
                                                    $_pegapara = $_line['id_para'];
                                                    $_pegade = $_line['id_de'];
                                                    $_status_adm = $_line['status_adm'];
                                                    $_status = $_line['status'];
                                                    $_favoritar = $_line['favoritar'];
                                                    $_excluir = $_line['excluir'];
                                                    $_id_mensagem = $_line['id_mensagem'];
                                                    $_assunto = $_line['assunto'];
                                                    $_texto = $_line['texto'];
                                                    $_data = $_line['dia_hora'];


                                                    $_sql2 = "SELECT * FROM usuario WHERE id_usuario = '$_pegade'";
                                                    $_query2 = mysqli_query( $_conexao , $_sql2 ) or die ( mysqli_error( $_conexao ) );

                                                while( $_line = mysqli_fetch_array( $_query2 ) )
                                                { 
                                                   $_nome = $_line['nome'];

                                                }
                                                    $_sql3 = "SELECT * FROM usuario WHERE id_usuario = '$_pegapara'";
                                                    $_query3 = mysqli_query( $_conexao , $_sql3 ) or die ( mysqli_error( $_conexao ) );

                                                while( $_line = mysqli_fetch_array( $_query3 ) )
                                                { 
                                                   $_nome_para = $_line['nome'];

                                                }

                                        ?>  
                                        <tr>
                                        <form method="post" action="ver_mensagem_adm.php" name="formatualizar">
                                        <input type="hidden" name="id" value="<?php echo $_id_mensagem; ?>"> 
                                            <td><?php echo $_nome; ?></td>
                                             <?php
                                                if($_status==true){
                                            ?>
                                            <td><?php echo $_nome_para."        |    (Visualizou)"; ?></td>
                                            <?php
                                                }else{
                                            ?>
                                            <td><?php echo $_nome_para."    |    (Não Visualizou)"; ?></td>
                                            <?php
                                                }
                                            ?>
                                            <td><?php echo mb_strimwidth( $_assunto, 0, 40, "..."); ?></td>
                                            
                                            <td><?php echo $_data; ?></td>
                                            
                                                <?php
                                                    if($_status_adm==true){
                                                ?>
                                                
                                                
                                                <td>Visualizado</td>
                                            
                                                <?php
                                                    }else{
                                                ?>
                                               <td>Não visualizado</td>
                                            
                                                <?php
                                                        }
                                                ?>
                                            <td><button type="submit" style="border: 0px solid #fff;
                                              border-radius: 8px;
                                              background-color: #fff !important; ">Ler</button></td>
                                            </form>
                                        </tr>                        
                                        <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
            <!-- #END# Basic Examples -->
       
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

    <!-- Jquery DataTable Plugin Js -->
    <script src="../plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="../plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

    <!-- Custom Js -->
    <script src="../js/admin.js"></script>
    <script src="../js/pages/tables/jquery-datatable.js"></script>

    <!-- Demo Js -->
    <script src="../js/demo.js"></script>
</body>

</html>