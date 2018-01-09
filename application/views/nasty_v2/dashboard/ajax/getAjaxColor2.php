<?php if($color!= null){ ?>
        <select id="color2" class="form-control" required>
            <option value="-1">-- All Flavor --</option>
            <?php foreach ($color as $key) {?>
                    <option value="<?= $key->ty2_id; ?>"><?= $key->ty2_desc; ?></option>
            <?php }?>
        </select>
<?php }else{ ?>
         <select id="color2" class="form-control" disabled>
            <option value="-1">-- All Flavor --</option>
        </select>
<?php } ?>