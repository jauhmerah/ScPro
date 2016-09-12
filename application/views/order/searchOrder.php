<div class="container-fluid">
	<div class="row">
		<div class="clearfix">
		&nbsp;
		</div>
		<div class="col-md-4 col-md-offset-4" align="center">
			<img src="<?= base_url("assets/nasty/nastylogo.png"); ?>" class="img-responsive" alt="Image">
		</div>
	</div>
	<div class="row">
		<div class="clearfix">
			&nbsp;
		</div>
	</div>
	<div class="row">
		<div class="col-md-4 col-md-offset-4" align="center">
			<form action="<?= site_url('order/search') ?>" method="POST" role="form">
				<div class="form-group">
					<input type="text" class="form-control" name="search" placeholder="#100xxx Search Order">
				</div>		
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div>

</div>