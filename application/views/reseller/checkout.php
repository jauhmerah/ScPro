<div class="row">
<div class="col-md-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>Shipping Detail</h3>
		</div>
		<div class="panel-body">
			<div class="col-md-8">
				<div class="row">
				<div class="col-xs-12">					
				<!-- Billing Address -->
					<table class="table table-condensed table-hover table-bordered table-striped">
			        	<thead>
			        		<tr>
			        			<th colspan="2">Select a shipping address</th>
			        		</tr>
			        	</thead>
			        	<tbody>
			        		<tr>
			        			<td></td>
			        			<td>alamat kat sini</td>
			        		</tr>
			        		<tr>
			        			<td width="5%">
			        				<span class="pull-right"><i class="fa fa-plus-circle"></i></span>
			        			</td>
			        			<td>
			        				<strong>Add another address</strong>
			        			</td>
			        		</tr>
			        	</tbody>
			        </table>
			    <!-- End Billing Address -->
		        </div>
				</div>
		        <div class="row">
		        	<div class="col-md-12">
		        		<div class="portlet light">                                
                                <div class="portlet-body form">
                                    <form role="form">
                                        <div class="form-body">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <div class="input-group ">
                                                    <span class="input-group-addon input-circle-left">
                                                        <i class="fa fa-user "></i>
                                                    </span>
                                                    <input name="name" type="text" class="input-sm form-control input-circle-right" placeholder="Name" required="required"> </div>
                                            </div>
                                        	<div class="form-group">
                                                <label>Address</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon input-circle-left">
                                                        <i class="fa fa-home"></i>
                                                    </span>
                                                    <textarea name="address" id="inputAddress" class="input-sm form-control input-circle-right" rows="3" required="required" placeholder="Address"></textarea>
                                                    </div>
                                            </div>
                                            <div class="form-group">
                                                <label>City</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon input-circle-left">
                                                        <i class="fa fa-building"></i>
                                                    </span>
                                                    <input name="city" type="text" class="input-sm form-control input-circle-right" placeholder="City" required="required"> </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Postcode</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon input-circle-left">
                                                        <i class="fa fa-map-marker"></i>
                                                    </span>
                                                    <input name="postcode" type="text" class="input-sm form-control input-circle-right" placeholder="Postcode" required="required"> </div>
                                            </div>
                                            <div class="form-group">
                                                <label>State</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon input-circle-left">
                                                        <i class="fa fa-map "></i>
                                                    </span>
                                                    <select name="state" class="input-sm form-control input-circle-right" placeholder="" required> 
                                        			<?php 
	                                                    foreach ($arr as $key) { ?>
	                                                        <option value="<?= $key->state_id; ?>"> <?= $key->state_name; ?> </option>
                                                    <?php }
                                                    ?>
                                    				</select>
                                    			</div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
		        	</div>		        	
		        </div>
		        <div class="row"><div class="col-xs-12">
		        	<button type="button" class="btn btn-success yellow-gold btn-circle">Continue</button>
		        </div></div>                                 
			</div>
			<div class="col-md-4">
				<!-- Order Summary -->
				<div class="row">
				<table class="table table-condensed table-hover table-bordered">
		        	<thead>
		        		<tr>
		        			<th colspan="2">Order Summary</th>
		        		</tr>
		        	</thead>
		        	<tbody>
		        		<tr>
		        			<td colspan="2"><table class="table table-condensed table-hover table-responsive">
		        					<thead>
		        						<tr>
		        							<th><span class="font-xs">PRODUCT</span></th>
		        							<th><span class="font-xs">QUANTITY</span></th>
		        							<th><span class="font-xs">PRICE(RM)</span></th>	        							
		        						</tr>
		        					</thead>
		        					<tbody>
		        						<tr>
		        							<td><span class="font-xs"></span></td>
		        							<td><span class="font-xs"></span></td>
		        							<td><span class="font-xs"></span></td>
		        						</tr>
		        					</tbody>
		        				</table>			        			
		        			</td>
		        		</tr>		        		
		        	</tbody>
		        	<tfoot >
		        		<tr >
		        			<td colspan="2"><span class="font-xs">Subtotal</span><span class="font-xs pull-right">RM 12312</span></td>		        		
		        		</tr>
		        		<tr>
		        			<td class="font-green-jungle" colspan="2" ><span class="font-xs">Shipping Fee</span><span class="font-xs pull-right">Free</span></td>
		        		</tr>
		        		<tr>
		        			<td colspan="2">
		        				<strong>Total</strong>
		        				<span class="pull-right font-yellow-gold">RM 23.33</span><br>
		        				<span class="font-xs font-grey-salsa">(GST applied where applicable)</span>
		        			</td>
		        		</tr>
		        	</tfoot>		        	
		        </table>  
				</div>
				<!-- End Order Summary -->
				<div class="row" >
					<div align="center" class="col-xs-4 col-xs-offset-1"><img src="<?= base_url('assets/cover/nlogo.png'); ?>" class="img-responsive" alt="Image"></div><div class="col-xs-4 col-xs-offset-2" align="center"><img src="<?= base_url('assets/cover/gdex.png'); ?>" class="img-responsive" alt="Image"></div>
				</div>
			</div>
		</div>
		<div class="panel-footer">
			<div align="center"><span class="font-sm">Need Help? <a href="mailto:custumerservice@nastyjuice.com">custumerservice@nastyjuice.com</a></span></div>
		</div>
	</div>
</div>			
</div>