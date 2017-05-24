<tr>
    <td><?= $arr->ty2_desc;?> | <span class="label circle" style="background-color: <?= $arr->ca_color; ?>;color: black;"><strong><?= $arr->ca_desc; ?></strong></span> <span class="label circle bg-green bg-font-green"><strong>6 Mg</strong></span>

    <pre><?php print_r($arr); ?></pre></td>
    <td><input type="number" name="qty" id="inputQty" class="form-control input-circle" min="1" max="100" step="1" required="required" title="Quantity"></td>
    <td><span class="pull-right"><button type="button" class="btn btn-danger btn-circle "><i class="fa fa-trash"></i></button></span></td>
</tr>