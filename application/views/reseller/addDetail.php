<link href="<?= base_url(); ?>/asset/css/strength.css" rel="stylesheet" type="text/css" />

<link href="<?= base_url(); ?>asset2/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css">
<script src="<?= base_url(); ?>asset2/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>

<link href="<?= base_url(); ?>asset2/global/plugins/bootstrap-switch/css/bootstrap-switch.css" rel="stylesheet" type="text/css">
<script src="<?= base_url(); ?>asset2/global/plugins/bootstrap-switch/js/bootstrap-switch.js" type="text/javascript"></script>
<div class="row">
	<div class="col-md-12">
		<div class="portlet box purple">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-building"></i>Add Shop Detail</div>
                
            </div>
            0
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <form  action="<?= site_url('reseller/addDetail') ?>" method = 'post' class="form-horizontal" enctype="multipart/form-data">
                    <div class="form-body">
                    	<h3 class="form-section">Shop Detail</h3>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Shop Logo:</label>
                                <div class="fileinput fileinput-new col-md-2 " data-provides="fileinput">
                                    <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 190px; height: 140px; line-height: 150px;"></div>
                                   
                                        <span class="btn red btn-outline btn-file">
                                            <span class="fileinput-new"> Select image </span>
                                            <span class="fileinput-exists"> Change </span>
                                            <input type="hidden" value="" name="title"><input type="file" name="logo"> </span>
                                        <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                
                                </div>

                            
                            </div>
                            <div class="form-group">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-4">
                            <div class="alert alert-danger alert-dismissable">
                                <!-- <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> -->
                                <strong><!-- <i class="fa fa-exclamation-triangle"></i> --></strong>Please make sure that your logo image size is (300x300) pixels and below.
                            </div>
                            </div>
                            </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Shop Name :</label>
                            <div class="col-md-4">
                                <input type="text" name="sh_name" class="form-control input-circle" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Owner Name :</label>
                            <div class="col-md-4">
                                <input type="text" name="owner_name" class="form-control input-circle" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Shop Registration No.:</label>
                           <div class="col-md-4">
                                <input type="text" name="registration_no" class="form-control input-circle" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Phone No.:</label>
                           <div class="col-md-4">
                                <input type="text" name="phone_no" class="form-control input-circle" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Fax No.:</label>
                           <div class="col-md-4">
                                <input type="text" name="faks_no" class="form-control input-circle" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Email Address</label>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <span class="input-group-addon input-circle-left">
                                        <i class="fa fa-envelope"></i>
                                    </span>
                                    <input type="email" name="email" class="form-control input-circle-right" required=""> </div>
                            </div>
                        </div>
                        <!-- <div class="form-group">
                            <label class="col-md-3 control-label">Membership :</label>
                            <div class="col-md-4">
                                <select name="lvl" id="input" class="form-control input-circle">
                        	<?php foreach ($lvl as $key) {
                        		?>
								<option value="<?= $key->ul_id; ?>" <?php if($key->ul_id == $arr->us_lvl){echo " selected ";} ?> > <?= $key->ul_desc; ?></option>
                        		<?php
                        	} ?>
                        </select>
                            </div>
                        </div> -->
                       <!--  <h3 class="form-section">New Password</h3>
                        <div class="form-group" id="p1">
                            <label class="col-md-3 control-label">New Password :</label>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <input type="password" name="pass" id = "password" class="form-control input-circle-left" placeholder="New Password">
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
                        <div class="row form-group">
                        <label class="col-md-3 control-label"></label>
                        <div id="pwd-container" class="col-md-4">
                            <div class="pwstrength_viewport_progress"></div>
                            </div>
                        </div> -->
                        <?php
                        $userId = $this->my_func->scpro_decrypt($this->session->userdata('us_id'));
                        ?>
                         <input type="hidden" name="us_id" id="us_id" class="form-control" value="<?= $userId ?>">
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" id="btnSubmit" class="btn btn-circle green">Save</button>
                                <a href="<?= site_url('reseller/page/s1');?>"><button type="button" class="btn btn-circle grey-salsa btn-outline">Cancel</button></a>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- END FORM-->
            </div>
        </div>
        <script src="<?= base_url(); ?>/asset/js/strength.js"></script>
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