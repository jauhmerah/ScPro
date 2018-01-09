<?php 
$url = $this->uri->segment(5,1);
?>

<link href="<?= base_url(); ?>asset2/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css">
					<script src="<?= base_url(); ?>asset2/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
<div class="row">
	<div class="col-md-12">
           <div class="tab-pane active" id="tab_1">
                        <div class="portlet box red-soft ribbon mt-element-ribbon" >
                            <div class="portlet-title">
								<div class="cleafix" style="height :4px">
									
								</div>
                                <div class="row">
                                                                     
                                
                            		<div class="col-md-12">
										<div class="col-md-5">
											<div class="caption">
												<img src="<?= base_url(); ?>/assets/cover/favicon2.png"> Finish Item List  
											</div>
											
										</div> 
										<div class="col-md-7">
											<div class="form-group">
												
												
												<div class="col-sm-10">
													<input type="search" name="search" id="search" class="form-control input-circle" placeholder="Barcode Number" required autofocus onmouseover="this.focus();">
												</div>
												<div class="col-sm-2">
													<button type="button" class="clearBtn btn bg-green-sharp btn-circle btn-md" title="Clear Field"><i class="fa fa-eraser" aria-hidden="true"></i> Clear Field</button>													
												</div>
												
											</div>
										</div>
								
									</div>
								</div>
                            </div>
							
                           <div class="portlet-body form">

							<div class="notification">
								
							</div>
							<div class="clearfix">
								&nbsp;
							</div>
							 <div class="row">
								<form id="formSearch" action="<?= site_url('nasty_v2/dashboard/page/i2'); ?>" method="POST" role="form">
									<div class="col-md-10 col-md-offset-1">
									
										<div class="col-md-6">
											<div class="form-group">
												<label for="input" class="col-sm-2 control-label">Search</label>
												<div class="col-sm-10">
													<input type="search" name="search2" id="search2" class="form-control input-circle" placeholder="Search" required>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label for="inputFilter" class="col-sm-2 control-label">Filter</label>
												<div class="col-sm-10">
													<select name="filter" id="inputFilter" class="form-control input-circle">
														<option value="-1">-- Select Filter --</option>
														<option value="1">Item Name</option>
														<option value="2">Category</option>
														<option value="3">Nicotine</option>
														
													</select>
												</div>
											</div>
										</div>
										<div class="col-md-2">
											<button type="button" class="btn btn-default " id="sub"><i class="fa fa-search"></i> Search</button><!--  -->
										</div>
									</div>
								</form>
							</div>
							<div class="clearfix">
								&nbsp;
							</div>
							 <div class="row tableC">
                           		<div class="table-responsive">
                           			<div class="col-md-12" id="divTableItem" name="divTableItem">
                           				
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
												
												<tr <?php echo $danger; ?> >
													<td><?= $n; ?></td>
													<td><?= $key->bi_code; ?></td>
													<td><?= $key->ty2_desc; ?> | <strong><?= $key->ni_mg; ?> mg</strong></td>
													<td><?= $key->ca_desc; ?></td>
												
													<td id="auto<?= $n.'id' ?>" name="auto<?= $n.'id' ?>">
													<strong><big><?= $key->fi_qty; ?> Bottles</big></strong>
													</td>
													
													<td>
													<center>
												<button type="button" class="Lorder btn bg-green-jungle btn-circle btn-md" id="L<?= $n; ?>" title="Stock-in"><i class="fa fa-arrow-down"></i> STOCK-IN</button>
												&nbsp;&nbsp;-&nbsp;&nbsp;
												
												<button type="button" class="Morder btn bg-yellow-crusta btn-circle btn-md" id="M<?= $n; ?>" title="Stock-out"><i class="fa fa-arrow-up"></i> STOCK-OUT</button>
												&nbsp;&nbsp;-&nbsp;&nbsp;
												<button type="button" class="dangerBtn btn bg-red btn-circle btn-md" id="<?= $n.'dgr' ?>" name="<?= $n.'dgr' ?>" title="Danger Zone"><i class="fa fa-exclamation-triangle"></i> DANGER ZONE</button>
												<input type="hidden" class="form-control <?= $n.'dgr' ?>" value="<?= $this->my_func->scpro_encrypt($key->bi_id); ?>">
												
												
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
					</div>
				</div>
				</div>
				<div id="fileUp" style="display:none;">
	            	
	            </div>


                            </div> 
                        </div>                       
                    </div>
        </div>
</div>
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
		$("#search").keyup(function(){
					
            search = $("#search").val();
			
			$.post('<?= site_url('nasty_v2/dashboard/getAjaxTableItem'); ?>', {search : search}, function(data) {
               
                $("#divTableItem").html(data);
            });

			$("#search").val($("#search").val().replace(' ', ','));
			
			 
		});
		$(".dangerBtn").click(function(){

			id = $(this).prop('id');
               
            be = $("."+id).val();

			url = "<?= $url; ?>";

			$.post('<?= site_url('nasty_v2/dashboard/getAjaxDanger'); ?>', {be_id : be , page : url}, function(data) {
               
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
					
					bootbox.alert("This Item Already Stock-In!");
					
					$(".L"+temp2).hide('slow');
					
					 $.post('<?= site_url('nasty_v2/dashboard/getAjaxQtyColumn'); ?>', {id : be,n : temp2}, function(data) {
               
                              $("#auto"+id).html(data);
                    });
					
				},
				error: function (result) {

                    bootbox.alert("Error! Please Contact IT Department About This Bugs");
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
					
					bootbox.alert("This Item Already Stock-Out!");
					
					$(".M"+temp2).hide('slow');
					
					 $.post('<?= site_url('nasty_v2/dashboard/getAjaxQtyColumn'); ?>', {id : be}, function(data) {
               
                              $("#auto"+id).html(data);
                    });
					
				},
				error: function (result) {

                    bootbox.alert("Error! Please Contact IT Department About This Bugs");

                }
			});
			
		});
			
		$(".clearBtn").click(function(){
			$("#search").val('');
			$.post('<?= site_url('nasty_v2/dashboard/getAjaxTableItem'); ?>', {}, function(data) {
               
                $("#divTableItem").html(data);
            });
		});

		$("#sub").click(function() {
			if (searchFun()) {
				$("#formSearch").submit();
			} else {
				$("#inputFilter").focus();
			}
		});
		function searchFun() {
			filter = $("#inputFilter").val();
			if (filter == -1) {
				bootbox.alert("Please select Filter");
				return false;} else {return true;}
		}
        <?php if (isset($countWrn) && !empty($countWrn)) { ?>

		$.notify({
            	icon: 'fa fa-exclamation-triangle',
            	message: "<big><b>Warning!</b></big> <b>"+<?= $countWrn; ?>+" item</b> nearly hit danger zone!"

                },{
                type: 'warning',
                timer: 4000,
                placement: {
                from: "bottom",
                align: "right"
                }
            });
		<?php } ?>

        <?php if (isset($countDgr) && !empty($countDgr)) { ?>
		
		$.notify({
            	icon: 'fa fa-exclamation-triangle',
            	message: "<big><b>Danger!</b></big> <b>"+<?= $countDgr; ?>+" item</b> needs to be update! Please hurry!"

                },{
                type: 'danger',
                timer: 4000,
                placement: {
                from: "bottom",
                align: "right"
                }
            });
		<?php } ?>
		
	});

</script>