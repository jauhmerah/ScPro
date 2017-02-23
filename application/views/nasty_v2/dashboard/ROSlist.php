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

           .container {
  max-width: 100%;
}
.wrapper {
  white-space: nowrap;
  overflow-x: scroll;
}

.scroll-wrapper {
  width: 100%;
}





           
</style>


<div class="row">
	<div class="col-md-12">

		<div class="portlet box purple">
			 <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-user"></i>ROS List 
                </div>                
            </div>

            <div class="portlet-body flip-scroll">

                   <div class="row">
                            <div class="col-md-12">
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#home">ROS</a></li>
                                <li><a data-toggle="tab" href="#menu1">DOC</a></li>
                                <li><a data-toggle="tab" href="#menu2">RTS</a></li>
                              </ul>

                               <div class="tab-content">
                              <div id="home" class="tab-pane fade in active">
                         <div class="col-md-12">
                           <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Client Name</th>
                                                <th>Order Code</th>
                                                <th>Order Date</th>
                                                <th>Sales Person</th>
                                                
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                              <?php
                                            $n = 0;

                                            if (sizeof($arr1) != 0) { 
                                                foreach ($arr1 as $user) {
                                                    if ($user->pr_id == 8){
                                                        $orid = $this->my_func->scpro_encrypt($user->or_id);
                                                    $n++;
                                                    ?>

                                                    <tr class="clickable" data-toggle="collapse" id="row<?= $n ?>" data-target=".row<?= $n ?>" onclick="location.href='<?= site_url('nasty_v2/dashboard/page/a111?v=2&view=').$orid; ?>'" style="cursor: pointer">
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
                                                            
                                                    </tr>

                        


                                                    <?php 
                                                            }
                                                           
                                                        }
                                                        if ($n==0){

                                                             ?>
                                                              <tr>
                                                                <td colspan="5" style="text-align: center;">--No Data--</td>

                                                            </tr>

                                                          <?php   
                                                        }

                                                     }
                                                    
                                                        ?>
                                                        

                                                       

                                        </tbody>



                            </table>   
                          </div>          
                                
                            </div>



                           



                            <div id="menu1" class="tab-pane fade active">
                                <div class="col-md-12">
                                       <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Client Name</th>
                                                <th>Order Code</th>
                                                <th>Order Date</th>
                                                <th>Sales Person</th>
                                                
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                              <?php
                                            $n = 0;

                                            if (sizeof($arr1) != 0) { 
                                                foreach ($arr1 as $user) {
                                                    if ($user->pr_id == 9){
                                                        $orid = $this->my_func->scpro_encrypt($user->or_id);
                                                    $n++;
                                                    ?>

                                                    <tr class="clickable" data-toggle="collapse" id="row<?= $n ?>" data-target=".row<?= $n ?>" onclick="location.href='<?= site_url('nasty_v2/dashboard/page/a111?v=2&view=').$orid; ?>'" style="cursor: pointer">
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
                                                            
                                                    </tr>

                        


                                                    <?php 
                                                            }
                                                           
                                                        }
                                                        if ($n==0){

                                                             ?>
                                                              <tr>
                                                                <td colspan="5" style="text-align: center;">--No Data--</td>

                                                            </tr>

                                                          <?php   
                                                        }

                                                     }
                                                    
                                                        ?>
                                                        

                                                       

                                        </tbody>



                            </table>   



                                </div>
                            </div>

                            <div id="menu2" class="tab-pane fade active">
                                <div class="col-md-12">
                                       <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Client Name</th>
                                                <th>Order Code</th>
                                                <th>Order Date</th>
                                                <th>Sales Person</th>
                                                
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                              <?php
                                            $n = 0;

                                            if (sizeof($arr1) != 0) { 
                                                foreach ($arr1 as $user) {
                                                    if ($user->pr_id == 10){
                                                        $orid = $this->my_func->scpro_encrypt($user->or_id);
                                                    $n++;
                                                    ?>

                                                    <tr class="clickable" data-toggle="collapse" id="row<?= $n ?>" data-target=".row<?= $n ?>" onclick="location.href='<?= site_url('nasty_v2/dashboard/page/a111?v=2&view=').$orid; ?>'" style="cursor: pointer">
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
                                                            
                                                    </tr>

                        


                                                    <?php 
                                                            }
                                                           
                                                        }
                                                        if ($n==0){

                                                             ?>
                                                              <tr>
                                                                <td colspan="5" style="text-align: center;">--No Data--</td>

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
    </div>
</div>


<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>



