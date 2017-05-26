<tr id="row<?= $num; ?>">
    <td><strong><?= $arr->ty2_desc;?></strong>
    	<br><?= $arr->ty2_detail; ?> <span class="label circle" style="background-color: <?= $arr->ca_color; ?>;color: black;"><strong><?= $arr->ca_desc; ?></strong></span> <span class="label circle bg-green bg-font-green"><strong>6 Mg</strong></span>
    </td>
    <td>
    	<input type="number" name="qty[]" class="form-control input-circle inputQty" min="1" max="100" step="1" required="required" title="Quantity">
    	<input type="hidden" name="id[]" id="inputId" class="form-control" value="<?= $this->my_func->scpro_encrypt($arr->ty2_id); ?>">
    </td>
    <td><span class="pull-right"><button type="button" class="btn btn-danger btn-circle delBtn" data-row = "row<?= $num; ?>"><i class="fa fa-trash"></i></button></span></td>
</tr>