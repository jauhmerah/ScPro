<li class="media list_<?= $num; ?>">
	<a class="media-left" href="#">
	  <img class="media-object" src="<?= $icon; ?>" alt="Generic placeholder image">
	</a>
	<div class="media-body">
		<div class="col-md-4">
			<h3 class="media-heading"><?= $flav; ?></h3>
	  		<span class="label label-<?= $nicLable; ?>"><?= $nic; ?></span><span class="pull-right">Qty : <?= $qty; ?> + <?= $promo; ?></span>
		</div>
		<div class="col-md-8">
			<h2><span class="pull-right"><button type="button" id="list_<?= $num; ?>" class="btn btn-danger delBtn"><i class="fa fa-trash" ></i></button></span></h2>
		</div>	  
	</div>
	<input type="hidden" name="proOrder[]" id="inputProOrder" class="form-control" value="<?= $fcode.'|'.$niccode.'|'.$qty.'|'.$promo; ?>">	
</li>
<script>
	$(document).ready(function() {
		$(".delBtn").click(function() {
			var code = $(this).prop('id');
			$("."+code).remove();
		});
	});
</script>