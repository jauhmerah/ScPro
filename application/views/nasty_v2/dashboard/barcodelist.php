<script>

	$(document).ready(function() {

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
	});	
</script>

<link href="<?= base_url(); ?>asset2/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css">
					<script src="<?= base_url(); ?>asset2/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
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
							<div class="clearfix">
								&nbsp;
							</div>
							 <div class="row tableC">
								<form id="formSearch" action="<?= site_url('nasty_v2/dashboard/page/i2'); ?>" method="POST" role="form">
									<div class="col-md-12">
										<div class="col-md-2">
										</div> 
										<div class="col-md-4">
											<div class="form-group">
												<label for="input" class="col-sm-2 control-label">Search</label>
												<div class="col-sm-10">
													<input type="search" name="search" id="search" class="form-control input-circle" placeholder="Search" required>
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
														<option value="3">Barcode No.</option>
														
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
                           			<div class="col-md-12">
                           				<?php $us_lvl=$this->my_func->scpro_decrypt($this->session->userdata('us_lvl')); ?>
											<table class="table table-bordered">
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
													
													<td><?= $key->ty2_desc; ?> | <strong><?= $key->ni_mg; ?> mg</strong></td>
													<td><?= $key->ca_desc; ?></td>
												
													<td><strong><big><?= $key->fi_qty; ?> Bottles</big></strong></td>
													<?php if($us_lvl != 8 && $us_lvl != 9 && $us_lvl != 10){ ?>
													<td>
													<center>
												
												<button type="button" class="barcodeBtn btn bg-blue-sharp btn-circle btn-md" id="<?= $n.'bar' ?>" name="<?= $n.'bar' ?>" title="Barcode"><i class="fa fa-barcode"></i></button>
												<input type="hidden" class="form-control <?= $n.'bar' ?>" value="<?= $this->my_func->scpro_encrypt($key->bi_id); ?>">
													</center>
													</td>
													<?php } ?>
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
				<div id="fileUp" style="display:none;">
	            	
	            </div>


                            </div> 
                        </div>                       
                    </div>
        </div>
</div>
<script>


		


	$(document).ready(function() {

		$(".barcodeBtn").click(function(){
			id = $(this).prop('id');
               
            be = $("."+id).val();
			
			$.post('<?= site_url('nasty_v2/dashboard/getAjaxBarcode'); ?>', {id:be}, function(data) {
				$.when($(".tableC").fadeOut("slow")).then(function(){
					$.when($("#fileUp").html(data)).then(function(){$("#fileUp").fadeIn("fast");});
				});				
			});
		});


		
	});

</script>