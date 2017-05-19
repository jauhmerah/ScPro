
<style type="text/css">
    @CHARSET "UTF-8";
/*
over-ride "Weak" message, show font in dark grey
*/

.progress-bar {
    color: #333;
} 

/*
Reference:
http://www.bootstrapzen.com/item/135/simple-login-form-logo/
*/

* {
    -webkit-box-sizing: border-box;
       -moz-box-sizing: border-box;
            box-sizing: border-box;
    outline: none;
}

    .form-control {
      position: relative;
      font-size: 16px;
      height: auto;
      padding: 10px;
        @include box-sizing(border-box);

        &:focus {
          z-index: 2;
        }
    }

/*body {
    background: url(http://i.imgur.com/GHr12sH.jpg) no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
}*/

.login-form {
    margin-top: 60px;
}

form[role=login] {
    color: #5d5d5d;
    background: #f2f2f2;
    padding: 26px;
    border-radius: 10px;
    -moz-border-radius: 10px;
    -webkit-border-radius: 10px;
}
    form[role=login] img {
        display: block;
        margin: 0 auto;
        margin-bottom: 35px;
    }
    form[role=login] input,
    form[role=login] button {
        font-size: 18px;
        margin: 16px 0;
    }
    form[role=login] > div {
        text-align: center;
    }
    
.form-links {
    text-align: center;
    margin-top: 1em;
    margin-bottom: 50px;
}
    .form-links a {
        color: #fff;
    }



</style>
<link href="<?= base_url(); ?>/asset/css/strength.css" rel="stylesheet" type="text/css" />
<div class="row">
	<div class="col-md-12">
		<div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-user"></i>Add User</div>                
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <section class="login-form">
                <form  action="<?= site_url('nasty_v2/dashboard/addStaff') ?>" method = 'post' class="form-horizontal">
                    <div class="form-body">
                    	<h3 class="form-section">User Detail</h3>
                        <div class="form-group">
                            <label class="col-md-3 control-label">First Name :</label>
                            <div class="col-md-4">
                                <input type="text" name="fname" class="form-control input-circle" placeholder="First Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Last Name :</label>
                            <div class="col-md-4">
                                <input type="text" name="lname" class="form-control input-circle" placeholder="Last Name">
                            </div>
                        </div>
                        
                          <div class="form-group">
                            <label class="col-md-3 control-label">Username* :</label>
                           <div class="col-md-4">
                                <input type="text" name="username" class="form-control input-circle" placeholder="Username" required >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Phone No :</label>
                           <div class="col-md-4">
                                <input type="text" name="phone" class="form-control input-circle" placeholder="Phone" required >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Email Address*</label>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <span class="input-group-addon input-circle-left">
                                        <i class="fa fa-envelope"></i>
                                    </span>
                                    <input type="email" name="email" class="form-control input-circle-right" placeholder="Email" required> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Membership :</label>
                            <div class="col-md-4">
                                <select name="lvl" id="input" class="form-control input-circle">
                                
                        	<?php foreach ($lvl as $key) {
                        		?>
								<option value="<?= $key->ul_id; ?>" > <?= $key->ul_desc; ?></option>
                        		<?php
                        	} ?>
                        </select>
                            </div>
                        </div>
                        <h3 class="form-section">New Password</h3>
                        <div class="form-group" id="p1">
                            <label class="col-md-3 control-label">New Password* :</label>
                            <div class="col-md-4" >
                             <input type="password" name="pass" id ="password" class="form-control input-circle" placeholder="New Password" required>
                                    
                                
                            </div>
                            
                        </div>
                        
                        
                        <div class="row form-group" id="p2">
                            <label class="col-md-3 control-label">Re-password :</label>
                            <div class="col-md-4">
                                    <input type="password" id = "pass2" class="form-control input-circle" placeholder="Re-password">                                    
                            </div>

                        </div>
                        <div class="row form-group">
                        <label class="col-md-3 control-label"></label>
                        <div id="pwd-container" class="col-md-4">
                            <div class="pwstrength_viewport_progress"></div>
                            </div>
                        </div>
                        
                    </div>
                    
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" id="btnSubmit" class="btn btn-circle green">Add Staff</button>
                                <a href="<?= site_url('nasty_v2/dashboard/page/c1');?>"><button type="button" class="btn btn-circle grey-salsa btn-outline">Cancel</button></a>
                            </div>
                        </div>
                    </div>
                </form>
                </section>
                <!-- END FORM-->



                <div class="col-md-4"></div>
            </div>
        </div>
        <script src="<?= base_url(); ?>/asset/js/strength.js"></script>
        <!-- <script src="<?= base_url(); ?>/asset/js/js.js"></script> -->
		<script>
			$(document).ready(function() {



    
        




				$('#password').keyup(function() {
					if ($(this).val() == "") {
						$("#p1").prop('class', 'form-group');
						$("#pass2").val("");
						$("#p2").prop('class', 'form-group');
						$("#btnSubmit").removeProp('disabled');
					}else{
						$("#p1").prop('class', 'form-group has-warning');
						$("#btnSubmit").prop('disabled', 'disabled');
					}
				});
				$('#pass2').keyup(function() {
					if ($(this).val() == "" || $(this).val() != $('#password').val()) {
						$("#p1").prop('class', 'form-group has-warning');
						$("#p2").prop('class', 'form-group has-error');
						$("#btnSubmit").prop('disabled', 'disabled');
					}else{
						$("#p1").prop('class', 'form-group has-success');
						$("#p2").prop('class', 'form-group has-success');
						$("#btnSubmit").removeProp('disabled');
					}
				});
			});
		</script>
	</div>
</div>