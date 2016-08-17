<div class="row">
	<div class="col-md-12">
           <div class="tab-pane active" id="tab_1">
                        <div class="portlet box green">
                            <div class="portlet-title">
                                <div class="caption">
                                    <img src="<?= base_url(); ?>/assets/cover/favicon2.png"> Order List                                     
                                </div>
                                <div class="tools">
                                    <!--<a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                                    <a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title=""> </a>
                                    <a href="javascript:;" class="reload" data-original-title="" title=""> </a>
                                    <a href="javascript:;" class="remove" data-original-title="" title=""> </a>-->
                                    <span class="pull-right" style="color:red;">#100000</span>
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <!-- BEGIN FORM-->
                                <form action="#" class="horizontal-form">
                                    <div class="form-body">
                                        <h3 class="form-section">Client Info</h3>
                                        <div class="row">
                                        	<div class="col-md-8">
                                        		<div class="row">
		                                            <div class="col-md-6">
		                                                <div class="form-group">
		                                                    <label class="control-label">Name* :</label>
		                                                    <input type="text" id="name" name="name" class="form-control input-circle" placeholder="Client Name" required>
		                                                </div>
		                                            </div>
		                                            <!--/span-->
		                                            <div class="col-md-6">
		                                                <div class="form-group">
		                                                    <label class="control-label">Company :</label>
		                                                    <input type="text" id="company" name="company" class="form-control input-circle" placeholder="Nasty">
		                                                </div>
		                                            </div>
		                                            <!--/span-->
		                                        </div>
		                                        <!--/row-->
		                                        <div class="row">
		                                            <div class="col-md-6">
		                                                <div class="form-group">
		                                                    <label class="control-label">Contact Number* :</label>
		                                                    <input type="text" id="tel" name="tel" class="form-control input-circle" placeholder="Client Number" required>
		                                                </div>
		                                            </div>
		                                            <!--/span-->
		                                            <div class="col-md-6">
		                                                <div class="form-group">
		                                                    <label class="control-label">Country* :</label>
		                                                    <input type="text" id="country" name="country" class="form-control input-circle" placeholder="Country" required>
		                                                </div>
		                                            </div>
		                                            <!--/span-->
		                                        </div>
		                                        <!--/row-->
		                                        <div class="row">
		                                            <div class="col-md-6">
		                                                <div class="form-group">
		                                                    <label class="control-label">Sales Person* :</label>
		                                                    <input type="text" id="salesPerson" name="salesPerson" class="form-control input-circle" placeholder="Jauhmerah" required>
		                                                </div>
		                                            </div>
		                                            <!--/span-->
		                                            <div class="col-md-6">
		                                                <div class="form-group">
		                                                    <label class="control-label">Email* :</label>
		                                                    <input type="text" id="email" name="email" class="form-control input-circle" placeholder="jauhmerah@nastyjuice.com" required>
		                                                </div>
		                                            </div>
		                                            <!--/span-->
		                                        </div>
                                        	</div>
                                        	<div class="col-md-4">
                                        		<div class="row">		                                            
	                                                <div class="form-group col-md-12">
	                                                    <label class="control-label">Date Line :</label>
	                                                    <input type="date" id="dateline" name="dateline" class="form-control input-circle">
	                                                </div>
		                                            <!--/span-->
	                                            </div>
	                                            <div class="row">	
	                                                <div class="form-group col-md-12">
	                                                    <label class="control-label">Order Date :</label>
	                                                    <input type="date" id="orderdate" name="orderdate" class="form-control input-circle">
	                                                </div>		                                            
		                                            <!--/span-->
		                                        </div>
		                                        <div class="row">	
	                                                <div class="form-group col-md-12">
	                                                    <label class="control-label">Finish Date :</label>
	                                                    <input type="date" id="finishdate" name="finishdate" class="form-control input-circle">
	                                                </div>		                                            
		                                            <!--/span-->
		                                        </div>
		                                        <div class="row">	
	                                                <div class="form-group col-md-12">
	                                                    <label class="control-label">Currency :</label>
	                                                    <select class="form-control input-circle">
	                                                        <option value="MYR">MYR</option>
	                                                        <option value="USD">USD</option>
	                                                        <option value="EURO">EURO</option>
	                                                    </select>
	                                                </div>		                                            
		                                            <!--/span-->
		                                        </div>
                                        	</div>
                                        </div>
                                        <h3 class="form-section">Order Note</h3>
                                        <!--/row-->
                                        <div class="row">
                                        	<div class="col-md-12">
	                                            <div class="portlet box green">
					                                <div class="portlet-title">
					                                    <div class="caption">
					                                        <i class="fa fa-cogs"></i>Responsive Flip Scroll Tables </div>
					                                    <div class="tools">
					                                        <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
					                                        <a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title=""> </a>
					                                        <a href="javascript:;" class="reload" data-original-title="" title=""> </a>
					                                        <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
					                                    </div>
					                                </div>
					                                <div class="portlet-body flip-scroll">
					                                    <table class="table table-bordered table-striped table-condensed flip-content">
					                                        <thead class="flip-content">
					                                            <tr>
					                                                <th>#</th>
					                                                <th>Type</th>
					                                                <th colspan="2">O Mg</th>
					                                                <th colspan="2">3 Mg</th>
					                                                <th colspan="2">6 Mg</th>
					                                                <th>QTY</th>
					                                                <th>UNIT $</th>
					                                                <th>AMOUNT $</th>
					                                            </tr>
					                                        </thead>
					                                        <tbody>
					                                            <tr>
					                                                <td>1</td>
					                                                <td>Blackurrant | <strong>Bad Blood</strong> | Red</td>
					                                                <td class="numeric"> &nbsp; </td>
					                                                <td class="numeric"> -0.01 </td>
					                                                <td class="numeric"> -0.36% </td>
					                                                <td class="numeric"> $1.39 </td>
					                                                <td class="numeric"> $1.39 </td>
					                                                <td class="numeric"> &nbsp; </td>
					                                                <td class="numeric"> 9,395 </td>
					                                                <td class="numeric"> 9,395 </td>
					                                                <td class="numeric"> 9,395 </td>
					                                            </tr>
					                                        </tbody>
					                                    </table>
					                                </div>
					                            </div>
					                        </div>
                                        </div>
                                        <!--/row-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Category</label>
                                                    <select class="form-control" data-placeholder="Choose a Category" tabindex="1">
                                                        <option value="Category 1">Category 1</option>
                                                        <option value="Category 2">Category 2</option>
                                                        <option value="Category 3">Category 5</option>
                                                        <option value="Category 4">Category 4</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Membership</label>
                                                    <div class="radio-list">
                                                        <label class="radio-inline">
                                                            <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked=""> Option 1 </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2"> Option 2 </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                        <h3 class="form-section">Address</h3>
                                        <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="form-group">
                                                    <label>Street</label>
                                                    <input type="text" class="form-control"> </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>City</label>
                                                    <input type="text" class="form-control"> </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>State</label>
                                                    <input type="text" class="form-control"> </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Post Code</label>
                                                    <input type="text" class="form-control"> </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Country</label>
                                                    <select class="form-control"> </select>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                    </div>
                                    <div class="form-actions right">
                                        <button type="button" class="btn default">Cancel</button>
                                        <button type="submit" class="btn blue">
                                            <i class="fa fa-check"></i> Save</button>
                                    </div>
                                </form>
                                <!-- END FORM-->
                            </div>
                        </div>                       
                    </div>
        </div>
</div>