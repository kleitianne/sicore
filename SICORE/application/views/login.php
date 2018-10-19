<html  style="height: auto !important;">

<div class="fundo-login login-page hold-transition " >
  <div class="login-box">
  <div class="login-logo ">
    <img class="logo-login" src="<?= base_url();?>assets/img/logo.png">
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <br>

    <form action="" method="post">

      <div class="form-group has-feedback">
        <input id="login" type="number"  class="form-control" placeholder="Matrícula" required autofocus>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input id="senha" type="password" class="form-control" placeholder="Senha" name="senha" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
</div>
      <div class="row">
        
        <!-- /.col -->
        <div class="col-xs-4" >
          <button id="botao-login" type="button" class="btn btn-primary btn-block btn-flat btn-login">Entrar</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
  </div>
  <!-- /.login-box-body -->
</div>
</div> 
<input type="hidden" value="<?=base_url();?>" name="base_url" id="base_url">

<!-- /.login-box -->

<!-- jQuery 3 -->

<script src="<?=base_url()?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?=base_url()?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?=base_url()?>assets/js/apisuap.js"></script>
<!-- iCheck -->



</body>
</html>