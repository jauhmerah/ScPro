<div class="row">
    <div class="col-md-12">
        <form action="<?= site_url('holoxordys/page/b22') ?>" class="form-horizontal" method="post">
        <input type="hidden" name="ho_orcode" value="<?= $arr['ho_orcode']; ?>">
        <?php if (isset($client)) { ?>
            <input type="hidden" name="or_id" value="<?= $arr['or_id']; ?>">
        <?php }else{ ?>
            <input type="hidden" name="ho_country" value="<?= $arr['country']; ?>">
            <input type="hidden" name="ho_name" value="<?= $arr['ho_name']; ?>">
        <?php }
        ?>
        <div class="panel border-dark">
          <div class="panel-heading bg-dark bg-font-dark">
            <h3 class="panel-title">Hologram sequence number</h3>
          </div>
          <div class="panel-body">
                <div class="form-body">
                    <h3 class="form-section">Order Detail</h3>
                </div>
                <h4>
                    <div class="form-group">
                        <label class="control-label col-md-3">Order Id :</label><label class="control-label col-md-3"><?= $arr['ho_orcode']; ?></label>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Client Name :</label><label class="control-label col-md-3"><?= (isset($client)) ? $client->cl_name : $arr['ho_name']; ?></label>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Country :</label><label class="control-label col-md-3"><?= (isset($client)) ? $client->cl_country : $arr['country']; ?></label>
                    </div>
                </h4>
                <div class="row">
                    <div class="col-md-12">
                        <div class="clearfix">
                            &nbsp;
                        </div>
                        <table class="table">
                            <tr>
                                <td colspan="5">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="input" class="col-sm-4 control-label">Category : </label>
                                                <div class="col-sm-8">
                                                    <select id="cat" class="form-control input-circle">
                                                        <option value="-1">-- Select Category --</option>
                                                        <?php
                                                        foreach ($cat as $key) { ?>
                                                            <option style="background-color: <?= $key->ca_color; ?>" value="<?= $key->ca_id; ?>"> <?= $key->ca_desc; ?> </option>
                                                        <?php }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="clearfix">
                                                &nbsp;
                                            </div>
                                            <div class="form-group" id = "divType">
                                                <label for="input" class="col-sm-4 control-label">Item Type : </label>
                                                <div class="col-sm-8">
                                                    <select id="itemType" class="form-control input-circle" disabled>
                                                        <option value="-1">-- Select Type --</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="input" class="col-md-4 control-label">Nicotine : </label>
                                                <div class="col-sm-5">
                                                    <select id="inputNico" class="form-control input-circle">
                                                        <option value="-1" selected>-- Select One --</option>
                                                        <?php
                                                            foreach ($nico as $mg) {
                                                                if ($mg->ni_mg == -1) {
                                                                    $mg->ni_mg = 'No ';
                                                                }
                                                                ?>
                                                                <option style = "background-color: <?= $mg->ni_color; ?> ;" value="<?= $mg->ni_id; ?>"><?= $mg->ni_mg; ?> Mg</option>
                                                            <?php }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="clearfix">
                                            &nbsp;
                                            </div>
                                            <div class="clearfix">
                                            &nbsp;
                                            </div>
                                            <span class="pull-right"><button type="button" id="addBtn" class="btn btn-success" disabled><i class="fa fa-plus"></i>&nbsp;Add Item</button></span>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </table>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-hover table-condensed">
                            <thead>
                                <tr>
                                    <th>Item Detail</th>
                                    <th>Box Number</th>
                                    <th>Pre Number</th>
                                    <th>Post Number</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="orderList">
                            </tbody>
                        </table>
                    </div>
                </div>
          </div>
          <div class="panel-footer">
              <div class="form-actions">
                  <div class="row">
                      <div class="col-md-offset-9 col-md-3">
                          <button type="submit" class="btn green btn-lg" id="submit" disabled><i class="fa fa-plus" aria-hidden="true"></i> Submit</button>
                          <a href="<?= site_url('holoxordys/page/b2'); ?>" type="button" class="btn default btn-lg"><i class="fa fa-undo" aria-hidden="true"></i> Cancel</a>
                      </div>
                  </div>
              </div>
          </div>
        </div>
    </form>
    </div>
</div>
<pre>
    <?= print_r($arr); ?>
</pre>
<script type="text/javascript">
var num = 1;
    $(document).ready(function() {
        $('#cat').change(function() {
			temp = $(this).val();
			if (temp == -1) {
				$("#addBtn").prop('disabled' , 'disabled');
			}
			$.post('<?= site_url('nasty_v2/dashboard/getAjaxItem'); ?>', {ca_id : temp}, function(data) {
				$("#divType").html(data);
			});
		});
		$("#addBtn").click(function() {
            $('#submit').removeAttr('disabled');
			type = $("#itemType").val();
			nic = $("#inputNico").val();
			cat = $("#cat").val();
			//alert(type + " " + nic + " " + cat);
			num ++;
			$.post('<?= site_url("holoxordys/getAjaxItemList") ?>', {type : type , nico : nic , cat : cat , num : num}, function(data) {
				$("#orderList").append(data);
			});
		});
    });
</script>
