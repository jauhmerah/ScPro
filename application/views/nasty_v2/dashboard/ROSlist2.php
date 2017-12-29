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
        <div class="portlet box grey-mint">
             <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-user"></i>Distributor Switch
                </div>
            </div>
            <div class="portlet-body flip-scroll">
                    <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                            <a class="dashboard-stat dashboard-stat-v2 red-soft" id="ROS1">
                                <div class="visual pull-left">
                                    <i class="fa fa-truck"></i>
                                </div>
                                <div class="details pull-left">
									<div class="number">

			                        </div>
                                    <div class="desc"><h3>ROS LIST</h3> </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <a class="dashboard-stat dashboard-stat-v2 blue-ebonyclay" id="RTSO">
                                <div class="visual pull-left">
                                    <i class="fa fa-ship"></i>
                                </div>
                                <div class="details pull-left">
                                    <div class="number">

                                    </div>
                                    <div class="desc"><h3>RTS LIST</h3> </div>
                                </div>
                            </a>
                        </div>
                    </div>
					<div class="row">
						<div class="col-md-12"  id="ROS1rder" <?php if($e==1){echo "style=display:block;"; }else{ echo "style=display:none;"; }  ?> >
							<div class="portlet box red-soft" >
								 <div class="portlet-title">
					                <div class="caption">
					                    <i class="fa fa-user"></i>ROS List
					                </div>
					            </div>

					            <div class="portlet-body flip-scroll">
										  <table class="table table-striped">
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
					                                                           <td><span class="pull-left">
							                            <?php
					                                    $view = ($user->cl_name == null) ? "--Not Set--" : $user->cl_name ;
					                                    echo $view;

					                                    	?>
					                                    <br>
					                                    <?php
					                                    $client = "";
					                                    if($user->cl_id != null)
					                                    {
					                                    	$client = 'CL'.(1000+$user->cl_id);
					                                    }
					                                    ?>
					                                    <strong><?= $client; ?></strong>

					                                    </span><span class="pull-right">
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
					                                        <a href="<?= site_url('nasty_v2/dashboard/page/a111?view=').$usid; ?>" name="c4" title="Order Detail"><button type="button" class="btn btn-circle btn-danger btn-md"><i class="fa fa-eye"></i></button></a>
					                                        &nbsp;-&nbsp;
					                                        <button title = "Print Order" onclick = "window.open('<?= site_url('order/printO1?id='.$this->my_func->scpro_encrypt($user->or_id).'&ver=2'); ?>');" type="button" class="btn btn-default btn-circle btn-info btn-md"><i class="fa fa-print"></i></button>
					                                        &nbsp;-&nbsp;
					                                        <button type="button" title = "D.O Form" onclick = "window.open('<?= site_url('order/printDO1?id='.$this->my_func->scpro_encrypt($user->or_id).'&ver=2'); ?>');" class="btn btn-success btn-circle btn-md"><i class="fa fa-truck"></i></button>
					                                        &nbsp;-&nbsp;
					                                        <button type="button" onclick = "window.open('<?= site_url('nasty_v2/invoice/Invoice?id='.$this->my_func->scpro_encrypt($user->or_id).'&ver=2'); ?>');"  class="btn blue-dark btn-circle btn-md" title="Invoice">Inv</button>
					                                        &nbsp;-&nbsp;
					                                        <button type="button" onclick = "window.open('<?= site_url('nasty_v2/invoice/dummyInvoice?id='.$this->my_func->scpro_encrypt($user->or_id).'&ver=2'); ?>');" class="btn c-btn-border-1x c-btn-blue-dark btn-circle btn-md" title="Dummy Invoice">DInv</button>


					                                                            </td>
					                                                    </tr>

					                                                     <tr class="collapse row<?= $n ?>">
					                                                    <td colspan="7" cellspadding="10" style="background-color: #F1F1F1;">
					                                                    <div class="col-md-2 col-md-offset-1 pull-right">

					                                                         <select class="form-control status<?= $n.'ros' ?>" name="pr_id" id="pr_id">
					                                                            <?php foreach ($lvl as $key) {
					                                                                ?>
					                                                                <option value="<?= $key->pr_id; ?>" <?php if($key->pr_id == $user->pr_id){echo " selected ";} ?>> <?= $key->pr_desc; ?></option>
					                                                                <?php
					                                                            } ?>

					                                                        </select>
					                                                        <div class="clear" style="height: 10px"></div>
					                                                    <input type="hidden" name="id" id="id" class="form-control <?= $n.'ros' ?>" value="<?= $user->or_id; ?>">
					                                                    <button title = "Save" type="button" class="btnROS btn-primary btn-circle btn-info btn-xs" id="<?= $n.'ros' ?>" name="<?= $n.'ros' ?>">Save</button>


					                                                   </div>



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
					                                            <li class="prev <?= $prev; ?>"><a <?php if($prev!="disabled"){ ?>href="<?= site_url('nasty_v2/dashboard/page/a2?page='.($page-10)."&e=1"); ?>"<?php } ?> title="Prev" ><i class="fa fa-angle-left"></i></a></li>
					                                            <li class="next <?= $next; ?>"><a <?php if($next!="disabled"){ ?>href="<?= site_url('nasty_v2/dashboard/page/a2?page='.($page+10)."&e=1"); ?>"<?php } ?> title="Next"><i class="fa fa-angle-right"></i></a></li>
					                                        </ul>
					                                    </div>
					                                </div>
					                                </td>
					                            </tfoot>


					                            </table>

					            </div>

							</div>
						</div>
						<div class="col-md-12"  id="RTSOrder" <?php if($e2==2){echo "style=display:block;";}else{ echo "style=display:none;"; }  ?> >
					        <div class="portlet box blue-ebonyclay">
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
					                                                    <tr class="clickable" data-toggle="collapse" id="row3<?= $n ?>" data-target=".row3<?= $n ?>">
					                                                          <td><?= $n; ?></td>
					                                                           <td><span class="pull-left">
							                            <?php
					                                    $view = ($user->cl_name == null) ? "--Not Set--" : $user->cl_name ;
					                                    echo $view;

					                                    	?>
					                                    <br>
					                                    <?php
					                                    $client = "";
					                                    if($user->cl_id != null)
					                                    {
					                                    	$client = 'CL'.(1000+$user->cl_id);
					                                    }
					                                    ?>
					                                    <strong><?= $client; ?></strong>

					                                    </span><span class="pull-right">
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
					                                        <a href="<?= site_url('nasty_v2/dashboard/page/a111?view=').$usid; ?>" name="c4" title="Order Detail"><button type="button" class="btn btn-circle dark btn-info btn-md"><i class="fa fa-eye"></i></button></a>
					                                         &nbsp;-&nbsp;
					                                        <button title = "Print Order" onclick = "window.open('<?= site_url('order/printO1?id='.$this->my_func->scpro_encrypt($user->or_id).'&ver=2'); ?>');" type="button" class="btn btn-default btn-circle btn-info btn-md"><i class="fa fa-print"></i></button>
					                                        &nbsp;-&nbsp;
					                                        <button type="button" title = "D.O Form" onclick = "window.open('<?= site_url('order/printDO1?id='.$this->my_func->scpro_encrypt($user->or_id).'&ver=2'); ?>');" class="btn btn-success btn-circle btn-md"><i class="fa fa-truck"></i></button>
					                                        &nbsp;-&nbsp;
					                                        <button type="button" onclick = "window.open('<?= site_url('nasty_v2/invoice/Invoice?id='.$this->my_func->scpro_encrypt($user->or_id).'&ver=2'); ?>');"  class="btn blue-dark btn-circle btn-md" title="Invoice">Inv</button>
					                                        &nbsp;-&nbsp;
					                                        <button type="button" onclick = "window.open('<?= site_url('nasty_v2/invoice/dummyInvoice?id='.$this->my_func->scpro_encrypt($user->or_id).'&ver=2'); ?>');" class="btn c-btn-border-1x c-btn-blue-dark btn-circle btn-md" title="Dummy Invoice">DInv</button>
															&nbsp;-&nbsp;
															<button type="button" onclick="window.open('<?= site_url('parcel/printParcel?id='.$this->my_func->scpro_encrypt($user->or_id."|printParcel|2"));?>');"  class="btn btn-circle blue-hoki" title="Print Parcel"><i class="fa fa-barcode"></i> <i class="fa fa-print"></i></button>
					                                                            </td>
					                                                    </tr>

					                                                    <tr class="collapse row3<?= $n ?>">
					                                                    <td colspan="7" cellspadding="10" style="background-color: #F1F1F1;">
					                                                    <div class="col-md-2 col-md-offset-1 pull-right">

					                                                         <select class="form-control status<?= $n.'rts' ?>" name="pr_id" id="pr_id">
					                                                            <?php foreach ($lvl2 as $key) {
					                                                                ?>
					                                                                <option value="<?= $key->pr_id; ?>" <?php if($key->pr_id == $user->pr_id){echo " selected ";} ?>> <?= $key->pr_desc; ?></option>
					                                                                <?php
					                                                            } ?>

					                                                        </select>
					                                                        <div class="clear" style="height: 10px"></div>
					                                                    <input type="hidden" name="id" id="id" class="form-control <?= $n.'rts' ?>" value="<?= $user->or_id; ?>">
					                                                    <button title = "Save" type="button" class="btnRTS btn-primary btn-circle btn-info btn-xs" id="<?= $n.'rts' ?>" name="<?= $n.'rts' ?>">Save</button>


					                                                   </div>



					                                                    </td>
					                                                    </tr>


					                                                    <?php

					                                                        }
					                                                    } ?>
					                                    </tbody>
					                                    <?php if (isset($page2)) {?>
					                            <tfoot>
					                                <td colspan="7">
					                                <div class="col-md-5 col-sm-5">
					                                    <div class="dataTables_info" id="sample_1_info" role="status" aria-live="polite">Showing <?= ($page2+1); ?> to <?= ($page2+$row2); ?> of <?= $total2; ?> records</div>
					                                </div>
					                                <div class="col-md-7 col-sm-7" align="right">
					                                    <div class="dataTables_paginate paging_bootstrap_full_number" id="sample_1_paginate">
					                                        <ul class="pagination" style="visibility: visible;">
					                                        <?php
					                                        $prev = "";
					                                        $next = "";
					                                            if ($page2 == 0) {
					                                                $prev = "disabled";
					                                            }
					                                            if ($total2 <= ($page2 + 10)) {
					                                                $next = "disabled";
					                                            }
					                                        ?>
					                                            <li class="prev <?= $prev; ?>"><a <?php if($prev!="disabled"){ ?>href="<?= site_url('nasty_v2/dashboard/page/a2?page2='.($page2-10)."&e2=2"); ?>"<?php } ?> title="Prev" ><i class="fa fa-angle-left"></i></a></li>
					                                            <li class="next <?= $next; ?>"><a <?php if($next!="disabled"){ ?>href="<?= site_url('nasty_v2/dashboard/page/a2?page2='.($page2+10)."&e2=2"); ?>"<?php } ?> title="Next"><i class="fa fa-angle-right"></i></a></li>
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
            </div>

        </div>
    </div>
</div>



 <div class="form-content" style="display:none;">
      <form class="form" role="form">
        <div class="form-group">
          <label for="tracking">Tracking Number</label>
          <input class="form-control tracking" id="tracking" name="tracking" placeholder="Enter tracking Number" required>
		  <p class="help-block" >Place ',' to add multiple tracking number</p>
        </div>
      </form>
    </div>
<input type="hidden" id="us2Key" value="<?= $this->session->userdata('us_id'); ?>">
<script>
    $(document).ready(function() {
		var usid2 = $('#us2Key').val();
        $('#RTSO').click(function() {
            $("#ROS1rder").hide();
            $("#RTSOrder").show();
			$("#newOrder").hide('slow');
			$("#proOrder").hide('slow');
			$("#comOrder").hide('slow');
        });
        $('#ROS1').click(function() {
            $("#ROS1rder").show();
            $("#RTSOrder").hide();
			$("#comOrder").hide('slow');
			$("#newOrder").hide('slow');
			$("#proOrder").hide('slow');
        });

        $(".btnROS").click(function(){

            id = $(this).prop('id');
            orid = $("."+id).val();
            prid = $(".status"+id).val();
            // alert(id);
            // alert(prid);

            bootbox.confirm({
                        message: "Are you sure that you want to change this order status?",
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

                                $.post('<?= site_url('nasty_v2/dashboard/updatePr_id'); ?>', {id: orid, pr_id: prid , us_id : usid2}, function(data) {

                                    $(window).attr("location", "<?= site_url('nasty_v2/dashboard/page/a2'); ?>");

                                });

                            }


                        }
                    });
        });




        $(".btnDOC").click(function(){

            id = $(this).prop('id');
            orid = $("."+id).val();
            prid = $(".status"+id).val();
            // alert(id);
            // alert(prid);

            bootbox.confirm({
                        message: "Are you sure that you want to change this order status?",
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

                                $.post('<?= site_url('nasty_v2/dashboard/updatePr_id'); ?>', {id: orid, pr_id: prid , us_id : usid2}, function(data) {

                                    $(window).attr("location", "<?= site_url('nasty_v2/dashboard/page/a2'); ?>");

                                });

                            }


                        }
                    });
        });

         $(".btnRTS").click(function(){

            id = $(this).prop('id');
            orid = $("."+id).val();
            prid = $(".status"+id).val();

            if(prid==11)
            {

                    bootbox.prompt({
                        title: "Enter Tracking Number :<br /><h5>Place {<strong>,</strong>} for multiple tracking number</h5>",
                        inputType: 'text',
                        callback: function (result) {

                            if(result!=null){

                                $.post('<?= site_url('nasty_v2/dashboard/updatePr_id'); ?>', {id: orid, pr_id: prid , no : result , us_id : usid2}, function(data) {

                                    $(window).attr("location", "<?= site_url('nasty_v2/dashboard/page/a2'); ?>");

                                });

                            }
                        }
                    });


            }
            else
            {
                  bootbox.confirm({
                        message: "Are you sure that you want to change this order status?",
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

                                $.post('<?= site_url('nasty_v2/dashboard/updatePr_id'); ?>', {id: orid, pr_id: prid , us_id : usid2}, function(data) {

                                    $(window).attr("location", "<?= site_url('nasty_v2/dashboard/page/a2'); ?>");

                                });

                            }


                        }
                    });
            }
        });


    });


</script>
