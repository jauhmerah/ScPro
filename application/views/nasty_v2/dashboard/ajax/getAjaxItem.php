<tr class="list_<?= $num; ?>">
	<td><?= $item[0]->ty2_desc; ?><br>
	<span class="label" style="color: black;background-color: <?= $cat->ca_color; ?>; font-size: 75%;" ><strong><?= $cat->ca_desc; ?></strong></span>&nbsp;
	<span class="label" style="color: black;font-size: 75%; background-color: <?= $nico->ni_color; ?>;" ><strong><?= $nico->ni_mg; ?> mg</strong></span></td>
	<td><input type="number" name="price[]" id="inputPrice" min="0" step="any" class="form-control" value="" required="required"></td>
	<td><input type="number" name="qty[]" id="inputQty" min="0" class="form-control" required="required"></td>
	<td><input type="number" name="tester[]" id="inputTester" min="0" class="form-control input-sm"><br><div class="input-group input-group-sm"><span class="input-group-addon" id="sizing-addon1"><i class="fa fa-flask"></i> 10 ML</span><input type="number" name="tester2[]" id="inputTester2" min="0" class="form-control input-sm" placeholder="10 ML Tester"></div></td>
	<td><span><button type="button" class="btn btn-danger btn-xs delBtn<?= $num; ?>"><i class="fa fa-trash" ></i></button></span>
	<input type="hidden" name="itemId[]" id="inputItemId[]" class="form-control" value="<?= $item[0]->ty2_id; ?>">
	<input type="hidden" name="nico[]" id="inputNico[]" class="form-control" value="<?= $nico->ni_id; ?>">
	</td>
	<script>
		$(document).ready(function() {
			$('.delBtn<?= $num; ?>').click(function() {
				$(".list_<?= $num; ?>").remove();
			});	
		});
	</script>
</tr>