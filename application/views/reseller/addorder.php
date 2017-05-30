<div class="row">
	<div class="col-md-12">        
		<div class="portlet light">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cubes font-yellow-casablanca"></i>
                    <span class="caption-subject bold font-yellow-casablanca uppercase"> Product List </span>
                    <span class="caption-helper">more samples...</span>
                </div>                
            </div> 
        <div class="portlet-body">
            <div class="row">
                <div class="col-xs-12">
                    <div class="col-xs-8">
                    <div class="row">
                        <div class="progress progress-striped active" style="height: 40px;">
                            <div class="progress-bar" id="qtyBar" role="progressbar" style="width: 0%">
                                <span class="sr-only">Quantity</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="progress">
                            <div class="progress-bar red" style="width: 19%">
                                <span class="sr-only"> Deny </span>
                            </div>
                            <div class="progress-bar yellow-gold" style="width: 22%">
                                <span class="sr-only"> 20 - 40 pcs </span>
                            </div>
                            <div class="progress-bar grey-silver" style="width: 19%">
                                <span class="sr-only"> 41 - 60 pcs</span>
                            </div>
                            <div class="progress-bar dark" style="width: 40%">
                                <span class="sr-only"> 61 - 100 pcs </span>
                            </div>
                        </div>
                    </div>             
                    </div>
                    <div class="col-xs-4">
                        <a class="dashboard-stat dashboard-stat-v2 blue-madison" href="javascript:priceRate();" title="Price Rate">
                            <div class="visual">
                                <i class="fa fa-money"></i>
                            </div>
                            <div class="details">
                                <div class="number">
                                    RM <span id="priceTag">xx.xx</span>
                                </div>
                                <div class="desc">Price Rate</div>
                            </div>
                        </a>
                    </div>
                </div>                
            </div>      
        </div>
        </div>
	</div>
</div>
<div class="row">
    <dir class="col-xs-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="col-md-6">
                    <div class="row">
                        <div class="form-group">
                            <label for="input" class="col-sm-2 control-label">Series :</label>
                            <div class="col-sm-10">
                                <select id="cat" class="form-control input-circle">
                                    <option value="-1">-- Select One --</option>
                                    <?php foreach ($cat as $key) { ?>
                                        <option style="background-color: <?= $key->ca_color; ?>;" value="<?= $this->my_func->en($key->ca_id); ?>"><?= $key->ca_desc; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix">
                    <br>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label for="input" class="col-sm-2 control-label">Flavor :</label>
                            <div class="col-sm-10" id="flavDiv">
                                <select id="flav" class="form-control input-circle" disabled>
                                    <option value="-1">-- Select One --</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="form-group">
                            <label for="input" class="col-sm-2 control-label">Nico :</label>
                            <div class="col-sm-10">
                                <label>6 mg</label>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix">
                        <br>
                    </div>
                    <div class="row">
                        <span id="loading" hidden class="pull-left" style="padding-top: 15px;"><i class="fa fa-spinner fa-spin"></i> <i class="fa fa-flask"></i> Brewing In Progress</span><span class="pull-right">
                        <button id="addBtn" disabled type="button" class="btn btn-primary btn-circle"><i class="fa fa-plus"></i> Add</button></span>
                    </div>
                </div>
                <div class="clearfix">
                    <br>
                    <hr>
                </div>
                <div class="clearfix">
                    <br>
                </div><form method="post" id="myForm" onsubmit="return checkAll();" action="<?= site_url('reseller/page/b11'); ?>">
                    <table class="table table-condensed table-hover">
                    <thead>
                        <tr>
                            <th width="50%">Flavor Detail</th>
                            <th width="30%">Quantity</th>
                            <th width="20%">Action</th>
                        </tr>
                    </thead>
                    
                    <input type="hidden" name="key" value="<?= $this->my_func->en('betul' , 1); ?>">
                        <tbody id="orderList">
                            
                        </tbody>                        
                    <tfoot>
                        <tr>
                            <td>
                                <span class="pull-left">Limit left: <span id="limit">100</span> pcs</span>
                            </td>
                            <td>
                                Total : <span id="totalQty">0</span>
                            </td>
                            <td>
                                Total Price : RM <span id="totalPrice">0.00</span>
                            </td>
                        </tr>
                    </tfoot>
                </table>
                <input type="submit" id="go" hidden>
                    </form>
            </div>
            <div class="panel-footer">
                <div class="row">
                <div class="col-md-12">
                    <span class="pull-right">                        
                        <button type="button" id="proceedBtn" onclick="$('#go').trigger('click');" class="btn btn-circle yellow-gold" disabled><i class="fa fa-shopping-cart"></i> Checkout</button>
                    </span>
                </div>                    
                </div>                
            </div>
        </div>
    </dir>    
</div>
<div hidden>
<div id="priceRate">
<div class="row">    
    <div class="col-md-8 col-md-offset-2" >
    <div class="panel">
    <div class="panel-body">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Price Rate</th>
                    <th>Quantity Range</th>
                    <th>Detail</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>RM 17.50</td>
                    <td>20 <i class="fa fa-arrow-right"></i> 40</td>
                    <td><span class="label bg-yellow-gold bg-font-yellow-gold">Gold</span></td>
                </tr>
                <tr>
                    <td>RM 17.00</td>
                    <td>41 <i class="fa fa-arrow-right"></i> 60</td>
                    <td><span class="label bg-grey-silver bg-font-grey-silver">Premium</span></td>
                </tr>
                <tr>
                    <td>RM 16.50</td>
                    <td>61 <i class="fa fa-arrow-right"></i> 100</td>
                    <td><span class="label bg-dark bg-font-dark">Platinum</span></td>
                </tr>
            </tbody>
        </table>
    </div>        
    </div>        
    </div>
    </div>
</div>
</div>
<script type = "text/javascript">
    var urlsite = "<?= site_url(); ?>reseller/";
    var list = $("#orderList");
    var price;
</script>
<script type="text/javascript" src = "<?= base_url();?>assets/nastyjs/order.js?batch=<?php echo uniqid(); ?>"></script>
