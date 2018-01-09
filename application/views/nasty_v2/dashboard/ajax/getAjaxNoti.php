<?php if (isset($arr) && !empty($arr)) { ?>

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

<?php }else{ ?>
	<div class="row">                   
		<div class="col-md-12">
			<div class="alert alert-danger alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
			
			<strong>Item Not Registered</strong> : Item not exist in Finishing Inventory, please register this item into Finishing Module first
		</div>						                                    					
		</div>
	</div>
<?php } ?>
