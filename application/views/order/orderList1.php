<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" href="<?= base_url(); ?>assets/cover/favicon.png">
		<title>Order Listing</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="<?= base_url().'/asset/js/new/bootstrap.min.css'; ?>">
		<style type="text/css">
			.full {
			    background: url('<?= base_url("assets/nasty/nastylogo.png"); ?>') no-repeat center center fixed;			    
			}
		</style>
	</head>
	<body class ="full">
	<!--<pre>
		<ph print_r($arr); ?>
	</pre>-->
	<div>
		<div class="panel panel-primary">
			<div class="panel-heading" align="center">
				<h1 class="panel-title"><h1>Order List v1.1</h1></h1>
			</div>
			<div class="panel-body full">
				<div class="">
					<table class="table">
						<thead>
							<tr style = "background-color : #F5F5F5">
								<th>#</th>
								<th>Detail</th>
								<th>Order Item</th>
							</tr>
						</thead>
						<tbody >
						<?php 
							$n=0;
							foreach ($arr as $key) { $n++; ?>						
							<tr <?php if($n%2 == 0){ ?> style = "background-color : #FCF8E3" <?php }else{echo 'background : none;"';} ?> >
								<td class="pull-left"><?= $n; ?></td>
								<td class="col-md-3">
									Name : <?= $key->cl_name; ?>
									</br>Contact : <?= $key->cl_tel; ?>
									</br>Country : <?= $key->cl_country; ?><br>
									<div class="well well-sm">
										#note : <?= $key->or_note; ?>
									</div>
								</td>
								<td class="col-md-8">
									<?php 
										foreach ($key->item as $item) { ?>																	
									<div class="well col-md-4" <?php if($item->pr_id == 3){ ?> style = "background-color : #5BA000;"<?php } ?>>										
									  	<div class="media">
											<a class="media-left" href="#">
											  <img class="media-object" src="<?= $this->my_func->itemIcon($item->ty_id); ?>" alt="Generic placeholder image">
											  <?= $this->my_func->mgLable($item->it_mg , true); ?>
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
								</td>
							</tr>
							<?php	}
						?>							
						</tbody>
					</table>
				</div>
		</div>

				<div class="row">
					<div class="col-md-4">
						
					</div>
					<div class="col-md-8">						
						
						
					</div>
				</div>
			</div>
		</div>
		<!-- jQuery -->
		<script src="<?= base_url().'/asset/js/new/jquery.js'; ?>"></script>
		<!-- Bootstrap JavaScript -->
		<script src="<?= base_url().'/asset/js/new/bootstrap.min.js'; ?>" ></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	</body>
</html>