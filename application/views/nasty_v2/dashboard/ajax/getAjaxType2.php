 
 <?php 
if ($cat == -1) { ?>
 <select name="type2" id="type2" class="form-control input-circle">
                                   
         <option value="-1">--Select Type--</option>
                                     
 </select>
 <?php }else{ ?>

  <select name="type2" id="type2" class="form-control input-circle">
  <option value="-1">--Select Type--</option>
    <?php foreach ($type2 as $key) { ?>
        <option value="<?= $key->ty2_id; ?>" > <?= $key->ty2_desc; ?></option>
    <?php } ?>
 </select>

  <?php }
?>