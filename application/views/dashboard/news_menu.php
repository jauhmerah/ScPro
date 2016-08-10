<!--<pre><?p-hp print_r($arr); ?></pre>-->
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h1 class="panel-title">Order List</h1>
			</div>
			<div class="panel-body">
			<div class="row">
				<div class="col-md-12">
					<span class="pull-left"><a href="<?= site_url('nasty_v2/dashboard/page/a12'); ?>"><button type="button" class="btn btn-success">Add Order</button></a></span>
				</div>	
			</div>
			<div class="clearfix">
			&nbsp;
			</div>
				<div class="table-responsive">
					<table class="table table-hover table-striped table-bordered">
						<thead>
							<tr style="background-color: #F5F5F5">
								<th>#</th>
								<th>Client Name</th>
								<th>Contact No</th>
								<th>Country</th>
								<th>Deposit</th>							
								<th>Send Date</th>
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
								<td rowspan = "2"><?= $n; ?></td>
								<td><a href = "<?= site_url('dashboard/page/a4/read').'/'.$key->cl_id; ?>"><?= $key->cl_name; ?></a></td>
								<td><?= $key->cl_tel; ?></td>
								<td><?= $key->cl_country; ?></td>
								<td><?= $key->or_deposit; ?></td>
								<td><?= $key->or_sendDate; ?></td>								
								<td>
								<div class="btn-group">
									<a href="#" class="listO" id="l<?= $n; ?>" title="View Detail"><button type="button" class="btn btn-info"><i class="fa fa-eye"></i></button></a>																	
									<a onclick = "return confirm('Confirm Delete!');" href="<?= site_url('dashboard/deleteOrder?key='.$this->my_func->scpro_encrypt($key->or_id)); ?>" title="Delete"><button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
									<!--<a href="" title="Edit"><i class="fa fa-pencil"></i></a>&nbsp;&nbsp;-->	
								</div>
								</td>
							</tr>
							<?php 
								$size = sizeof($key->item);
								$n2 = 0 ;
								foreach ($key->item as $item) {
									if ($item->pr_id == '3') {
										$n2++;										
									}
								}
								$peratus = ($n2/$size)*100;
							?>
							<tr>
								<td colspan = "5">
								<div class="progress">
				                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?= $peratus; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?= $peratus; ?>%;"><span class="sr-only"><?= $peratus; ?>% Complete</span></div>
				                </div>								
								</td>
								<td>
									<?php 
									switch ($key->pr_id) {
										case '1':
											?>
											<span class="label label-warning">New Order</span>
											<?php
											break;
										case '2':
											?>
											<span class="label label-info">In Progress</span>
											<?php
											break;
										case '3':
											?>
											<span class="label label-success">Order Completed</span>
											<?php
											break;
									}
									?>
								</td>
							</tr>					
							<tr class = "l<?= $n; ?> detail" style="display: none; ">								
								<td colspan="7">								
									<div class="row col-md-12">
									<?php 
										foreach ($key->item as $item) {
									?>
										<div class="well col-md-4" <?php if($item->pr_id == 3){ ?> style = "background-color : #73C10B;"<?php } ?>>										
										  	<div class="media">
												<a class="media-left" href="#">
												  <img class="media-object" src="<?php echo base_url('assets/uploads/item').'/'.$item->ty_icon; ?> " alt="Generic placeholder image">
												  <span class="label media-object" style = "background-color:<?= $item->ni_color; ?>;color : black;"><?= $item->ni_mg; ?> Mg</span>'
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
									<div class = "col-md-12">
										<div class="panel panel-info">
											<div class="panel-heading">
												Note
											</div>
											<div class="panel-body">
												<?= $key->or_note; ?>
											</div>
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

