<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"></h3>
            </div>
            <div class="panel-body">
                <form method="post">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">Series</span>
                            <select class="form-control " name="cat" required>
                          <option value="">--Select Series--</option>
                          <?php
                        foreach ($cat as $key) { ?>
                            <option value="<?= $this->my_func->scpro_encrypt($key->ca_id); ?>"><?= $key->ca_desc; ?></option>
                        <?php }
                          ?>
                      </select>
                        </div>
                        <p class="help-block">Help text here.</p>
                    </div>
                    <div class="col-md-6">
                        <fieldset class="form-group">
                            <label for="fromDate">Date From</label>
                            <input name="from" type="date" class="form-control" id="fromDate" placeholder="From Date" required>
                        </fieldset>
                    </div>
                    <div class="col-md-6">
                        <fieldset class="form-group">
                            <label for="toDate">Date To</label>
                            <input name="to" type="date" class="form-control" id="toDate" placeholder="To Date" required>
                        </fieldset>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="panel-footer">

            </div>
        </div>
    </div>
</div>
<?php if (isset($list)) { ?>
    <div class="row">
      <div class="col-md-12">
          <pre>
              <?= print_r($list); ?>              
          </pre>
      </div>
    </div>
<?php } ?>
<?php return; ?>
<div class="row">
  <div class="col-md-6">
      <pre><?= print_r($item)?></pre>
  </div>
  <div class="col-md-6">
      <pre><?= print_r($cat); ?></pre>
  </div>
</div>
