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

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h1 class="panel-title">Order List</h1>
			</div>
			<div class="panel-body">
			<div class="row">
				<div class="col-md-12">
					<span class="pull-left"><a href="<?= site_url('dashboard/page/a12'); ?>"><button type="button" class="btn btn-success">Add Order</button></a></span>
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
								
								<th>Deposit</th>							
								<th>Send Date</th>
								<th>Progress<br>
								<h6><span class="label label-info">Progress Bar under development</span></h6>
								</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>					
							<?php
							$n = 0; 
							foreach ($arr as $key) { 
								$n++;
							?>
							<tr <?php if($key->pr_id == 3){ echo 'style = "background-color : #73C10B;"'; } ?>>
								<td><?= $n; ?></td>
								<td><?= $key->cl_name; ?></td>
								<td><?= $key->cl_tel; ?></td>
								<td><?= $key->cl_country; ?></td>
								<td><?= $key->or_deposit; ?></td>
								<td><?= $key->or_sendDate; ?></td>
								<td>								
									<progress class="progress progress-success" value="75" max="100" title="75%">75%</progress>
								</td>
								<td><a href="#" class="listO" id="l<?= $n; ?>" title="View Detail"><button type="button" class="btn btn-info"><i class="fa fa-eye"></i> View</button></a><!--<a href="" title="Edit"><i class="fa fa-pencil"></i></a>&nbsp;&nbsp;--><br/><a onclick = "return confirm('Confirm Delete!');" href="<?= site_url('dashboard/deleteOrder?key='.$this->my_func->scpro_encrypt($key->or_id)); ?>" title="Delete"><button type="button" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button></a></td>
							</tr>					
							<tr class = "l<?= $n; ?> detail" style="display: none; ">
								<td></td>
								<td colspan="8">								
									<div class="row col-md-12">
									<?php 
										foreach ($key->item as $item) {
									?>
										<div class="well col-md-4" <?php if($item->pr_id == 3){ ?> style = "background-color : #73C10B;"<?php } ?>>										
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

