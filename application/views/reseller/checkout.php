<div class="row">
<div class="col-md-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>Shipping Detail</h3>
		</div>
		<div class="panel-body">
			<div class="col-md-8">
				
				<form action="<?= site_url('reseller/page/b12') ?>" id='myform' method="POST" role="form">
				<div class="row">
				<div class="col-xs-12">					
				<!-- Billing Address -->
					<?php 
						if (sizeof($address) == 0) {
							$add_id = -1;
						}else{
							$add_id = $address[0]->add_id;
						}
					?>					
					<input type="hidden" name="add_id" id="add_id" class="form-control" value="<?= $this->my_func->en($add_id , 1); ?>" data-tr = "tr0">
					<table class="table table-condensed table-hover table-bordered table-striped">
			        	<thead>
			        		<tr>
			        			<th colspan="2">Select a shipping address</th>
			        		</tr>
			        	</thead>
			        	<tbody>
			        	<?php
			        		$n = -1;			        	 
			        		foreach ($address as $key) {
			        		$n++;			        		
			        	?>
			        		<tr class="shipClick <?php if($n == 0){echo 'success';} ?>" id="tr<?= $n; ?>" data-c = 'td<?= $n; ?>' data-add_id = "<?= $this->my_func->en($key->add_id , 1); ?>">
			        			<td id="td<?= $n; ?>" style="vertical-align: middle;"><?php if ($n == 0) { ?>
			        			<span class="font-green"><button class="btn btn-circle btn-xs"><i class="fa fa-check"></i></button></span><?php } ?></td>
			        			<td>
				        			<strong><?= $key->company_name; ?></strong><br>
				        			<?= $key->add_mnum; ?><br>
				        			<?= $key->address; ?><br>
				        			<?= $key->town; ?>
				        			<?= $key->postcode; ?><br>
				        			<?= $key->state_name; ?>				        			
			        			</td>
			        		</tr>
			        	<?php 
			        		}
			        	?>
			        		<tr id="add_new_address">
			        			<td width="5%" align="center">
			        				<button class="btn btn-circle btn-xs"><i class="fa fa-plus-circle"></i></button>
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
		        <div class="row" id="addAddress">
		        			        	
		        </div>
		        <div class="row"><div class="col-xs-12">
		        	<button type="submit" class="btn btn-success yellow-gold btn-circle">Continue</button>
		        </div></div>                                
			</div></form> 
			<div class="col-md-4">
				<!-- Order Summary -->
				<div class="row">
				<table class="table table-condensed table-hover table-bordered">
		        	<thead>
		        		<tr>
		        			<th colspan="2">Order Summary <span class="pull-right">RM <?= number_format((float)$price, 2, '.', '');?> / pcs</span></th>
		        		</tr>
		        	</thead>
		        	<tbody>
		        		<tr>
		        			<td colspan="2"><table class="table table-condensed table-hover table-responsive">
		        					<thead>
		        						<tr>
		        							<th><span class="font-xs">PRODUCT</span></th>
		        							<th><span class="font-xs">QUANTITY</span></th>
		        							<th><span class="font-xs">PRICE<br></span></th>	        							
		        						</tr>
		        					</thead>
		        					<tbody>
		        					<?php $tot = 0;
		        					foreach ($data as $key => $val) { 
		        						$harga = (float)($price * $qty[$key]);
		        						$tot += $harga;
		        					?>
		        						<tr>
		        							<td>
		        							<span class="font-xs">
	        									<strong><?= $val->ty2_desc; ?></strong><br>
	        									<?= $val->ty2_detail; ?><br></span>
	        									<h6><span class="label circle" style="background-color: <?= $val->ca_color; ?>;color: black;"><strong><?= $val->ca_desc; ?></strong></span> <span class="label circle bg-green bg-font-green"><strong>6 Mg</strong></span></h6>		        								
		        							</td>
		        							<td><span class="font-xs"><?= $qty[$key]; ?></span></td>
		        							<td><span class="font-xs">Rm <?= number_format((float)$harga, 2, '.', '');?></span></td>
		        						</tr>
		        					<?php } ?>
		        					</tbody>
		        				</table>			        			
		        			</td>
		        		</tr>		        		
		        	</tbody>
		        	<tfoot >
		        		<tr ><?php 
		        		$tot = number_format((float)$tot, 2, '.', '');
		        		$a = array(
		        			'sub_tot' => $this->my_func->scpro_encrypt($tot)
		        		);		        		
		        		$this->session->set_userdata( $a );
		        		unset($a);
		        		?>
		        			<td colspan="2"><span class="font-xs">Subtotal</span><span class="font-xs pull-right">RM <strong><?= $tot ;?></strong></span></td>		        		
		        		</tr>
		        		<tr>
		        			<td class="font-green-jungle" colspan="2" ><span class="font-xs">Shipping Fee</span><span class="font-xs pull-right">Rm <?= number_format((float)$shippingPrice, 2, '.', '');?></span></td>
		        		</tr>
		        		<tr>
		        			<td colspan="2">
		        				<strong>Total</strong>
		        				<span class="pull-right font-yellow-gold">RM <?= number_format((float)($tot+$shippingPrice), 2, '.', '');?></span><br>
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
			<div align="center"><span class="font-sm">Need Help? <a href="mailto:custumerservice@nastyjuice.com">customerservice@nastyjuice.com</a></span></div>
		</div>
	</div>
	<pre><?= print_r($this->session->all_userdata()) ?></pre>
</div>			
</div>
<script type = "text/javascript">
    var urlsite = "<?= site_url(); ?>reseller/";
</script>
<script type="text/javascript" src = "<?= base_url();?>assets/nastyjs/checkout.js?batch=<?php echo uniqid(); ?>"></script>
<script type="text/javascript">
	window.onbeforeunload = function(e) {
        var text = "This is one time session only, are you sure to proceed?";
        e.returnValue = text;
        return text;
	};
    $(document).on('submit', 'form', function() {
        window.onbeforeunload = null;
    });
</script>