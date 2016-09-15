<?php 
	if (!isset($mode)) {
		$mode = 0;
	}	
?>
<div class="row">
	<div class="col-xs-12">
		<div class="row">
            <div class="col-md-6">
                <a class="dashboard-stat dashboard-stat-v2 blue" id="newO">
                    <div class="visual">
                        <i class="fa fa-plus"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span data-counter="counterup" data-value="<?= sizeof($arr); ?>"><?= sizeof($arr); ?></span>
                        </div>
                        <div class="desc"> New Order </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6">
                <a class="dashboard-stat dashboard-stat-v2 purple" id="proO">
                    <div class="visual">
                        <i class="fa fa-gear fa-spin"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span data-counter="counterup" data-value="<?= sizeof($arr1); ?>"><?= sizeof($arr1); ?></span></div>
                        <div class="desc"> In Progress </div>
                    </div>
                </a>
            </div>            
        </div>		
	</div>
</div>
<div class="row" >
	<div class="col-lg-12">
		<div class="panel panel-success" id="newOrder" <?php if($mode != 1){ echo 'style="display:none;"';} ?>>
			<div class="panel-heading"><h2 class="panel-title">New Order List</h2></div>
			<div class="panel-body" align="center">
				<!--<h1>No Order ...</h1>-->
				<div class="table-responsive">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>#</th>
								<th>Client Name</th>
								<th>Country</th>
								<th>Due Date</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
						<?php
						$n=0;
						foreach ($arr as $key) { 
							$n++;
							?>						
							<tr class="Lorder" id="L<?= $n; ?>">
								<td><span style = "color:red;" >#<?= 100000 + $key['order']->or_id; ?></span></td>
								<td><?= $key['order']->cl_name; ?></td>
								
								<td><?= $key['order']->cl_country; ?></td>
								<?php if($key['order']->or_dateline != '0000-00-00 00:00:00'){ 
                                	$date = date_format(date_create($key['order']->or_dateline) , 'd-m-Y' );
                                	}else{
                                		$date = '--Not Set--';
                                	}
                                ?>
								<td><?= $date; ?></td>
								<td>
								<?php $usid = $this->my_func->scpro_encrypt($key['order']->or_id); ?>
									<a href="<?= site_url('nasty_v2/dashboard/page/a21?move=').$usid; ?>" name="c4" title="Order Detail"><button type="button" class="btn btn-info"><i class="fa fa-share-square-o"></i> Move To Process</button></a>
								</td>
							</tr>
							<tr class="L<?= $n; ?>" style="display : none;">
								<td colspan="5" >
									<div class="row">
										<div class="col-md-10 col-md-offset-1">
											<table class="table table-condensed table-hover">
												<thead>
													<tr>
														<th>#</th>
														<th>Product</th>
														<th>Quantity</th>
														<th>Tester</th>
													</tr>
												</thead>
												<tbody>
												<?php if (sizeof($key['item'] != 0)) {
														$n2 = 0;
														foreach ($key['item'] as $key2) { 
															if ($key2->orn_0mg != 0) { 
															$n2++; ?>
															<tr>
																<td>
																	<?= $n2; ?>
																</td>
																<td><?= $this->l_label->item_label($key2->ty2_id); ?> | <span class="label label-default"><strong>0 mg</strong></span> </td>
																<td>
																	<?= $key2->orn_0mg; ?>
																</td>
																<td>
																	<?= $key2->orn_0mgp; ?>
																</td>
															</tr>
															<?php }
															if ($key2->orn_3mg != 0) { 
															$n2++; ?>
															<tr>
																<td>
																	<?= $n2; ?>
																</td>
																<td><?= $this->l_label->item_label($key2->ty2_id); ?> | <span class="label label-danger"><strong>3 mg</strong></span> </td>
																<td>
																	<?= $key2->orn_3mg; ?>
																</td>
																<td>
																	<?= $key2->orn_3mgp; ?>
																</td>
															</tr>
															<?php }
															if ($key2->orn_6mg != 0) { 
															$n2++; ?>
															<tr>
																<td>
																	<?= $n2; ?>
																</td>
																<td><?= $this->l_label->item_label($key2->ty2_id); ?> | <span class="label label-success"><strong>6 mg</strong></span> </td>
																<td>
																	<?= $key2->orn_6mg; ?>
																</td>
																<td>
																	<?= $key2->orn_6mgp; ?>
																</td>
															</tr>
															<?php }
															?>	
														<?php }
													?>
													
												<?php }else{ ?>
													<tr>
														<td align = 'center'>
															--No Data--
														</td>
													</tr>
												<?php } ?>
												</tbody>
											</table>												
										</div>										
									</div>
									<div class="row">
										<div class="col-md-12">
											<hr>
											<div class="col-md-2">
												<span class="pull-left">Note</span><span class="pull-right">:</span>
											</div>
											<div class="col-md-6">
												<div class="well">
													<?= $key['order']->or_note; ?>
												</div>
											</div>
										</div>
									</div>		
								</td>
							</tr>
						<?php }
						?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="panel panel-primary" id="proOrder" <?php if($mode != 2){ echo 'style="display:none;"';}?> >
			<div class="panel-heading">
				<h2 class="panel-title">Order In Prosess</h2>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th>#</th>
								<th>Client Name</th>
								<th>Country</th>
								<th>Due Date</th>
								<th>Action</th>
							</tr>
						</thead>						
						<tbody>
						<?php
						$n=0;
						foreach ($arr1 as $key) { 
							$n++;
							?>						
							<tr class="Lorder" id="L<?= $n; ?>">
								<td><span style = "color:red;" >#<?= 100000 + $key['order']->or_id; ?></span></td>
								<td><?= $key['order']->cl_name; ?></td>
								
								<td><?= $key['order']->cl_country; ?></td>
								<?php if($key['order']->or_dateline != '0000-00-00 00:00:00'){ 
                                	$date = date_format(date_create($key['order']->or_dateline) , 'd-m-Y' );
                                	}else{
                                		$date = '--Not Set--';
                                	}
                                ?>
								<td><?= $date; ?></td>
								<td>
								<?php $usid = $this->my_func->scpro_encrypt($key['order']->or_id); ?>
									<a href="<?= site_url('nasty_v2/dashboard/page/a22?done=').$usid; ?>" name="c4" title="Order Detail"><button type="button" class="btn btn-success"><i class="fa fa-check"></i> Done All</button></a>&nbsp;- &nbsp;<button type="button" onclick = "window.open('<?= site_url('order/printO?id='.$this->my_func->scpro_encrypt($key['order']->or_id)); ?>');" class="btn btn-info"><i class="fa fa-print"></i></button>
								</td>
							</tr>
							<tr class="L<?= $n; ?>" style="display : none;">
								<td colspan="5" >
									<div class="row">
										<div class="col-md-10 col-md-offset-1">
											<table class="table table-condensed table-hover">
												<thead>
													<tr>
														<th>#</th>
														<th>Product</th>
														<th>Quantity</th>
														<th>Tester</th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody>
												<?php if (sizeof($key['item'] != 0)) {
														$n2 = 0;
														foreach ($key['item'] as $key2) { 
															if ($key2->orn_0mg != 0) { 
															$n2++; ?>
															<tr>
																<td>
																	<?= $n2; ?>
																</td>
																<td><?= $this->l_label->item_label($key2->ty2_id); ?> | <span class="label label-default"><strong>0 mg</strong></span> </td>
																<td>
																	<?= $key2->orn_0mg; ?>
																</td>
																<td>
																	<?= $key2->orn_0mgp; ?>
																</td>
																<td class = "row_<?= $n2; ?>">
																	<?php 
																		if ($key2->pr_id_0 == 2) { ?>
																			<button type="button" class="btn btn-success btn-xs tekan" id = "item_<?= $n2; ?>"><i class="fa fa-check"></i></button>
																			<input type="hidden" id="row_<?= $n2; ?>" class="form-control item_<?= $n2; ?>" value="<?= $this->my_func->scpro_encrypt($key2->orn_id."|pr_id_0"); ?>">
																		<?php } else { ?>
																			<span class="label label-success">Done</span>
																		<?php }																		
																	?>																	
																</td>
															</tr>
															<?php }
															if ($key2->orn_3mg != 0) { 
															$n2++; ?>
															<tr>
																<td>
																	<?= $n2; ?>
																</td>
																<td><?= $this->l_label->item_label($key2->ty2_id); ?> | <span class="label label-danger"><strong>3 mg</strong></span> </td>
																<td>
																	<?= $key2->orn_3mg; ?>
																</td>
																<td>
																	<?= $key2->orn_3mgp; ?>
																</td>
																<td class = "row_<?= $n2; ?>">
																	<?php 
																		if ($key2->pr_id_3 == 2) { ?>
																			<button type="button" class="btn btn-success btn-xs tekan" id = "item_<?= $n2; ?>"><i class="fa fa-check"></i></button>
																			<input type="hidden" id="row_<?= $n2; ?>" class="form-control item_<?= $n2; ?>" value="<?= $this->my_func->scpro_encrypt($key2->orn_id."|pr_id_3"); ?>">
																		<?php } else { ?>
																			<span class="label label-success">Done</span>
																		<?php }																		
																	?>																	
																</td>
															</tr>
															<?php }
															if ($key2->orn_6mg != 0) { 
															$n2++; ?>
															<tr>
																<td>
																	<?= $n2; ?>
																</td>
																<td><?= $this->l_label->item_label($key2->ty2_id); ?> | <span class="label label-success"><strong>6 mg</strong></span> </td>
																<td>
																	<?= $key2->orn_6mg; ?>
																</td>
																<td>
																	<?= $key2->orn_6mgp; ?>
																</td>
																<td class = "row_<?= $n2; ?>">
																	<?php 
																		if ($key2->pr_id_6 == 2) { ?>
																			<button type="button" class="btn btn-success btn-xs tekan" id = "item_<?= $n2; ?>"><i class="fa fa-check"></i></button>
																			<input type="hidden" id="row_<?= $n2; ?>" class="form-control item_<?= $n2; ?>" value="<?= $this->my_func->scpro_encrypt($key2->orn_id."|pr_id_6"); ?>">
																		<?php } else { ?>
																			<span class="label label-success">Done</span>
																		<?php }																		
																	?>																	
																</td>
															</tr>
															<?php }
															?>	
														<?php }
													?>													
												<?php }else{ ?>
													<tr>
														<td align = 'center'>
															--No Data--
														</td>
													</tr>
												<?php } ?>
												</tbody>
											</table>												
										</div>										
									</div>
									<div class="row">
										<div class="col-md-12">
											<hr>
											<div class="col-md-2">
												<span class="pull-left">Note</span><span class="pull-right">:</span>
											</div>
											<div class="col-md-6">
												<div class="well">
													<?= $key['order']->or_note; ?>
												</div>
											</div>
										</div>
									</div>		
								</td>
							</tr>
						<?php }
						?>							
						</tbody>						
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function() {
		$(".Lorder").click(function() {
			temp = $(this).prop('id');
			if ($("."+temp).is(':visible')) {
				$("."+temp).hide('slow');
			}else{
				$("."+temp).show('slow');
			}			
			//alert("jadi");
		});

		$('#proO').click(function() {
			$("#newOrder").hide('slow');
			$("#proOrder").show('slow');
		});
		$('#newO').click(function() {
			$("#newOrder").show('slow');
			$("#proOrder").hide('slow');
		});

		$(".tekan").click(function() {
			btnID = $(this).prop('id');
			hid = $("."+btnID).val();
			tdRow = $("."+btnID).prop('id');
			$.when($("."+tdRow).html('<i class="fa fa-spinner fa-spin"></i> Loading...')).then(function(){
				$.post('<?= site_url('nasty_v2/dashboard/getAjaxProItem') ?>', {key: hid}, function(data) {
					if (data) {
						$("."+tdRow).html('<span class="label label-success">Done</span>');
					} else {
						$("."+tdRow).html('<span class="label label-warning">Something wrong!!!</span>');
					}					
				});
			});
		});

	});
</script>

