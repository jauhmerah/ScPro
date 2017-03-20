<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?= base_url(); ?>assets/cover/favicon.png">

    <title>Login</title>
    <!-- Bootstrap core CSS -->
    <link href="<?= base_url(); ?>asset/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="<?= base_url(); ?>asset/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?= base_url(); ?>asset/css/signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="<?= base_url(); ?>asset/sign/ie-emulation-modes-warning.js"></script>
    <script src="<?= base_url(); ?>asset/js/jquery.min.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  <style id="style-1-cropbar-clipper">/* Copyright 2014 Evernote Corporation. All rights reserved. */
.en-markup-crop-options {
    top: 18px !important;
    left: 50% !important;
    margin-left: -100px !important;
    width: 200px !important;
    border: 2px rgba(255,255,255,.38) solid !important;
    border-radius: 4px !important;
}

.en-markup-crop-options div div:first-of-type {
    margin-left: 0px !important;
}


</style>
</head>
  <body>
  <div class = "container">
     <div class="col-lg-offset-4 col-lg-4" align="center">
         <img src="<?= base_url(); ?>assets/nasty/nastylogo2.png" alt="Nasty OrdYs-EU">
     </div> 
  </div>
  <?php
if ($this->session->flashdata('id')) {
$code = $this->session->flashdata('id');
$this->session->set_flashdata('access', 'true');
  ?>
    <div class="container" id = "signin">
      <form class="form-signin" method="post" action = "<?= site_url('qr/signin'); ?>">
        <h2 class="form-signin-heading">Please sign in </h2>
        <span align="center" style="font-family:Arial, Helvetica, sans-serif; font-size:12pt; color:#999999">Login to register your product</span>
        <div class="clearfix">
        &nbsp;
        </div>
        <label for="inputEmail1" class="sr-only">Email address</label>
        <input type="email" id="inputEmail1" name="email" class="form-control" placeholder="Email address" required="" autofocus="">
        <label for="inputPassword1" class="sr-only">Password</label>
        <input type="password" id="inputPassword1" name="pass" class="form-control" placeholder="Password" required="">
        <input type="hidden" name="code" id="inputCode" class="form-control" value="<?= $code; ?>">        
        <div class="clearfix">
        &nbsp;
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>
      <div class="clearfix">
        &nbsp;
      </div>
      <?php 
      if($this->session->flashdata('msg')){
      ?>
      <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong><i class="fa fa-times-rectangle"></i> Access Deny !!</strong> <?= $this->session->flashdata('msg'); ?>
      </div>
      <?php } ?>
    </div> <!-- /container -->
<?php 
}else{
  $msg = "Please scan the Qr Code";
}
?>
  <div class="container">
  <div class="col-md-offset-4 col-md-4">
    <?php 
      if ($this->session->flashdata('error') || isset($msg)) { 
        if ($this->session->flashdata('error')) {
          $msg = $this->session->flashdata('error');
        }
        ?>
        <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>Access deny!</strong> <?= $msg; ?>
      </div>
    <?php } ?>
    <?php 
      if ($this->session->flashdata('warning')) { ?>
        <div class="alert alert-warning">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>Warning !</strong> <?= $this->session->flashdata('warning'); ?>
      </div>
    <?php } ?>
    <?php 
      if ($this->session->flashdata('info')) { ?>
        <div class="alert alert-info">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>Info :</strong> <?= $this->session->flashdata('info'); ?>
      </div>
    <?php } ?>
    <?php 
      if ($this->session->flashdata('success')) { ?>
        <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>Success :</strong> <?= $this->session->flashdata('success'); ?>
      </div>
    <?php } ?>    
  </div>    
  </div>   
</body>
</html>