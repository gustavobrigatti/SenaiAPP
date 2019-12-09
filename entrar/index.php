<?php
session_start();
include("configuracao/config_login.php");
?>
<!-- Favicon-->
<link rel="icon" href="../favicon.ico" type="image/x-icon">
 <script type="text/javascript">
             function mascara(t, mask){
                 var i = t.value.length;
                 var saida = mask.substring(1,0);
                 var texto = mask.substring(i)
                 if (texto.substring(0,1) != saida){
                 t.value += texto.substring(0,1);
                 }
             }
        </script>

  <body>
      <!-- **************************************************************************************************************************************
                                                                    LOGIN
      *************************************************************************************************************************************** -->

	  <div id="login-page">
	  	<div class="container">
	  	
		      <form class="form-login" name="loginform" method="post" action="../valida.php" >
		        <h2 class="form-login-heading"  style="background: #E53935;">ENTRE AGORA MESMO</h2>
		        <div class="login-wrap">
                    
		            <input name="cpf" type="text" class="form-control" placeholder="CPF" onkeypress="mascara(this, '###.###.###-##')" maxlength="14" required autofocus>
                    <br>
		            <input type="password" name="senha" class="form-control" placeholder="Senha" required>
                    
		            <label class="checkbox">
		                <span class="pull-right">
		                    <a data-toggle="modal" href="login.html#myModal"> Esqueceu sua senha?</a>
		
		                </span>
		            </label>
		            <button class="btn btn-theme btn-block" type="submit"  style="background: #E53935;"><i class="fa fa-lock"></i> ENTRAR</button>
                    <p class="text-center text-danger">
                        <br>
                    <?php if(isset($_SESSION['loginErro'])){
                        echo $_SESSION['loginErro'];
                        unset($_SESSION['loginErro']);
                    }?>
                </p>
                <p class="text-center text-success">
                    <?php 
                    if(isset($_SESSION['logindeslogado'])){
                        echo $_SESSION['logindeslogado'];
                        unset($_SESSION['logindeslogado']);
                    }
                    ?>
		</p>
		            
		
		        </div>
		
		          <!-- Modal -->
		          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
		              <div class="modal-dialog">
		                  <div class="modal-content">
		                      <div class="modal-header" style="background: #E53935;">
		                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="background: #E53935;">&times;</button>
		                          <h4 class="modal-title""background: #E53935;">Esqueceu sua senha ?</h4>
		                      </div>
		                      <div class="modal-body">
		                          <p>Entre com o seu e-mail cadastrado na escola.</p>
		                          <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">
		
		                      </div>
		                      <div class="modal-footer" >
		                          <button data-dismiss="modal" class="btn btn-default" type="button">Cancelar</button>
		                          <button class="btn btn-theme" type="button" style="background: #E53935;">Enviar</button>
		                      </div>
		                  </div>
		              </div>
		          </div>
		          <!-- modal -->
		
		      </form>	  	
	  	
	  	</div>
	  </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="assets/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("assets/img/login_fundo.jpg", {speed: 500});
    </script>


  </body>
