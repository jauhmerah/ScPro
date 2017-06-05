<div class="col-md-12">
		        		<div class="portlet light">                                
                                <div class="portlet-body form">
                                    <form role="form">
                                        <div class="form-body">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <div class="input-group ">
                                                    <span class="input-group-addon input-circle-left">
                                                        <i class="fa fa-user "></i>
                                                    </span>
                                                    <input name="name" type="text" class="input-sm form-control input-circle-right" placeholder="Name" required="required"> </div>
                                            </div>
                                        	<div class="form-group">
                                                <label>Address</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon input-circle-left">
                                                        <i class="fa fa-home"></i>
                                                    </span>
                                                    <textarea name="address" id="inputAddress" class="input-sm form-control input-circle-right" rows="3" required="required" placeholder="Address"></textarea>
                                                    </div>
                                            </div>
                                            <div class="form-group">
                                                <label>City</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon input-circle-left">
                                                        <i class="fa fa-building"></i>
                                                    </span>
                                                    <input name="city" type="text" class="input-sm form-control input-circle-right" placeholder="City" required="required"> </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Postcode</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon input-circle-left">
                                                        <i class="fa fa-map-marker"></i>
                                                    </span>
                                                    <input name="postcode" type="text" class="input-sm form-control input-circle-right" placeholder="Postcode" required="required"> </div>
                                            </div>
                                            <div class="form-group">
                                                <label>State</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon input-circle-left">
                                                        <i class="fa fa-map "></i>
                                                    </span>
                                                    <select name="state" class="input-sm form-control input-circle-right" placeholder="" required> 
                                        			<?php 
	                                                    foreach ($state as $key) { ?>
	                                                        <option value="<?= $key->state_id; ?>"> <?= $key->state_name; ?> </option>
                                                    <?php }
                                                    ?>
                                    				</select>
                                    			</div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
		        	</div>