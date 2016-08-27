<div class="row">
	<div class="col-md-12">
		<div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-user"></i>Add Staff</div>                
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <form  action="<?= site_url('nasty_v2/dashboard/addStaff') ?>" method = 'post' class="form-horizontal">
                    <div class="form-body">
                    	<h3 class="form-section">Staff Detail</h3>
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
                            <div class="col-md-4">
                                <div class="input-group">
                                    <input type="password" name="pass" id = "pass1" class="form-control input-circle-left" placeholder="New Password" required>
                                    <span class="input-group-addon input-circle-right">
                                        <i class="fa fa-key"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group" id="p2">
                            <label class="col-md-3 control-label">Re-password :</label>
                            <div class="col-md-4">
                                    <input type="password" id = "pass2" class="form-control input-circle" placeholder="Re-password">                                    
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
                <!-- END FORM-->
            </div>
        </div>
		<script>
			$(document).ready(function() {
				$('#pass1').keyup(function() {
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
					if ($(this).val() == "" || $(this).val() != $('#pass1').val()) {
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