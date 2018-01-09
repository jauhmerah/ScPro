<div class="row">
    <div class="col-xs-12">
        <div class="panel panel-danger">
            <div class="panel-heading">
                <h3 class="panel-title">Deleted Order</h3>
            </div>
            <div class="panel-body">
                <table class="table table-striped table-bordered table-advance table-hover">
                    <thead >
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Client Name</th>
                            <th scope="col">Order Code - LOG</th>
                            <th scope="col">Order Date</th>
                            <th scope="col">Sales Person</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $num = $indexNum;
                            foreach ($list as $key) {
                                $num ++;
                                ?>
                                <tr>
                                    <th scope="row"><?= $num; ?></th>
                                    <td><?= $key->cl_name; ?></td>
                                    <td><?= (120000 + $key->or_id);?></td>
                                    <td><?= date('Y-m-d' , time($key->or_date)); ?></td>
                                    <td><?= $key->us_username; ?></td>
                                    <td>
                                        <?= anchor(site_url('nasty_v2/dashboard/page/a111?v=2&view=').$this->mf->scpro_encrypt($key->or_id), '<i class="fa fa-eye"></i>', 'type="button" class="btn btn-primary btn-circle"'); ?>
                                        <button onclick="window.open('<?= site_url('nasty_v2/dashboard/page/f1?time='.$this->mf->scpro_encrypt($key->or_id)); ?> ?>');" type="button" class="btn btn-danger btn-circle delComment">
                                            <i class="fa fa-clock-o"></i>
                                        </button>
                                    </td>
                                </tr>
                                <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="panel-footer">
                <ul class="pagination">
                    <?= $link; ?>
                    <li>
                        <div class="dataTables_info" id="sample_1_info" role="status" aria-live="polite">Showing <?= ($indexNum+1); ?> to <?= ($num); ?> of <?= $tCount; ?> records</div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
