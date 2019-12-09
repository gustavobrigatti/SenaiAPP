<?php

//<!--******************************* CONECTA O BANCO DE DADOS ****************************-->

include("conecta.php");


//<!--*****STARTA A SESSÃO*****-->
     session_start();
    
    
//<!--**CHAMA CABEÇALHO E MENU**-->
    include("cabecalho.php");
    include("menu.php");

//<!--OCULTA NOTIFICAÇÕES DE ERRO-->
    ini_set("display_error", 0 );

    error_reporting( 0 );

//<!-- CHAMA OS CSS|JS|ETC... -->
    include("css_js.php");


?>
<!--**** TITULO DO SISTEMA *****-->
    <title>Sistema Senai</title>
<!-- ************************** -->

!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="assets/js/jquery.ui.touch-punch.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>

    <!--script for this page-->
    
  <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>
