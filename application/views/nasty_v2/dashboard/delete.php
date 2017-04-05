<div class="row">
	<div class="col-md-12">
<table class="table table-bordered table-condensed">
	<thead>
		<tr>
			<th>Order Code</th>
			<th>Client Name</th>
			<th>Order Date</th>
			<th>Sales Person</th>
			<th>Status</th>
		</tr>
	</thead>
	<tbody>
	<?php 
	foreach ($data as $key) { ?>
		<tr>
			<td>#<?= 12000 + (integer)$key['order']->or_id; ?></td>
			<td><?= $key['order']->cl_name; ?></td>
			<td><?= date_format(date_create($key['order']->or_date) , 'd-M-Y' ) ; ?></td>
			<td><?= $key['staff']->us_username; ?></td>
			<td><?= $key['order']->pr_desc; ?></td>
		</tr>
		<tr>
			<td colspan="5">
			<table class="table table-bordered">
				<thead>
					<tr>						
						<th>Item Detail</th>
						<th>Price</th>
						<th>Qty</th>
						<th>Tester</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					foreach ($key['item'] as $k) { 
						
						?>
						<tr>
							<td><?= $k->ty2_desc; ?></br><?= $k->ca_desc." - ".$k->ni_mg ;?>Mg</td>
							<td><?php switch ($key['order']->cu_id) {
								case '1':
									echo "MYR ";
									break;
								case '2':
									echo "USD ";
									break;
								case '3':
									echo "GBP ";
									break;								
								default:
									echo "Error Currency";
									break;
							} ?><?= $k->oi_price; ?></td>
							<td><?= $k->oi_qty; ?></td>
							<td><?= $k->oi_tester; ?></td>
						</tr>
					<?php }
					?>					
				</tbody>
			</table>
			</td>
		</tr>
		<tr>
			<td colspan="5">&nbsp;</td>
		</tr>
	
	<?php }
	?>
		
	</tbody>
</table>
</div>
</div>