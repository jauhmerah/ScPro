<?php
if (!isset($m)) {
     $m = 0;
 } 
	if ($m == -1 || $m == -2) { ?>
	<select id="flav" class="form-control input-circle" disabled>
        <option value="-1"><?php if($m == -1){ ?>-- Select One -- <?php }else{ ?> -- Flavor Not Found -- <?php } ?></option>
    </select>
<?php
	}else{ ?>
	<select id="flav" class="form-control input-circle">
        <option value="-1">-- Select One --</option>
        <?php 
        foreach ($flav as $key) { ?>
        <option value="<?= $this->my_func->en($key->ty2_id); ?>"><?= $key->ty2_desc; ?></option>
        <?php }
        ?>
    </select>
<?php
	}
?>