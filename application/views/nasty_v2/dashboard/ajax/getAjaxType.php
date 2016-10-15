<label for="input" class="col-sm-4 control-label">Item Type : </label>
<div class="col-sm-8">
<?php 
if ($cat == -1) { ?>
<select id="itemType" class="form-control input-circle" disabled>
    <option value="-1">-- Select Type --</option>
</select>	
<?php }else{ ?>
	<select id="itemType" class="form-control input-circle">
    	<option value="-1">-- Select Type --</option>
    	<?php 
		foreach ($type as $key) { ?>
			<option value="<?= $key->ty2_id; ?>"> <?= $key->ty2_desc; ?> </option>
		<?php }
		?>
	</select>
	<script>
		$(document).ready(function() {
			$('#itemType').change(function() {
				temp = $(this).val();
				if (temp == -1) {
					$("#addBtn").prop('disabled' , 'disabled');
				} else {
					if ($("#inputNico").val() != -1) {$("#addBtn").removeProp('disabled');}					
				}
			});
			$('#inputNico').change(function() {
				temp = $(this).val();
				temp2 = $('#cat').val();
				temp3 = $('#itemType').val();
				if (temp == -1 || temp2 == -1 || temp3 == -1) {
					$("#addBtn").prop('disabled' , 'disabled');
				} else {
					$("#addBtn").removeProp('disabled');
				}
			});			
		});
	</script>	
<?php }
?>
</div>

