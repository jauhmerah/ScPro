<div class="row">
	<div class="col-md-12">
           <div class="tab-pane active" id="tab_1">
                        <div class="portlet box red-soft ribbon mt-element-ribbon" >
                            <div class="portlet-title">
                                <div class="caption">
                                    <img src="<?= base_url(); ?>/assets/cover/favicon2.png"> Finish Item List                                   
                                </div>
                            
                            </div>
                           <div class="portlet-body form">


                           	<div class="table-responsive">
                           	<div class="col-md-12">
                           	<?php $us_lvl=$this->my_func->scpro_decrypt($this->session->userdata('us_lvl')); ?>
					<table class="table table-hover">
						<thead>
							<tr>
								<th>#</th>
								<th>Item</th>
								<th>Category</th>
								<th>Current Quantity</th>
								<?php if($us_lvl != 8 && $us_lvl != 9 && $us_lvl != 10){ ?>
								<th>Action</th>
								<?php } ?>
							</tr>
						</thead>
						<tbody>
						<?php
						$n=0;
						
							foreach ($result as $key) { 
								$n++;
								?>		
								<tr>
									<td><?= $n; ?></td>
									
									<td><?= $key->ty2_desc; ?> | <?= $key->ni_mg; ?> mg</td>
									<td><?= $key->ca_desc; ?></td>
								
									<td><strong><big><?= $key->fi_qty; ?> Bottles</big></strong></td>
									<?php if($us_lvl != 8 && $us_lvl != 9 && $us_lvl != 10){ ?>
									<td>
								<button type="button" class="Lorder btn bg-green-jungle btn-circle btn-md" id="L<?= $n; ?>" title="Stock-in"><i class="fa fa-arrow-down"></i> STOCK-IN</button>
								&nbsp;&nbsp;-&nbsp;&nbsp;
								
								<button type="button" class="Morder btn bg-yellow-crusta btn-circle btn-md" id="M<?= $n; ?>" title="Stock-out"><i class="fa fa-arrow-up"></i> STOCK-OUT</button>
								&nbsp;&nbsp;-&nbsp;&nbsp;
								<button type="button" class="dangerBtn btn bg-red btn-circle btn-md" id="<?= $n.'dgr' ?>" name="<?= $n.'dgr' ?>" title="Danger Zone"><i class="fa fa-exclamation-triangle"></i> DANGER ZONE</button>
								&nbsp;&nbsp;-&nbsp;&nbsp;
								<button type="button" class="barcodeBtn btn bg-blue-sharp btn-circle btn-md" id="<?= $n.'bar' ?>" name="<?= $n.'bar' ?>" title="Barcode"><i class="fa fa-barcode"></i></button>
								<input type="hidden" class="form-control <?= $n.'dgr' ?>" value="<?= $this->my_func->scpro_encrypt($key->bi_id); ?>">

									</td>
									<?php } ?>
								</tr>
								<tr class="L<?= $n; ?>" style="display : none;">
									<td colspan="5" >
										<div class="row">
											<div class="col-md-10 col-md-offset-1">
											<div class="col-md-6">



											<label class="control-label pull-right">Quantity :</label>
											</div>
												 <div class="col-md-5">

		                                                <div class="form-group">
		                                                    <form action="<?= site_url('nasty_v2/dashboard/stockIn'); ?>" method="POST">
		                                                    <input type="number" id="qty" name="qty" class="form-control input-circle">
		                                                    <div class="clearfix" style="height: 10px"></div>
		                                                    <input type="hidden" class="form-control" value ="<?= $this->my_func->scpro_encrypt($key->bi_id); ?>" name="id">
		                                                     <button type="submit" class="btn blue pull-right">

					                                            <i class="fa fa-save"></i> Stock-In
					                                        </button>
					                                        </form>
		                                                </div>
		                                            </div>											
											</div>										
										</div>
										
									</td>
								</tr>

								<tr class="M<?= $n; ?>" style="display : none;">
									<td colspan="5" >
										<div class="row">
											<div class="col-md-10 col-md-offset-1">
											<div class="col-md-6">

										

											<label class="control-label pull-right">Quantity :</label>
											</div>
												 <div class="col-md-5">

		                                                <div class="form-group">
		                                                    <form action="<?= site_url('nasty_v2/dashboard/stockOut'); ?>" method="POST">
		                                                    <input type="number" id="qty" name="qty" class="form-control input-circle">
		                                                    <div class="clearfix" style="height: 10px"></div>
		                                                    <input type="hidden" class="form-control" value ="<?= $this->my_func->scpro_encrypt($key->bi_id); ?>" name="id">
		                                                     <button type="submit" class="btn blue pull-right">

					                                            <i class="fa fa-save"></i> Stock-Out
					                                        </button>
					                                        </form>
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
						<td colspan="5">
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

		$(".dangerBtn").click(function(){

			id = $(this).prop('id');
               
            be = $("."+id).val();
			
			$.post('<?= site_url('nasty_v2/dashboard/getAjaxDanger'); ?>', {be_id : be}, function(data) {
               
                $("#divDanger").html(data);
            });
			
		});




		
	});

</script>