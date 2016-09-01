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
	                                                        <option value="1">MYR</option>
	                                                        <option value="2">USD</option>
	                                                        <option value="3">EURO</option>
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
						                                            <td class="numeric"><input type="text" name="red[]" id = 'red1' class="re form-control input-sm" value="0"></td>
						                                            <td class="numeric warning"><input type="text" name="red[]" id = 'red2' class="re form-control input-sm" value="0"></td>
						                                            <td class="numeric"><input type="text" name="red[]" id = 'red3' class="re form-control input-sm" value="0"></td>
						                                            <td class="numeric warning"><input type="text" name="red[]" id = 'red4' class="re form-control input-sm" value="0"></td>
						                                            <td class="numeric"><input type="text" name="red[]" id = 'red5' class="re form-control input-sm " value="0"></td>
						                                            <td class="numeric warning"><input type="text" name="red[]" id = 'red6' class="re form-control input-sm " value="0"></td>
						                                            </div><div class="col-md-3">
						                                            <td class="numeric"><input type="text" name="qtyred" id = 'qtyred' class="form-control input-sm" value="0" readonly></td>
						                                            <td class="numeric"><input type="text" name="unitred" id = 'unitred' class="re form-control input-sm" value="0"></td>
						                                            <td class="numeric"><input type="text" name="total[]" id = 'totalred' class="form-control input-sm" readonly value="0"></td>
						                                            </div>
						                                        </tr>
						                                        <tr>
						                                            <td class="col-md-1">2</td>
						                                            <td class="col-md-4">Manggo | <strong>Fat Boy</strong> | Yellow</td>
						                                            <div class="col-md-4">
						                                            <td class="numeric"><input type="text" name="yellow[]" id = 'yellow1' class="ye form-control input-sm" value="0"></td>
						                                            <td class="numeric warning"><input type="text" name="yellow[]" id = 'yellow2' class="ye form-control input-sm" value="0"></td>
						                                            <td class="numeric"><input type="text" name="yellow[]" id = 'yellow3' class="ye form-control input-sm" value="0"></td>
						                                            <td class="numeric warning"><input type="text" name="yellow[]" id = 'yellow4' class="ye form-control input-sm" value="0"></td>
						                                            <td class="numeric"><input type="text" name="yellow[]" id = 'yellow5' class="ye form-control input-sm" value="0"></td>
						                                            <td class="numeric warning"><input type="text" name="yellow[]" id = 'yellow6' class="ye form-control input-sm" value="0"></td>
						                                            </div><div class="col-md-3">
						                                            <td class="numeric"><input type="text" name="qtyyellow" id = 'qtyyellow' class="form-control input-sm" value="0" readonly></td>
						                                            <td class="numeric"><input type="text" name="unityellow" id = 'unityellow' class="ye form-control input-sm" value="0"></td>
						                                            <td class="numeric"><input type="text" name="total[]" id = 'totalyellow' class="form-control input-sm" value="0" readonly></td>
						                                            </div>
						                                        </tr>
						                                        <tr>
						                                            <td class="col-md-1">3</td>
						                                            <td class="col-md-4">Honey Dew | <strong>Devil Teeth</strong> | Orange</td>
						                                            <td class="numeric"><input type="text" name="orange[]" id = 'orange1' class="or form-control input-sm" value="0"></td>
						                                            <td class="numeric warning"><input type="text" name="orange[]" id = 'orange2' class="or form-control input-sm" value="0"></td>
						                                            <td class="numeric"><input type="text" name="orange[]" id = 'orange3' class="or form-control input-sm" value="0"></td>
						                                            <td class="numeric warning"><input type="text" name="orange[]" id = 'orange4' class="or form-control input-sm" value="0"></td>
						                                            <td class="numeric"><input type="text" name="orange[]" id = 'orange5' class="or form-control input-sm" value="0"></td>
						                                            <td class="numeric warning"><input type="text" name="orange[]" id = 'orange6' class="or form-control input-sm" value="0"></td>
						                                            <td class="numeric"><input type="text" name="qtyorange" id = 'qtyorange' class="form-control input-sm" value="0" readonly></td>
						                                            <td class="numeric"><input type="text" name="unitorange" id = 'unitorange' class="or form-control input-sm" value="0"></td>
						                                            <td class="numeric"><input type="text" name="total[]" id = 'totalorange' class="form-control input-sm" value="0" readonly></td>
						                                        </tr>
						                                        <tr>
						                                            <td class="col-md-1">4</td>
						                                            <td class="col-md-4">Grape | <strong>Asap Grape</strong> | Purple</td>
						                                            <td class="numeric"><input type="text" name="purple[]" id = 'purple1' class="pu form-control input-sm" value="0"></td>
						                                            <td class="numeric warning"><input type="text" name="purple[]" id = 'purple2' class="pu form-control input-sm" value="0"></td>
						                                            <td class="numeric"><input type="text" name="purple[]" id = 'purple3' class="pu form-control input-sm" value="0"></td>
						                                            <td class="numeric warning"><input type="text" name="purple[]" id = 'purple4' class="pu form-control input-sm" value="0"></td>
						                                            <td class="numeric"><input type="text" name="purple[]" id = 'purple5' class="pu form-control input-sm" value="0"></td>
						                                            <td class="numeric warning"><input type="text" name="purple[]" id = 'purple6' class="pu form-control input-sm" value="0"></td>
						                                            <td class="numeric"><input type="text" name="qtypurple" id = 'qtypurple' class="form-control input-sm" value="0" readonly></td>
						                                            <td class="numeric"><input type="text" name="unitpurple" id = 'unitpurple' class="pu form-control input-sm" value="0"></td>
						                                            <td class="numeric"><input type="text" name="total[]" id = 'totalpurple' class="form-control input-sm" value="0" readonly></td>
						                                        </tr>
						                                        <tr>
						                                            <td class="col-md-1">5</td>
						                                            <td class="col-md-4">Blackurrant + L | <strong>Wicked Haze</strong> | Pink</td>
						                                            <td class="numeric"><input type="text" name="pink[]" id = 'pink1' class="pi form-control input-sm" value="0"></td>
						                                            <td class="numeric warning"><input type="text" name="pink[]" id = 'pink2' class="pi form-control input-sm" value="0"></td>
						                                            <td class="numeric"><input type="text" name="pink[]" id = 'pink3' class="pi form-control input-sm" value="0"></td>
						                                            <td class="numeric warning"><input type="text" name="pink[]" id = 'pink4' class="pi form-control input-sm" value="0"></td>
						                                            <td class="numeric"><input type="text" name="pink[]" id = 'pink5' class="pi form-control input-sm" value="0"></td>
						                                            <td class="numeric warning"><input type="text" name="pink[]" id = 'pink6' class="pi form-control input-sm" value="0"></td>
						                                            <td class="numeric"><input type="text" name="qtypink" id = 'qtypink' class="form-control input-sm" value="0" readonly></td>
						                                            <td class="numeric"><input type="text" name="unitpink" id = 'unitpink' class="pi form-control input-sm" value="0"></td>
						                                            <td class="numeric"><input type="text" name="total[]" id = 'totalpink' class="form-control input-sm" value="0" readonly></td>
						                                        </tr>
						                                        <tr>
						                                            <td class="col-md-1">6</td>
						                                            <td class="col-md-4">Pineapple | <strong>Slow Blow</strong> | Cyan</td>
						                                            <td class="numeric"><input type="text" name="cyan[]" id = 'cyan1' class="cy form-control input-sm" value="0"></td>
						                                            <td class="numeric warning"><input type="text" name="cyan[]" id = 'cyan2' class="cy form-control input-sm" value="0"></td>
						                                            <td class="numeric"><input type="text" name="cyan[]" id = 'cyan3' class="cy form-control input-sm" value="0"></td>
						                                            <td class="numeric warning"><input type="text" name="cyan[]" id = 'cyan4' class="cy form-control input-sm" value="0"></td>
						                                            <td class="numeric"><input type="text" name="cyan[]" id = 'cyan5' class="cy form-control input-sm" value="0"></td>
						                                            <td class="numeric warning"><input type="text" name="cyan[]" id = 'cyan6' class="cy form-control input-sm" value="0"></td>
						                                            <td class="numeric"><input type="text" name="qtycyan" id = 'qtycyan' class="form-control input-sm" value="0" readonly></td>
						                                            <td class="numeric"><input type="text" name="unitcyan" id = 'unitcyan' class="cy form-control input-sm" value="0"></td>
						                                            <td class="numeric"><input type="text" name="total[]" id = 'totalcyan' class="form-control input-sm" value="0" readonly></td>
						                                        </tr>
						                                        <tr>
						                                        	<td colspan="8"><div class="radio">
						                                        	<div class="mt-radio-inline">
									                                    <span class="input-group-btn">
									                                    	<button type="button" id="20" class="plus btn btn-default">20+1</button>
									                                    	<button type="button" id="10" class="plus btn btn-default">10+1</button>
									                                    	<button type="button" id="0" class="plus btn btn-default">No Tester</button>
									                                    </span>
									                                </div>
						                                        	</div></td>
						                                        	<td><span class="label" id="qtyAll">0</span></td>
						                                        	<td colspan="2" align = "center"><label id="totalAll">0</label></td>
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
					                                        <input type="radio" name="wide" checked value="0">
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
										                                        <input type="radio" name="sh_company" checked value="1">
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
										                                        <input type="radio" name="sh_opt" checked value="1">
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
										                                        <input type="radio" name="sh_declare" checked value="1">
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
		$('.re').change(function() {
			if ($(this).val() == '') {$(this).val(0);}
			re();
		});
		function re() {
			red1 = parseInt($('#red1').val());
			red2 = parseInt($('#red2').val());
			red3 = parseInt($('#red3').val());
			red4 = parseInt($('#red4').val());
			red5 = parseInt($('#red5').val());
			red6 = parseInt($('#red6').val());
			qty = red2 + red4 + red6;
			qty2 = red1 + red3 + red5;
			price = parseInt($('#unitred').val()) * qty2;
			$('#totalred').val(price);
			$('#qtyred').val(qty2 + " + " +qty);
			totalP();
		}

		$('.ye').change(function() {
			if ($(this).val() == '') {$(this).val(0);}
			ye();
		});

		function ye() {
			yellow1 = parseInt($('#yellow1').val());
			yellow2 = parseInt($('#yellow2').val());
			yellow3 = parseInt($('#yellow3').val());
			yellow4 = parseInt($('#yellow4').val());
			yellow5 = parseInt($('#yellow5').val());
			yellow6 = parseInt($('#yellow6').val());
			qty = yellow2 + yellow4 + yellow6;
			qty2 = yellow1 + yellow3 + yellow5;
			price = parseInt($('#unityellow').val()) * qty2;
			$('#totalyellow').val(price);
			$('#qtyyellow').val(qty2 + " + " +qty);
			totalP();
		}

		$('.or').change(function() {
			if ($(this).val() == '') {$(this).val(0);}
			ora();
		});

		function ora() {
			orange1 = parseInt($('#orange1').val());
			orange2 = parseInt($('#orange2').val());
			orange3 = parseInt($('#orange3').val());
			orange4 = parseInt($('#orange4').val());
			orange5 = parseInt($('#orange5').val());
			orange6 = parseInt($('#orange6').val());
			qty = orange2 + orange4 + orange6;
			qty2 = orange1 + orange3 + orange5;
			price = parseInt($('#unitorange').val()) * qty2;
			$('#totalorange').val(price);
			$('#qtyorange').val(qty2 + " + " +qty);
			totalP();
		}

		$('.pu').change(function() {
			if ($(this).val() == '') {$(this).val(0);}
			pu();			
		});

		function pu() {
			purple1 = parseInt($('#purple1').val());
			purple2 = parseInt($('#purple2').val());
			purple3 = parseInt($('#purple3').val());
			purple4 = parseInt($('#purple4').val());
			purple5 = parseInt($('#purple5').val());
			purple6 = parseInt($('#purple6').val());
			qty = purple2 + purple4 + purple6;
			qty2 = purple1 + purple3 + purple5;
			price = parseInt($('#unitpurple').val()) * qty2;
			$('#totalpurple').val(price);
			$('#qtypurple').val(qty2 + " + " +qty);
			totalP();
		}

		$('.pi').change(function() {
			if ($(this).val() == '') {$(this).val(0);}
			pi();
		});

		function pi() {
			pink1 = parseInt($('#pink1').val());
			pink2 = parseInt($('#pink2').val());
			pink3 = parseInt($('#pink3').val());
			pink4 = parseInt($('#pink4').val());
			pink5 = parseInt($('#pink5').val());
			pink6 = parseInt($('#pink6').val());
			qty = pink2 + pink4 + pink6;
			qty2 = pink1 + pink3 + pink5;
			price = parseInt($('#unitpink').val()) * qty2;
			$('#totalpink').val(price);
			$('#qtypink').val(qty2 + " + " +qty);
			totalP();
		}

		$('.cy').change(function() {
			if ($(this).val() == '') {$(this).val(0);}
			cy();
		});

		function cy() {
			cyan1 = parseInt($('#cyan1').val());
			cyan2 = parseInt($('#cyan2').val());
			cyan3 = parseInt($('#cyan3').val());
			cyan4 = parseInt($('#cyan4').val());
			cyan5 = parseInt($('#cyan5').val());
			cyan6 = parseInt($('#cyan6').val());
			qty = cyan2 + cyan4 + cyan6;
			qty2 = cyan1 + cyan3 + cyan5;
			price = parseInt($('#unitcyan').val()) * qty2;
			$('#totalcyan').val(price);
			$('#qtycyan').val(qty2 + " + " +qty);
			totalP();
		}

		function tester(ibu , bahagi , kelas) {
			if (bahagi == 0) {
				$('#'+ibu+'2').val(0);
				$('#'+ibu+'4').val(0);
				$('#'+ibu+'6').val(0);
			}else{
				var1 = parseInt($('#'+ibu+'1').val());
				var3 = parseInt($('#'+ibu+'3').val());
				var5 = parseInt($('#'+ibu+'5').val());
				var2 = Math.round(var1/bahagi);
				var4 = Math.round(var3/bahagi);
				var6 = Math.round(var5/bahagi);
				$('#'+ibu+'2').val(var2);
				$('#'+ibu+'4').val(var4);
				$('#'+ibu+'6').val(var6);
			}		

			if (kelas == 're') {re();}
			if (kelas == 'ye') {ye();}
			if (kelas == 'ora') { ora();}
			if (kelas == 'pu') {pu();}
			if (kelas == 'pi') {pi();}
			if (kelas == 'cy') {cy();}
		}

		$(".plus").click(function() {
			//alert($(this).prop('id'));
			bahagi = $(this).prop('id');
			tester('red' , bahagi , 're');
			tester('yellow' , bahagi , 'ye');
			tester('orange' , bahagi , 'ora');
			tester('purple' , bahagi , 'pu');
			tester('pink' , bahagi , 'pi');
			tester('cyan' , bahagi , 'cy');
		});

		function totalP() {
			red = parseInt($('#totalred').val());
			yellow = parseInt($('#totalyellow').val());
			orange = parseInt($('#totalorange').val());
			purple = parseInt($('#totalpurple').val());
			pink = parseInt($('#totalpink').val());
			cyan = parseInt($('#totalcyan').val());

			total = red + yellow + purple + orange + pink + cyan;
			$("#totalAll").html(total);
		}
	});
</script>