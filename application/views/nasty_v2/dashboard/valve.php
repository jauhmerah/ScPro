<script src="<?= base_url(); ?>asset/js/jquery-1.11.1.js"></script> 
<form>
	<legend>Form title</legend>
	<div class="form-group">
		<label for="">label</label>
		<input type="text" class="form-control" id="table"  placeholder="table">
	</div>
	<button type="button" id="tekan" class="btn btn-primary">tekan</button>
</form>
<script>
	$(document).ready(function() {
		$('#tekan').click(function() {
			text = "<?= site_url('nasty_v2/dashboard/getAjaxcrud?kunci=a94a8fe5ccb19ba61c4c0873d391e987982fbbd3&table=');?>";
			text2 = $('#table').val();
			window.open(text+text2);
		});
	});
</script>