<div class="row">
	<div class="col-md-12">
		<div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i>Staff Detail 
                </div>
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <form class="form-horizontal" role="form">
                    <div class="form-body">
                    	<pre>
                    		<?php print_r($arr); ?>
                    	</pre>
                        <h2 class="margin-bottom-20"> Staff Info - <?php $text = ($arr->us_fname == null || $arr->us_lname == null) ? "Name Not Set" : $arr->us_fname." ".$arr->us_lname ; echo $text; ?> </h2>
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
                                    <label class="control-label col-md-3">Date of Birth:</label>
                                    <div class="col-md-9">
                                        <p class="form-control-static"> 20.01.1984 </p>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <!--/row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">Category:</label>
                                    <div class="col-md-9">
                                        <p class="form-control-static"> Category1 </p>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">Membership:</label>
                                    <div class="col-md-9">
                                        <p class="form-control-static"> Free </p>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <!--/row-->
                        <h3 class="form-section">Address</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">Address:</label>
                                    <div class="col-md-9">
                                        <p class="form-control-static"> #24 Sun Park Avenue, Rolton Str </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">City:</label>
                                    <div class="col-md-9">
                                        <p class="form-control-static"> New York </p>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">State:</label>
                                    <div class="col-md-9">
                                        <p class="form-control-static"> New York </p>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <!--/row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">Post Code:</label>
                                    <div class="col-md-9">
                                        <p class="form-control-static"> 457890 </p>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">Country:</label>
                                    <div class="col-md-9">
                                        <p class="form-control-static"> USA </p>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn green">
                                            <i class="fa fa-pencil"></i> Edit</button>
                                        <button type="button" class="btn default">Cancel</button>
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