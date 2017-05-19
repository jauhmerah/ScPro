<div class="row">
	<div class="col-md-12">
		<div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i>User Detail 
                </div>
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->




                <form class="form-horizontal" role="form">
                    <div class="form-body">
                        <h2 class="margin-bottom-20"> User Info - <?php $text = ($arr->us_fname == null || $arr->us_lname == null) ? "Name Not Set" : $arr->us_fname." ".$arr->us_lname ; echo $text; ?> </h2>
                        <?php if($arr1!=null){ ?>
                        <img src="<?= base_url(); ?><?= $arr1->logo; ?>"> 
                        <?php } ?>
                        <h3 class="form-section">Person Info</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">First Name:</label>
                                    <div class="col-md-9">
                                        <p class="form-control-static"> <?php $text = ($arr->us_fname == null) ? "Not Set" : $arr->us_fname ; echo $text; ?> </p>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">Last Name:</label>
                                    <div class="col-md-9">
                                        <p class="form-control-static"> <?php $text = ($arr->us_lname == null) ? "Not Set" : $arr->us_lname ; echo $text; ?> </p>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <!--/row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">Username:</label>
                                    <div class="col-md-9">
                                        <p class="form-control-static"> <?php $text = ($arr->us_username == null) ? "Not Set" : $arr->us_username ; echo $text; ?>  </p>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">Signup Date:</label>
                                    <div class="col-md-9">
                                        <p class="form-control-static"> <?php $text = ($arr->us_signup == null) ? "Not Set" : $arr->us_signup ; echo $text; ?> </p>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <!--/row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">Email:</label>
                                    <div class="col-md-9">
                                        <p class="form-control-static"> <?php $text = ($arr->us_email == null) ? "Not Set" : $arr->us_email ; echo $text; ?> </p>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">Membership:</label>
                                    <div class="col-md-9">
                                        <p class="form-control-static"> <?php $text = ($arr->ul_desc == null) ? "Not Set" : $arr->ul_desc ; echo $text; ?> </p>
                                    </div>
                                </div>
                            </div>                          
                            <!--/span-->
                        </div>
                        <!--/row-->                       
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                    <?php 
                                    	$usId = $this->my_func->scpro_encrypt($arr->us_id);
                                    ?>
                                        <a href="<?= site_url('reseller/page/c11?edit=').$usId; ?>">
                                        <button type="button" class="btn green">
                                            <i class="fa fa-pencil"></i> Edit
                                        </button></a>
                                        <a href="<?= site_url('reseller/page/a1');?>"><button type="button" class="btn default">Cancel</button></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6"> </div>
                        </div>
                    </div>
                </form>
                <!-- END FORM-->
            </div>
        </div>
	</div>
</div>