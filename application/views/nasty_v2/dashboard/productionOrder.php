<?php
	if (!isset($mode)) {
		$mode = 0;
	}
?>
	<div class="row">
		<div class="col-xs-12">
			<div class="row">
				<div class="col-md-4">
					<a class="dashboard-stat dashboard-stat-v2 blue" id="newO">
						<div class="visual">
							<i class="fa fa-plus"></i>
						</div>
						<div class="details">
							<div class="number">
								<span data-counter="counterup" data-value="<?= sizeof($arrV); ?>"><?= sizeof($arrV); ?></span>
							</div>
							<div class="desc"> New Order </div>
						</div>
					</a>
				</div>
				<div class="col-md-4">
					<a class="dashboard-stat dashboard-stat-v2 purple" id="proO">
						<div class="visual">
							<i class="fa fa-gear fa-spin"></i>
						</div>
						<div class="details">
							<div class="number">
								<span data-counter="counterup" data-value="<?= sizeof($arrV1); ?>"><?= sizeof($arrV1); ?> + <?= sizeof($arrHold); ?>h</span></div>
							<div class="desc"> In Progress </div>
						</div>
					</a>
				</div>
				<div class="col-md-4">
					<a class="dashboard-stat dashboard-stat-v2 green-meadow" id="comO">
						<div class="visual">
							<i class="fa fa-check" aria-hidden="true"></i>
						</div>
						<div class="details">
							<div class="number">
								<span data-counter="counterup" data-value="<?= sizeof($arrV2); ?>"><?= sizeof($arrV2); ?></span></div>
							<div class="desc"> Complete </div>
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="panel border-blue" id="newOrder" <?php if($mode !=1 ){ echo 'style="display:none;"';} ?>>
				<div class="panel-heading bg-blue bg-font-blue">
					<h2 class="panel-title"><i class="fa fa-plus" aria-hidden="true"></i> New Order List</h2></div>
				<div class="panel-body" align="center">
					<div class="table-responsive">
						<table class="table table-hover">
							<thead>
								<tr>
									<th>#</th>
									<th>Client Name</th>
									<th>Country</th>
									<th>Due Date</th>
									<th>Payment Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
						$n=0;
						// vvvvvvvvvvvvvvv OrdYs 2.3.0 vvvvvvvvvvvvvvv
							foreach ($arrV as $key) {
								$n++;
								?>
									<tr class="Lorder" id="L<?= $n; ?>">
										<td><span style="color:#b706d6;">#<?= 120000 + $key['order']->or_id; ?></span></td>
										<td>
											<?= $key['order']->cl_name; ?>
										</td>

										<td>
											<?= $key['order']->cl_country; ?>
										</td>
										<?php if($key['order']->or_dateline != '0000-00-00 00:00:00'){
	                                	$date = date_format(date_create($key['order']->or_dateline) , 'd-m-Y' );
	                                	}else{
	                                		$date = '--Not Set--';
	                                	}
	                                ?>
										<td>
											<?= $date; ?>
										</td>
										<td>
											<?php
											if($key['order']->or_paid == 1)
											{
												?>
												<span class="label" style="background-color:#36D357;">Paid</span>

												<?php
											}
											else
											{ ?>
													<span class="label" style="background-color:#D33636;">Unpaid</span>

													<?php
											}

										?>

										</td>
										<td>
											<?php $usid = $this->my_func->scpro_encrypt($key['order']->or_id); ?>
											<button class="btn btn-info moveTo" data-link="<?= site_url('nasty_v2/dashboard/page/a21?move=').$usid; ?>" name="c4" title="Order Detail"><i class="fa fa-share-square-o"></i> Move To Process</button>
										</td>
									</tr>
									<tr class="L<?= $n; ?>" style="display : none;">
										<td colspan="5">
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
																$n2++; ?>
															<tr>
																<td>
																	<?= $n2; ?>
																</td>
																<td>
																	<?= $key2->ty2_desc; ?> |
																		<span class="label" style="color: black;background-color: <?= $key2->ca_color; ?>; font-size: 75%;"><strong><?= $key2->ca_desc; ?></strong></span>&nbsp;
																		<span class="label" style="color: black;font-size: 75%; background-color: <?= $key2->ni_color; ?>;"><strong><?= $key2->ni_mg; ?> mg</strong></span>
																</td>
																<td>
																	<?= $key2->oi_qty; ?>
																</td>
																<td>
																	<?= $key2->oi_tester; ?>
																</td>
															</tr>
															<?php
															}
														?>

															<?php }else{ ?>
															<tr>
																<td align='center'>
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
						// ^^^^^^^^^^^^^^^ End Ord
						?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="panel border-purple" id="proOrder" <?php if($mode !=2 ){ echo 'style="display:none;"';}?> >
				<div class="panel-heading bg-purple bg-font-purple">
					<h2 class="panel-title"><i class="fa fa-cog fa-spin" aria-hidden="true"></i> Order In Prosess</h2>
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
						foreach ($arrV1 as $key) {
							$n++;
							?>
									<tr class="Lorder" id="L<?= $n; ?>">
										<td><span style="color:#b706d6;">#<?= 120000 + $key['order']->or_id; ?></span></td>
										<td>
											<?= $key['order']->cl_name; ?>
										</td>

										<td>
											<?= $key['order']->cl_country; ?>
										</td>
										<?php if($key['order']->or_dateline != '0000-00-00 00:00:00'){
                                	$date = date_format(date_create($key['order']->or_dateline) , 'd-m-Y' );
                                	}else{
                                		$date = '--Not Set--';
                                	}
                                ?>
										<td>
											<?= $date; ?>
										</td>
										<td>
											<?php $usid = $this->my_func->scpro_encrypt($key['order']->or_id); ?>
											<a onclick="return moveTo();" href="<?= site_url('nasty_v2/dashboard/page/a221?done=').$usid; ?>" name="c4" title="Order Detail"><button type="button" class="btn btn-success"><i class="fa fa-check"></i> Done All</button></a>&nbsp;- &nbsp;
											<button type="button" onclick="window.open('<?= site_url('order/printO1?id='.$this->my_func->scpro_encrypt($key['order']->or_id)); ?>&ver=2');" class="btn btn-info"><i class="fa fa-print"></i></button> &nbsp;-&nbsp;
											<a type="button" href="<?= site_url('nasty_v2/dashboard/page/e2?id='.$this->my_func->scpro_encrypt($key['order']->or_id." |parcel ")); ?>" title="Parcel Setting" class="btn btn-circle blue-hoki btn-md"><i class="fa fa-barcode"></i> Parcel Management</a>
											<button type="button" class="btn btn-circle upld" data-id = "<?=$this->my_func->scpro_encrypt($key['order']->or_id); ?>">
												<i class="fa fa-upload" aria-hidden="true"></i>
											</button>
										</td>
									</tr>
									<tr class="L<?= $n; ?>" style="display : none;">
										<td colspan="5">
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
															$n2++; ?>
															<tr>
																<td>
																	<?= $n2; ?>
																</td>
																<td>
																	<?= $key2->ty2_desc; ?> |
																		<span class="label" style="color: black;background-color: <?= $key2->ca_color; ?>; font-size: 75%;"><strong><?= $key2->ca_desc; ?></strong></span>&nbsp;
																		<span class="label" style="color: black;font-size: 75%; background-color: <?= $key2->ni_color; ?>;"><strong><?= $key2->ni_mg; ?> mg</strong></span>
																</td>
																<td>
																	<?= $key2->oi_qty; ?>
																</td>
																<td>
																	<?= $key2->oi_tester; ?>
																</td>
															</tr>
															<?php }
													?>
															<?php }else{ ?>
															<tr>
																<td align='center'>
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
						if (sizeof($arrHold) != 0) {
						?>

									<tr>
										<td colspan="5">
											<div align="center"><strong>On Hold List</strong></div>
										</td>
									</tr>
									<?php
						foreach ($arrHold as $key) {
							$n++;
							?>
										<tr class="Lorder" id="L<?= $n; ?>" style="background-color: grey; color: white;">
											<td><strike><span  >#<?= 120000 + $key['order']->or_id; ?></span></td>
								<td><strike><?= $key['order']->cl_name; ?></strike></td>

											<td><strike><?= $key['order']->cl_country; ?></strike></td>
											<?php if($key['order']->or_dateline != '0000-00-00 00:00:00'){
                                	$date = date_format(date_create($key['order']->or_dateline) , 'd-m-Y' );
                                	}else{
                                		$date = '--Not Set--';
                                	}
                                ?>
											<td><strike><?= $date; ?></strike></td>
											<td>
												<?php $usid = $this->my_func->scpro_encrypt($key['order']->or_id); ?>
												<button type="button" class="btn default"><i class="fa fa-hand-stop-o"></i> On Hold By <?= $key['staff']->us_username; ?></button>&nbsp;- &nbsp;<button type="button" onclick="window.open('<?= site_url('order/printO1?id='.$this->my_func->scpro_encrypt($key['order']->or_id)); ?>&ver=2');"
												    class="btn btn-info"><i class="fa fa-print"></i></button>
											</td>
										</tr>
										<tr class="L<?= $n; ?>" style="display : none;">
											<td colspan="5">
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
															$n2++; ?>
																<tr>
																	<td>
																		<?= $n2; ?>
																	</td>
																	<td>
																		<?= $key2->ty2_desc; ?> |
																			<span class="label" style="color: black;background-color: <?= $key2->ca_color; ?>; font-size: 75%;"><strong><?= $key2->ca_desc; ?></strong></span>&nbsp;
																			<span class="label" style="color: black;font-size: 75%; background-color: <?= $key2->ni_color; ?>;"><strong><?= $key2->ni_mg; ?> mg</strong></span>
																	</td>
																	<td>
																		<?= $key2->oi_qty; ?>
																	</td>
																	<td>
																		<?= $key2->oi_tester; ?>
																	</td>
																</tr>
																<?php }
													?>
																<?php }else{ ?>
																<tr>
																	<td align='center'>
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
						}
						?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="panel border-green-meadow" id="comOrder" <?php if($mode !=3 ){ echo 'style="display:none;"';}?> >
				<div class="panel-heading bg-green-meadow bg-font-green-meadow">
					<h2 class="panel-title"><i class="fa fa-check" aria-hidden="true"></i> Completed</h2>
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
						foreach ($arrV2 as $key) {
							$n++;
							?>
									<tr class="Lorder" id="L<?= $n; ?>">
										<td><span style="color:#b706d6;">#<?= 120000 + $key['order']->or_id; ?></span></td>
										<td>
											<?= $key['order']->cl_name; ?>
										</td>

										<td>
											<?= $key['order']->cl_country; ?>
										</td>
										<?php if($key['order']->or_dateline != '0000-00-00 00:00:00'){
                                	$date = date_format(date_create($key['order']->or_dateline) , 'd-m-Y' );
                                	}else{
                                		$date = '--Not Set--';
                                	}
                                ?>
										<td>
											<?= $date; ?>
										</td>
										<td>
											<button type="button" onclick="window.open('<?= site_url('parcel/printParcel?id='.$this->my_func->scpro_encrypt($key['order']->or_id."|printParcel|2"));?>');"  class="btn btn-circle blue-hoki" title="Print Parcel"><i class="fa fa-barcode"></i> <i class="fa fa-print"></i></button>
										</td>
									</tr>
									<tr class="L<?= $n; ?>" style="display : none;">
										<td colspan="5">
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
															$n2++; ?>
															<tr>
																<td>
																	<?= $n2; ?>
																</td>
																<td>
																	<?= $key2->ty2_desc; ?> |
																		<span class="label" style="color: black;background-color: <?= $key2->ca_color; ?>; font-size: 75%;"><strong><?= $key2->ca_desc; ?></strong></span>&nbsp;
																		<span class="label" style="color: black;font-size: 75%; background-color: <?= $key2->ni_color; ?>;"><strong><?= $key2->ni_mg; ?> mg</strong></span>
																</td>
																<td>
																	<?= $key2->oi_qty; ?>
																</td>
																<td>
																	<?= $key2->oi_tester; ?>
																</td>
															</tr>
															<?php }
													?>
															<?php }else{ ?>
															<tr>
																<td align='center'>
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
						if (sizeof($arrHold) != 0) {
						?>

									<tr>
										<td colspan="5">
											<div align="center"><strong>On Hold List</strong></div>
										</td>
									</tr>
									<?php
						foreach ($arrHold as $key) {
							$n++;
							?>
										<tr class="Lorder" id="L<?= $n; ?>" style="background-color: grey; color: white;">
											<td><strike><span  >#<?= 120000 + $key['order']->or_id; ?></span></td>
								<td><strike><?= $key['order']->cl_name; ?></strike></td>

											<td><strike><?= $key['order']->cl_country; ?></strike></td>
											<?php if($key['order']->or_dateline != '0000-00-00 00:00:00'){
                                	$date = date_format(date_create($key['order']->or_dateline) , 'd-m-Y' );
                                	}else{
                                		$date = '--Not Set--';
                                	}
                                ?>
											<td><strike><?= $date; ?></strike></td>
											<td>
												<?php $usid = $this->my_func->scpro_encrypt($key['order']->or_id); ?>
												<button type="button" class="btn default"><i class="fa fa-hand-stop-o"></i> On Hold By <?= $key['staff']->us_username; ?></button>&nbsp;- &nbsp;<button type="button" onclick="window.open('<?= site_url('order/printO1?id='.$this->my_func->scpro_encrypt($key['order']->or_id)); ?>&ver=2');"
												    class="btn btn-info"><i class="fa fa-print"></i></button>
											</td>
										</tr>
										<tr class="L<?= $n; ?>" style="display : none;">
											<td colspan="5">
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
															$n2++; ?>
																<tr>
																	<td>
																		<?= $n2; ?>
																	</td>
																	<td>
																		<?= $key2->ty2_desc; ?> |
																			<span class="label" style="color: black;background-color: <?= $key2->ca_color; ?>; font-size: 75%;"><strong><?= $key2->ca_desc; ?></strong></span>&nbsp;
																			<span class="label" style="color: black;font-size: 75%; background-color: <?= $key2->ni_color; ?>;"><strong><?= $key2->ni_mg; ?> mg</strong></span>
																	</td>
																	<td>
																		<?= $key2->oi_qty; ?>
																	</td>
																	<td>
																		<?= $key2->oi_tester; ?>
																	</td>
																</tr>
																<?php }
													?>
																<?php }else{ ?>
																<tr>
																	<td align='center'>
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
						}
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
				if ($("." + temp).is(':visible')) {
					$("." + temp).hide('slow');
				} else {
					$("." + temp).show('slow');
				}
				//alert("jadi");
			});

			$('#proO').click(function() {
				$("#newOrder").hide('slow');
				$("#proOrder").show('slow');
				$("#comOrder").hide('slow');
				$("#ROS1rder").hide('slow');
				$("#RTSOrder").hide('slow');
			});
			$('#newO').click(function() {
				$("#newOrder").show('slow');
				$("#comOrder").hide('slow');
				$("#proOrder").hide('slow');
				$("#ROS1rder").hide('slow');
				$("#RTSOrder").hide('slow');
			});
			$('#comO').click(function() {
				$("#comOrder").show('slow');
				$("#newOrder").hide('slow');
				$("#proOrder").hide('slow');
				$("#ROS1rder").hide('slow');
				$("#RTSOrder").hide('slow');
			});

			$(".tekan").click(function() {
				btnID = $(this).prop('id');
				hid = $("." + btnID).val();
				tdRow = $("." + btnID).prop('id');
				$.when($("." + tdRow).html('<i class="fa fa-spinner fa-spin"></i> Loading...')).then(function() {
					$.post('<?= site_url('nasty_v2/dashboard/getAjaxProItem') ?>', {
							key: hid
						},
						function(data) {
							if (data) {
								$("." + tdRow).html('<span class="label label-success">Done</span>');
							} else {
								$("." + tdRow).html('<span class="label label-warning">Something wrong!!!</span>');
							}
						});
				});
			});
			$('.moveTo').click(function() {
				var linkUrl = $(this).data('link');
				bootbox.prompt(
					{
						title : "Please Insert ETS",
						inputType : 'date',
						callback : function(result) {
							if(result != null){
								linkUrl = linkUrl+"&ets="+result;
								window.location.href = linkUrl;
							}
						}
					}
				);

			});
			$('.upld').click(function() {
				var id = $(this).data('id');
				$.post('<?= site_url('nasty_v2/upload/getAjaxUploadFile'); ?>', {id: id}, function(data) {
					bootbox.dialog({
					message : data
					});
				});
			});
		});
		function moveTo() {
			return confirm('Are you sure?');
		}
	</script>
