<?php
    include_once ("../configuracao/config.php");
    session_start();
    $_tipo = $_SESSION['usuarioNiveisAcessoId'];
    $_id_usuario = $_SESSION['usuarioId'];
    $_id_album = $_POST['id_album'];
    $_iContador = 0;
    // Compress the image files
    function compress_image($source_url, $destination_url, $quality) {
        $info = getimagesize($source_url);

        if ($info['mime'] == 'image/jpeg') $image = imagecreatefromjpeg($source_url);
        elseif ($info['mime'] == 'image/gif') $image = imagecreatefromgif($source_url);
        elseif ($info['mime'] == 'image/png') $image = imagecreatefrompng($source_url);

        // save file
        imagejpeg($image, $destination_url, $quality);
        
        $data = base64_encode(file_get_contents($destination_url));
        
        echo "<img style='display:block; width:100px;height:100px;' id='base64image' src='data:image/jpeg;base64, ".$data." '/>";
        
        $_sql = "INSERT INTO foto_album (id_criador, id_album, data_criacao, foto, excluido) VALUES ('$_id_usuario','$_id_album','$_dia_hora','$data','0')";
        $_query = mysqli_query($_conexao , $_sql) or die(mysqli_error($_conexao));

        // return destination file
        return $destination_url;
    }
    if(isset($_POST["submit"])) {
        if(isset($_FILES['fileToUpload'])){
            foreach($_FILES['fileToUpload']['tmp_name'] as $key => $tmp_name){
                //echo "copy + paste the data below, use it as a string in ur JavaScript Code<br><br>";
                //echo "<textarea id='data' style=''>data:".$check["mime"].";base64,".$data."</textarea>";
                //echo "<img style='display:block; width:100px;height:100px;' id='base64image'                 
                //src='data:image/jpeg;base64, ".$data." '/>";
                date_default_timezone_set('America/Sao_Paulo');
                $date = date('d/m/Y');
                $hour = date('H:i');
                $_dia_hora = $date." ás ".$hour;
                $_iContador++;
                $source_url = $_FILES['fileToUpload']['tmp_name'][$key];
                $destination_url = $path.basename($tmp_name).'jpg';
                $quality = 20;
                    
                 $info = getimagesize($source_url);

                if ($info['mime'] == 'image/jpeg') $image = imagecreatefromjpeg($source_url);
                elseif ($info['mime'] == 'image/gif') $image = imagecreatefromgif($source_url);
                elseif ($info['mime'] == 'image/png') $image = imagecreatefrompng($source_url);

                // save file
                imagejpeg($image, $destination_url, $quality);

                $data = base64_encode(file_get_contents($destination_url));
                
                $_sql = "INSERT INTO foto_album (id_criador, id_album, data_criacao, foto, excluido) VALUES ('$_id_usuario','$_id_album','$_dia_hora','$data','0')";
                $_query = mysqli_query($_conexao , $_sql) or die(mysqli_error($_conexao));
            }

        } else {
            echo "File is not an image.";
        }
    }
    if($_iContador > 1){
        $_SESSION['notificacao'] = 20;
    }else{
        $_SESSION['notificacao'] = 10;
    }
?>  
<script>document.getElementById('data').select();</script>
<form action="fotos_album.php" method="post" name="voltar_pagina"><input type="hidden" name="id_album" value="<?php echo $_id_album; ?>"></form>
<script type="text/javascript">document.voltar_pagina.submit();</script>