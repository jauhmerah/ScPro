<div class="row">
	<div class="col-xs-12">
		<div class="panel panel-success">
			<div class="panel-heading"><h2>New Order List</h2></div>
			<div class="panel-body" align="center">
				<!--<h1>No Order ...</h1>-->
				<div class="table-responsive">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>#</th>
								<th>Client Name</th>
								<th>Contact Number</th>
								<th>Country</th>
								<th>Send Date</th>
							</tr>
						</thead>
						<tbody>
						<?php
						$n=0;
						foreach ($arr as $key) { 
							$n++;
							?>						
							<tr class="Lorder" id="L<?= $n; ?>">
								<td><?= $n; ?></td>
								<td><?= $key->cl_name; ?></td>
								<td><?= $key->cl_tel; ?></td>
								<td><?= $key->cl_country; ?></td>
								<td><?= $key->or_sendDate; ?></td>
							</tr>
							<tr class="L<?= $n; ?>" style="display : none;">
								<td colspan="5" >
									<div class="row">
										<div class="col-md-10 col-md-offset-1">
										<?php 
											foreach ($key->item as $item) {
												?>
												<div class="well col-md-4">										
												  	<div class="media">
														<a class="media-left" href="#">
														  <img class="media-object" src="<?= $this->my_func->itemIcon($item->ty_id); ?>" alt="Generic placeholder image">
														  <?= $this->my_func->mgLable($item->it_mg ,true); ?>
														</a>
														<div class="media-body">												
															<h3 class="media-heading"><?= $item->ty_desc; ?></h3>
													  		<span class="pull-left">Qty :</span><span class="pull-right"><?= $item->it_qty; ?></span></br>
													  		<span class="pull-left">Promo :</span><span class="pull-right">+<?= $item->it_promo; ?></span>
														</div>	
													</div>																				
												</div>
										<?php	}
										?>																
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
													<?= $key->or_note; ?>
												</div>
											</div>
											<div class="col-md-4">
												<a href="<?= site_url('dashboard/page/a21?key='.$this->my_func->scpro_encrypt($key->or_id)); ?>"> <button type="button" class="btn btn-lg btn-primary pull-right">Move To Process</button></a>
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
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-primary">
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
								<th>Contact Number</th>
								<th>Country</th>
								<th>Send Date</th>
							</tr>
						</thead>						
						<tbody>
						<?php
						$n=0;
						foreach ($arr1 as $key) { 
							$n++;
							?>						
							<tr class="Lorder" id="P<?= $n; ?>">
								<td><?= $n; ?></td>
								<td><?= $key->cl_name; ?></td>
								<td><?= $key->cl_tel; ?></td>
								<td><?= $key->cl_country; ?></td>
								<td><?= $key->or_sendDate; ?></td>
							</tr>
							<tr class="P<?= $n; ?>" style="display : none;">
								<td colspan="5" >
									<div class="row">
										<div class="col-md-10 col-md-offset-1">
										<?php 
											foreach ($key->item as $item) {
												?>
												<div class="well col-md-4">										
												  	<div class="media">
														<a class="media-left" href="#">
														  <img class="media-object" src="<?= $this->my_func->itemIcon($item->ty_id); ?>" alt="Generic placeholder image">
														  <?= $this->my_func->mgLable($item->it_mg ,true); ?>
														</a>
														<div class="media-body">												
															<h3 class="media-heading"><?= $item->ty_desc; ?></h3>
													  		<span class="pull-left">Qty :</span><span class="pull-right"><?= $item->it_qty; ?></span></br>
													  		<span class="pull-left">Promo :</span><span class="pull-right">+<?= $item->it_promo; ?></span>
														</div>	
													</div>
													<div class="clearfix">
														&nbsp;
													</div>
													<div class="row">
														<a href="<?php if($item->pr_id != 3){ echo site_url('dashboard/page/a22?done='.$this->my_func->scpro_encrypt($item->it_id)."&key=".$this->my_func->scpro_encrypt($key->or_id)); }?>"><button type="button" class="btn btn-success col-xs-12" <?php if($item->pr_id == 3){echo "disabled";} ?>>Done</button></a>
													</div>															
												</div>
										<?php	}
										?>																
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
													<?= $key->or_note; ?>
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
	});
</script>

