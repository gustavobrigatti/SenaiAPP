<?php

//<!--******************************* CONECTA O BANCO DE DADOS ****************************-->

include("conecta.php");
include("verifica_pagina.php");


//<!--*****STARTA A SESSÃO*****-->
     session_start();

//<!--**CHAMA CABEÇALHO E MENU**-->
    include("cab_menu.php");

//<!--OCULTA NOTIFICAÇÕES DE ERRO-->
    ini_set("display_error", 0 );

    error_reporting( 0 );

?>
<!--**** TITULO DO SISTEMA *****-->
    <title>SenaiAPP</title>
<!-- ************************** -->
<style type="text/css">
        ::-webkit-scrollbar {
        width: 8px;
        }
        ::-webkit-scrollbar-button {
        width: 8px;
        height:5px;
        }
        ::-webkit-scrollbar-track {
        background:#eee;
        border: thin solid lightgray;
        box-shadow: 0px 0px 3px #dfdfdf inset;
        border-radius:10px;
        }
        ::-webkit-scrollbar-thumb {
        background:#999;
        border: thin solid gray;
        border-radius:10px;
        }
        ::-webkit-scrollbar-thumb:hover {
        background:#7d7d7d;
        }           
    </style>
<!-- Favicon-->
<link rel="icon" href="../favicon.ico" type="image/x-icon">
