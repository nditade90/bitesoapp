<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Log in</title>
  <meta name="robots" content="noindex,nofollow" />
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE-3.0.2');?>/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url('assets');?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets');?>/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
 
  <link rel="apple-touch-icon" sizes="57x57" href="<?=base_url('assets/icons');?>/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="<?=base_url('assets/icons');?>/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="<?=base_url('assets/icons');?>/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="<?=base_url('assets/icons');?>/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="<?=base_url('assets/icons');?>/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="<?=base_url('assets/icons');?>/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="<?=base_url('assets/icons');?>/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="<?=base_url('assets/icons');?>/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="<?=base_url('assets/icons');?>/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192"  href="<?=base_url('assets/icons');?>/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="<?=base_url('assets/icons');?>/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="<?=base_url('assets/icons');?>/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="<?=base_url('assets/icons');?>/favicon-16x16.png">
  <link rel="manifest" href="/manifest.json">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="<?=base_url('assets/icons');?>/ms-icon-144x144.png">
  <meta name="theme-color" content="#ffffff">
  <style>
body {
	overflow-y: hidden;
	background: url('<?=base_url('assets/img/fdnb/main_bg.jpeg');?>') no-repeat center center fixed !important;
	-webkit-background-size: cover !important;
	-moz-background-size: cover !important;
	background-size: cover !important;
	-o-background-size: cover !important;
}
</style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
  <!--  <a href="<?php echo base_url('Authentification/login');?>/"><b>FDNB - Human Ressources System
    <img
			src="<?=base_url('assets/img/fdnb/logo2.png');?>"
			style="max-width: 100%; height: auto; display: block;"
			class="thumbnail img-responsive" width="100%" height="100%" />
      </a> -->
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
   

    <a href="<?=base_url('Authentification/login');?>/">
    <!--<span class="text-center text-bold">FDNB - Human Ressources System</span>-->
    <img
			src="<?=base_url('assets/img/fdnb/logo2.png');?>"
			style="max-width: 100%; height: auto; display: block;"
			class="thumbnail img-responsive" width="100%" height="100%" />
      </a>

      <p class="login-box-msg">Sign in to start your session</p>

    <?php echo validation_errors('<div class="alert alert-danger" role="alert">','</div>'); ?>  

    <?php if(!empty($errors)) {
      echo $errors;
    } ?>

      <?php 
         // $attributes = array('class' => 'email', 'id' => 'myform');
         echo form_open('Authentification/login'); 
      ?>
        <div class="input-group mb-3">
            <?php $data = array(
                  'type'  => 'text',
                  'name'  => 'user_email',
                  'id'    => 'user_email',
                  'value' => '',
                  'class' => 'form-control text-center',
                  'placeholder' => 'Username',
                  'required'=>'required'
            );

            echo form_input($data);
            ?>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fa fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
               <?php $data = array(
                        'type'  => 'password',
                        'name'  => 'user_password',
                        'id'    => 'user_password',
                        'value' => '',
                        'class' => 'form-control text-center',
                        'placeholder' => 'Mot de passe',
                        'required'=>'required'
                  );

                  echo form_input($data);
               ?>
            <div class="input-group-append">
            <div class="input-group-text">
              <span class="fa fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          
          <div class="col-12">
          <?php 
               $data = array(
                              'name'          => 'button',
                              'class'         => 'btn btn-primary btn-block',
                              'value'         => 'true',
                              'type'          => 'submit',
                              'content'       => 'Se connecter'
                     );
               echo form_button($data); 
            ?>
          </div>
          <!-- /.col -->
        </div>
      <?php echo form_close();?>

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?php echo base_url('assets');?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('assets');?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
