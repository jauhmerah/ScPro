<div class="row menu">
	<div class="col-lg-4">
	<div class="col-lg-10 col-sm-offset-1">
		<div class="panel panel-green">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-plus-square fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge">Add</div>
						<div><i class="fa fa-pencil-square-o fa-2x"></i></div>
					</div>
				</div>
			</div>
			<a id="click">
				<div class="panel-footer">
					<span class="pull-left">Add News</span>
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div></div>
	<div class="col-lg-4">
	<div class="col-lg-10 col-sm-offset-1">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-th-list fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge">View</div>
						<div><i class="fa fa-eye fa-2x"></i></div>
					</div>
				</div>
			</div>
			<a href="<?= site_url('dashboard/page/a12') ?>">
				<div class="panel-footer">
					<span class="pull-left">View list</span>
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div></div>
	<div class="col-lg-4">
	<div class="col-lg-10 col-sm-offset-1">
		<div class="panel panel-red">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-trash fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge">Delete</div>
						<div><i class="fa fa-exclamation-triangle fa-2x"></i></div>
					</div>
				</div>
			</div>
			<a href="#">
				<div class="panel-footer">
					<span class="pull-left">Delete</span>
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div></div>
</div>
<script>
	$(document).ready(function() {
		$('#submit_btn').click(function() {		
			if ($('#img').get(0).files.length === 0) {
				alert('No Image selected!!!');
			}else{
				$("#submitform").click();
			}			
		});
		$('#click').click(function() {
			$.when($('.menu').hide('slow')).then($('.addform').show('slow'));			
		});
	});	
</script>

<div class="row addform"><!--style="display: none;-->
	<div class="col-md-12">
		<div class="panel panel-green">
			<!-- Default panel contents -->
		
			<div class="panel-heading">Add New Order</div>
			<div class="panel-body">
				<!-- Table -->
				<form id = "add_form" enctype="multipart/form-data" method="post" action="">
				<table class="table table-hover">
					<tbody>
						<tr class="row">
							<td class="col-md-4"><span class="pull-left">Client Name</span><span class="pull-right">* :</span></td>
							<td class="col-md-8"><input type="text" name="name" id="inputName" class="form-control" value="" required="required" title=""></td>
						</tr>
						<tr class="row">
							<td class="col-md-4"><span class="pull-left">Contact Number</span><span class="pull-right"> :</span></td>
							<td class="col-md-8"><input type="text" name="telnumber" id="inputTelnumber" class="form-control"></td>
						</tr>
						<tr class="row">
							<td class="col-md-4"><span class="pull-left">Country</span><span class="pull-right">* :</span></td>
							<td class="col-md-8"><input type="text" name="country" id="inputCountry" class="form-control" value="" required="required" pattern="" title="">
							</td>
						</tr>

					</tbody>
				</table>
				
				<div class="panel panel-default">
					<div class="panel-heading" align="center">
						<h3 class="panel-title">Fruity</h3>
					</div>
					<div class="panel-body">
						<table class="table table-hover">
							<tbody>
							<tr class="row">
								<td class="col-xs-3"><span class="pull-left">Manggo</span><span class="pull-right"> :</span></td>
								<td class="col-xs-3"><input type="number" name="manggo" id="manggo" class="form-control"></td>
								<td class="col-xs-1"><span class="pull-right">+ </span></td>
								<td class="col-xs-1"><input type="number" name="promoM" id="inputPromoM" class="form-control" value="0"></td>
								<td class="col-xs-4"></td>
							</tr>
							<tr class= "row">
								<td class="col-md-3"><span class="pull-left">Blackkurant</span><span class="pull-right"> :</span></td>
								<td class="col-md-3"><input type="number" name="blackC" id="blackC" class="form-control"></td>						
								<td class="col-xs-1"><span class="pull-right">+ </span></td>
								<td class="col-xs-1"><input type="number" name="promoM" id="inputPromoM" class="form-control" value="0"></td>
								<td class="col-xs-4"></td>
							</tr>
							<tr class= "row ">
								<td class="col-md-3"><span class="pull-left">Honey Dew</span><span class="pull-right"> :</span></td>
								<td class="col-md-3"><input type="number" name="honeyD" id="honeyD" class="form-control"></td>						
								<td class="col-xs-1"><span class="pull-right">+ </span></td>
								<td class="col-xs-1"><input type="number" name="promoM" id="inputPromoM" class="form-control" value="0"></td>
								<td class="col-xs-4"></td>
							</tr>
							</tbody>
						</table>
					</div>
					<div class="panel-footer">
						<div class="row">
						<div class="col-lg-10">
							<span class="pull-right">Price :</span>
						</div>
						<div class = "col-lg-2"><input type="number" name="fruityP" id="inputFruityP" class="form-control" value="0" ></div>
						</div>
					</div>
				</div>
				
				<div class="panel panel-default">
					<div class="panel-heading" align="center">
						<h3 class="panel-title">Creamy</h3>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-6">
								<div class="panel panel-primary">
									<!-- Default panel contents -->
									<div class="panel-heading" align="center"><h3 class="panel-title">Biru</h3></div>
									<div class="panel-body">						
									<!-- Table -->
									<table class="table table-hover">
										<tbody>
											<tr>
												<td class="col-md-4">
														<span class="pull-left">3 mg</span><span class="pull-right">:</span>
												</td>
												<td class="col-md-4">
														<input type="number" name="biru3" id="inputBiru3" class="form-control" value="0">
												</td>
												<td class="col-md-1"><span class="pull-right">+</span></td>
												<td class="col-md-3"><input type="number" name="promoB3" id="inputPromoB3" class="form-control" value="0"></td>
												
											</tr>
											<tr>
												<td class="col-md-4">
														<span class="pull-left">6 mg</span><span class="pull-right">:</span>
												</td>
												<td class="col-md-4">
														<input type="number" name="biru6" id="inputBiru6" class="form-control" value="0">
												</td>
												<td class="col-md-1"><span class="pull-right">+</span></td>
												<td class="col-md-3"><input type="number" name="promoB6" id="inputPromoB6" class="form-control" value="0"></td>
											</tr>
											<tr>
												<td class="col-md-4">
														<span class="pull-left">9 mg</span><span class="pull-right">:</span>
												</td>
												<td class="col-md-4">
														<input type="number" name="biru9" id="inputBiru9" class="form-control" value="0">
												</td>
												<td class="col-md-1"><span class="pull-right">+</span></td>
												<td class="col-md-3"><input type="number" name="promoB9" id="inputPromoB9" class="form-control" value="0"></td>
											</tr>
											<tr>
												<td class="col-md-4">
														<span class="pull-left">12 mg</span><span class="pull-right">:</span>
												</td>
												<td class="col-md-4">
														<input type="number" name="biru12" id="inputBiru12" class="form-control" value="0">
												</td>
												<td class="col-md-1"><span class="pull-right">+</span></td>
												<td class="col-md-3"><input type="number" name="promoB12" id="inputPromoB12" class="form-control" value="0"></td>
											</tr>
										</tbody>
									</table>
									</div>							
								</div>
							</div>
							<div class="col-md-6">
								<div class="panel panel-danger">
									<div class="panel-heading" align="center">
										<h3 class="panel-title">Pink</h3>
									</div>
									<div class="panel-body">
										<table class="table table-hover">
										<tbody>
											<tr>
												<td class="col-md-4">
														<span class="pull-left">3 mg</span><span class="pull-right">:</span>
												</td>
												<td class="col-md-4">
														<input type="number" name="pink3" id="inputPink3" class="form-control" value="0">
												</td>
												<td class="col-md-1"><span class="pull-right">+</span></td>
												<td class="col-md-3"><input type="number" name="promoP3" id="inputPromoP3" class="form-control" value="0"></td>
												
											</tr>
											<tr>
												<td class="col-md-4">
														<span class="pull-left">6 mg</span><span class="pull-right">:</span>
												</td>
												<td class="col-md-4">
														<input type="number" name="pink6" id="inputPink6" class="form-control" value="0">
												</td>
												<td class="col-md-1"><span class="pull-right">+</span></td>
												<td class="col-md-3"><input type="number" name="promoP6" id="inputPromoP6" class="form-control" value="0"></td>
											</tr>
											<tr>
												<td class="col-md-4">
														<span class="pull-left">9 mg</span><span class="pull-right">:</span>
												</td>
												<td class="col-md-4">
														<input type="number" name="pink9" id="inputPink9" class="form-control" value="0">
												</td>
												<td class="col-md-1"><span class="pull-right">+</span></td>
												<td class="col-md-3"><input type="number" name="promoP9" id="inputPromoP9" class="form-control" value="0"></td>
											</tr>
											<tr>
												<td class="col-md-4">
														<span class="pull-left">12 mg</span><span class="pull-right">:</span>
												</td>
												<td class="col-md-4">
														<input type="number" name="pink12" id="inputPink12" class="form-control" value="0">
												</td>
												<td class="col-md-1"><span class="pull-right">+</span></td>
												<td class="col-md-3"><input type="number" name="promoP12" id="inputPromoP12" class="form-control" value="0"></td>
											</tr>
										</tbody>
									</table>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="panel-footer">
						<div class="row">
							<div class="col-lg-10">
								<span class="pull-right">Price :</span>
							</div>
							<div class = "col-lg-2"><input type="number" name="creamyP" id="inputFruitP" class="form-control" value="0" ></div>
						</div>
					</div>
				</div>
				<table class="table table-hover">
					<tbody>
						<tr class="row">
							<td class="col-md-4"><span class="pull-left">Send Date</span><span class="pull-right"> :</span></td>
							<td class="col-md-8"><input type="date" name="sendDate" id="inputSendDate" class="form-control">
							</td>
						</tr>
						<tr class="row">
							<td class="col-md-4"><span class="pull-left">Bank</span><span class="pull-right">:</span></td>
							<td class="col-md-8"><input type="text" name="bank" id="inputBank" class="form-control" >
							</td>
						</tr>
						<tr class="row">
							<td class="col-md-4"><span class="pull-left">Total</span><span class="pull-right">:</span></td>
							<td class="col-md-8"><input type="number" name="total" id="inputTotal" class="form-control" disabled="disabled" value="0">
							</td>
						</tr>
						<tr class="row">
							<td class="col-md-4"><span class="pull-left">Deposit</span><span class="pull-right">:</span></td>
							<td class="col-md-8"><input type="text" name="deposit" id="inputDeposit" class="form-control" >
							</td>
						</tr>
						<tr class="row">
							<td class="col-md-4"><span class="pull-left">Invoice</span><span class="pull-right">:</span></td>
							<td class="col-md-8"><input type="text" name="invoice" id="inputInvoice" class="form-control" >
							</td>
						</tr>
						<tr class="row">
							<td class="col-md-4"><span class="pull-left">Inventory Check</span><span class="pull-right">:</span></td>
							<td class="col-md-8"><input type="text" name="inventoryC" id="inputInvenCheck" class="form-control" >
							</td>
						</tr>
						<tr class="row">
							<td class="col-md-4"><span class="pull-left">Note</span><span class="pull-right">:</span></td>
							<td class="col-md-8"><textarea name="note" id="inputNote" class="form-control" rows="3"></textarea>
						</tr>
						<tr class="row">
							<td class="col-md-4"><span class="pull-left">Order Status</span><span class="pull-right">:</span></td>
							<td class="col-md-8"><textarea name="statusO" id="inputStatus" class="form-control" rows="3"></textarea>
						</tr>
					</tbody>
				</table>
						
				
				<input type="submit" id = "submitform" style="display: none;"></input>
				</form>					

			</div>

			<div class="panel-footer">
				<span class="pull-right"><button type="button" class="btn btn-primary" id="submit_btn">Submit</button></span>
				<div class="clearfix"></div>
			</div>	
				
		</div>

	</div>
</div>
