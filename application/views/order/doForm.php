<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<table class="table ">
			<tr>
				<td colspan="2">
					<img src="<?= base_url("assets/cover/formlogo.jpg"); ?>"  class="img-responsive" width = "400px" alt="Image">					
				</td>
				<td colspan="5">
					<div align="center"><h4><label><strong>Delivery Order</strong></label></h4></div>	
					<table class="table table-condensed" border="1">	
						<tbody>
							<tr>
								<th>D.O No.</th>
								<td>DO-<?= $arr['order']->or_id; ?></td>
							</tr>
							<tr>
								<th>Order No.</th>
								<td>#<?= (100000+$arr['order']->or_id); ?></td>
							</tr>
							<tr>
								<th>Issue Date</th>
								<td><?php if($arr['order']->or_finishdate != '0000-00-00 00:00:00') { echo date_format(date_create($arr['order']->or_finishdate) , 'd-M-Y' ); }else{echo '--Not Set--';} ?></td>
							</tr>
							<tr>
								<th>Payment Status</th>
								<td><?php if($arr['order']->or_bank != null){echo $arr['order']->or_bank;}else{echo "--Not Set--";} ?></td>
							</tr>							
						</tbody>
					</table>
				</td>
			</tr>
			<tr>
				<td colspan="3">
					<div><label><strong><u>Delivery To</u></strong></label></div>
					<strong>Client Name</strong> : <?= $arr['order']->cl_name; ?><br>
					<strong>Email</strong> : <?= $arr['order']->cl_email; ?><br>
					<strong>Contact</strong> : <?= $arr['order']->cl_tel; ?><br>
					<strong>Company</strong> : <?= $arr['order']->cl_company; ?><br>
					<strong>Country</strong> : <?= $arr['order']->cl_country; ?><br>
				</td>
				<td colspan="3"><div><label><strong><u>Delivery</u></strong></label></div>	
					<strong>Address</strong> : <?= $arr['order']->cl_address; ?>
				</td>
			</tr>
			<tr>
				<table class="table table-condensed table-bordered table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>Product</th>
						<th>Quantity</th>
						<th>Tester</th>
						<th>Price(<?php 
							switch ($arr['order']->cu_id) {
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
                            }
                            echo $cu;
                             ?>)</th>
						<th>Total(<?= $cu; ?>)</th>
					</tr>
				</thead>
				<tbody>
				<?php if (sizeof($arr['item'] != 0)) {
						$n2 = 0;$total=0;$qty = 0; $qty1 = 0;
						foreach ($arr['item'] as $key2) { 
							$total2 = 0;
							if ($key2->orn_0mg != 0) { 
							$n2++; $qty+= $key2->orn_0mg;$qty1+= $key2->orn_0mgp; ?>
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
								<td>
									<?= $key2->orn_price; ?>
								</td>
								<td>
									<?php $total2 = $key2->orn_price * $key2->orn_0mg; $total += $total2;echo $total2; $total2 = 0;?>
								</td>
							</tr>
							<?php }
							if ($key2->orn_3mg != 0) { 
							$n2++;$qty+= $key2->orn_3mg;$qty1+= $key2->orn_3mgp;  ?>
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
								<td>
									<?= $key2->orn_price; ?>
								</td>
								<td>
									<?php $total2 = $key2->orn_price * $key2->orn_3mg; $total += $total2;echo $total2; $total2 = 0;?>
								</td>
							</tr>
							<?php }
							if ($key2->orn_6mg != 0) { 
							$n2++;$qty+= $key2->orn_6mg;$qty1+= $key2->orn_6mgp;  ?>
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
								<td>
									<?= $key2->orn_price; ?>
								</td>
								<td>
									<?php $total2 = $key2->orn_price * $key2->orn_6mg; $total += $total2;echo $total2; $total2 = 0;?>
								</td>
							</tr>
							<?php }
							?>	
						<?php }
					?>
					<tr>
						<td colspan = "2"></td>
						<td><strong><?= $qty; ?></strong></td>
						<td><strong><?= $qty1; ?></strong></td>
						<td align = 'right'>
							Total(<?= $cu; ?>) :
						</td>
						<td>
							<strong><?= $total; ?></strong>
						</td>
					</tr>
				<?php }else{ ?>
					<tr>
						<td align = 'center'>
							--No Data--
						</td>
					</tr>
				<?php } ?>
				</tbody>
				<tfoot>
					<tr>
						<td colspan="6">
							Date Of Delivery : <br>
							<br>
							Time of Delivery : <br>
							<br>
							Remarks : <br>
							<br>
						</td>
					</tr>
				</tfoot>
			</table>

			</tr>
		</table>
		<div class="clearfix">
		&nbsp;
		</div>
		<strong>Note :</strong><p>
		I confirm that all goods received are in good order and condition.
		<div class="clearfix">
		<p>&nbsp;</p>
		</div>
		<div class="clearfix">
		<p>&nbsp;</p><p>&nbsp;</p>
		<p>&nbsp;</p>
		</div>
		<div align="right">
			________________________________<br>
			Receiver<?= "'s"; ?> Signature / Company Stamp<p></p>
			Time of Receipt : __________________
		</div>
		

	</div>	
</div>
<script>
	window.print();
</script>