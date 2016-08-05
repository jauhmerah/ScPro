<div class="row addform"><!--style="display: none;-->
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
										<option value="1">Manggo</option>
										<option value="2">Blackcurrant</option>
										<option value="3">Honey Dew</option>
										<option value="4">Biru</option>
										<option value="5">Pink</option>
										<option value="6">BC Laici</option>
										<option value="7">Pineapple Lemonade</option>
										<option value="8">Grape</option>
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

<script>
	$(document).ready(function() {		
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
			if (i == 1) {
				$("#imgDetail").prop('src', '<?= base_url(); ?>/assets/nasty/img1.jpg');
			}
			if (i == 2) {
				$("#imgDetail").prop('src', '<?= base_url(); ?>/assets/nasty/img2.jpg');
			}
			if (i == 3) {
				$("#imgDetail").prop('src', '<?= base_url(); ?>/assets/nasty/img3.jpg');
			}
			if (i == 4) {
				$("#imgDetail").prop('src', '<?= base_url(); ?>/assets/nasty/img4.jpg');
			}
			if (i == 5) {
				$("#imgDetail").prop('src', '<?= base_url(); ?>/assets/nasty/img5.jpg');
			}
			if (i == 6) {
				$("#imgDetail").prop('src', '<?= base_url(); ?>/assets/nasty/img6.jpg');
			}
			if (i == 7) {
				$("#imgDetail").prop('src', '<?= base_url(); ?>/assets/nasty/img7.jpg');
			}
			if (i == 8) {
				$("#imgDetail").prop('src', '<?= base_url(); ?>/assets/nasty/img8.jpg');
			}
			if (i == -1) {
				$("#imgDetail").prop('src', '<?= base_url(); ?>/assets/nasty/400x400.png');
			}
		});	

		function perasa(i) {
			if (i == 1) {return "Manggo";}
			if (i == 2) {return "Blackkurant";}
			if (i == 3) {return "Honey Dew";}
			if (i == 4) {return "Blue";}
			if (i == 5) {return "Pink";}
			if (i == 6) {return "Blackcurrant Laici";}
			if (i == 7) {return "Pineapple Lemonade";}
			if (i == 8) {return "Grape";}
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