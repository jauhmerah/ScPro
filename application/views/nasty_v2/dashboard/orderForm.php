<div class="row">
	<div class="col-md-12">
           <div class="tab-pane active" id="tab_1">
                        <div class="portlet box green">
                            <div class="portlet-title">
                                <div class="caption">
                                    <img src="<?= base_url(); ?>/assets/cover/favicon2.png"> Order List                                     
                                </div>
                                <div class="tools">
                                    <span class="pull-right" style="color:red;">#100000</span>
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <!-- BEGIN FORM-->
                                <form action="<?= site_url('nasty_v2/dashboard/page/z11'); ?>" method = "post" class="horizontal-form">
                                    <div class="form-body">
                                    	<div class="row">
                                    		<div class="form-group">
		                                	<label for="input" class="col-sm-2 control-label">Exist Client :</label>
		                                	<div class="col-sm-2">
		                                		<select name="client" id="client" class="form-control input-circle" required="required">
		                                			<option value="-1">--New Client--</option>
		                                			<?php 
		                                			foreach ($client as $key) { ?>
		                                				<option value="<?= $key->cl_id; ?>"> <?= $key->cl_name; ?> </option>
		                                			<?php }
		                                			?>
		                                		</select>
		                                	</div>
		                                	<span class="pull-left" id="loadingText" style="display: none;"><i class="fa fa-spinner fa-spin"></i>&nbsp;Loading</span>
		                                	
		                                </div>
                                    	</div>
                                        <h3 class="form-section">Client Info</h3>
                                        <div class="row" id = "clientInfo">
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
		                                                    <input type="text" id="salesPerson" readonly name="salesPerson" class="form-control input-circle" value="<?php echo $this->my_func->scpro_decrypt($this->session->userdata('us_username')); ?>" >
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
		                                        <div class="row">
													<div class="col-md-12">
													    <div class="form-group">
													        <label class="control-label">Address* :</label>
													        <input type="text" id="address" name="address" class="form-control input-circle" placeholder = "Address" required >
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
	                                                    <input type="date" readonly id="orderdate" name="orderdate" value = "<?= date('Y-m-d'); ?>" class="form-control input-circle">
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
	                                                    <select class="form-control input-circle" name="currency">
	                                                        <option value="MYR">MYR</option>
	                                                        <option value="USD">USD</option>
	                                                        <option value="EURO">EURO</option>
	                                                    </select>
	                                                </div>		                                            
		                                            <!--/span-->
		                                        </div>
                                        	</div>
                                        </div>
                                        <!--/row-->
                                        <div class="clearfix">
                                        &nbsp;
                                        </div>
                                        <!-- Order Note -->
                                        <div class="col-md-12">
                                        <div class="row">
                                        	<div class="portlet box green">
				                                <div class="portlet-title">
				                                    <div class="caption">
				                                        <i class="fa fa-cogs"></i>Order Note </div>
				                                    <div class="tools">
				                                        <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
				                                        <a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title=""> </a>
				                                        <a href="javascript:;" class="reload" data-original-title="" title=""> </a>
				                                        <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
				                                    </div>
				                                </div>
				                                <div class="portlet-body">
				                                    <div class="table-responsive">
				                                        <table class="table table-striped table-bordered table-hover">
						                                    <thead>
						                                        <tr>
						                                            <th>#</th>
						                                            <th>Type</th>
						                                            <th colspan="2"><div align="center">O Mg</div></th>
						                                            <th colspan="2"><div align="center">3 Mg</div></th>
						                                            <th colspan="2"><div align="center">6 Mg</div></th>
						                                            <th><div align="center">QTY</div></th>
						                                            <th><div align="center">UNIT $</div></th>
						                                            <th><div align="center">AMOUNT $</div></th>
						                                        </tr>
						                                    </thead>
						                                    <tbody>
						                                       	<tr>
						                                            <td class="col-md-1">1</td>
						                                            <td class="col-md-4">Blackurrant | <strong>Bad Blood</strong> | Red</td>
						                                            <div class="col-md-4">
						                                            <td class="numeric"><input type="text" name="red[]" class="form-control input-sm"></td>
						                                            <td class="numeric"><input type="text" name="red[]" class="form-control input-sm"></td>
						                                            <td class="numeric"><input type="text" name="red[]" class="form-control input-sm"></td>
						                                            <td class="numeric"><input type="text" name="red[]" class="form-control input-sm"></td>
						                                            <td class="numeric"><input type="text" name="red[]" class="form-control input-sm"></td>
						                                            <td class="numeric"><input type="text" name="red[]" class="form-control input-sm"></td>
						                                            </div><div class="col-md-3">
						                                            <td class="numeric"><input type="text" name="qtyred[]" class="form-control input-sm"></td>
						                                            <td class="numeric"><input type="text" name="unitred[]" class="form-control input-sm"></td>
						                                            <td class="numeric"><input type="text" name="total[]" class="form-control input-sm"></td>
						                                            </div>
						                                        </tr>
						                                        <tr>
						                                            <td class="col-md-1">2</td>
						                                            <td class="col-md-4">Manggo | <strong>Fat Boy</strong> | Yellow</td>
						                                            <div class="col-md-4">
						                                            <td class="numeric"><input type="text" name="yellow[]" class="form-control input-sm"></td>
						                                            <td class="numeric"><input type="text" name="yellow[]" class="form-control input-sm"></td>
						                                            <td class="numeric"><input type="text" name="yellow[]" class="form-control input-sm"></td>
						                                            <td class="numeric"><input type="text" name="yellow[]" class="form-control input-sm"></td>
						                                            <td class="numeric"><input type="text" name="yellow[]" class="form-control input-sm"></td>
						                                            <td class="numeric"><input type="text" name="yellow[]" class="form-control input-sm"></td>
						                                            </div><div class="col-md-3">
						                                            <td class="numeric"><input type="text" name="qtyyellow[]" class="form-control input-sm"></td>
						                                            <td class="numeric"><input type="text" name="unityellow[]" class="form-control input-sm"></td>
						                                            <td class="numeric"><input type="text" name="total[]" class="form-control input-sm"></td>
						                                            </div>
						                                        </tr>
						                                        <tr>
						                                            <td class="col-md-1">3</td>
						                                            <td class="col-md-4">Honey Dew | <strong>Devil Teeth</strong> | Orange</td>
						                                            <td class="numeric"><input type="text" name="orange[]" class="form-control input-sm"></td>
						                                            <td class="numeric"><input type="text" name="orange[]" class="form-control input-sm"></td>
						                                            <td class="numeric"><input type="text" name="orange[]" class="form-control input-sm"></td>
						                                            <td class="numeric"><input type="text" name="orange[]" class="form-control input-sm"></td>
						                                            <td class="numeric"><input type="text" name="orange[]" class="form-control input-sm"></td>
						                                            <td class="numeric"><input type="text" name="orange[]" class="form-control input-sm"></td>
						                                            <td class="numeric"><input type="text" name="qtyorange[]" class="form-control input-sm"></td>
						                                            <td class="numeric"><input type="text" name="unitorange[]" class="form-control input-sm"></td>
						                                            <td class="numeric"><input type="text" name="total[]" class="form-control input-sm"></td>
						                                        </tr>
						                                        <tr>
						                                            <td class="col-md-1">4</td>
						                                            <td class="col-md-4">Grape | <strong>Asap Grape</strong> | Purple</td>
						                                            <td class="numeric"><input type="text" name="purple[]" class="form-control input-sm"></td>
						                                            <td class="numeric"><input type="text" name="purple[]" class="form-control input-sm"></td>
						                                            <td class="numeric"><input type="text" name="purple[]" class="form-control input-sm"></td>
						                                            <td class="numeric"><input type="text" name="purple[]" class="form-control input-sm"></td>
						                                            <td class="numeric"><input type="text" name="purple[]" class="form-control input-sm"></td>
						                                            <td class="numeric"><input type="text" name="purple[]" class="form-control input-sm"></td>
						                                            <td class="numeric"><input type="text" name="qtypurple[]" class="form-control input-sm"></td>
						                                            <td class="numeric"><input type="text" name="unitpurple[]" class="form-control input-sm"></td>
						                                            <td class="numeric"><input type="text" name="total[]" class="form-control input-sm"></td>
						                                        </tr>
						                                        <tr>
						                                            <td class="col-md-1">5</td>
						                                            <td class="col-md-4">Blackurrant + L | <strong>Wicked Haze</strong> | Pink</td>
						                                            <td class="numeric"><input type="text" name="pink[]" class="form-control input-sm"></td>
						                                            <td class="numeric"><input type="text" name="pink[]" class="form-control input-sm"></td>
						                                            <td class="numeric"><input type="text" name="pink[]" class="form-control input-sm"></td>
						                                            <td class="numeric"><input type="text" name="pink[]" class="form-control input-sm"></td>
						                                            <td class="numeric"><input type="text" name="pink[]" class="form-control input-sm"></td>
						                                            <td class="numeric"><input type="text" name="pink[]" class="form-control input-sm"></td>
						                                            <td class="numeric"><input type="text" name="qtypink[]" class="form-control input-sm"></td>
						                                            <td class="numeric"><input type="text" name="unitpink[]" class="form-control input-sm"></td>
						                                            <td class="numeric"><input type="text" name="total[]" class="form-control input-sm"></td>
						                                        </tr>
						                                        <tr>
						                                            <td class="col-md-1">6</td>
						                                            <td class="col-md-4">Pineapple | <strong>Slow Blow</strong> | Cyan</td>
						                                            <td class="numeric"><input type="text" name="cyan[]" class="form-control input-sm"></td>
						                                            <td class="numeric"><input type="text" name="cyan[]" class="form-control input-sm"></td>
						                                            <td class="numeric"><input type="text" name="cyan[]" class="form-control input-sm"></td>
						                                            <td class="numeric"><input type="text" name="cyan[]" class="form-control input-sm"></td>
						                                            <td class="numeric"><input type="text" name="cyan[]" class="form-control input-sm"></td>
						                                            <td class="numeric"><input type="text" name="cyan[]" class="form-control input-sm"></td>
						                                            <td class="numeric"><input type="text" name="qtycyan[]" class="form-control input-sm"></td>
						                                            <td class="numeric"><input type="text" name="unitcyan[]" class="form-control input-sm"></td>
						                                            <td class="numeric"><input type="text" name="total[]" class="form-control input-sm"></td>
						                                        </tr>
						                                    </tbody>
						                                </table>
				                                    </div>
				                                </div>
				                            </div>
                                        </div>
                                        </div>
                                        <!-- End Order Note -->
                                        <!-- Ship Form -->
                                        <div class="row">
						                <div class="col-md-12">              
						                	<div class="portlet box purple">
						                        <div class="portlet-title">
						                            <div class="caption">
						                                <i class="fa fa-ship"></i>Shipping Note 
						                            </div>
						                            <span class="pull-right">	                            	
						                            <div class="mt-radio-inline">
					                                    <label class="mt-radio">
					                                        <input type="radio" name="wide" value="0">
						                                		<strong>Worldwide</strong>
					                                        <span></span>
					                                    </label>
					                                    <label class="mt-radio">
					                                        <input type="radio" name="wide" value="1">
						                                		<strong>Nationwide</strong>
					                                        <span></span>
					                                    </label>
					                                </div>
						                            </span>
						                            
						                        </div>
						                        <div class="portlet-body">
						                            <div class="table-responsive">
						                                <table class="table table-striped table-condensed table-bordered">	                                    
						                                    <tbody>
						                                       	<tr>
					                                            	<th>
					                                            		Shipping Company
					                                            	</th>
					                                            	<td colspan="4" >
					                                            		<div class="mt-radio-inline">
										                                    <label class="mt-radio">
										                                        <input type="radio" name="sh_company" value="1">
											                                		DHL
										                                        <span></span>
										                                    </label>
										                                    <label class="mt-radio">
										                                        <input type="radio" name="sh_company" value="2">
											                                		ARAMEX
										                                        <span></span>
										                                    </label>
										                                    <label class="mt-radio">
										                                        <input type="radio" name="sh_company" value="3">
											                                		EMS
										                                        <span></span>
										                                    </label>
										                                    <label class="mt-radio">
										                                        <input type="radio" name="sh_company" value="4">
											                                		 : _________
										                                        <span></span>
										                                    </label>
										                                </div>
					                                            	</td>                                            	
					                                            	<th>
					                                            		Tracking No
					                                            	</th>
					                                            	<td>
					                                            		<input type = "text" name="traking" class="form-control input-circle">
					                                            	</td>
						                                        </tr>
						                                        <tr>
					                                            	<th>
					                                            		Shipping Optional
					                                            	</th>
					                                            	<td colspan="4" >
					                                            		<div class="mt-radio-inline">
										                                    <label class="mt-radio">
										                                        <input type="radio" name="sh_opt" value="1">
											                                		Shop & Ship
										                                        <span></span>
										                                    </label>
										                                    <label class="mt-radio">
										                                        <input type="radio" name="sh_opt" value="2">
											                                		Express
										                                        <span></span>
										                                    </label>
										                                    <label class="mt-radio">
										                                        <input type="radio" name="sh_opt" value="3">
											                                		Buyer Account
										                                        <span></span>
										                                    </label>
										                                </div>
					                                            	</td>
					                                            	<th>
					                                            		Ship Date
					                                            	</th>
					                                            	<td>
					                                            		<input type = "date" class="form-control input-circle">
					                                            	</td>
						                                        </tr>
						                                        <tr>
					                                            	<th>
					                                            		Declare Item
					                                            	</th>
					                                            	<td colspan="4" >
					                                            		<div class="mt-radio-inline">
										                                    <label class="mt-radio">
										                                        <input type="radio" name="sh_declare" value="1">
											                                		Aromatherapy
										                                        <span></span>
										                                    </label>
										                                    <label class="mt-radio">
										                                        <input type="radio" name="sh_declare" value="2">
											                                		Beard Oil
										                                        <span></span>
										                                    </label>
										                                    <label class="mt-radio">
										                                        <input type="radio" name="sh_declare" value="3">
											                                		Cake Flavoring
										                                        <span></span>
										                                    </label>
										                                    <label class="mt-radio">
										                                        <input type="radio" name="sh_declare" value="4">
											                                		E-Juice
										                                        <span></span>
										                                    </label>
										                                </div>
					                                            	</td>
					                                            	<th>
					                                            		Inv Attach
					                                            	</th>
					                                            	<td>
					                                            		<input type = "text" name="invAtt" class="form-control input-circle">
					                                            	</td>
						                                        </tr>
						                                        <tr>
					                                            	<th>
					                                            		Declare Price
					                                            	</th>
					                                            	<td colspan="4">
					                                            		<input type = "text" name="declarePrice" class="form-control input-circle">
					                                            	</td>
					                                            	<th>
					                                            		MSDS
					                                            	</th>
					                                            	<td>
					                                            		<input type = "text" name="msds" class="form-control input-circle">
					                                            	</td>
						                                        </tr>
						                                        <tr>
					                                            	<th>
					                                            		Batch No Start
					                                            	</th>
					                                            	<td>
					                                            		<input type = "text" name="bats[]" class="form-control input-circle">                                            		
					                                            	</td>
					                                            	<td>
					                                            		<input type = "text" name="bats[]" class="form-control input-circle">
					                                            	</td>
					                                            	<td>
					                                            		<input type = "text" name="bats[]" class="form-control input-circle">
					                                            	</td>
					                                            	<td>
					                                            		<input type = "text" name="bats[]" class="form-control input-circle">
					                                            	</td>
					                                            	<th>
					                                            		C.O.O
					                                            	</th>
					                                            	<td>
					                                            		<input type = "text" name="coo" class="form-control input-circle">
					                                            	</td>
						                                        </tr>
						                                        <tr>
					                                            	<th>
					                                            		Batch No END
					                                            	</th>
					                                            	<td>
					                                            		<input type = "text" name="bate[]" class="form-control input-circle">                                            		
					                                            	</td>
					                                            	<td>
					                                            		<input type = "text" name="bate[]" class="form-control input-circle">
					                                            	</td>
					                                            	<td>
					                                            		<input type = "text" name="bate[]" class="form-control input-circle">
					                                            	</td>
					                                            	<td>
					                                            		<input type = "text" name="bate[]" class="form-control input-circle">
					                                            	</td>
					                                            	<th>
					                                            		Small C Box
					                                            	</th>
					                                            	<td>
					                                            		<input type = "text" name="smallcb" class="form-control input-circle">
					                                            	</td>
						                                        </tr>
						                                        <tr>
					                                            	<th>
					                                            		Batch
					                                            	</th>
					                                            	<td>
					                                            		<input type = "text" name="bat[]" class="form-control input-circle">
					                                            	</td>
					                                            	<td>
					                                            		<input type = "text" name="bat[]" class="form-control input-circle">
					                                            	</td>
					                                            	<td>
					                                            		<input type = "text" name="bat[]" class="form-control input-circle">
					                                            	</td>
					                                            	<td>
					                                            		<input type = "text" name="bat[]" class="form-control input-circle">
					                                            	</td>
					                                            	<th>
					                                            		Big C Box
					                                            	</th>
					                                            	<td>
					                                            		<input type = "text" name="bigcb" class="form-control input-circle">
					                                            	</td>
						                                        </tr>	                                        
						                                    </tbody>
						                                </table>
						                            </div>
						                        </div>
						                    </div>
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
<script>
	$(document).ready(function() {
		$('#client').change(function() {
			temp = $(this).val();
			$.when($('#loadingText').show()).then(function(){
				$.post('<?= site_url('nasty_v2/dashboard/getAjaxClient'); ?>', {key : temp}, function(data) {
					$.when($('#clientInfo').html(data)).then(function(){
						$('#loadingText').hide();
					});
				});
			});
		});
	});
</script>