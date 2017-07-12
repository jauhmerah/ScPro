<link href="<?= base_url(); ?>asset2/pages/css/invoice.min.css" rel="stylesheet" id="style_components" type="text/css" />
<div class="row">
    <div class="col-xs-12">
<div class="invoice">
    <div class="row invoice-logo">
        <div class="col-xs-4 invoice-logo-space">
            <img src="<?= base_url('assets/cover/nstylogo.png'); ?>" class="img-responsive" width data-pin-nopin="true"> </div>
        <div class="col-xs-6 col-xs-offset-2">
        <?php $or_id = $order->or_id + 100000; ?>
            <p> MY-<?= $or_id; ?> / <?= date_format(date_create($order->or_date) , 'd M Y' )?>
                <span class="font-green-meadow font-lg bold uppercase"> Order Success Created </span>
                <h1><span class="label label-warning pull-right"> Unpaid </span></h1>
            </p>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-xs-4">
            <h3>Client:</h3>
            <ul class="list-unstyled">
                <li> <?= $user->us_fname; ?> <?= $user->us_lname; ?> </li>
                <li> <?= $address->company_name; ?> </li>
                <li> <?= $address->address; ?> </li>
                <li> <?= $address->town; ?> </li>
                <li> <?= $address->postcode; ?> </li>
                <li> <?= $address->state_name; ?> </li>
                <li> <?= $user->us_phone; ?></li>
                <li> <?= $user->us_email; ?></li>
            </ul>
        </div>
        <div class="col-xs-4 col-xs-offset-4 invoice-payment">
            <h3>Payment Details:</h3>
            <ul class="list-unstyled">
                <li>
                    <a href="http://www.maybank2u.com.my/" target="_blank"><button type="button" class="btn btn-circle" style="background-color: #ffc600;"><img src="<?= base_url('asset/maybank/maybank2u_logo.png'); ?>" class="img-responsive" alt="Image"></button></a>
                <li>
                    <strong>Recipient Ref: </strong>MY-<?= $or_id; ?> </li>
                <li>
                    <strong>Recipient Bank: </strong>Maybank Bank Berhad </li>
                <li>
                    <strong>Account Number: </strong>1212313123123 </li>
                <li>
                    <strong>Account Name: </strong>Nsty Worldwide </li>
                <li>
                    <strong>Account Name: </strong>45454DEMO545DEMO </li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th class="hidden-xs"> # </th>
                        <th> Item </th>
                        <th class="hidden-xs"> Description </th>
                        <th class="hidden-xs"> Quantity </th>
                        <th class="hidden-xs"> Unit Cost </th>
                        <th> Total </th>
                    </tr>
                </thead>                               
                <tbody>
                <?php 
                    $n = 0;
                    $tot = 0;
                    $qty = 0;
                    foreach ($item as $key) {
                        $n++;
                        $qty += $key->oi_qty;
                ?> 
                    <tr>
                        <td class="hidden-xs"> <?= $n; ?></td>
                        <td> <?= $key->ty2_desc; ?></td>
                        <td class="hidden-xs"> <?= $key->ty2_detail; ?> </td>
                        <td class="hidden-xs"> <?= $key->oi_qty; ?> </td>
                        <td class="hidden-xs"> RM<?= number_format((float)$order->or_price, 2, '.', ''); ?> </td>
                        <?php 
                            $subTot = number_format((float)$order->or_price*$key->oi_qty, 2, '.', '');
                            $tot += $subTot;
                        ?>
                        <td> RM<?= $subTot; ?> </td>
                    </tr>
                <?php
                    }
                ?>                   
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3" class="hidden-xs">
                            <span class="pull-right">Total Qty :</span>
                        </td>
                        <td class="hidden-xs"><?= $qty; ?></td>
                        <td><span class="pull-right">Total Amount :</span></td>
                        <td>RM <?= number_format((float)$tot, 2, '.', ''); ?></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-4">
            <div class="well">
                <address>
                    <strong>NSTY Worldwide Sdn Bhd</strong>
                    <br> Lot 139, 1st Floor, Jalan Besar Tampin,
                    <br> 73400 Tampin, Negeri Sembilan,
                    <br>Malaysia<br>
                    <abbr title="Phone 1">P 1:</abbr> +6012 3437638 <br>
                    <abbr title="Phone 2">P 2:</abbr> +6013 6777791 </address>
                <address>
                    <a href="mailto:customerservice@nastyjuice.com"> Customer Support </a>
                </address>
            </div>
        </div>
        <div class="col-xs-8 invoice-block">
            <ul class="list-unstyled amounts">
                <li>
                    <h1>Total amount:  <strong>RM <?= number_format((float)$tot, 2, '.', ''); ?></strong> </li></h1>
            </ul>
            <br>
            <a class="btn btn-lg blue hidden-print margin-bottom-5" target="_blank" href="<?= site_url('invoice?id='.$this->my_func->scpro_encrypt($order->or_id)); ?>"> Print Invoice
                <i class="fa fa-print"></i>
            </a>
            <a class="btn btn-lg green hidden-print margin-bottom-5" href=""> Back to Order list
                <i class="fa fa-list"></i>
            </a>
        </div>
    </div>
</div>
    </div>
</div>