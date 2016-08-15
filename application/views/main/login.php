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
<script src="<?php echo base_url();?>asset/js/jquery.backstretch.js"></script>
<script>
    $.backstretch([
      "<?php echo base_url();?>asset/slider/bg1.jpg",
      "<?php echo base_url();?>asset/slider/bg2.jpg"
    ], {
      fade: 850,    //Speed of Fade
      duration: 10000  //Time of image display
    });
</script>
  <div class = "container">
     <div class="col-lg-offset-5 col-lg-2" align="center">
         <img src="<?= base_url(); ?>assets/cover/logo.png" class="img-responsive" alt="Image">
     </div> 
  </div>
    <div class="container" id = "signin">
      <form class="form-signin" method="post" action = "<?= site_url('login/signin'); ?>">
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="inputEmail1" class="sr-only">Email address</label>
        <input type="email" id="inputEmail1" name="email" class="form-control" placeholder="Email address" required="" autofocus="">
        <label for="inputPassword1" class="sr-only">Password</label>
        <input type="password" id="inputPassword1" name="pass" class="form-control" placeholder="Password" required="">
        <div class="checkbox">
          <!--<input type="checkbox" value="remember-me"> 
          <a><label class = "btn1 col-sm-5">Sign Up</label></a>
          <a href="<?= site_url('main'); ?>"><label class = "btn1 col-sm-offset-2" style="text-align: right;" >Back Home</label></a>-->
        </div>
        <div class="clearfix">
        &nbsp;
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>

    </div> <!-- /container -->
    <div class="container" id = "signup">
      <form class="form-signin" method  = "post" action="<?= site_url('login/signup'); ?>" id = "daftar" >
        <h2 class="form-signin-heading">Sign up</h2>
        
        <label for="inputEmail" class="sr-only">Email Address</label>
          <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email Address" required="" autofocus="" style="border-bottom-right-radius: 4px; border-bottom-left-radius: 4px;">
        
        <label for="inputPassword" class="sr-only">Password</label>
          <input type="password"  id="pass1" class="form-control" placeholder="Password" required="" autofocus="" style="border-bottom-right-radius: 0px; border-bottom-left-radius: 0px; border-top-left-radius: 4px; border-top-right-radius: 4px; margin-bottom: 0px; margin-top: 10px;">
        <label for="reinputPassword" class="sr-only">Re-password</label>
          <input type="password"  id="pass2" class="form-control" placeholder="Re-password" required="" autofocus="">
        <input type="hidden" value = "null" name = "pass" id = "pass3"><span id = "msg"></span>
        <div class="checkbox">
          <!--<input type="checkbox" value="remember-me"> -->
          <a><label class = "btn2 col-sm-5">Sign In</label></a>
          <a href="<?= site_url('main'); ?>"><label class = "btn1 col-sm-offset-2" style="text-align: right;" >Back Home</label></a>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign Up</button>
      </form>
      

    </div> <!-- /container -->
    <div id = "msg2"></div>


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <!--<script src="<?= base_url(); ?>asset/sign/ie10-viewport-bug-workaround.js"></script>-->
  

</body>
</html>