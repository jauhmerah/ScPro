
<!-- <script>
$(document).ready(function() {

            cat = "<?= $arr->ca_desc; ?>"
    $.notify({
            	icon: 'ti-gift',
            	message: cat

            },{
                type: 'success',
                timer: 4000,
				placement: {
				from: "bottom",
				align: "left"
				}
            });
});
</script> -->


<div class="row">                   
	<div class="col-md-12">
		<div class="alert alert-success alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
		
		<?= $arr->ty2_desc; ?>&nbsp;&nbsp;<?= $arr->ca_desc; ?>&nbsp;&nbsp;<?= $arr->ni_mg; ?> mg
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
		<?= $arr->fi_qty; ?> bottles
</div>						                                    					
	</div>
</div>	