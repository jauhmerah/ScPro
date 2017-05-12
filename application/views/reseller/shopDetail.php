<div class="row">
	<div class="col-md-12">
		<div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-building"></i>Shop Detail 
                </div>
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->


                        <?php if(!$arr){ ?>
                        <form class="form-horizontal" role="form">
                                <div class="form-body">
                                <center>
                            <a href="<?= site_url('reseller/page/s18') ?>">
                              
                                        <button type="button" class="btn green btn-lg">
                                            <i class="fa fa-plus"></i> Add Shop Detail
                                        </button></a></center>
                                        </div>
                                        </form>


                        <?php
                        }else{

                        ?>


                <form class="form-horizontal" role="form">
                    <div class="form-body">
                        <!-- <h2 class="margin-bottom-20"> User Info - <?php $text = ($arr->us_fname == null || $arr->us_lname == null) ? "Name Not Set" : $arr->us_fname." ".$arr->us_lname ; echo $text; ?> </h2> -->


                        <img src="<?= base_url(); ?><?= $arr->logo; ?>"> 
                        <h3 class="form-section">Shop Info</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">Shop Name:</label>
                                    <div class="col-md-9">
                                        <p class="form-control-static"> <?php $text = ($arr->sh_name == null) ? "Not Set" : $arr->sh_name ; echo $text; ?> </p>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                            </div>
                             <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">Owner Name:</label>
                                    <div class="col-md-9">
                                        <p class="form-control-static"> <?php $text = ($arr->owner_name == null) ? "Not Set" : $arr->owner_name ; echo $text; ?> </p>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <!--/row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">Shop Registration No.:</label>
                                    <div class="col-md-9">
                                        <p class="form-control-static"> <?php $text = ($arr->registration_no == null) ? "Not Set" : $arr->registration_no ; echo $text; ?>  </p>
                                    </div>
                                </div>
                            </div>
                            </div>
                        
                        <!--/row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">Phone No.:</label>
                                    <div class="col-md-9">
                                        <p class="form-control-static"> <?php $text = ($arr->phone_no == null) ? "Not Set" : $arr->phone_no ; echo $text; ?> </p>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">Fax No.:</label>
                                    <div class="col-md-9">
                                        <p class="form-control-static"> <?php $text = ($arr->faks_no == null) ? "Not Set" : $arr->faks_no ; echo $text; ?> </p>
                                    </div>
                                </div>
                            </div> 
                               <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">Email:</label>
                                    <div class="col-md-9">
                                        <p class="form-control-static"> <?php $text = ($arr->email == null) ? "Not Set" : $arr->email ; echo $text; ?> </p>
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
                <?php } ?>
                <!-- END FORM-->
            </div>
        </div>
	</div>
</div>