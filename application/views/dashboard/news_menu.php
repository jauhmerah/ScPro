<!--<div class="row menu">
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
</div>-->
<script>
	$(document).ready(function() {
		var num = 0;
		$("#addBtn").click(function() {
			if(checkInput()){
				flavcode = $("#inputPerasa").val();
				niccode = $("#inputNico").val();
				promo = $("#inputPromo").val();
				qty = $("#inputQty").val();
				flav = perasa(flavcode);
				nic = nico(niccode);
				num ++;
				$.post('<?= site_url("dashboard/getAjaxOrderBox");?>', {fcode : flavcode ,num : num ,flav: flav, nic : nic , qty : qty , promo : promo}, function(data) {
					$("#orderBox").append(data);
					//alert(data);
				});
			}
		});
		//alert("jd lah");

		function checkInput() {
			//return true;
			if ($("#inputPerasa").val() == -1) {
				alert("Please Select Flavored!");
				$("#inputPerasa").focus();
				return false;
			}
			if ($("#inputNico").val() == -1) {
				alert("Please Select Nicotine!");
				$("#inputNico").focus();
				return false;
			}
			if ($("#inputPromo").val() == "") {
				$("#inputPromo").val(0);
			}
			if ($("#inputQty").val() == '' || $("#inputQty").val() == 0) {
				alert("Please Enter Quantity!");
				$("#inputQty").focus();
				return false;
			}
			return true;
		}

		$("#inputPerasa").change(function() {
			var i = $(this).val();
			if (i == 0) {
				$("#imgDetail").prop('src', '<?= base_url(); ?>/assets/nasty/img1.jpg');
			}
			if (i == 1) {
				$("#imgDetail").prop('src', '<?= base_url(); ?>/assets/nasty/img2.jpg');
			}
			if (i == 2) {
				$("#imgDetail").prop('src', '<?= base_url(); ?>/assets/nasty/img3.jpg');
			}
			if (i == 3) {
				$("#imgDetail").prop('src', '<?= base_url(); ?>/assets/nasty/img1.jpg');
			}
			if (i == 4) {
				$("#imgDetail").prop('src', '<?= base_url(); ?>/assets/nasty/img1.jpg');
			}
			if (i == -1) {
				$("#imgDetail").prop('src', '<?= base_url(); ?>/assets/nasty/400x400.png');
			}
		});

		

		function perasa(i) {
			if (i == 0) {return "Manggo";}
			if (i == 1) {return "Blackkurant";}
			if (i == 2) {return "Honey Dew";}
			if (i == 3) {return "Blue";}
			if (i == 4) {return "Pink";}
			return false;
		}
		function nico(i) {
			if (i == 0) {return "0 Mg";}	
			if (i == 3) {return "3 Mg";}	
			if (i == 6) {return "6 Mg";}	
			if (i == 9) {return "9 Mg";}	
			if (i == 12) {return "12 Mg";}
			return false;	
		}
		$("ul li .delBtn").click(function() {
				alert("huhu");
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
							<td class="col-md-8"><input type="number" name="telnumber" id="inputTelnumber" class="form-control"></td>
						</tr>
						<tr class="row">
							<td class="col-md-4"><span class="pull-left">Country</span><span class="pull-right">* :</span></td>
							<td class="col-md-8"><input type="text" name="country" id="inputCountry" class="form-control" value="" required="required" pattern="" title="">
							</td>
						</tr>
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
							<td class="col-md-4"><span class="pull-left">Deposit</span><span class="pull-right">:</span></td>
							<td class="col-md-8"><input type="text" name="deposit" id="inputDeposit" class="form-control" >
							</td>
						</tr>						
						<tr class="row">
							<td class="col-md-4"><span class="pull-left">Note</span><span class="pull-right">:</span></td>
							<td class="col-md-8"><textarea name="note" id="inputNote" class="form-control" rows="3"></textarea>
						</tr>
					</tbody>
				</table>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Nasty Product</h3>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-4 col-lg-offset-4">
								<img id="imgDetail" class="img-thumbnail" src="<?= base_url('assets/nasty/400x400.png'); ?>" alt="">
							</div>
						</div>
						<div class="clearfix">
							&nbsp;
						</div>
						<div class="col-md-5 col-md-offset-1">
							<div class="row">
								<div class="col-md-4">
									<span class="pull-left">Flavored</span><span class="pull-right">:</span>
								</div>
								<div class="col-md-8">
									<select name="perasa" id="inputPerasa" class="form-control">
										<option value="-1" selected>-- Select One --</option>
										<option value="0">Manggo</option>
										<option value="1">Blackkurant</option>
										<option value="2">Honey Dew</option>
										<option value="3">Biru</option>
										<option value="4">Pink</option>
									</select>
								</div>
							</div>
							<div class="clearfix">
							&nbsp;
							</div>
							<div class="row">
								<div class="col-md-4">
									<span class="pull-left">Nicotine</span><span class="pull-right">:</span>
								</div>
								<div class="col-md-8">
									<select name="nico" id="inputNico" class="form-control">
										<option value="-1" selected>-- Select One --</option>
										<option value="0">0 Mg</option>
										<option value="3">3 Mg</option>
										<option value="6">6 Mg</option>
										<option value="9">9 Mg (Creamy Only)</option>
										<option value="12">12 Mg (Creamy Only)</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-md-5">
							<div class="row">
								<div class="col-md-4">
									<span class="pull-left">Promo</span><span class="pull-right">:</span>
								</div>
								<div class="col-md-8">
									<input type="number" name="promo" id="inputPromo" class="form-control" value="0">
								</div>
							</div>
							<div class="clearfix">
								&nbsp;
							</div>
							<div class="row">
								<div class="col-md-4">
									<span class="pull-left">Quantity</span><span class="pull-right">:</span>
								</div>
								<div class="col-md-8">
									<input type="number" value="0" name="qty" id="inputQty" class="form-control">
								</div>
							</div>
							<div class="clearfix">
								&nbsp;
							</div>
							<div class="row">
								<button type="button" id="addBtn" class="btn btn-success pull-right"><i class="fa fa-plus"></i>&nbsp;Add</button>
							</div>
							<div class="clearfix">
								&nbsp;
							</div>
						</div>
						<div class="clearfix">
							&nbsp;
						</div>
						<!-- Order Box -->
						<div class="row">
							<div class="col-xs-10 col-xs-offset-1">
								<div class="well">
									<ul class="media-list" id="orderBox">
									  	
									</ul>
								</div>
							</div>
						</div>
						<!--End of Order Box --> 
					</div>
				</div>				
			</div>
				<table class="table table-hover">
										
	<tbody>
						<!--<tr class="row">
							<td class="col-md-4"><span class="pull-left">Order Status</span><span class="pull-right">:</span></td>
							<td class="col-md-8"><textarea name="statusO" id="inputStatus" class="form-control" rows="3"></textarea>
						</tr> -->
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

<div class="row">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">Order List</h3>
		</div>
		<div class="panel-body">
		<div class="row">			
			<div class="col-md-3"><input type="text" name="search" id="inputSearch" class="form-control" placeholder="Search"></div>
			<div class="col-md-4">				
				<select name="filter" id="inputFilter" class="form-control">
					<option value="0" selected>Select Filter</option>
					<option value="1">Client Name</option>
					<option value="2">Contact Number</option>
					<option value="3">Country</option>
					<option value="4">Total Amount</option>
					<option value="5">Deposit</option>
					<option value="6">Send Date</option>
					<option value="7">Order Status</option>
				</select>
				
			</div>

			
		</div>
		<div class="clearfix">
		&nbsp;
		</div>
			<div class="table-responsive">
				<table class="table table-hover table-striped table-bordered">
					<thead>
						<tr style="background-color: #F5F5F5">
							<th>Num</th>
							<th>Client Name</th>
							<th>Contact No</th>
							<th>Country</th>
							
							<th>Total Amount</th>
							<th>Deposit</th>							
							<th>Send Date</th>
							<th>Progress</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<tr class="listO" id="l1">
							<td>1</td>
							<td>Muhammad Farid Husaini</td>
							<td>0123454555</td>
							<td>Gomeh</td>
							<td>Rm 100000</td>
							<td>Full</td>
							<td>8/8/2016</td>
							<td>								
								<progress class="progress progress-success" value="75" max="100" title="75%">75%</progress>
							</td>
							<td><a href="" title="View Detail"><i class="fa fa-eye"></i></a>&nbsp;&nbsp;<a href="" title="Edit"><i class="fa fa-pencil"></i></a>&nbsp;&nbsp;<a href="" title="Delete"><i class="fa fa-trash"></i></a></td>
						</tr>
						<tr class = "l1 detail" style="display: none;">
							<td colspan="9">
								<div class="well">
									<div class="row">
										<div class="col-md-4">
											<div class="panel panel-default">
												<div class="panel-heading">
													<h3 class="panel-title">Manggo</h3>
												</div>
												<div class="panel-body">
													<div class="row">
														<span class="pull-left col-md-4">Qty :</span>														
														<span class="col-md-8 pull-right"> 100 + 20</span>
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="panel panel-default">
												<div class="panel-heading">
													<h3 class="panel-title">Blackkurant</h3>
												</div>
												<div class="panel-body">
													<div class="row">
														<span class="pull-left col-md-4">Qty :</span>														
														<span class="col-md-8 pull-right"> 100 + 20</span>
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="panel panel-yellow">
												<div class="panel-heading">
													<h3 class="panel-title">Honey Dew</h3>
												</div>
												<div class="panel-body">
													<div class="row">
														<span class="pull-left col-md-4">Qty :</span>														
														<span class="col-md-8 pull-right"> 100 + 20</span>
													</div>
													
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4 col-md-offset-1">
											<div class="panel panel-primary">
												<div class="panel-heading">
													<h3 class="panel-title">Biru</h3>
												</div>
												<div class="panel-body">
													<div class="row">
														<span class="pull-left col-md-5">Qty 3mg :</span>														
														<span class="col-md-7 pull-right"> 100 + 20</span>
													</div>
													<div class="row">
														<span class="pull-left col-md-5">Qty 6mg :</span>														
														<span class="col-md-7 pull-right"> 100 + 20</span>
													</div>
													<div class="row">
														<span class="pull-left col-md-5">Qty 9mg :</span>														
														<span class="col-md-7 pull-right"> 100 + 20</span>
													</div>
													<div class="row">
														<span class="pull-left col-md-5">Qty 12mg :</span>														
														<span class="col-md-7 pull-right"> 100 + 20</span>
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-4 col-md-offset-2">
											<div class="panel panel-warning">
												<div class="panel-heading">
													<h3 class="panel-title">Pink</h3>
												</div>
												<div class="panel-body">
													<div class="row">
														<span class="pull-left col-md-5">Qty 3mg :</span>														
														<span class="col-md-7 pull-right"> 100 + 20</span>
													</div>
													<div class="row">
														<span class="pull-left col-md-5">Qty 6mg :</span>														
														<span class="col-md-7 pull-right"> 100 + 20</span>
													</div>
													<div class="row">
														<span class="pull-left col-md-5">Qty 9mg :</span>														
														<span class="col-md-7 pull-right"> 100 + 20</span>
													</div>
													<div class="row">
														<span class="pull-left col-md-5">Qty 12mg :</span>														
														<span class="col-md-7 pull-right"> 100 + 20</span>
													</div>
												</div>
											</div>
										</div>								
									</div>
									<div class="row">
										<div class="col-md-4">
											Fruity : Rm 27
										</div>
										<div class="col-md-4">
											Creamy : Rm 25
										</div>
										<div class="col-md-4">
											Total Qty : 2000
										</div>
									</div>
									<div class="clearfix">
									&nbsp;
									</div>
									<div class="row">
										<div class="panel panel-info">
											<div class="panel-heading">
												Note
											</div>
											<div class="panel-body">
												Budak nie xleh nak cayo............. <br>
												Invoice : <br>
												Inventory Check : <br>
											</div>
										</div>
									</div>
								</div>
							</td>
						</tr>
						<tr class="listO" id="l2">
							<td>2</td>
							<td>Muhammad Farid Husaini</td>
							<td>0123454555</td>
							<td>Gomeh</td>
							<td>Rm 100000</td>
							<td>Full</td>
							<td>8/8/2016</td>
							<td>								
								<progress class="progress progress-success" value="30" max="100" title="30%">30%</progress>
							</td>
							<td><a href="" title="View Detail"><i class="fa fa-eye"></i></a>&nbsp;&nbsp;<a href="" title="Edit"><i class="fa fa-pencil"></i></a>&nbsp;&nbsp;<a href="" title="Delete"><i class="fa fa-trash"></i></a></td>
						</tr>
						<tr class = "l2 detail" style="display: none;">
							<td colspan="9">
								<div class="well">
									<div class="row">
										<div class="col-md-4">
											<div class="panel panel-default">
												<div class="panel-heading">
													<h3 class="panel-title">Manggo</h3>
												</div>
												<div class="panel-body">
													<div class="row">
														<span class="pull-left col-md-4">Qty :</span>														
														<span class="col-md-8 pull-right"> 100 + 20</span>
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="panel panel-default">
												<div class="panel-heading">
													<h3 class="panel-title">Blackkurant</h3>
												</div>
												<div class="panel-body">
													<div class="row">
														<span class="pull-left col-md-4">Qty :</span>														
														<span class="col-md-8 pull-right"> 100 + 20</span>
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="panel panel-yellow">
												<div class="panel-heading">
													<h3 class="panel-title">Honey Dew</h3>
												</div>
												<div class="panel-body">
													<div class="row">
														<span class="pull-left col-md-4">Qty :</span>														
														<span class="col-md-8 pull-right"> 100 + 20</span>
													</div>
													
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4 col-md-offset-1">
											<div class="panel panel-primary">
												<div class="panel-heading">
													<h3 class="panel-title">Biru</h3>
												</div>
												<div class="panel-body">
													<div class="row">
														<span class="pull-left col-md-5">Qty 3mg :</span>														
														<span class="col-md-7 pull-right"> 100 + 20</span>
													</div>
													<div class="row">
														<span class="pull-left col-md-5">Qty 6mg :</span>														
														<span class="col-md-7 pull-right"> 100 + 20</span>
													</div>
													<div class="row">
														<span class="pull-left col-md-5">Qty 9mg :</span>														
														<span class="col-md-7 pull-right"> 100 + 20</span>
													</div>
													<div class="row">
														<span class="pull-left col-md-5">Qty 12mg :</span>														
														<span class="col-md-7 pull-right"> 100 + 20</span>
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-4 col-md-offset-2">
											<div class="panel panel-warning">
												<div class="panel-heading">
													<h3 class="panel-title">Pink</h3>
												</div>
												<div class="panel-body">
													<div class="row">
														<span class="pull-left col-md-5">Qty 3mg :</span>														
														<span class="col-md-7 pull-right"> 100 + 20</span>
													</div>
													<div class="row">
														<span class="pull-left col-md-5">Qty 6mg :</span>														
														<span class="col-md-7 pull-right"> 100 + 20</span>
													</div>
													<div class="row">
														<span class="pull-left col-md-5">Qty 9mg :</span>														
														<span class="col-md-7 pull-right"> 100 + 20</span>
													</div>
													<div class="row">
														<span class="pull-left col-md-5">Qty 12mg :</span>														
														<span class="col-md-7 pull-right"> 100 + 20</span>
													</div>
												</div>
											</div>
										</div>								
									</div>
									<div class="row">
										<div class="col-md-4">
											Fruity : Rm 27
										</div>
										<div class="col-md-4">
											Creamy : Rm 25
										</div>
										<div class="col-md-4">
											Total Qty : 2000
										</div>
									</div>
									<div class="clearfix">
									&nbsp;
									</div>
									<div class="row">
										<div class="panel panel-info">
											<div class="panel-heading">
												Note
											</div>
											<div class="panel-body">
												Budak nie xleh nak cayo............. <br>
												Invoice : <br>
												Inventory Check : <br>
											</div>
										</div>
									</div>
								</div>
							</td>
						</tr>

					<!-- End of table -->	
					</tbody>
				</table>
			</div>
		</div>
	</div>

</div>

<script>
	$(document).ready(function() {
		$(".listO").click(function() {
			temp = $(this).prop('id');
			if ($("."+temp).is(':visible')) {
				$("."+temp).hide('slow');
			}else{
				$("."+temp).show('slow');
			}			
			//alert("jadi");
		});
	});
</script>

