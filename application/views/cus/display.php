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
                            <input name="from" type="date" class="form-control" id="fromDate" value="2017-08-01" placeholder="From Date" required>
                        </fieldset>
                    </div>
                    <div class="col-md-6">
                        <fieldset class="form-group">
                            <label for="toDate">Date To</label>
                            <input name="to" type="date" class="form-control" id="toDate" value="2018-01-31" placeholder="To Date" required>
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
<?php
if (isset($list)) { ?>
    <button type="button" class="btn btn-default" id="klik">
        copyMe
    </button>
<div class="panel panel-default">
  <div class="panel-body" id="listData">
      <?php
      echo "Item;Series;Nic Mg;Quantity;Tester;Price;Total Price;Date<br />";
        foreach ($list as $key) {
            $item = $key['item']->ty2_desc.';';
            $cat = $key['item']->ca_desc.';';
            foreach ($key['data'] as $key2) {
                $qty = $key2->oi_qty.';';
                $mg = $key2->ni_mg.';';
                $tester = $key2->oi_tester.';';
                $price = $key2->oi_price.';';
                $total = $key2->oi_price*$key2->oi_price;
                $total .= ';';
                $date = $key2->or_date;
                $date = date_create($date);
                $date = $date->format('Y-m');
                echo $item.$cat.$mg.$qty.$tester.$price.$total.$date."<br/>";
            }
        }
      ?>
  </div>
</div>
<?php }
?>
<script type="text/javascript">
    $(document).ready(function() {
        $('#klik').click(function(event) {
            copyToClipboard('#listData');
        });
    });
    function copyToClipboard(element) {
      var $temp = $("<input>");
      $("body").append($temp);
      $temp.val($(element).html()).select();
      document.execCommand("copy");
      $temp.remove();
    }
</script>
