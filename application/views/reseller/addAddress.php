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
                            <label class="col-md-3 control-label">City</label>
                            <div class="col-md-4">
                                
                                    
                                    <input type="text" name="town" class="form-control input-circle" placeholder="" required> 

                                     <!-- <span class="input-group-addon input-circle-right">
                                        <i class="fa fa-angle-down"></i>
                                    </span> -->
                                    
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Postcode</label>
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
                        <div class="form-group">
                            <label class="col-md-3 control-label">Mobile Number</label>
                             <div class="col-md-2">
                                <div class="input-group">
                                    <span class="input-group-addon input-circle-left input-sm ">
                                        <i>+60</i>
                                    </span>
                                    <input name="add_mnum" type="text" class="form-control input-circle-right" required="required"> </div>
                            </div>
                        </div>                        
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
	</div>
</div>