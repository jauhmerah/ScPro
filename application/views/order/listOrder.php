<style type="text/css">

.table-bordered{

}

	thead th {
    background-color: #006DCC;
    color: white;
}

tbody td {
    background-color: #EEEEEE;
}
</style>
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
        <?php if($this->session->flashdata('success')){ $y="yes"; ?>

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
        <?php } if($this->session->flashdata('error')){ $y="no"; ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss= alert" aria-hidden="true"></button>
                    <strong><i class="fa fa-times-circle-o"></i> Error!</strong> <?= $this->session->flashdata('error'); ?> 
                </div>
        <?php } ?>
            </div>
        </div>
	<div class="row">
		<div class="col-md-10 col-md-offset-1" id="form" align="center" style="overflow-y: auto;">
        
			 <table class="table table-bordered table-striped" style="border-radius: 50px;">
                                        <thead >
                                            <tr>
                                                <th>No</th>
                                                <th>Product</th>
                                                <th>Order Code</th>
                                                <th>Order Date</th>
                                                <th>Quantity</th>
                                                <th>Status</th>
                                                
                                                
                                            </tr>
                                            <tr>
                                                <td>No</td>
                                                <td>Product</td>
                                                <td>Order Code</td>
                                                <td>Order Date</td>
                                                <td>Quantity</td>
                                                <td>Status</td>
                                                
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            

                                        </tbody>



                            </table>
		</div>
        <div class="clearfix" style="height: 20px"></div>
        <a href="<?= site_url() ?>" name="c4" title="Back">
        <button type="button" class="btn btn-success col-md-6 col-md-offset-3" name="cont" id="cont">Back</button>
        </a>
        
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