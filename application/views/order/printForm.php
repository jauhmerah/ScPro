	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<span class="pull-left"><h2>Order List</h2></span><span class="pull-right" style="color: red"><h2>#<?php echo (100000+$arr['order']->or_id); ?></h2></span>			
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
		
			<!--<table class="table table-condensed table-hover table-bordered">
				<thead>
					<tr>
						<th>#</th>
						<th>Type</th>
						<th colspan="2">0 Mg</th>
						<th colspan="2">3 Mg</th>
						<th colspan="2">6 Mg</th>
						<th>QTY</th>
						<th>Unit $</th>
						<TH>Amount $</TH>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>1</td>
						<td>Blackurrant | <strong>Bad Blood</strong> | Red</td>
						<td>0</td>
						<td>0</td>
						<td>0</td>
						<td>0</td>
						<td>0</td>
						<td>0</td>
						<td>0</td>
						<td>0</td>
						<td>0</td>
					</tr>
					<tr>
						<td>2</td>
						<td>Manggo | <strong>Fat Boy</strong> | Yellow</td>
						<td>0</td>
						<td>0</td>
						<td>0</td>
						<td>0</td>
						<td>0</td>
						<td>0</td>
						<td>0</td>
						<td>0</td>
						<td>0</td>
					</tr>
					<tr>
						<td>3</td>
						<td>Honey Dew | <strong>Devil Teeth</strong> | Orange</td>
						<td>0</td>
						<td>0</td>
						<td>0</td>
						<td>0</td>
						<td>0</td>
						<td>0</td>
						<td>0</td>
						<td>0</td>
						<td>0</td>
					</tr>
					<tr>
						<td>4</td>
						<td>Grape | <strong>Asap Grape</strong> | Purple</td>
						<td>0</td>
						<td>0</td>
						<td>0</td>
						<td>0</td>
						<td>0</td>
						<td>0</td>
						<td>0</td>
						<td>0</td>
						<td>0</td>
					</tr>
					<tr>
						<td>5</td>
						<td>Blackurrant + L | <strong>Wicked Haze</strong> | Pink</td>
						<td>0</td>
						<td>0</td>
						<td>0</td>
						<td>0</td>
						<td>0</td>
						<td>0</td>
						<td>0</td>
						<td>0</td>
						<td>0</td>
					</tr>
					<tr>
						<td>6</td>
						<td>BlackuPineapple | <strong>Slow Blow</strong> | Cyan</td>
						<td>0</td>
						<td>0</td>
						<td>0</td>
						<td>0</td>
						<td>0</td>
						<td>0</td>
						<td>0</td>
						<td>0</td>
						<td>0</td>
					</tr>
					<tr>
						<td colspan="8"></td>
						<td>0</td>
						<td colspan="2" align="right">0</td>
					</tr>
				</tbody>
			</table>-->
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
				<?php if (sizeof($arr['item'] != 0)) {
						$n2 = 0;
						foreach ($arr['item'] as $key2) { 
							if ($key2->orn_0mg != 0) { 
							$n2++; ?>
							<tr>
								<td>
									<?= $n2; ?>
								</td>
								<td><?= $this->l_label->item_label($key2->ty2_id); ?> | <span class="label label-default"><strong>0 mg</strong></span> </td>
								<td>
									<?= $key2->orn_0mg; ?>
								</td>
								<td>
									<?= $key2->orn_0mgp; ?>
								</td>
							</tr>
							<?php }
							if ($key2->orn_3mg != 0) { 
							$n2++; ?>
							<tr>
								<td>
									<?= $n2; ?>
								</td>
								<td><?= $this->l_label->item_label($key2->ty2_id); ?> | <span class="label label-danger"><strong>3 mg</strong></span> </td>
								<td>
									<?= $key2->orn_3mg; ?>
								</td>
								<td>
									<?= $key2->orn_3mgp; ?>
								</td>
							</tr>
							<?php }
							if ($key2->orn_6mg != 0) { 
							$n2++; ?>
							<tr>
								<td>
									<?= $n2; ?>
								</td>
								<td><?= $this->l_label->item_label($key2->ty2_id); ?> | <span class="label label-success"><strong>6 mg</strong></span> </td>
								<td>
									<?= $key2->orn_6mg; ?>
								</td>
								<td>
									<?= $key2->orn_6mgp; ?>
								</td>
							</tr>
							<?php }
							?>	
						<?php }
					?>
					
				<?php }else{ ?>
					<tr>
						<td align = 'center'>
							--No Data--
						</td>
					</tr>
				<?php } ?>
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
						<th>Tracking No</th>
						<td><strong><?= $arr['order']->or_traking; ?></strong></td>						
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
						<th>Ship Date</th>
						<td><strong><?php if($arr['order']->or_sendDate != '0000-00-00 00:00:00') { echo date_format(date_create($arr['order']->or_sendDate) , 'd-M-Y' ); }else{echo '--Not Set--';} ?></strong></td>
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
						<th>Inv Attach</th>
						<td><strong><?= $arr['order']->or_invAtt; ?></strong></td>
					</tr>
					<tr>
                    	<th>
                    		Declare Price
                    	</th>
                    	<td>
                    		<strong><?= $arr['order']->or_declarePrice ;?></strong>
                    	</td>
                    	<th>
                    		MSDS
                    	</th>
                    	<td>
                    		<strong><?= $arr['order']->or_msds; ?></strong>
                    	</td>
                    </tr>
					<tr>
						<th>
							Batch No Start
						</th>
						<td rowspan="3">
							<strong><?= $arr['order']->or_note; ?></strong>
						</td>
						<th>
							C.O.O
						</th>
						<td><strong><?= $arr['order']->or_coo;?></strong></td>
					</tr>
					<tr>
						<th>
							Batch No End
						</th>
						<th>
							Small C Box
						</th>
						<td>
							<strong><?= $arr['order']->or_smallcb; ?></strong>
						</td>
					</tr>
					<tr>
						<th>Batch</th>
						<th>Bic C Box</th>
						<td><strong><?= $arr['order']->or_bigcb; ?></strong></td>
					</tr>
				</tbody>
			</table>
		</div>		
	</div>
	<script>		
		window.print();
	</script>
	