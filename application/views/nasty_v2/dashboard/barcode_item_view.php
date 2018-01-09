<div class="row">
	<div class="col-md-12">
		<div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-eye"></i>Finish Item 
                </div>
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
                
                <form class="form-horizontal" role="form">
                    <div class="form-body">

                        
                        <h3 class="form-section">Barcode Info</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                        <label class="control-label col-md-3">Barcode Number:</label>
                                    
                                    <div class="col-md-9">
                                        <p class="form-control-static"><?php $text = ($arr->bi_code == null) ? "Not Set" : $arr->bi_code ; echo $text; ?> </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">Item Name:</label>
                                    <div class="col-md-9">
                                        <p class="form-control-static"> <?php $text = ($arr->ty2_desc == null) ? "Not Set" : $arr->ty2_desc ; echo $text; ?> </p>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">Series:</label>
                                    <div class="col-md-9">
                                        <p class="form-control-static"> <?php $text = ($arr->ca_desc == null) ? "Not Set" : $arr->ca_desc ; echo $text; ?> </p>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <!--/row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">Nicotine:</label>
                                    <div class="col-md-9">
                                        <p class="form-control-static"> <?php $text = ($arr->ni_mg == null) ? "Not Set" : $arr->ni_mg ; echo $text.'mg'; ?>  </p>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                        <!--/row-->
                       
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                    <?php 
                                    	$id = $this->my_func->scpro_encrypt($arr->bi_id);
                                    ?>
                                        <a href="<?= site_url('nasty_v2/dashboard/page/i42?edit=').$id; ?>">
                                        <button type="button" class="btn green">
                                            <i class="fa fa-pencil"></i> Edit
                                        </button></a>
                                        <a href="<?= site_url('nasty_v2/dashboard/page/i4');?>"><button type="button" class="btn default">Cancel</button></a>
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