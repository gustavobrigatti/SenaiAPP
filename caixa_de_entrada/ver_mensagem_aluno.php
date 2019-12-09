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
           $_excluido = $_line['lixeira'];
           $_favoritar = $_line['favoritar'];
           $_dia_hora = $_line['dia_hora'];
            
        }


    $_sql2 = "SELECT * FROM usuario WHERE id_usuario = '$_id_de'";


    $_query2 = mysqli_query( $_conexao , $_sql2 ) or die ( mysqli_error( ) );
   
    while( $_line = mysqli_fetch_array( $_query2 ) )
        { 
           $_nome_de = $_line['nome'];
           $_avatar = $_line['avatar'];
            
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
</head>
    
    
<body class="theme-red ls-opened">
<section class="content">
        <div class="container-fluid">
            <!-- Body Copy -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card" style="width: 100%; height: 80%;">
                         
                        <div class="header"><h2 class="card-inside-title"><?php echo $_assunto; ?></h2></div>
                        
                            <div class="body">
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
                                </div>
                                 
                                <?php
                                    
                                        if($_id_de==$_SESSION['usuarioId']){
            
                                ?>
                                <h2 style="margin-left: 60px;" class="card-inside-title">

                                    <b><?php echo $_SESSION['usuarioNome']; ?></b> enviou está mensagem para <b><?php echo $_nome_para; ?></b>

                                </h2>
                                <?php
                                        }else{

                                ?>
                                <h2 style="margin-left: 70px; margin-top: 5px;" class="card-inside-title">

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
                                    echo $_texto;
                                ?>
                            </p>
                            
                        </div>
                       
                         
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

     <!-- SweetAlert Plugin Js -->
    <script src="../plugins/sweetalert/sweetalert.min.js"></script>

    <!-- Custom Js -->
    <script src="../js/pages/ui/dialogs.js"></script>
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