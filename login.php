<?php include 'messages.php'; ?>

<form action="control.php" method="post" name="login_form" class="">
<div class="col-md-offset-2 col-md-8 col-md-offset-2 col-xs-8">
  <?php if($errormsg)showMessage($errormsg,'error'); ?>
    <div class="row">
      <div class="form-group">
        <label for="usuario">Usuario</label>
        <input type="text" class="form-control" name="usuario" id="usuario" maxlength="40" placeholder="Ingrese el usuario" value="" required>
      </div>
      <div class="form-group">
        <label for="clave">Clave</label>
        <input type="password" class="form-control" name="clave" id="clave" maxlength="20" placeholder="Ingrese la clave" value="" required>
      </div>
      <?php 
      if(isset($_GET['error'])){
        //$msj = "Usuario y/o contraseña inválidos";
        //echo msj($msj,'danger');
      }
      ?>
      <div class='form-group'>
            <button type='submit' class='btn'>Entrar</button>
      </div>
    </div>
  </div>
</form>
<script type="text/javascript">
  $('form').submit(function(){
    $('body').loading();
  });
</script>
