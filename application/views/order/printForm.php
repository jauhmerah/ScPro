	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<span class="pull-left"><h2>Order List</h2></span><span class="pull-right" style="color: red"><h2>#100000</h2></span>			
		</div>
		
	</div>
	<pre><?php print_r($arr); ?></pre>
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
		<hr>
			<table class="table table-condensed table-hover table-bordered">			
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
					<td>Email : <strong>jauhmerah@nastyjuice.com</strong></td>
					<td>Finish Date : <strong><?php if($arr['order']->or_finishdate != '0000-00-00 00:00:00') { echo date_format(date_create($arr['order']->or_finishdate) , 'd-M-Y' ); }else{echo '--Not Set--';} ?></strong></td>
				</tr>
				<tr>
					<td colspan="2">
						Address : <strong>Gomes N9</strong>
					</td>
					<td>Currency : <strong>MYR</strong></td>
				</tr>
			</table>
		</div>
	</div>
	<div class="clearfix">
		&nbsp;
	</div>
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
		<h6>
			<table class="table table-condensed table-hover table-bordered">
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
			</table>
		</div>
		</h6>
	</div>
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<table class="table table-condensed table-hover table-bordered table-responsive">	
				<tbody>
					<tr>
						<th>Shipping Company</th>
						<td><strong>DHL</strong></td>
						<th>Tracking No</th>
						<td></td>						
					</tr>
					<tr>
						<th>Shipping Optional</th>
						<td><strong>Shop & Ship</strong></td>
						<th>Ship Date</th>
						<td><strong>--Not Set--</strong></td>
					</tr>
					<tr>
						<th>Declare Item</th>
						<td><strong>Aromatherapy</strong></td>
						<th>Inv Attach</th>
						<td><strong></strong></td>
					</tr>
					<tr>
						<th>
							Batch No Start
						</th>
						<td rowspan="3">
							<strong>Note</strong>
						</td>
						<th>
							C.O.O
						</th>
						<td><strong></strong></td>
					</tr>
					<tr>
						<th>
							Batch No End
						</th>
						<th>
							Small C Box
						</th>
						<td>
							<strong></strong>
						</td>
					</tr>
					<tr>
						<th>Batch</th>
						<th>Bic C Box</th>
						<td><strong></strong></td>
					</tr>
				</tbody>
			</table>
		</div>		
	</div>
	