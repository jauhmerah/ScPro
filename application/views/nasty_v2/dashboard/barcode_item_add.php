<div class="row">
	<div class="col-md-12">
		<div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-eye"></i>Finish Item 
                </div>
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
                
                <form class="form-horizontal" role="form" action="<?= site_url('nasty_v2/dashboard/addFinish') ?>" method = 'post'>
                    <div class="form-body">

                        
                        <h3 class="form-section">Barcode Info</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                        <label class="control-label col-md-3">Barcode Number:</label>
                                    
                                    <div class="col-md-9">
                                        <input type="text" name="barcode" class="form-control input-circle">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">Series:</label>
                                    <div class="col-md-9">
                                       <select name="series" id="series" class="form-control input-circle">
                                        <option value="-1">--Select Series--</option>

                                    <?php foreach ($cat as $key) {                                
                                        ?>
                                        <option value="<?= $key->ca_id; ?>"> <?= $key->ca_desc; ?></option>
                                        <?php
                                    } ?>
                                    </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">Item Name:</label>
                                    <div class="col-md-9" id="divItem" name="divItem">
                                         <select name="type2" id="type2" class="form-control input-circle" disabled>
                                        <option value="-1">--Select Type--</option>

                                    <?php foreach ($type2 as $key) {    
                                        if($key->ca_id == $arr->ca_id){                            
                                        ?>
                                        <option value="<?= $key->ty2_id; ?>"> <?= $key->ty2_desc; ?></option>
                                        <?php
                                    }} ?>
                                    </select>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                            
                            <!--/span-->
                        </div>
                        <!--/row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">Nicotine:</label>
                                    <div class="col-md-9">
                                        <select name="nico" id="nico" class="form-control input-circle">
                                        <?php foreach ($nico as $key) {                                
                                            ?>
                                            <?php if ($key->ni_mg == -1) { ?>
                                                <option value="<?= $key->ni_id; ?>" > No Mg</option>
                                            <?php }else { ?>                                          
                                                <option value="<?= $key->ni_id; ?>"> <?= $key->ni_mg; ?> Mg</option>
                                            <?php }?>
                                            <?php
                                        } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                        <!--/row-->
                       
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                    

                                        <button type="submit" id="btnSubmit" class="btn btn-circle green">Save</button>
                                <a href="<?= site_url('nasty_v2/dashboard/page/i4');?>"><button type="button" class="btn btn-circle grey-salsa btn-outline">Cancel</button></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6"> </div>
                        </div>
                    </div>
                </form>
                <!-- END FORM-->
            </div>
        </div>
	</div>
</div>

<script>
   $(document).ready(function() {
        $('#series').change(function() {

            temp = $(this).val();
           
            $.post('<?= site_url('nasty_v2/dashboard/getAjaxSeries'); ?>', {ca : temp}, function(data) {
               
                $("#divItem").html(data);
            });
        });
    });
</script>