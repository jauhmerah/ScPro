<!DOCTYPE html>
<!-- saved from url=(0040)http://getbootstrap.com/examples/signin/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?= base_url(); ?>assets/cover/favicon.png">
    <link href="<?= base_url(); ?>asset2/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url(); ?>asset2/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="<?= base_url(); ?>asset/js/bootstrap.min.js"></script>
 <script src="<?= base_url(); ?>asset2/global/plugins/bootbox/bootbox.min.js" type="text/javascript"></script>

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
<script>
    $(document).ready(function() {
        $("#signup").hide();
        $(".btn1").click(function() {
            $.when($("#signin").fadeOut('fast')).then(function(){
                $("#signup").fadeIn('fast');
            });
        });
        $(".btn2").click(function() {
            $.when($("#signup").fadeOut('fast')).then(function(){
                $("#signin").fadeIn('fast');
            });
        });

        $("#daftar").submit(function(event) {
          var pass1 = $("#pass1").val();
          var pass2 = $("#pass2").val();
          if (pass1!=pass2) {
            $("#msg").text("Password Not Same").show().fadeOut(4000);
            return false;
          }
          if(pass1.length < 8){
            $("#msg").text("Password length must 8 character or more").show().fadeOut(4000);
            return false;
          }
          $("#pass3").val(pass1);
        });
    });
</script>
</head>

  <body>
<?php 
  $temp = array_slice(scandir('./asset/slider'), 2);
  if (sizeof($temp) != 0) {
    ?>
<script src="<?php echo base_url();?>asset/js/jquery.backstretch.js"></script>
<script>
    $.backstretch([
      <?php for ($i=0; $i < sizeof($temp); $i++) { ?>
        "<?= base_url();?>asset/slider/<?= $temp[$i]; ?>"<?php if($i != sizeof($temp)-1){ echo ",";} ?>

      <?php } ?>
    ], {
      fade: 850,    //Speed of Fade
      duration: 10000  //Time of image display
    });
</script>
    <?php
  }
?>

  <nav class="navbar navbar-fixed-top" role="navigation">
    <div class="container">
      <ul class="nav pull-right">        
        <li>
          <a><button id="more" type="button" class="btn btn-default"><span class="icon-grid"></span></button></a>
        </li>
      </ul>
    </div>
  </nav>   

    <div class="container" id = "signin">
    <div class="row">
    <div class="col-xs-4" align="center">
    <div class="clearfix">
      <br><br>
    </div>
         <img src="http://ordereu.nastyjuice.com/assets/cover/logo.png" class="img-responsive" alt="Image"><br>
         <form class="form-signin" method="post" action = "http://ordereu.nastyjuice.com/login/signin">
      <?php if($this->session->flashdata('warning')){?>
<div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                <strong><i class="fa fa-exclamation-triangle"></i> Warning!</strong> <?= $this->session->flashdata('warning'); ?>
                            </div>
<?php } ?>
  <?php if($this->session->flashdata('success')){ ?>
                            <div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                <strong><i class="fa fa-check"></i>  Success!</strong> <?= $this->session->flashdata('success'); ?>
                            </div>
        <?php } ?>
        <h2 class="form-signin-heading">Europe Ordys</h2>
        <label for="inputEmail1">Email address</label>
        <input type="email" id="inputEmail1" name="email" class="form-control" required="" autofocus="">
         <div class="clearfix">
        &nbsp;
        </div>
        <label for="inputPassword1">Password</label>
        <input type="password" id="inputPassword1" name="pass" class="form-control" required="">
        <div class="clearfix">
        </div>
         <div class="clearfix">
        &nbsp;
        </div>
        <!-- <a><label class = "btn1">Forgot Password?</label></a> -->
       
        <div class="clearfix">
        &nbsp;
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>
     </div> 
      <div class="col-xs-4" align="center">
         <img src="<?= base_url(); ?>assets/cover/logo.png" class="img-responsive" alt="Image"><br>
         <form class="form-signin" method="post" action = "<?= site_url('login/signin'); ?>">
      <?php if($this->session->flashdata('warning')){?>
<div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                <strong><i class="fa fa-exclamation-triangle"></i> Warning!</strong> <?= $this->session->flashdata('warning'); ?>
                            </div>
<?php } ?>
  <?php if($this->session->flashdata('success')){ ?>
                            <div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                <strong><i class="fa fa-check"></i>  Success!</strong> <?= $this->session->flashdata('success'); ?>
                            </div>
        <?php } ?>
        <h2 class="form-signin-heading">OrdYs Login</h2>
        <label for="inputEmail1">Email address</label>
        <input type="email" id="inputEmail1" name="email" class="form-control" required="" autofocus="">
         <div class="clearfix">
        &nbsp;
        </div>
        <label for="inputPassword1">Password</label>
        <input type="password" id="inputPassword1" name="pass" class="form-control" required="">
        <div class="clearfix">
        </div>
         <div class="clearfix">
        &nbsp;
        </div>
        <!-- <a><label class = "btn1">Forgot Password?</label></a> -->
       
        <div class="clearfix">
        &nbsp;
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>
     </div> 
     <div class="col-xs-4" align="center">
     <div class="clearfix">
      <br><br>
    </div>
         <img src="<?= base_url(); ?>assets/cover/logo3.png" class="img-responsive" alt="Image"><br>
         <form class="form-signin" method="post" action = "http://oem.nastyjuice.com/login/signin">
      <?php if($this->session->flashdata('warning')){?>
<div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                <strong><i class="fa fa-exclamation-triangle"></i> Warning!</strong> <?= $this->session->flashdata('warning'); ?>
                            </div>
<?php } ?>
  <?php if($this->session->flashdata('success')){ ?>
          <div class="alert alert-success alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
              <strong><i class="fa fa-check"></i>  Success!</strong> <?= $this->session->flashdata('success'); ?>
          </div>
        <?php } ?>
        <h2 class="form-signin-heading">OEM Login</h2>
        <label for="inputEmail1">Email address</label>
        <input type="email" id="inputEmail1" name="email" class="form-control" required="" autofocus="">
         <div class="clearfix">
        &nbsp;
        </div>
        <label for="inputPassword1">Password</label>
        <input type="password" id="inputPassword1" name="pass" class="form-control" required="">
        <div class="clearfix">
        </div>
         <div class="clearfix">
        &nbsp;
        </div>
       
        <div class="clearfix">
        &nbsp;
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>
     </div> 
    </div>
    </div>  <!-- /container -->
    <!--<div class="container" id = "signup">-->
    <!--  <form class="form-signin" method  = "post"  id = "daftar" >-->
    <!--    <h2 class="form-signin-heading">Sign up</h2>-->
        
    <!--    <label for="inputEmail" class="sr-only">Email Address</label>-->
    <!--      <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email Address" required="" autofocus="" style="border-bottom-right-radius: 4px; border-bottom-left-radius: 4px;">-->
        
    <!--    <label for="inputPassword" class="sr-only">Password</label>-->
    <!--      <input type="password"  id="pass1" class="form-control" placeholder="Password" required="" autofocus="" style="border-bottom-right-radius: 0px; border-bottom-left-radius: 0px; border-top-left-radius: 4px; border-top-right-radius: 4px; margin-bottom: 0px; margin-top: 10px;">-->
    <!--    <label for="reinputPassword" class="sr-only">Re-password</label>-->
    <!--      <input type="password"  id="pass2" class="form-control" placeholder="Re-password" required="" autofocus="">-->
    <!--    <input type="hidden" value = "null" name = "pass" id = "pass3"><span id = "msg"></span>-->
    <!--    <div class="checkbox">-->
          <!--<input type="checkbox" value="remember-me"> -->
    <!--      <a><label class = "btn2 col-sm-5">Sign In</label></a>-->
    <!--      <a href=""><label class = "btn1 col-sm-offset-2" style="text-align: right;" >Back Home</label></a>-->
    <!--    </div>-->
    <!--    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign Up</button>-->
    <!--  </form>-->
      

    <!--</div> /container-->
    <div id = "msg2"></div>
</body>
<div id="menu" hidden>
<div class="row">
  <div class="col-xs-4">
    <div class="panel panel-default">
      <div class="panel-body">
        <div class="col-xs-4"><a href="http://www.drizz.nastyjuice.com/login"><button type="button" class="btn btn-default"><img src="<?= base_url('assets/cover/drizz.png'); ?>" class="img-responsive" alt="Image"></button></a></div>
      </div>
    </div>   
  </div>  
</div>
</div>
<script type="text/javascript">

bootbox.alert('haha');
  
</script>
</html>