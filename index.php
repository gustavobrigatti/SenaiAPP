<?php
    session_start();
    if($_SESSION['usuarioId'] == ""){
        header("Location: entrar/index2.php");
    }else{
         header("Location: caixa_de_entrada/index.php");
    }
?>
<!-- Favicon-->
<link rel="icon" href="favicon.ico" type="image/x-icon">