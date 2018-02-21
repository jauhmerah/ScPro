<div class="row">
    <div class="col-md-12">
        <div class="panel border-dark">
          <div class="panel-heading bg-dark bg-font-dark">
            <h3 class="panel-title">Hologram sequence number</h3>
          </div>
          <div class="panel-body">
              <form action="#" class="form-horizontal">
                <div class="form-body">
                    <h3 class="form-section">Order Detail</h3>
                </div>
                <h4>
                    <div class="form-group">
                        <label class="control-label col-md-3">Order Id :</label><label class="control-label col-md-3"><?= $arr['ho_orcode']; ?></label>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Client Name :</label><label class="control-label col-md-3"><?= $client->cl_name; ?></label>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Country :</label><label class="control-label col-md-3"><?= $client->cl_country; ?></label>
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
                                                            foreach ($nico as $mg) {?>
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
                    </div>
                </div>
                <div class="form-actions">
                    <div class="row">
                        <div class="col-md-offset-3 col-md-9">
                            <button type="submit" class="btn green">Submit</button>
                            <button type="button" class="btn default">Cancel</button>
                        </div>
                    </div>
                </div>
            </form>
          </div>
          <div class="panel-footer">

          </div>
        </div>
    </div>
</div>
<pre>
    <?= print_r($arr); ?>
    <?= print_r($client); ?>
</pre>
