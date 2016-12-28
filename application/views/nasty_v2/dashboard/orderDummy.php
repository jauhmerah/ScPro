<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Dummy Invoice</title>
		<link rel="icon" href="<?= base_url(); ?>assets/cover/favicon2.png"> 
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	</head>
	<body>
	<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<img src="<?= base_url(); ?>assets/cover/formlogo.jpg" align="left"/>
		 <span class="pull-right">
		 <h2>INVOICE</h2>
		 <b>Invoice No.:#########</b><br>

		 <b>Invoice Date:</b>#/##/####<br>
		 <b>Sales Person:</b>Farid<br>
		 <b>Payment Due:</b>#/##/####

		 </span>		
	</div>
	
</div>
<div class="row">
	<div class="col-md-8 col-md-offset-2">
	<hr>
		<table class="table table-condensed table-hover">
		<tbody>
			<tr>
			<td>
			<strong>Bill To:</strong><br>
			Muhammad Farid Husaini Bin Abd Razak<br>
			Nastyjuice<br>
			Jalan2 xjumpa jalan<br>							
			011110006556<br>
			</td>							
			</tr>
		</tbody>
		</table>	
	</div>
	
</div>	
<div class="row">
					<div class="col-md-8 col-md-offset-2">
					<h6>
						<table class="table">
							<thead>
								<tr>								
									<th>Product</th>
									<th>Quantity</th>
									<th>Price</th>
									<th>Amount</th>									
								</tr>
							</thead>
							<tbody>
								<tr>									
									<td width="400px">Asap Grape | Grape 6mg | 50ml | Alluminium
Bottle + Box
Asap Grape | Grape 6mg | 50ml | Alluminium Bottle
+ Box</td>
									<td>500</td>
									<td>$5.00</td>
									<td>$2,500.00</td>
									
								</tr>
								<tr>
									<th colspan=3 style="text-align:right;">Subtotal</th>
									<td><input type=text style="width:100%" disabled/></td>
								</tr>
								<tr>
									<th colspan=3 style="text-align:right;">Sales Tax</th>
									<td><input type=text style="width:100%" disabled/></td>
								</tr>
								<tr>
									<th  colspan=3 style="text-align:right;">Shipping/Handling</th>
									<td><input type=text style="width:100%" disabled/></td>	
								</tr>
								<tr>
									<th colspan=3 style="text-align:right;">Shipping&Handling</th>
									<td><input type=text style="width:100%" disabled/></td>	
								</tr>
								<tr>
									<th colspan=3 style="text-align:right;">Total Due</th>
									<td><input type=text style="width:100%" disabled/></td>	
								</tr>
								
								
							</tbody>
						</table>
					</div>
					</h6>
				</div>				
		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	</body>
</html>