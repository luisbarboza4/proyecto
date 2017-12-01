<?php include 'messages.php'; ?>

<form action="control.php" method="post" name="login_form" class="">
<div class="col-md-offset-2 col-md-8 col-xs-offset-2 col-xs-8">
  <?php if($errormsg)showMessage($errormsg,'error'); ?>
    <div class="row" style="margin-top: 10%; text-align: center;">
      <div class="form-group">
        <label for="usuario" style="margin-bottom: 2%">Usuario</label>
        <input type="text" class="form-control" name="usuario" id="usuario" maxlength="40" placeholder="Ingrese el usuario" value="" required>
      </div>
      <br><br>
      <div class="form-group">
        <label for="clave" style="margin-bottom: 2%">Clave</label>
        <input type="password" class="form-control" name="clave" id="clave" maxlength="20" placeholder="Ingrese la clave" value="" required>
      </div>
      <br><br>
      <div class='form-group'>
            <button type='submit' class='btn elim'>Entrar</button>
      </div>
    </div>
  </div>
</form>
<script type="text/javascript">
  $('form').submit(function(){
    $('body').loading();
  });
</script>
