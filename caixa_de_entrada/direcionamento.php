<?php
    include_once( "../configuracao/conecta.php" );

    $_id_direcionamento  = $_POST['direcionamento'];
    
    $_sql = "SELECT status_direcionamento FROM direcionamento_de_mensagem WHERE id_direcionamento = '$_id_direcionamento'";
    $_query = mysqli_query( $_conexao , $_sql ) or die ( mysqli_error( ) );
    while( $_line = mysqli_fetch_array( $_query ) ){ 
        $_status = $_line['status_direcionamento'];
    }
    

    if($_status == true){
        $_sql = "UPDATE direcionamento_de_mensagem SET status_direcionamento = '0' WHERE id_direcionamento = '$_id_direcionamento'";
        $_query = mysqli_query( $_conexao , $_sql ) or die ( mysqli_error( $_conexao ) );
    }else{
        $_sql = "UPDATE direcionamento_de_mensagem SET status_direcionamento = '1' WHERE id_direcionamento = '$_id_direcionamento'";
        $_query = mysqli_query( $_conexao , $_sql ) or die ( mysqli_error( $_conexao ) );
    }



    header( "location:painel_administrador.php" );
?>