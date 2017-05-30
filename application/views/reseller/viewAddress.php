<link href="<?= base_url(); ?>/asset/css/strength.css" rel="stylesheet" type="text/css" />
<div class="row">
	<div class="col-md-12">
		<div class="portlet box purple">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-user"></i>View Address</div>
                
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <form class="form-horizontal">
                    <div class="form-body">
                    	<h3 class="form-section">Address Detail</h3>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Company Name :</label>
                            <div class="col-md-4">
                                <input type="text" name="fname" class="form-control input-circle" disabled placeholder="<?= $arr->company_name; ?>">
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label class="col-md-3 control-label">Address :</label>
                           <div class="col-md-4">
                                <textarea name="username" class="form-control input-circle" disabled placeholder="<?= $arr->address; ?>"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Town</label>
                            <div class="col-md-4">
                                <div class="input-group">
                                    
                                    <input type="text" name="email" class="form-control input-circle" disabled placeholder="<?= $arr->town; ?>"> 
                                    
                                    </div>
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="col-md-3 control-label">Poscode</label>
                             <div class="col-md-4">
                                <input type="text" name="fname" class="form-control input-circle" disabled placeholder="<?= $arr->poscode; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">State</label>
                            <div class="col-md-4">
                                <div class="input-group">
                                    
                                    <input type="text" name="email" class="form-control input-circle" disabled placeholder="<?= $arr->state_name; ?>"> 

                                    </div>
                            </div>
                        </div> 
                        <div class="form-group">
                            <label class="col-md-3 control-label">Mobile Number</label>
                            <div class="col-md-4">
                                <div class="input-group">                                    
                                    <input type="text" name="email" class="form-control input-circle" disabled placeholder="<?= '+60'.$arr->add_mnum; ?>"> 
                                    </div>
                            </div>
                        </div>                       
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <!-- <button type="submit" id="btnSubmit" class="btn btn-circle green">Save</button> -->
                                <a href="<?= site_url('reseller/page/s12');?>"><button type="button" class="btn btn-circle green">Back</button></a>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- END FORM-->
            </div>
        </div>        
	</div>
</div>