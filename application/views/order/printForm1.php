	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<span class="pull-left"><h2>Order List</h2></span><span class="pull-right" style="color: blue"><h2>#<?php echo (110000+$arr['order']->or_id); ?></h2></span>			
		</div>
		
	</div>
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
		<hr>
			<table class="table table-condensed table-hover table-bordered">			
				<tr>
					<td colspan="3">Order Status : <strong><?= $arr['order']->pr_desc; ?></strong></td>
				</tr>
				<tr>
					<td>Name : <strong><?= $arr['order']->cl_name; ?></strong></td>
					<td>Company : <strong><?= $arr['order']->cl_company; ?></strong></td>
					<td>Date Line : <strong><?php if($arr['order']->or_dateline != '0000-00-00 00:00:00'){ echo date_format(date_create($arr['order']->or_dateline) , 'd-M-Y' );}else{echo '--Not Set--';} ?></strong></td>
				</tr>
				<tr>
					<td>Contact Number :<strong><?= $arr['order']->cl_tel; ?></strong></td>
					<td>Country : <strong><?= $arr['order']->cl_country; ?></strong></td>
					<td>Order Date : <strong><?php if($arr['order']->or_date != '0000-00-00 00:00:00') { echo date_format(date_create($arr['order']->or_date) , 'd-M-Y' ); }else{echo '--Not Set--';} ?></strong></td>
				</tr>
				<tr>
					<td>Sales Person : <strong><?= $arr['staff']->us_username; ?></strong></td>
					<td>Email : <strong><?= $arr['order']->cl_email; ?></strong></td>
					<td>Finish Date : <strong><?php if($arr['order']->or_finishdate != '0000-00-00 00:00:00') { echo date_format(date_create($arr['order']->or_finishdate) , 'd-M-Y' ); }else{echo '--Not Set--';} ?></strong></td>
				</tr>
				<tr>
					<td colspan="2">
						Address : <strong><?= $arr['order']->cl_address; ?></strong>
					</td>
					<td><?php switch ($arr['order']->cu_id) {
	                        	case 1:
	                        		$cu = "MYR";
	                        		break;
	                        	case 2:
	                        		$cu = "USD";
	                        		break;
	                        	case 3:
	                        		$cu = "EURO";
	                        		break;
	                        	default :
	                        		$cu = "Currency Error!!!";
	                        } ?>
                    <label class="control-label">Currency : <strong> <?= $cu; ?></strong></label></td>
				</tr>
			</table>
		</div>
	</div>
	<div class="clearfix">
		&nbsp;
	</div>
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<table class="table table-condensed table-bordered table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>Product</th>						
						<th>Quantity</th>
						<th>Tester</th>
					</tr>
				</thead>
				<tbody>
				<?php 
        		if (!isset($arr)) {
        			?>
        				<tr>
        					<td colspan="6" align="center">-- No Data--</td>
        				</tr>
        			<?php
        		} else {
        			$n = 0;
        			$total = 0;
        			$totalTester = 0;
        			foreach ($arr['item'] as $key) {
        				$n++;
        				$total += $key->oi_qty;
        				$totalTester += $key->oi_tester;
        				?>
        				<tr>
        					<td>
        						<?= $n; ?>
        					</td>
        					<td><?= $key->ty2_desc; ?><br>
								<span class="label" style="color: black;background-color: <?= $key->ca_color; ?>; font-size: 75%;" ><strong><?= $key->ca_desc; ?></strong></span>&nbsp;
								<span class="label" style="color: black;font-size: 75%; background-color: <?= $key->ni_color; ?>;" ><strong><?= $key->ni_mg; ?> mg</strong></span></td>
								<td><?= $key->oi_qty; ?></td>
								<td><?= $key->oi_tester; ?></td>
								
								</td>
							</tr>
        				</tr>
        				<?php
        			}
        		}
        		
        	?>        	
        	<tr>
        		<td colspan="2"></td>
        		<td><strong>Total Qty : </strong><?= $total; ?></td>
        		<td>Total Tester : <?= $totalTester; ?></td>
        	</tr>
        	<tr>
        		<td colspan="4">
					<textarea name="note" id="input" class="form-control input-circle input-lg" rows="2" placeholder="#Note" readonly><?= $arr['order']->or_note; ?></textarea>
				</td>
        	</tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="clearfix">
		&nbsp;
	</div>
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<table class="table table-condensed table-hover table-bordered">	
				<tbody>
					<tr>
						<th>Shipping Company</th>
						<td><strong>
                			<?php 
                			switch ($arr['order']->or_shipcom) {
                				case 1:
                					echo "DHL";
                					break;
                				case 2:
                					echo "ARAMEX";
                					break;
                				case 3:
                					echo "EMS";
                					break;
                				default:
                					echo "Other";
                					break;
                			}
                			?>
                		</strong></td>
						<th>Ship Date</th>
						<td><strong><?php if($arr['order']->or_sendDate != '0000-00-00 00:00:00') { echo date_format(date_create($arr['order']->or_sendDate) , 'd-M-Y' ); }else{echo '--Not Set--';} ?></strong></td>
					</tr>
					<tr>
						<th>Shipping Optional</th>
						<td><strong>
                        	<?php 
                        		switch ($arr['order']->or_shipopt) {
                        			case 1:
                        				echo "Shop & Ship";
                        				break;
                        			case 2:
                        				echo "Express";
                        				break;
                        			case 3:
                        				echo "Buyer Account";
                        				break;
                        			default:
                        				echo "error";
                        				break;
                        		}
                        	?></strong></td>
                        	<th>
                        		Invoice Link
                        	</th>
                        	<td>
                        		<input type = "text" name="traking" class="form-control input-circle" disabled placeholder="Next Version 2.21 Alpha">
                        	</td>
						</tr>
					<tr>
						<th>Declare Item</th>
						<td><strong><?php 
                        	switch ($arr['order']->dec_id) {
                        		case 1:
                        			echo "Aromatherapy";
                        			break;
                        		case 2:
                        			echo "Beard Oil";
                        			break;
                        		case 3:
                        			echo "Cake Flavoring";
                        			break;
                        		case 4:
                        			echo "E-Juice";
                        			break;
                        		
                        		default:
                        			echo "error";
                        			break;
                        	}
                        	?></strong>
                        </td>
						<th>
                    		<strong>Dummy</strong> Invoice
                    	</th>
                    	<td>
                    		<input type = "text" name="invAtt" class="form-control input-circle" disabled placeholder="Next Version 2.21 Alpha">
                    	</td>
					</tr>					
				</tbody>
			</table>
		</div>		
	</div>
	<script>		
		window.print();
	</script>
	