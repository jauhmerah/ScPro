<!--<pre>
	<?=print_r($arr);?>
</pre>-->
<div class="row menu">	
	<div class="col-lg-6">
	<div class="col-lg-10 col-sm-offset-1">
		<div class="panel panel-green clickAdd">
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
			<a href="#" id="click">
				<div class="panel-footer">
					<span class="pull-left">Add Order</span>
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div></div>
	<div class="col-lg-6">
	<div class="col-lg-10 col-sm-offset-1">
		<div class="panel panel-primary clickView">
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
			<a href="#">
				<div class="panel-footer">
					<span class="pull-left">View list</span>
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div></div>
</div>
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
				$.post('<?= site_url("dashboard/getAjaxOrderBox");?>', {fcode : flavcode ,num : num ,flav: flav, nic : nic , qty : qty , promo : promo , niccode : niccode}, function(data) {
					$("#orderBox").append(data);
					//alert(data);
				});
			}
		});
		//alert("jd lah");
		$("#submit_btn").click(function() {
			$("#add_form").submit();
		});
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
	});
	
</script>

<div class="row addform" style="display: none;"><!--style="display: none;-->
	<div class="col-md-12">
		<div class="panel panel-green">
			<!-- Default panel contents -->
		
			<div class="panel-heading">Add New Order</div>
			<div class="panel-body">
				<!-- Table -->
				<form id = "add_form" enctype="multipart/form-data" method="post" action="<?= site_url('dashboard/page/a11'); ?>">
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
				<span class="pull-left"><button type="button" class="btn btn-default" id="backBtn">Back</button></span>
				<span class="pull-right"><button type="button" class="btn btn-primary" id="submit_btn">Submit</button></span>
				<div class="clearfix"></div>
			</div>	
				
		</div>

	</div>
</div>

<div class="row viewL" style="display: none;">
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
			<div class="col-md-5">
				<span class="pull-right"><button type="button" class="btn btn-default" id="backBtn2">Back</button></span>
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
							
							<th>Total Quantity</th>
							<th>Deposit</th>							
							<th>Send Date</th>
							<th>Progress</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>					
						<?php
						$n = 0; 
						foreach ($arr as $key) { 
							$n++;
						?>
						<tr class="listO" id="l<?= $n; ?>">
							<td><?= $n; ?></td>
							<td><?= $key->cl_name; ?></td>
							<td><?= $key->cl_tel; ?></td>
							<td><?= $key->cl_country; ?></td>
							<td></td>
							<td><?= $key->or_deposit; ?></td>
							<td><?= $key->or_sendDate; ?></td>
							<td>								
								<progress class="progress progress-success" value="75" max="100" title="75%">75%</progress>
							</td>
							<td><a href="" title="View Detail"><i class="fa fa-eye"></i></a>&nbsp;&nbsp;<a href="" title="Edit"><i class="fa fa-pencil"></i></a>&nbsp;&nbsp;<a href="" title="Delete"><i class="fa fa-trash"></i></a></td>
						</tr>						
						<tr class = "l<?= $n; ?> detail" style="display: none;">
							<td colspan="9">								
								<div class="row col-md-12">
								<?php 
									foreach ($key->item as $item) {
								?>
									<div class="well col-md-4">										
									  	<div class="media">
											<a class="media-left" href="#">
											  <img class="media-object" src="<?php echo $this->my_func->itemIcon($item->ty_id); ?> " alt="Generic placeholder image">
											  <?php echo $this->my_func->mgLable($item->it_mg , true); ?>
											</a>
											<div class="media-body">												
												<h3 class="media-heading"><?= $item->ty_desc; ?></h3>
										  		<span class="pull-left">Qty :</span><span class="pull-right"><?= $item->it_qty; ?></span></br>
										  		<span class="pull-left">Promo :</span><span class="pull-right">+<?= $item->it_promo; ?></span>
											</div>	
										</div>																				
									</div>
								<?php
									}
								?>
																		
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
											<?= $key->or_note; ?>
										</div>
									</div>
								</div>								
							</td>
						</tr>
					<?php		
						}
					?>
						

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
		$(".clickAdd").click(function() {
			$.when($(".menu").hide('slow')).then(function(){
				$(".addform").show('slow');
			});			
		});
		$("#backBtn").click(function() {
			/* Act on the event */
			$.when($(".addform").hide('slow')).then(function(){
				$(".menu").show('slow');
			});
		});
		$(".clickView").click(function() {
			$.when($(".menu").hide('slow')).then(function(){
				$(".viewL").show('slow');
			});			
		});
		$("#backBtn2").click(function() {
			/* Act on the event */
			$.when($(".viewL").hide('slow')).then(function(){
				$(".menu").show('slow');
			});
		});

	});
</script>

