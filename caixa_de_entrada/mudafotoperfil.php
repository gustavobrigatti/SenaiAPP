<?php
    session_start();
    $_SESSION['notificacao'] = 12;
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            $data = base64_encode(file_get_contents( $_FILES["fileToUpload"]["tmp_name"] ));

            include_once( "../configuracao/conecta.php" );

            $_id = $_SESSION['usuarioId'];
            $_sql = "UPDATE usuario SET avatar = '$data' WHERE id_usuario = '$_id'";
            $_query = mysqli_query($_conexao , $_sql) or die(mysqli_error($_conexao));

        } else {
            echo "O arquivo não é uma foto, obrigatóriamente deve ser .jpg ou .png .";
        }
    }
    header( "location:perfil.php" );
?> 
<script>document.getElementById('data').select();</script>