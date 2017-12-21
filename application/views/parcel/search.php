<?php
  $temp = array_slice(scandir('./asset/distri_slider'), 2);
  if (sizeof($temp) != 0) {
	?>
<script src="<?php echo base_url();?>asset/js/jquery.backstretch.js"></script>
<script>
	$.backstretch([
	  <?php for ($i=0; $i < sizeof($temp); $i++) { ?>
		"<?= base_url();?>asset/distri_slider/<?= $temp[$i]; ?>"<?php if($i != sizeof($temp)-1){ echo ",";} ?>
	  <?php } ?>
	], {
	  fade: 850,    //Speed of Fade
	  duration: 10000  //Time of image display
	});
</script>
	<?php
  }
?>
<div class="container-fluid">
	<div class="row">
		<div class="clearfix">
			&nbsp;
		</div>
		<div class="clearfix">
			&nbsp;
		</div>
		<div class="clearfix">
			&nbsp;
		</div>
		<div class="col-md-4 col-md-offset-4" align="center">
			<img src="<?= base_url("assets/cover/distribution.png"); ?>" class="img-responsive" alt="Image">
		</div>
	</div>
	<div class="row">
		<div class="clearfix">
			&nbsp;
		</div>
	</div>
	<div class="clearfix">
		&nbsp;
	</div>
	<div class="clearfix">
		&nbsp;
	</div>
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<?php if($this->session->flashdata('success')){ ?>
			<div class="alert alert-success alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
				<strong><i class="fa fa-check"></i>  Success!</strong>
				<?= $this->session->flashdata('success'); ?>
			</div>
			<?php } if($this->session->flashdata('warning')){
        ?>
			<div class="alert alert-warning alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
				<strong><i class="fa fa-exclamation-triangle"></i> Warning!</strong>
				<?= $this->session->flashdata('warning'); ?>
			</div>
			<?php } if($this->session->flashdata('info')){ ?>
			<div class="alert alert-info alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
				<strong><i class="fa fa-info-circle"></i> Info!</strong>
				<?= $this->session->flashdata('info'); ?>
			</div>
			<?php } if($this->session->flashdata('error')){ ?>
			<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
				<strong><i class="fa fa-times-circle-o"></i> Error!</strong>
				<?= $this->session->flashdata('error'); ?>
			</div>
			<?php } ?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
			  <div class="panel-body">
				  <form method="post" action="<?= site_url('parcel/scan');?>" target="_blank">
					  <div class="form-group">
						  <div class="input-group">
							  <span class="input-group-addon"> <i class="fa fa-barcode"></i> Barcode Input</span>
							  <input name="code" type="text" class="form-control" placeholder="Scan the barcode" required>
						  </div>
						  <p class="help-block">Note : Split multi-barcode with <strong>','</strong></p>
					  </div>
				  </form>
			  </div>
			</div>
		</div>
	</div>

</div>
