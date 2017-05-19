<!-- <style type="text/css">
	#cont 
	{
		disabled
	}
</style> -->
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
			<img src="<?= base_url("assets/nasty/Untitled (1).png"); ?>" class="img-responsive" alt="Image">
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
        <?php if($this->session->flashdata('success')){?>

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
                    <button type="button" class="close" data-dismiss= "alert" aria-hidden="true"></button>
                    <strong><i class="fa fa-times-circle-o"></i> Error!</strong> <?= $this->session->flashdata('error'); ?> 
                </div>
        <?php } ?>
            </div>
        </div>
	<div class="row">
		<div class="col-md-4 col-md-offset-4" id="form" align="center">

			<form action="<?= site_url('order/checkEmail'); ?>" method="POST" role="form">
			<div id="changePass">

				<h1>CHECK YOUR ORDER HERE</h1>
				<div class="form-group" >
					<input type="text" class="form-control" name="email" id="email" placeholder="Enter Your Email">
				</div>
				<div class="form-group" >
					<input type="password" class="form-control" name="pass" id="pass" placeholder="Enter Your Password">
				</div>	
			
				<button type="submit" class="btn btn-primary" name="check" id="check">Check Order</button>
				<!-- <button type="button" class="btn btn-success" name="cont" id="cont">Continue</button> -->
			</div>
			</form>
		</div>
	</div>

</div>
<script type="text/javascript">
	$(document).ready(function() {
        function disableBack() { window.history.forward() }

        window.onload = disableBack();
        window.onpageshow = function(evt) { if (evt.persisted) disableBack() }
    });
	//window.onbeforeunload = function() { return "You work will be lost."; };
</script>

<!-- <script type="text/javascript">
$(document).ready(function() {
	var x = document.getElementById('email');
	$('#check').click(function() {
            temp = $("input:text").val();
          
           
            // $.when($('#loadingText').show()).then(function(){
                $.post('<?= site_url('nasty_v2/dashboard/checkEmail '); ?>', {key : temp}, function(data) {
                	if (data){
                		$.when($('#changePass').html(data)).then(function(){
                        
                    });
                	}
                	else
                	{
                		$(window).attr("location", "<?= site_url(''); ?>");
                	}
                	
                	
                	
                   
                });
            // });
        });
});
</script> -->