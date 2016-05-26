<div class="row">
	<div class="col-md-8">
		<img src="<?= base_url('assets/uploads/img/'.$image[0]->img_url); ?>" class="img-responsive" alt="<?= $image[0]->pi_title; ?>">
	</div>
	<div class="col-md-4">
        <h3><?= $news_title; ?></h3>
        <p><?= $msg; ?></p> <div class="clearfix">
        
        </div>
        <button type="button" class="btn btn-success"><i class="fa fa-plus"></i> Add Image</button>
        <button type="button" class="btn btn-primary"><i class="fa fa-cog"></i> Manage Image</button>
    </div>
</div>
<div class="row">

    <div class="col-lg-12">
        <h3 class="page-header">Related Image</h3>
    </div>
    <?php 
    	foreach ($image as $row) {   			 		
    	
    ?><div class="col-sm-3 col-xs-6">
        <a>
            <img class="img-responsive portfolio-item" src="<?= base_url('assets/uploads/img/'.$row->img_url); ?>" alt="<?= $row->pi_title; ?>">
        </a>
    </div><?php }
?>

</div>
<div class="row">
	<div class="col-md-12">
		<?= $output ; ?>
	</div>
</div>