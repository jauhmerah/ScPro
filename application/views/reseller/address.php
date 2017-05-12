

<link href="<?= base_url(); ?>asset2/global/plugins/bootstrap-switch/css/bootstrap-switch.css" rel="stylesheet" type="text/css">
<script src="<?= base_url(); ?>asset2/global/plugins/bootstrap-switch/js/bootstrap-switch.js" type="text/javascript"></script>

<div class="row">
    <div class="col-md-12">
        <div class="portlet box purple">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-home"></i>Delivery Address List 
                </div>                
            </div>
            <div class="portlet-body flip-scroll">
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-2">
                            <a href="<?= site_url('reseller/page/s14') ?>"><button type="button" class="btn btn-primary"><i class="fa fa-home"></i> Add Address</button></a>
                        </div>
                        <!-- <div class="col-md-5">
                            <div class="form-group">
                                <label for="input" class="col-sm-2 control-label">Search :</label>
                                <div class="col-sm-10">
                                    <input type="search" name="" id="search" placeholder="Search" class="form-control input-circle" value="" title="" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="inputFilter" class="col-sm-2 control-label">Filter :</label>
                                <div class="col-sm-10">
                                    <select name="filter" id="inputFilter" class="form-control input-circle">
                                        <option value="-1">-- Select One --</option>
                                        <option value="0">Name</option>
                                        <option value="1">Username</option>
                                        <option value="2">Email</option>
                                        <option value="3">Phone No.</option>
                                        <option value="4">Role</option>
                                    </select>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
                <div class="clearfix">
                    &nbsp;
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered table-striped flip-content">
                            <thead class="flip-content">
                                <tr>
                                    <th>Select Shipping Address</th>
                                    <th>Address</th>
                                    
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                             <?php 
                                if ($arr == null) {
                                    ?>
                                <tr>
                                    <td colspan = "6">
                                        <div align = "center">No Data</div>
                                    </td>
                                </tr>
                                    <?php
                                }else{
                                    $n = 0;
                                    foreach ($arr as $key) {
                                        $n++;
                                        ?>
                                <tr>
                                    <td> <input type="radio" class="status make-switch pull-right" id="<?= $n.'sta' ?>" name="status" data-on-text="YES" data-off-text="NO" data-size="mini" data-on-color="info" data-off-color="warning" <?php if($key->status==1){echo "checked";}?>>
                                    <input type="hidden" class="form-control <?= $n.'sta' ?>" name="add_id" id="add_id" value="<?= $key->add_id ?>"></td>
                                    <td>
                                    <strong><?= $key->company_name ?></strong><br>
                                    <?= $key->address ?><br>
                                    <?= $key->poscode ?>, <?= $key->town ?><br>
                                    <?= $key->state_name ?>



                                   <!--  <?php 
                                    $view = ($user->us_fname == null) ? "--Not Set--" : $user->us_fname ;
                                    echo $view;
                                    ?> -->
                                        
                                    </td>
                                 
                                    <td>
                                    <?php 
                                        $add_id = $this->my_func->scpro_encrypt($key->add_id);
                                    ?>
                                        <a href="<?= site_url('reseller/page/s16?view=').$add_id; ?>" name="c4" title="User Detail"><button type="button" class="btn btn-info btn-xs"><i class="fa fa-eye"></i></button></a>&nbsp;-&nbsp;                               
                                       <!--  <a href="<?= site_url('nasty_v2/dashboard/page/c11?edit=') ?>" name="c3" title="Edit User"><button type="button" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></button></a>&nbsp;-&nbsp; -->                                       
                                        <a onclick = "return onDel();" href="<?= site_url('reseller/page/c12?delete=').$add_id; ?>" name="c5" title="Delete User"><button type="button" class="btn btn-danger btn-xs"><i class="fa fa-close"></i></button></a>
                                    </td>                                   
                                </tr>       
                                        <?php
                                    }
                                }
                            ?>                                                   
                            </tbody>
                        </table>
                    </div>
                </div>                           
            </div>
        </div>
    </div>
</div>
  <script>
    $(document).ready(function() {



        // $(".status").change(function() {
$(".status").on('switchChange.bootstrapSwitch', function () {
    //alert("No");
                    sid = $('status').prop('id');
                    id = $(this).prop('id');
                    add_id = $("."+id).val();
                    // alert(purid);
                    // bootbox.confirm({
                    //     message: "Are you sure that you want to proceed?",
                    //     buttons: {
                    //         confirm: {
                    //             label: 'Yes',
                    //             className: 'btn-success'
                               
                    //         },
                    //         cancel: {
                    //             label: 'No',
                    //             className: 'btn-danger'
                    //         }
                    //     },
                    //     callback: function (result) {
                    //         if(result == true){
                                
                                $.post('<?= site_url('reseller/change_status'); ?>', {add_id: add_id,status: 1}, function(data) {
                                    // if(data == true){
                                    $(window).attr("location", "<?= site_url('reseller/page/s12'); ?>");
                                // }
                                    
                                });

                    //         }
                            
                            
                    //     }
                    // });


                });
                });
                </script>