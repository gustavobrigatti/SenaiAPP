<?php

//<!--******************************* CONECTA O BANCO DE DADOS ****************************-->

$_host     = "localhost";
$_user     = "root"     ;
$_password = "password" ;
$_database = "site04";

$_conexao = mysqli_connect( $_host , $_user , $_password ) or die ( mysqli_error($_conexao) );

mysqli_select_db( $_conexao , $_database ) or die ( mysqli_error($_conexao) );

mysqli_set_charset($_conexao, "utf8");

//<!--OCULTA NOTIFICAÇÕES DE ERRO-->
    ini_set("display_error", 0 );

    error_reporting( 0 );

?>