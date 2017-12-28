
<table class="table table-bordered">
											<thead>
												<tr>
													<th>#</th>
													<th>Barcode</th>
													<th>Item</th>
													<th>Category</th>
													<th>Current Quantity</th>
													
													<th>Action</th>
													
												</tr>
											</thead>
											<tbody>
											<?php
											$n=0;
									
										foreach ($result as $key) { 
											$n++;


											?>
											<?php if($key->fi_qty < $key->fi_danger){
												$danger = "style='background-color :#FFBDBD;'";
												
												}else {
													$danger = "";
												} ?>		
												<tr <?php echo $danger; ?>>
													<td><?= $n; ?></td>
													<td><?= $key->bi_code; ?></td>
													<td><?= $key->ty2_desc; ?> | <strong><?= $key->ni_mg; ?> mg</strong></td>
													<td><?= $key->ca_desc; ?></td>
												
													<td id="auto<?= $n.'id' ?>" name="auto<?= $n.'id' ?>"><strong><big><?= $key->fi_qty; ?> Bottles</big></strong></td>
													
													<td>
													<center>
												<button type="button" class="Lorder btn bg-green-jungle btn-circle btn-md" id="L<?= $n; ?>" title="Stock-in"><i class="fa fa-arrow-down"></i> STOCK-IN</button>
												&nbsp;&nbsp;-&nbsp;&nbsp;
												
												<button type="button" class="Morder btn bg-yellow-crusta btn-circle btn-md" id="M<?= $n; ?>" title="Stock-out"><i class="fa fa-arrow-up"></i> STOCK-OUT</button>
												&nbsp;&nbsp;-&nbsp;&nbsp;
												<button type="button" class="dangerBtn btn bg-red btn-circle btn-md" id="<?= $n.'dgr' ?>" name="<?= $n.'dgr' ?>" title="Danger Zone"><i class="fa fa-exclamation-triangle"></i> DANGER ZONE</button>
												<input type="hidden" class="form-control <?= $n.'dgr' ?>" value="<?= $this->my_func->scpro_encrypt($key->bi_id); ?>">
												&nbsp;&nbsp;-&nbsp;&nbsp;
												
													</center>
													</td>
													
												</tr>
												<tr class="L<?= $n; ?>" style="display : none;">
													<td colspan="6" >
														<div class="row">
															<div class="col-md-10 col-md-offset-1">
															<div class="col-md-6">



															<label class="control-label pull-right">Quantity :</label>
															</div>
																<div class="col-md-5">

																		<div class="form-group">
																			
																			<input type="number" id="qty<?= $n.'id' ?>" name="qty<?= $n.'id' ?>" class="form-control input-circle">
																			<div class="clearfix" style="height: 10px"></div>
																			<input type="hidden" class="form-control <?= $n.'id' ?>" value ="<?= $this->my_func->scpro_encrypt($key->bi_id); ?>" name="id">
																			<button type="submit" class="submitIn btn blue pull-right" id="<?= $n.'id' ?>" name="<?= $n.'id' ?>">

																				<i class="fa fa-save"></i> Stock-In
																			</button>
																			
																		</div>
																	</div>											
															</div>										
														</div>
														
													</td>
												</tr>

												<tr class="M<?= $n; ?>" style="display : none;">
													<td colspan="6" >
														<div class="row">
															<div class="col-md-10 col-md-offset-1">
															<div class="col-md-6">

														

															<label class="control-label pull-right">Quantity :</label>
															</div>
																<div class="col-md-5">

																		<div class="form-group">
																			
																			<input type="number" id="qtyO<?= $n.'id' ?>" name="qtyO<?= $n.'id' ?>" class="form-control input-circle">
																			<div class="clearfix" style="height: 10px"></div>
																			<input type="hidden" class="form-control <?= $n.'id' ?>" value ="<?= $this->my_func->scpro_encrypt($key->bi_id); ?>" name="id">
																			<button type="button" class="submitOut btn blue pull-right" id="<?= $n.'id' ?>" name="<?= $n.'id' ?>">

																				<i class="fa fa-save"></i> Stock-Out
																			</button>
																			
																		</div>
																	</div>											
															</div>										
														</div>
														
													</td>
												</tr>
												<div name="divDanger" id="divDanger">		
												</div>
					 							<?php } ?>
						 
												</tbody>
												<tfoot>
												<?php
												$lastRow = $numPage + sizeof($result);
													?>
												<tr>
												<td colspan="6">
													<ul class="pagination">
													<li>
													<div class="pull-right">
														<?= $link; ?>
													</div>
														
													</li>
														
													</ul>
													<div class="pull-right">
														<span class="btn disabled">Showing <?= ($numPage+1); ?> to <?= $lastRow; ?> of <?= $total; ?> records</span>
													</div> 
												</td>
											</tr>
										</tfoot>
										</table>
	
<script>
	$(document).ready(function() {


		$(".Lorder").click(function() {
			temp = $(this).prop('id');

			temp2 = temp.substring(1, 2);

            temp3="M"+temp2;

			if ($("."+temp).is(':visible')) {
				$("."+temp).hide('slow');
			}else{
				$("."+temp).show('slow');
				$("."+temp3).hide('slow');

			}			
	
		});
		$(".Morder").click(function() {
			temp = $(this).prop('id');

			temp2 = temp.substring(1, 2);

            temp3="L"+temp2;

			if ($("."+temp).is(':visible')) {
				$("."+temp).hide('slow');
			}else{
				$("."+temp).show('slow');
				$("."+temp3).hide('slow');

			}			
	
		});
		
		$(".dangerBtn").click(function(){

			id = $(this).prop('id');
               
            be = $("."+id).val();
			$.post('<?= site_url('nasty_v2/dashboard/getAjaxDanger'); ?>', {be_id : be}, function(data) {
               
                $("#divDanger").html(data);
            });
			
		});

		$(".barcodeBtn").click(function(){
			id = $(this).prop('id');
               
            be = $("."+id).val();
			
			$.post('<?= site_url('nasty_v2/dashboard/getAjaxBarcode'); ?>', {id:be}, function(data) {
				$.when($(".tableC").fadeOut("slow")).then(function(){
					$.when($("#fileUp").html(data)).then(function(){$("#fileUp").fadeIn("fast");});
				});				
			});
		});

		$(".submitIn").click(function(){
			id = $(this).prop('id');
			temp2 = id.substring(0, 1);
            
            be = $("."+id).val();
            qty2 = $("#qty"+id).val();
			
			$.ajax({
				type: 'post',
				url: '<?= site_url('nasty_v2/dashboard/stockIn'); ?>',
				dataType: 'json',
				cache: false,
				data: {id:be,qty:qty2},
				success : function(result) {
					
					alert("Item Updated");
					
					$(".L"+temp2).hide('slow');
					
					 $.post('<?= site_url('nasty_v2/dashboard/getAjaxQtyColumn'); ?>', {id : be}, function(data) {
               
                              $("#auto"+id).html(data);
                    });
					
				},
				error: function (result) {

                    alert('Error!');
                }
			});
			
		});

		$(".submitOut").click(function(){
			id = $(this).prop('id');
			temp2 = id.substring(0, 1);
            
            be = $("."+id).val();
            qty2 = $("#qtyO"+id).val();
			
			$.ajax({
				type: 'post',
				url: '<?= site_url('nasty_v2/dashboard/stockOut'); ?>',
				dataType: 'json',
				cache: false,
				data: {id:be,qty:qty2},
				success : function(result) {
					
					alert("Item Updated");
					
					$(".M"+temp2).hide('slow');
					
					 $.post('<?= site_url('nasty_v2/dashboard/getAjaxQtyColumn'); ?>', {id : be}, function(data) {
               
                              $("#auto"+id).html(data);
                    });
					
				},
				error: function (result) {

                    alert('Error!');
                }
			});
			
		});


		
	});

</script>