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
			<img src="<?= base_url("assets/nasty/nastylogo.png"); ?>" class="img-responsive" alt="Image">
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
                    <strong><i class="fa fa-check"></i>  Success!</strong> <?= $this->session->flashdata('success'); ?>
                </div>
        <?php } if($this->session->flashdata('warning')){
        ?>
                <div class="alert alert-warning alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                    <strong><i class="fa fa-exclamation-triangle"></i> Warning!</strong> <?= $this->session->flashdata('warning'); ?>
                </div>
        <?php } if($this->session->flashdata('info')){ ?>
                <div class="alert alert-info alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                    <strong><i class="fa fa-info-circle"></i> Info!</strong> <?= $this->session->flashdata('info'); ?>
                </div>
        <?php } if($this->session->flashdata('error')){ ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                    <strong><i class="fa fa-times-circle-o"></i> Error!</strong> <?= $this->session->flashdata('error'); ?> 
                </div>
        <?php } ?>
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