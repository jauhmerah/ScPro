<link href="<?= base_url(); ?>/asset/css/strength.css" rel="stylesheet" type="text/css" />
<div class="row">
	<div class="col-md-12">
		<div class="portlet box purple">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-user"></i>Add Address</div>
                
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <form  action="<?= site_url('reseller/addAddress') ?>" method = 'post' class="form-horizontal">
                    <div class="form-body">
                    	<h3 class="form-section">Address Detail</h3>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Company Name :</label>
                            <div class="col-md-4">
                                <input type="text" name="company_name" class="form-control input-circle" placeholder="" required>
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label class="col-md-3 control-label">Address :</label>
                           <div class="col-md-4">
                                <textarea name="address" class="form-control input-circle" required></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Town</label>
                            <div class="col-md-4">
                                
                                    
                                    <input type="text" name="town" class="form-control input-circle" placeholder="" required> 

                                     <!-- <span class="input-group-addon input-circle-right">
                                        <i class="fa fa-angle-down"></i>
                                    </span> -->
                                    
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="col-md-3 control-label">Poscode</label>
                             <div class="col-md-2">
                                <input type="text" name="poscode" class="form-control input-circle" placeholder="" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">State</label>
                            <div class="col-md-4">
                                
                                    
                                    <select name="state" class="form-control input-circle" placeholder="" required> 
                                        <?php 
                                                    foreach ($arr as $key) { ?>
                                                        <option value="<?= $key->state_id; ?>"> <?= $key->state_name; ?> </option>
                                                    <?php }
                                                    ?>
                                     
                                    </select>
                                    
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
                        <!-- <h3 class="form-section">New Password</h3>
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
                        </div> -->
                        <!-- <div class="form-group" id="p2">
                            <label class="col-md-3 control-label">Re-password :</label>
                            <div class="col-md-4">
                                    <input type="password" id = "pass2" class="form-control input-circle" placeholder="Re-password">                                    
                            </div>
                        </div> -->
                        <!-- <div class="row form-group">
                        <label class="col-md-3 control-label"></label>
                        <div id="pwd-container" class="col-md-4">
                            <div class="pwstrength_viewport_progress"></div>
                            </div>
                        </div> -->
                         <input type="hidden" name="us_id" id="us_id" class="form-control" value="<?= $this->my_func->scpro_decrypt($this->session->userdata('us_id')) ?>">
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