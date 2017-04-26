<tr id="l<?= $n; ?>">
	<td><?= $arr->ty2_code; ?></td>
    <td><strong><?= $arr->ty2_desc; ?></strong></td>
	<td><?= $mg; ?> Mg</td>
	<td>
		<input type="number" name="qty" id="inputQty" class="form-control input-sm input-circle" value="" min='1' required="required" title="Quantity">
		<input type="hidden" name="mg" id="inputMg" class="form-control" value="<?= $mg; ?>">
		<input type="hidden" name="id" id="inputId" class="form-control" value="<?= $this->my_func->scpro_encrypt($arr->ty2_id); ?>">
	</td>
	<td><button type="button" class="btn red btn-xs cancelList" data-row = "l<?= $n; ?>" data-inv = 'inv<?= $n; ?>'><i class="fa fa-times"></i></button></td>
</tr>