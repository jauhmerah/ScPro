<?php 
    if (!isset($mode)) {
        $mode = 0;
    }   
?>
<script>
    function moveTo() {
        return confirm('Are you sure?');
    }
</script>

 <style type="text/css">
            .task-contain{
             background-color: white;
                border-left: 2px solid #D8D8DC;   
                border-right: 2px solid #D8D8DC;
                border-top: 3px solid #D8D8DC;   
                border-bottom: 3px solid #D8D8DC;
                box-shadow: 0 1px 1px 0 rgba(50, 50, 50, 0.75);
                float: left;
                height: 100%;
                margin: 0;
                min-height: 240px;
                padding: 15px;
                text-align: center;
                width: 30%;
            }

                #sprintcontainer{
                margin: 0 auto;
                width: 100%;
                min-height: 100%;
                background-color: transparent;
                border: 0;
            }

            .task-list {
                background-color: white;
                border-left: 2px solid #D8D8DC;   
                border-right: 2px solid #D8D8DC;
                border-top: 3px solid #D8D8DC;   
                border-bottom: 3px solid #D8D8DC;
                box-shadow: 0 1px 1px 0 rgba(50, 50, 50, 0.75);
                float: left;
                height: 100%;
                margin: 0;
                min-height: 240px;
                padding: 15px;
                text-align: center;
                width: 30%;
            }

            .task-list input, .task-list textarea{
                width: 240px;
                margin: 1px 5px;
            }

            .task-list input{
                height: 30px;
            }

            .todo-task{
                margin: 5px;
                padding: 5px;
                 width: 100%;
                 font-size: 10px;
            }

            .task-body {
                background-color: #EBEBEB;   
                width: 100%;
                min-height:40px;
                clear: both;
            }
            .task-header {
                background-clip: padding-box;
                background-color: #343434;
                border-radius: 2px 2px 0 0;
                color: white;
                font-family: "Lato",sans-serif;
                height: 22px;
                position: relative;
            }
            .task-footer {
                background-clip: padding-box;
                background-color: #EBEBEB;
                border-radius: 0 0 2px 2px;
                color: gray;
                height: 22px;
                position: relative;
            }
            .task-no {
             float:left;
             padding: 2px;
            }
            .task-type {
             float:left;
             padding: 2px;
            }
            .task-date {
             float:left;
             padding: 2px;
            }

            .task-list input[type="button"]{
                width: 100px;
                margin: 5px;

            }

            .todo-task > .task-header{
                font-weight: bold;
            }

            .todo-task > .task-date{
                font-size: 10px;
                font-style: italic;
            }

            .todo-task > .task-description{
                font-size: 10px;
            }

</style>

<div class="row">
    <div class="col-md-12">
        <div class="portlet box green">
             <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-user"></i>Distributor Switch 
                </div>                
            </div>

            <div class="portlet-body flip-scroll">
                    <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                            <a class="dashboard-stat dashboard-stat-v2 purple" id="newO">
                                <div class="visual pull-right">
                                    <i class="fa fa-truck"></i>
                                </div>
                                <div class="details pull-left">
                                    <div class="number">
                   
                                    </div>
                                    <div class="desc">ROS LIST </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <a class="dashboard-stat dashboard-stat-v2 blue" id="proO">
                                <div class="visual pull-right">
                                    <i class="fa fa-truck"></i>
                                </div>
                                <div class="details pull-left">
                                    <div class="number">

                                    </div>
                                    <div class="desc">RTS LIST </div>
                                </div>
                            </a>
                        </div>
                    </div>
            </div>

        </div>
    </div>
</div>



<div class="row">
    <div class="col-md-12">
        <div class="portlet box purple" id="newOrder" <?php if($e==1){echo "style=display:block;"; }else{ echo "style=display:none;"; }  ?>  >
             <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-user"></i>ROS List 
                </div>                
            </div>

            <div class="portlet-body flip-scroll">
                    <div class="row">
                            <div class="col-md-12">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Client Name</th>
                                                <th>Order Code</th>
                                                <th>Order Date</th>
                                                <th>Sales Person</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                              <?php
                                            $n = 0; 
                                            if (sizeof($arr1) != 0) { 
                                                foreach ($arr1 as $user) {
                                                    
                                                    $n++;
                                                    ?>
                                                    <tr class="clickable" data-toggle="collapse" id="row<?= $n ?>" data-target=".row<?= $n ?>">
                                                          <td><?= $n; ?></td>
                                                           <td><?php 
                                                            $view = ($user->cl_name == null) ? "--Not Set--" : $user->cl_name ;
                                                            echo $view;
                                                            ?><span class="pull-right">
                                                            <?= ucwords($user->cl_country); ?>
                                                            <?php
                                                            $fc = $this->my_flag->flag_code(ucwords($user->cl_country));
                                                            if ($fc != "") {
                                                                ?>
                                                                <img class="flag flag-<?= $fc; ?>"/>
                                                                <?php
                                                            }
                                                            ?></span></td>
                                                            <td><?php 
                                                            if ($user->or_id) {
                                                                $id = '#'.(120000+$user->or_id);
                                                                echo '<span style = "color : #b706d6;"><strong>'.$id.'</strong></span>';
                                                            } else {
                                                                echo "--Not Set--";
                                                            }
                                                            ?></td>
                                                            <td><?php 
                                                                $view = ( $user->or_date == null) ? "--Not Set--" :  date_format(date_create($user->or_date) , 'd-M-Y' ) ;
                                                                echo $view ;
                                                                ?></td>
                                                            <td><?php 
                                                            $view = ( $user->us_username == null) ? "--Not Set--" :  $user->us_username ;
                                                            echo $view;
                                                            ?></td>
                                                            <td class="mt-element-ribbon">
                                                        <span class="label" style="background-color: <?= $user->pr_color; ?>"><?= $user->pr_desc; ?></span>
                                               
                                                            <div class="clear" style="height: 10px"></div>
                                                               

                                                            </td>
                                                            <td>
                                                                 <?php 
                                        $usid = $this->my_func->scpro_encrypt($user->or_id);
                                    ?>
                                        <a href="<?= site_url('nasty_v2/dashboard/page/a111?view=').$usid; ?>" name="c4" title="Order Detail"><button type="button" class="btn btn-circle btn-danger btn-xs"><i class="fa fa-eye"></i></button></a> 
                                        &nbsp;-&nbsp;
                                        <button title = "Print Order" onclick = "window.open('<?= site_url('order/printO1?id='.$this->my_func->scpro_encrypt($user->or_id).'&ver=2'); ?>');" type="button" class="btn btn-default btn-circle btn-info btn-xs"><i class="fa fa-print"></i></button>
                                        &nbsp;-&nbsp;
                                        <button type="button" title = "D.O Form" onclick = "window.open('<?= site_url('order/printDO1?id='.$this->my_func->scpro_encrypt($user->or_id).'&ver=2'); ?>');" class="btn btn-success btn-circle btn-xs"><i class="fa fa-truck"></i></button>
                                          &nbsp;-&nbsp;
                                        <?php if($user->pr_id==8){ ?>
                                        <button type="button" title = "DOC" class="DOCButton btn yellow-gold btn-circle btn-xs" id="<?= $n.'doc' ?>" name="<?= $n.'doc' ?>">DOC</button>
                                        <input type="hidden" class="form-control <?= $n.'doc' ?>" name="or_id" id="or_id" value="<?= $user->or_id ?>">
                                        &nbsp;-&nbsp;
                                        <?php }else if($user->pr_id==9){ ?>
                                        <button type="button" title = "RTS" class="RTSButton btn purple-seance btn-circle btn-xs" id="<?= $n.'rts' ?>" name="<?= $n.'rts' ?>">RTS</button>
                                        <input type="hidden" class="or_id <?= $n.'rts' ?>" name="or_id" id="or_id" value="<?= $user->or_id ?>">
                                        &nbsp;-&nbsp; 
                                        <?php } ?>  
                                        <button type="button" onclick = "window.open('<?= site_url('nasty_v2/invoice/Invoice?id='.$this->my_func->scpro_encrypt($user->or_id).'&ver=2'); ?>');"  class="btn blue-dark btn-circle btn-xs" title="Invoice">Inv</button>
                                        &nbsp;-&nbsp;   
                                        <button type="button" onclick = "window.open('<?= site_url('nasty_v2/invoice/dummyInvoice?id='.$this->my_func->scpro_encrypt($user->or_id).'&ver=2'); ?>');" class="btn c-btn-border-1x c-btn-blue-dark btn-circle btn-xs" title="Dummy Invoice">DInv</button>    


                                                            </td>
                                                    </tr>

                                                

                                                    <?php 
                                                            
                                                        }
                                                    } ?>

                                        </tbody>
                                        <tfoot>
                                <td colspan="7">
                                <div class="col-md-5 col-sm-5">
                                    <div class="dataTables_info" id="sample_1_info" role="status" aria-live="polite">Showing <?= ($page+1); ?> to <?= ($page+$row); ?> of <?= $total; ?> records</div>
                                </div>
                                <div class="col-md-7 col-sm-7" align="right">
                                    <div class="dataTables_paginate paging_bootstrap_full_number" id="sample_1_paginate">
                                        <ul class="pagination" style="visibility: visible;">
                                        <?php
                                        $prev = "";
                                        $next = "";
                                            if ($page == 0) {
                                                $prev = "disabled";
                                            }
                                            if ($total <= ($page + 10)) {
                                                $next = "disabled";
                                            }
                                        ?>
                                            <li class="prev <?= $prev; ?>"><a <?php if($prev!="disabled"){ ?>href="<?= site_url('nasty_v2/dashboard/page/a62?page='.($page-10)); ?>"<?php } ?> title="Prev" ><i class="fa fa-angle-left"></i></a></li>                                            
                                            <li class="next <?= $next; ?>"><a <?php if($next!="disabled"){ ?>href="<?= site_url('nasty_v2/dashboard/page/a62?page='.($page+10)); ?>"<?php } ?> title="Next"><i class="fa fa-angle-right"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                </td>
                            </tfoot> 


                            </table>
                                
                            </div>
                    </div>
            </div>

        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="portlet box blue" id="proOrder" <?php if($e==2){echo "style=display:block;";}else{ echo "style=display:none;"; }  ?>  >
             <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-user"></i>RTS List 
                </div>                
            </div>

            <div class="portlet-body flip-scroll">

               
                                <table class="table table-condensed  table-striped flip-content">
                                    <thead class="flip-content">
                                        <tr>
                                                <th>#</th>
                                                <th>Client Name</th>
                                                <th>Order Code</th>
                                                <th>Order Date</th>
                                                <th>Sales Person</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                        
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php
                                            $n = 0; 
                                            if (sizeof($arr2) != 0) { 
                                                foreach ($arr2 as $user) {
                                                  
                                                    $n++;
                                                    ?>
                                                    <tr class="clickable" data-toggle="collapse" id="row<?= $n ?>" data-target=".row<?= $n ?>">
                                                          <td><?= $n; ?></td>
                                                           <td><?php 
                                                            $view = ($user->cl_name == null) ? "--Not Set--" : $user->cl_name ;
                                                            echo $view;
                                                            ?><span class="pull-right">
                                                            <?= ucwords($user->cl_country); ?>
                                                            <?php
                                                            $fc = $this->my_flag->flag_code(ucwords($user->cl_country));
                                                            if ($fc != "") {
                                                                ?>
                                                                <img class="flag flag-<?= $fc; ?>"/>
                                                                <?php
                                                            }
                                                            ?></span></td>
                                                            <td><?php 
                                                            if ($user->or_id) {
                                                                $id = '#'.(120000+$user->or_id);
                                                                echo '<span style = "color : #b706d6;"><strong>'.$id.'</strong></span>';
                                                            } else {
                                                                echo "--Not Set--";
                                                            }
                                                            ?></td>
                                                            <td><?php 
                                                                $view = ( $user->or_date == null) ? "--Not Set--" :  date_format(date_create($user->or_date) , 'd-M-Y' ) ;
                                                                echo $view ;
                                                                ?></td>
                                                            <td><?php 
                                                            $view = ( $user->us_username == null) ? "--Not Set--" :  $user->us_username ;
                                                            echo $view;
                                                            ?></td>
                                                            <td class="mt-element-ribbon">
                                                        <span class="label" style="background-color: <?= $user->pr_color; ?>"><?= $user->pr_desc; ?></span>
                                               
                                                            <div class="clear" style="height: 10px"></div>
                                                               

                                                            </td>
                                                            <td>
                                                                 <?php 
                                        $usid = $this->my_func->scpro_encrypt($user->or_id);
                                    ?>
                                        <a href="<?= site_url('nasty_v2/dashboard/page/a111?view=').$usid; ?>" name="c4" title="Order Detail"><button type="button" class="btn btn-circle btn-danger btn-info btn-xs"><i class="fa fa-eye"></i></button></a>
                                         &nbsp;-&nbsp;
                                        <button title = "Print Order" onclick = "window.open('<?= site_url('order/printO1?id='.$this->my_func->scpro_encrypt($user->or_id).'&ver=2'); ?>');" type="button" class="btn btn-default btn-circle btn-info btn-xs"><i class="fa fa-print"></i></button>
                                        &nbsp;-&nbsp;
                                        <button type="button" title = "D.O Form" onclick = "window.open('<?= site_url('order/printDO1?id='.$this->my_func->scpro_encrypt($user->or_id).'&ver=2'); ?>');" class="btn btn-success btn-circle btn-xs"><i class="fa fa-truck"></i></button>

                                        &nbsp;-&nbsp;

                                        <?php if($user->pr_id==10){ ?>
                                        <button type="button" title = "Shipping" class="SHButton btn purple-soft btn-circle btn-xs" id="<?= $n.'sh' ?>" name="<?= $n.'sh' ?>">Shipping</button>
                                        <input type="hidden" class="form-control <?= $n.'sh' ?>" name="or_id" id="or_id" value="<?= $user->or_id ?>">
                                        &nbsp;-&nbsp;
                                        <?php }else if($user->pr_id==11){ ?>
                                        <button type="button" title = "Arrived" class="ARButton btn red-flamingo btn-circle btn-xs" id="<?= $n.'arr' ?>" name="<?= $n.'arr' ?>">Arrived</button>
                                        <input type="hidden" class="form-control <?= $n.'arr' ?>" name="or_id" id="or_id" value="<?= $user->or_id ?>">
                                        &nbsp;-&nbsp; 
                                        <?php }else if($user->pr_id==12){ ?>
                                        <button type="button" title = "Return" class="REButton btn green-meadow btn-circle btn-xs" id="<?= $n.'ret' ?>" name="<?= $n.'ret' ?>">Return</button>
                                        <input type="hidden" class="form-control <?= $n.'ret' ?>" name="or_id" id="or_id" value="<?= $user->or_id ?>">
                                        &nbsp;-&nbsp; 
                                         
                                        <?php } ?>  
                                      
                                             
                                        <button type="button" onclick = "window.open('<?= site_url('nasty_v2/invoice/Invoice?id='.$this->my_func->scpro_encrypt($user->or_id).'&ver=2'); ?>');"  class="btn blue-dark btn-circle btn-xs" title="Invoice">Inv</button>
                                        &nbsp;-&nbsp;   
                                        <button type="button" onclick = "window.open('<?= site_url('nasty_v2/invoice/dummyInvoice?id='.$this->my_func->scpro_encrypt($user->or_id).'&ver=2'); ?>');" class="btn c-btn-border-1x c-btn-blue-dark btn-circle btn-xs" title="Dummy Invoice">DInv</button>                                            
                                                            </td>
                                                    </tr>

                                                  


                                                    <?php 
                                                            
                                                        }
                                                    } ?>
                                    </tbody>
                                    <?php if (isset($page)) {?>
                            <tfoot>
                                <td colspan="7">
                                <div class="col-md-5 col-sm-5">
                                    <div class="dataTables_info" id="sample_1_info" role="status" aria-live="polite">Showing <?= ($page+1); ?> to <?= ($page+$row2); ?> of <?= $total2; ?> records</div>
                                </div>
                                <div class="col-md-7 col-sm-7" align="right">
                                    <div class="dataTables_paginate paging_bootstrap_full_number" id="sample_1_paginate">
                                        <ul class="pagination" style="visibility: visible;">
                                        <?php
                                        $prev = "";
                                        $next = "";
                                            if ($page == 0) {
                                                $prev = "disabled";
                                            }
                                            if ($total2 <= ($page + 10)) {
                                                $next = "disabled";
                                            }
                                        ?>
                                            <li class="prev <?= $prev; ?>"><a <?php if($prev!="disabled"){ ?>href="<?= site_url('nasty_v2/dashboard/page/a62?page='.($page-10)."&e=2"); ?>"<?php } ?> title="Prev" ><i class="fa fa-angle-left"></i></a></li>                                            
                                            <li class="next <?= $next; ?>"><a <?php if($next!="disabled"){ ?>href="<?= site_url('nasty_v2/dashboard/page/a62?page='.($page+10)."&e=2"); ?>"<?php } ?> title="Next"><i class="fa fa-angle-right"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                </td>
                            </tfoot> 
                            <?php 
                            } ?>
                                 </table>    
                              
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {

        $(".DOCButton").click(function() {

                    id = $(this).prop('id');
                    orid = $("."+id).val();
                        
                    bootbox.confirm({
                        message: "Are you sure that you want to proceed?",
                        buttons: {
                            confirm: {
                                label: 'Yes',
                                className: 'btn-success'
                               
                            },
                            cancel: {
                                label: 'No',
                                className: 'btn-danger'
                            }
                        },
                        callback: function (result) {
                            if(result == true){
                                
                                $.post('<?= site_url('nasty_v2/dashboard/change_pr_id4'); ?>', {or_id: orid,pr_id: 9}, function(data) {
                                    
                                    $(window).attr("location", "<?= site_url('nasty_v2/dashboard/page/a62'); ?>");
                                    
                                });

                            }
                            
                            
                        }
                    });


                });


        $(".SHButton").click(function() {

                    id = $(this).prop('id');
                    orid = $("."+id).val();
                        
                    bootbox.confirm({
                        message: "Are you sure that you want to proceed?",
                        buttons: {
                            confirm: {
                                label: 'Yes',
                                className: 'btn-success'
                               
                            },
                            cancel: {
                                label: 'No',
                                className: 'btn-danger'
                            }
                        },
                        callback: function (result) {
                            if(result == true){
                                
                                $.post('<?= site_url('nasty_v2/dashboard/change_pr_id4'); ?>', {or_id: orid,pr_id: 11}, function(data) {
                                    
                                    $(window).attr("location", "<?= site_url('nasty_v2/dashboard/page/a62'); ?>");
                                    
                                });

                            }
                            
                            
                        }
                    });


                });

         $(".ARButton").click(function() {

                    id = $(this).prop('id');
                    orid = $("."+id).val();
                        
                    bootbox.confirm({
                        message: "Are you sure that you want to proceed?",
                        buttons: {
                            confirm: {
                                label: 'Yes',
                                className: 'btn-success'
                               
                            },
                            cancel: {
                                label: 'No',
                                className: 'btn-danger'
                            }
                        },
                        callback: function (result) {
                            if(result == true){
                                
                                $.post('<?= site_url('nasty_v2/dashboard/change_pr_id4'); ?>', {or_id: orid,pr_id: 12}, function(data) {
                                    
                                    $(window).attr("location", "<?= site_url('nasty_v2/dashboard/page/a62'); ?>");
                                    
                                });

                            }
                            
                            
                        }
                    });


                });

        $(".RTSButton").click(function() {

                    id = $(this).prop('id');
                    orid = $("."+id).val();
                        

                    bootbox.prompt({
                        title: "Enter the tracking Number :",
                        inputType: 'number',
                        callback: function (result) {
                            //alert(result);
                            if(result){
                            $.post('<?= site_url('nasty_v2/dashboard/change_pr_id4'); ?>', {or_id: orid,pr_id: 10}, function(data) {
                                    
                                    $(window).attr("location", "<?= site_url('nasty_v2/dashboard/page/a62'); ?>");
                                    
                                });
                            }
                            //console.log(result);
                        }
                    });

               


                });

        $(".REButton").click(function() {

                    id = $(this).prop('id');
                    orid = $("."+id).val();
                        

                    bootbox.prompt({
                        title: "Please state the reason :",
                        inputType: 'textarea',
                        callback: function (result) {
                            //alert(result);
                            if(result){
                            $.post('<?= site_url('nasty_v2/dashboard/change_pr_id4'); ?>', {or_id: orid,pr_id: 13}, function(data) {
                                    
                                    $(window).attr("location", "<?= site_url('nasty_v2/dashboard/page/a62'); ?>");
                                    
                                });
                            }
                            //console.log(result);
                        }
                    });

               


                });

        $('#proO').click(function() {
            $("#newOrder").hide('slow');
            $("#proOrder").show('slow');
        });
        $('#newO').click(function() {
            $("#newOrder").show('slow');
            $("#proOrder").hide('slow');
        });


    });


</script>










